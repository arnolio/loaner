<?php
declare(strict_types=1);

namespace App\Services;

use App\Loan;

/**
 * Interface CalculatorInterface
 * @package App\Services
 */
interface LoanCalculatorInterface
{
    /**
     * @param Loan $loan
     * @return float
     */
    public function calculate(Loan $loan): float;
}
