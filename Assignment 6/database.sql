CREATE DATABASE IF NOT EXISTS employee_db;
USE employee_db;

CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15),
    department VARCHAR(50),
    salary DECIMAL(10, 2),
    registration VARCHAR(100),
    address VARCHAR(255),
    gender VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (name, email, phone, department, salary, registration, address, gender) VALUES
('Abhishek Shelke', 'abhishek@example.com', '9876543210', 'IT', 50000.00, 'REG001', 'Pune, Maharashtra', 'Male'),
('Rahul Patil', 'rahul@example.com', '9876543211', 'HR', 45000.00, 'REG002', 'Mumbai, Maharashtra', 'Male'),
('Priya Sharma', 'priya@example.com', '9876543212', 'Finance', 55000.00, 'REG003', 'Delhi', 'Female');

-- Query to update existing table (run these if table already exists):
ALTER TABLE employees ADD COLUMN registration VARCHAR(100) AFTER salary;
ALTER TABLE employees ADD COLUMN address VARCHAR(255) AFTER registration;
ALTER TABLE employees ADD COLUMN gender VARCHAR(10) AFTER address;

-- Fill null values for existing employees:
UPDATE employees SET registration = 'REG001', address = 'Pune, Maharashtra', gender = 'Male' WHERE id = 1;
UPDATE employees SET registration = 'REG002', address = 'Mumbai, Maharashtra', gender = 'Male' WHERE id = 2;
UPDATE employees SET registration = 'REG003', address = 'Delhi', gender = 'Female' WHERE id = 3;
