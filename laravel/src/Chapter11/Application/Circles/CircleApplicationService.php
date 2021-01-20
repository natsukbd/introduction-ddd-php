<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Application\Circles;

use IntroductionDDD\Chapter11\Application\Circles\Create\CircleCreateCommand;
use IntroductionDDD\Chapter11\Application\Circles\Exceptions\CanNotRegisterCircleException;
use IntroductionDDD\Chapter11\Application\Circles\Exceptions\CircleFullException;
use IntroductionDDD\Chapter11\Application\Circles\Exceptions\CircleNotFoundException;
use IntroductionDDD\Chapter11\Application\Circles\Join\CircleJoinCommand;
use IntroductionDDD\Chapter11\Application\Users\Exceptions\UserNotFoundException;
use IntroductionDDD\Chapter11\Domain\Models\Circles\Circle;
use IntroductionDDD\Chapter11\Domain\Models\Circles\CircleFactoryInterface;
use IntroductionDDD\Chapter11\Domain\Models\Circles\CircleId;
use IntroductionDDD\Chapter11\Domain\Models\Circles\CircleName;
use IntroductionDDD\Chapter11\Domain\Models\Circles\CircleRepositoryInterface;
use IntroductionDDD\Chapter11\Domain\Models\Circles\CircleService;
use IntroductionDDD\Chapter11\Domain\Models\Users\User;
use IntroductionDDD\Chapter11\Domain\Models\Users\UserId;
use IntroductionDDD\Chapter11\Domain\Models\Users\UserRepositoryInterface;
use IntroductionDDD\Shared\Transaction\Transaction;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class CircleApplicationService
{
    /**
     * CircleApplicationService constructor.
     * @param CircleFactoryInterface $circleFactory
     * @param CircleRepositoryInterface $circleRepository
     * @param CircleService $circleService
     * @param UserRepositoryInterface $userRepository
     * @param Transaction $transaction
     */
    public function __construct(
        private CircleFactoryInterface $circleFactory,
        private CircleRepositoryInterface $circleRepository,
        private CircleService $circleService,
        private UserRepositoryInterface $userRepository,
        private Transaction $transaction
    ) {
    }

    public function create(CircleCreateCommand $command): void
    {
        $this->transaction->scope(
            function () use ($command) {
                $ownerId = new UserId($command->userId());
                $owner = $this->userRepository->findById($ownerId);
                if (!$owner instanceof User) {
                    throw new UserNotFoundException('サークルのオーナーとなるユーザーが見つかりませんでした');
                }

                $name = new CircleName($command->name());
                $circle = $this->circleFactory->create($name, $owner);

                if ($this->circleService->exists($circle)) {
                    throw new CanNotRegisterCircleException('サークルは既に存在しています。');
                }
                $this->circleRepository->save($circle);
            }
        );
    }

    public function join(CircleJoinCommand $command): void
    {
        $this->transaction->scope(
            function () use ($command) {
                $memberId = new UserId($command->userId());
                $member = $this->userRepository->findById($memberId);
                if (!$member instanceof User) {
                    throw new UserNotFoundException('ユーザが見つかりませんでした');
                }

                $id = new CircleId($command->circleId());
                $circle = $this->circleRepository->findById($id);
                if (!$circle instanceof Circle) {
                    throw new CircleNotFoundException('サークルが見つかりませんでした');
                }

                // サークルのオーナーを含めて30名か確認
                if ($circle->members()->count() >= 29) {
                    throw new CircleFullException($id->value());
                }

                $circle->members()->add($member);
                $this->circleRepository->save($circle);
            }
        );
    }
}
