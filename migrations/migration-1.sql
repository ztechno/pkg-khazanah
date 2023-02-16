CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT FOREIGN KEY,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    functional_position VARCHAR(45) NOT NULL,
    structural_position VARCHAR(45) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT FOREIGN KEY,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL
);

CREATE TABLE parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT FOREIGN KEY,
    students_id INT FOREIGN KEY,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    target VARCHAR(100) NOT NULL
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT FOREIGN KEY,
    description TEXT NOT NULL
);

CREATE TABLE evaluation_ranges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    min_value DOUBLE(11,3) NOT NULL,
    max_value DOUBLE(11,3) NOT NULL
);

CREATE TABLE result_ranges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    min_value DOUBLE(11,3) NOT NULL,
    max_value DOUBLE(11,3) NOT NULL
);

CREATE TABLE periods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    year INT NOT NULL
);

CREATE TABLE evaluation_subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT FOREIGN KEY,
    period_id INT FOREIGN KEY
);

CREATE TABLE evaluators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT FOREIGN KEY,
    subject_id INT FOREIGN KEY,
    period_id INT FOREIGN KEY,
    type INT NOT NULL
);

CREATE TABLE evaluator_students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT FOREIGN KEY,
    subject_id INT FOREIGN KEY,
    period_id INT FOREIGN KEY
);

CREATE TABLE evaluator_parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT FOREIGN KEY,
    subject_id INT FOREIGN KEY,
    period_id INT FOREIGN KEY
);

CREATE TABLE question_assigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT FOREIGN KEY,
    teacher_id INT FOREIGN KEY,
    target VARCHAR(100) NOT NULL,
    question_id INT FOREIGN KEY,
    category_id INT FOREIGN KEY
);

CREATE TABLE evaluations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT FOREIGN KEY,
    teacher_id INT FOREIGN KEY,
    evaluation INT FOREIGN KEY,
    question_id INT FOREIGN KEY,
    score INT NOT NULL,
    target VARCHAR(100) NOT NULL
);