<?php
declare(strict_types=1);

namespace App\Services;

use App\Loan;

/**
 * Class LoanService
 * @package App\Services
 */
class LoanService
{
    /**
     * @var $aprCalculator AprCalculatorService
     */
    private $aprCalculator;

    /**
     * LoanService constructor.
     * @param AprCalculatorService $aprCalculator
     */
    public function __construct(AprCalculatorService $aprCalculator) {
        $this->aprCalculator =  $aprCalculator;
    }

    /**
     * @param Loan $loan
     * @return Loan
     */
    public function createLoan(Loan $loan): Loan {
        $loan->fill([
            'apr' => $this->aprCalculator->calculate($loan)
        ]);

        $loan->save();

        return $loan;
    }
}
