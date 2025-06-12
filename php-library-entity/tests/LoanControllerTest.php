<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\LoanController;

class LoanControllerTest extends TestCase
{
    protected $loanController;

    protected function setUp(): void
    {
        $this->loanController = new LoanController();
    }

    public function testGetLoans()
    {
        $response = $this->loanController->getLoans();
        $this->assertIsArray($response);
    }

    public function testGetLoan()
    {
        $loanId = 1; // Assuming a loan with ID 1 exists
        $response = $this->loanController->getLoan($loanId);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($loanId, $response['id']);
    }

    public function testCreateLoan()
    {
        $data = [
            'bookId' => 1, // Assuming a book with ID 1 exists
            'userId' => 1, // Assuming a user with ID 1 exists
            'loanDate' => '2023-10-01'
        ];
        $response = $this->loanController->createLoan($data);
        $this->assertArrayHasKey('id', $response);
    }

    public function testUpdateLoan()
    {
        $loanId = 1; // Assuming a loan with ID 1 exists
        $data = [
            'bookId' => 1,
            'userId' => 1,
            'loanDate' => '2023-10-02'
        ];
        $response = $this->loanController->updateLoan($loanId, $data);
        $this->assertTrue($response);
    }

    public function testDeleteLoan()
    {
        $loanId = 1; // Assuming a loan with ID 1 exists
        $response = $this->loanController->deleteLoan($loanId);
        $this->assertTrue($response);
    }
}