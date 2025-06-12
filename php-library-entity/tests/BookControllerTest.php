<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\BookController;

class BookControllerTest extends TestCase
{
    protected $bookController;

    protected function setUp(): void
    {
        $this->bookController = new BookController();
    }

    public function testGetBooks()
    {
        $response = $this->bookController->getBooks();
        $this->assertIsArray($response);
    }

    public function testGetBook()
    {
        $response = $this->bookController->getBook(1);
        $this->assertArrayHasKey('id', $response);
    }

    public function testCreateBook()
    {
        $data = ['title' => 'New Book', 'authorId' => 1, 'publishedDate' => '2023-01-01'];
        $response = $this->bookController->createBook($data);
        $this->assertArrayHasKey('id', $response);
    }

    public function testUpdateBook()
    {
        $data = ['title' => 'Updated Book', 'authorId' => 1, 'publishedDate' => '2023-01-01'];
        $response = $this->bookController->updateBook(1, $data);
        $this->assertTrue($response);
    }

    public function testDeleteBook()
    {
        $response = $this->bookController->deleteBook(1);
        $this->assertTrue($response);
    }
}