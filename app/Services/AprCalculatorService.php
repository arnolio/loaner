<?php
declare(strict_types=1);

namespace App\Services;

use App\Loan;
use App\LoanType;

/**
 * Class AprCalculatorService
 * @package App\Services
 */
class AprCalculatorService implements LoanCalculatorInterface
{
    /**
     * @param Loan $loan
     * @return float
     * TODO: This calculation is wildly inaccurate
     */
    public function calculate(Loan $loan): float {
        $costRatio = $this->calculateCostRatio($loan);

        return ($costRatio * 365.00 * 100.00) / $loan->term;
    }

    private function calculateTotalInterest(Loan $loan): float {
        return ($loan->loan_amount * $loan->rate * $loan->term) / 100.00;
    }

    private function calculateCostRatio(Loan $loan): float {
        //Calculate fee
        $fees = LoanType::query()->where('id', $loan->type_id)->get()->first()->fee;

        //Calculate interest
        $totalInterest = $this->calculateTotalInterest($loan);

        return ($fees + $totalInterest) / $loan->loan_amount;
    }
}
