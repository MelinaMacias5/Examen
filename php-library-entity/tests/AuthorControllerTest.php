<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\AuthorController;

class AuthorControllerTest extends TestCase
{
    protected $authorController;

    protected function setUp(): void
    {
        $this->authorController = new AuthorController();
    }

    public function testGetAuthors()
    {
        $response = $this->authorController->getAuthors();
        $this->assertIsArray($response);
    }

    public function testGetAuthor()
    {
        $response = $this->authorController->getAuthor(1);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals(1, $response['id']);
    }

    public function testCreateAuthor()
    {
        $data = ['name' => 'John Doe', 'biography' => 'An author.'];
        $response = $this->authorController->createAuthor($data);
        $this->assertArrayHasKey('id', $response);
    }

    public function testUpdateAuthor()
    {
        $data = ['name' => 'John Doe Updated', 'biography' => 'An updated author.'];
        $response = $this->authorController->updateAuthor(1, $data);
        $this->assertTrue($response);
    }

    public function testDeleteAuthor()
    {
        $response = $this->authorController->deleteAuthor(1);
        $this->assertTrue($response);
    }
}