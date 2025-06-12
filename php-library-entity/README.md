# PHP Library Entity

This project is a simple library management system that implements a JSON-RPC interface for managing books, authors, and loans. It provides CRUD (Create, Read, Update, Delete) operations for each entity and connects to a PostgreSQL database.

## Project Structure

```
php-library-entity
├── src
│   ├── Controllers
│   │   ├── AuthorController.php
│   │   ├── BookController.php
│   │   └── LoanController.php
│   ├── Models
│   │   ├── Author.php
│   │   ├── Book.php
│   │   └── Loan.php
│   ├── Database
│   │   └── Connection.php
│   ├── JsonRpc
│   │   └── Server.php
│   └── index.php
├── tests
│   ├── AuthorControllerTest.php
│   ├── BookControllerTest.php
│   └── LoanControllerTest.php
├── composer.json
├── .env.example
└── README.md
```

## Setup Instructions

1. **Clone the repository:**
   ```
   git clone <repository-url>
   cd php-library-entity
   ```

2. **Install dependencies:**
   Make sure you have Composer installed. Run the following command to install the required dependencies:
   ```
   composer install
   ```

3. **Configure the environment:**
   Copy the `.env.example` file to `.env` and update the database connection settings as needed.

4. **Set up the database:**
   Create a PostgreSQL database and run the necessary SQL commands to create the required tables for authors, books, and loans.

5. **Run the application:**
   You can start the application by running the following command:
   ```
   php -S localhost:8000 -t src
   ```

## Usage Examples

### Authors

- **Get all authors:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "getAuthors",
      "params": {},
      "id": 1
  }
  ```

- **Create a new author:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "createAuthor",
      "params": {
          "name": "Author Name",
          "biography": "Author Biography"
      },
      "id": 1
  }
  ```

### Books

- **Get all books:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "getBooks",
      "params": {},
      "id": 1
  }
  ```

- **Create a new book:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "createBook",
      "params": {
          "title": "Book Title",
          "authorId": 1,
          "publishedDate": "2023-01-01"
      },
      "id": 1
  }
  ```

### Loans

- **Get all loans:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "getLoans",
      "params": {},
      "id": 1
  }
  ```

- **Create a new loan:**
  ```
  POST /jsonrpc
  {
      "jsonrpc": "2.0",
      "method": "createLoan",
      "params": {
          "bookId": 1,
          "userId": 1,
          "loanDate": "2023-01-01"
      },
      "id": 1
  }
  ```

## Testing

To run the tests, use the following command:
```
vendor/bin/phpunit tests
```

This will execute all the unit tests for the controllers and ensure that the CRUD operations work as expected.