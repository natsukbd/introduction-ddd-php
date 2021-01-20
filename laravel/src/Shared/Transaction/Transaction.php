<?php

declare(strict_types=1);

namespace IntroductionDDD\Shared\Transaction;

interface Transaction
{
    /**
     * @param callable $transactionScope
     * @return mixed
     */
    function scope(callable $transactionScope): mixed;
}
