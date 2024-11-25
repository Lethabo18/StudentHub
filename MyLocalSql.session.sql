CREATE DATABASE studenthub_db;
USE studenthub_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (email, password) VALUES ('test@example.com', 'hashed_password_here');
EXIT;

CREATE USER 'pass'@'localhost' IDENTIFIED BY 'password';


GRANT ALL PRIVILEGES ON studenthub_db.* TO 'pass'@'localhost';

-- Apply the changes
FLUSH PRIVILEGES;
CREATE TABLE signin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
USE studenthub_db;
ALTER TABLE orders MODIFY customer_address VARCHAR(255) NULL;
