<?php

namespace Controllers;

use App\Http\Controllers\LoanController;
use App\Loan;
use App\Services\LoanService;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class LoanControllerTest
 * @package Controllers
 */
class LoanControllerTest extends TestCase
{
    /**
     * @var LoanController
     */
    protected $loanController;

    public function setUp(): void
    {
        $loanService = $this
            ->getMockBuilder(LoanService::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['createLoan'])
            ->getMock();

        $loanService->expects($this->once())
            ->method('createLoan')
            ->willReturn(new Loan([
                'name' => 'name',
                'ssn' => '123',
                'date_of_birth' => '',
                'loan_amount' => '',
                'rate' => 2.1,
                'term' => 100
            ]));

        $this->loanController = new LoanController(
            $loanService
        );
    }

    private function createMockRequest(): Request {
        $request = $this->getMockBuilder('Illuminate\Http\Request')
            ->disableOriginalConstructor()
            ->onlyMethods(['get', 'has'])
            ->getMock();

        $request->expects($this->any())
            ->method('get')
            ->willReturn('');

        return $request;
    }

    public function testCreate()
    {
        $response = $this->loanController->create($this->createMockRequest());
    }
}
