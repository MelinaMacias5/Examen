<?php

namespace App\Controllers;

use App\Models\Loan;

class LoanController
{
    public function getLoans()
    {
        $loanModel = new Loan();
        return $loanModel->getAllLoans();
    }

    public function getLoan($id)
    {
        $loanModel = new Loan();
        return $loanModel->getLoanById($id);
    }

    public function createLoan($data)
    {
        $loanModel = new Loan();
        return $loanModel->createLoan($data);
    }

    public function updateLoan($id, $data)
    {
        $loanModel = new Loan();
        return $loanModel->updateLoan($id, $data);
    }

    public function deleteLoan($id)
    {
        $loanModel = new Loan();
        return $loanModel->deleteLoan($id);
    }
}