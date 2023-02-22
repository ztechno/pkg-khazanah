CREATE TABLE evaluation_ranges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    min_value DOUBLE(11,3) NOT NULL,
    max_value DOUBLE(11,3) NOT NULL
);