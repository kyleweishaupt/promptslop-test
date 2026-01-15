# Simple PHP Blog Application

This is a basic blog web application built with PHP, featuring user authentication and CRUD operations for blog posts.

## Features

- User registration and login
- Create, read, update, and delete blog posts
- SQLite database for simplicity
- Basic security measures (password hashing, input sanitization)

## Project Structure

- `index.php`: Entry point of the application
- `bootstrap.php`: Includes all necessary files and initializes the app
- `app/`: Application logic
  - `controllers/`: Controllers for handling requests
  - `models/`: Data models
  - `views/`: HTML templates
- `config/`: Configuration files
- `database/`: Database initialization and SQLite file
- `public/`: Static assets (CSS, JS)

## Installation and Setup

### Using Docker (Recommended)

1. Ensure Docker is installed on your system.
2. Build the Docker image:
   ```
   docker build -t php-blog-app .
   ```
3. Run the container:
   ```
   docker run -p 8080:80 php-blog-app
   ```
4. Access the application at `http://localhost:8080`

### Manual Setup

1. Ensure PHP 8.1+ and SQLite3 are installed.
2. Clone or download the project files.
3. Run the application using PHP's built-in server:
   ```
   php -S localhost:8000
   ```
4. Access at `http://localhost:8000`

## Usage

- Register a new account or login with existing credentials
- View all blog posts on the homepage
- Logged-in users can create new posts, edit their own posts, and delete their posts

## Security

- Passwords are hashed using PHP's password_hash()
- User input is sanitized using htmlspecialchars()
- Sessions are used for authentication
- Basic authorization checks prevent users from editing others' posts

## Deployment

For production deployment, consider:
- Using a web server like Apache or Nginx
- Setting up proper file permissions
- Configuring HTTPS
- Regular backups of the SQLite database
- Monitoring and logging

## Contributing

Feel free to fork and contribute to this project.

## License

This project is open-source and available under the MIT License.
