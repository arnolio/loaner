<?php
declare(strict_types=1);

namespace App\Services;


use App\Loan;

/**
 * Class AprCalculatorService
 * @package App\Services
 */
class AprCalculatorService implements LoanCalculatorInterface
{
    /**
     * @param Loan $loan
     * @return float
     */
    public function calculate(Loan $loan): float
    {
        return 0.0;
    }
}
