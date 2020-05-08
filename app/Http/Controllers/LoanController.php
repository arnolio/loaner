<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Loan;
use App\LoanType;
use App\Services\LoanService;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class LoanController
 * @package App\Http\Controllers
 */
class LoanController
{
    /**
     * @var LoanService
     */
    private $loanService;

    /**
     * LoanController constructor.
     * @param LoanService $loanService
     */
    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    /**
     * @param Loan $loan
     * @return Loan
     */
    public function get(Loan $loan): Loan {
        return $loan;
    }

    /**
     * @param Request $request
     * @return Loan
     * @throws \Exception
     */
    public function create(Request $request): Loan {
        //TODO: This needs a DTO to store request input so that all loan creation logic can live in service
        $loan = new Loan([
            'name' => $request->get('name'),
            'ssn' => $request->get('ssn'),
            'date_of_birth' => new Carbon($request->get('date_of_birth')),
            'loan_amount' => $request->get('loan_amount'),
            'rate' => $request->get('rate'),
            'term' => $request->get('term')
        ]);

        //Todo: I do not like this. Need to figure out how to relate objects to each other on creation
        $loan->type_id = $request->get('type_id');
        // $loan->type = LoanType::query()->where('id',$request->input('type_id'))->get();

        return $this->loanService->createLoan($loan);
    }
}
