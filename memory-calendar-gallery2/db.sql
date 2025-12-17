CREATE DATABASE IF NOT EXISTS memory_calendar;
USE memory_calendar;

CREATE TABLE memories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    image VARCHAR(255),
    memory_date DATE,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE if not EXISTS memories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    memory_date DATE NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO memories (title, description, memory_date)
VALUES 
('Birthday Party', 'My 20th birthday', '2025-01-15'),
('Trip to Goa', 'Beach vacation', '2025-01-20'),
('College Fest', 'Annual day event', '2025-01-20');
INSERT INTO memories (title, description, memory_date)
VALUES
('Birthday Party', 'My 20th birthday', '2025-01-15'),
('Trip to Goa', 'Beach vacation', '2025-01-20'),
('College Fest', 'Annual day event', '2025-01-20');