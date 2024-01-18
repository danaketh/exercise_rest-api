# Exercise: REST API
PHP Exercise for creating REST API. Goal of this exercise is to create API for managing collection of books, using patterns that are less common in Symfony apps - DDD, ADR, and SOLID. API should be able to:
- list all books
- fetch one book
- create new book
- update existing book
- delete book
- filter books by: author, year
- sort books by: title, author, year, isbn
- search books by: title, author, year, isbn
- pagination
- return response in JSON/XML format
- return response with proper HTTP status code

## Requirements
- PHP 8.2+
- SQLite3 (for simplicity)
- Composer
- Git
- Docker

## Installation
1. Clone repository
2. Run `docker compose up -d`
3. Run `docker compose exec php bash`
