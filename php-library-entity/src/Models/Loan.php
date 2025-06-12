<?php

namespace App\Models;

class Loan
{
    private $id;
    private $bookId;
    private $userId;
    private $loanDate;

    public function __construct($id, $bookId, $userId, $loanDate)
    {
        $this->id = $id;
        $this->bookId = $bookId;
        $this->userId = $userId;
        $this->loanDate = $loanDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getLoanDate()
    {
        return $this->loanDate;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setLoanDate($loanDate)
    {
        $this->loanDate = $loanDate;
    }

    // Database interaction methods can be added here
}