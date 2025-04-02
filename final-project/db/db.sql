CREATE DATABASE CrockfordLC;

USE CrockfordLC;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO items (name, price, quantity) VALUES
('Screened & Blended Soils', 15.00, FLOOR(10 + (RAND() * 90))),
('Screened Sand', 19.00, FLOOR(10 + (RAND() * 90))),
('Round Stone', 72.50, FLOOR(10 + (RAND() * 90))),
('Boulders', 100.00, FLOOR(10 + (RAND() * 90))),
('Muskoka Moss Rock', 120.00, FLOOR(10 + (RAND() * 90))),
('Stair Treads', 80.00, FLOOR(10 + (RAND() * 90))),
('Crusher Run Gravel', 36.00, FLOOR(10 + (RAND() * 90))),
('Clear Crushed Granite', 52.50, FLOOR(10 + (RAND() * 90))),
('Flagstone', 200.00, FLOOR(10 + (RAND() * 90))),
('1/2 Clear Round Stone', 40.00, FLOOR(10 + (RAND() * 90))),
('1-3 River Rock', 45.00, FLOOR(10 + (RAND() * 90))),
('Beach Sand', 12.00, FLOOR(10 + (RAND() * 90))),
('Coarse Sand', 14.00, FLOOR(10 + (RAND() * 90))),
('Coarse Gravel', 28.00, FLOOR(10 + (RAND() * 90))),
('XL Boulder', 200.00, FLOOR(10 + (RAND() * 90))),
('XL River Rock', 180.00, FLOOR(10 + (RAND() * 90)));
