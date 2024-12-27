# Article API - Laravel

This is a simple RESTful API built with Laravel to manage articles. It includes functionality to create, retrieve, update, and delete articles, as well as track view counts for each article. The API conforms to level 2 of the Richardson Maturity Model, meaning it provides access to resources via HTTP methods and returns JSON responses.

## Features
- **Create a new article**
- **Retrieve a list of articles**
- **Retrieve a specific article**
- **Update an existing article**
- **Delete an article**
- **Track article view counts**

## Requirements
- PHP 8.0 or higher
- Composer
- MySQL or another compatible database

## Installation

### 1. Clone the Repository
First, clone this repository to your local machine:

```bash
git clone https://github.com/your-username/article-api.git
cd article-api
```

### 2. Install Dependencies
Run Composer to install all the necessary PHP dependencies:

```bash
composer install
```

### 3. Set Up the Environment
Copy the `.env.example` file to create your `.env` file:

```bash
cp .env.example .env
```

Edit the `.env` file to configure your database connection. Make sure to update the following:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=your_database_name`
- `DB_USERNAME=your_database_username`
- `DB_PASSWORD=your_database_password`

### 4. Run Migrations
Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

### 5. Serve the Application
Start the Laravel development server:

```bash
php artisan serve
```

The API will be accessible at `http://127.0.0.1:8000`.

## API Endpoints

The API follows a RESTful design and is versioned under `v1`. All routes are prefixed with `/api/v1/articles`.

### 1. **Get All Articles**
- **URL:** `/api/v1/articles`
- **Method:** `GET`
- **Description:** Returns the 15 most recent articles.
- **Response:**
  ```json
  [
    {
      "id": 1,
      "title": "Example Article",
      "url": "https://example.com",
      "views": 10,
      "created_at": "2024-12-01T12:00:00",
      "updated_at": "2024-12-01T12:00:00"
    },
    ...
  ]
  ```

### 2. **Get a Specific Article**
- **URL:** `/api/v1/articles/{id}`
- **Method:** `GET`
- **Description:** Retrieves a specific article by ID and increments the view count.
- **Response:**
  ```json
  {
    "id": 1,
    "title": "Example Article",
    "url": "https://example.com",
    "views": 11,
    "created_at": "2024-12-01T12:00:00",
    "updated_at": "2024-12-01T12:00:00"
  }
  ```

### 3. **Create a New Article**
- **URL:** `/api/v1/articles`
- **Method:** `POST`
- **Description:** Creates a new article.
- **Body (JSON):**
  ```json
  {
    "title": "New Article",
    "url": "https://new-article.com"
  }
  ```
- **Response:**
  ```json
  {
    "id": 2,
    "title": "New Article",
    "url": "https://new-article.com",
    "views": 0,
    "created_at": "2024-12-01T12:30:00",
    "updated_at": "2024-12-01T12:30:00"
  }
  ```

### 4. **Update an Article**
- **URL:** `/api/v1/articles/{id}`
- **Method:** `PUT`
- **Description:** Updates an existing article by ID.
- **Body (JSON):**
  ```json
  {
    "title": "Updated Article Title",
    "url": "https://updated-url.com"
  }
  ```
- **Response:**
  ```json
  {
    "id": 2,
    "title": "Updated Article Title",
    "url": "https://updated-url.com",
    "views": 0,
    "created_at": "2024-12-01T12:30:00",
    "updated_at": "2024-12-01T12:45:00"
  }
  ```

### 5. **Delete an Article**
- **URL:** `/api/v1/articles/{id}`
- **Method:** `DELETE`
- **Description:** Deletes a specific article by ID.
- **Response:**
  ```json
  {
    "message": "Article deleted successfully"
  }
  ```

## Validation
The API ensures that:
- The `title` field is required and has a maximum length of 64 characters.
- The `url` field is required, must be a valid URL, and has a maximum length of 1024 characters.
- The `views` field is automatically set to 0 when a new article is created.

## Testing

You can test the API using tools like **Postman** or **Insomnia**. Here are the steps to test the endpoints:

1. **Create a new article:**
   - Make a POST request to `/api/v1/articles` with a JSON body containing `title` and `url`.
   
2. **Retrieve articles:**
   - Make a GET request to `/api/v1/articles` to get the list of articles.

3. **Update an article:**
   - Make a PUT request to `/api/v1/articles/{id}` to update an article.

4. **Delete an article:**
   - Make a DELETE request to `/api/v1/articles/{id}` to delete an article.

## License
This project is licensed under the MIT License.
