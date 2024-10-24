CREATE DATABASE certificateDB;

USE certificateDB;

CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_name VARCHAR(255) NOT NULL,
    candidate_register_id VARCHAR(100) NOT NULL UNIQUE,
    certificate_image VARCHAR(255) NOT NULL
);
