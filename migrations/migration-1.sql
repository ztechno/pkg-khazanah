CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    functional_position varchar(45) NOT NULL,
    structural_position varchar(45) NOT NULL,
    CONSTRAINT fk_teachers_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    CONSTRAINT fk_students_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    student_id INT NOT NULL,
    nik VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    CONSTRAINT fk_parents_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_parents_student_id FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
);
CREATE TABLE periods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    year INT NOT NULL,
    status  INT NOT NULL DEFAULT '0'
);
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    target VARCHAR(100) NOT NULL
);
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT NOT NULL,
    description TEXT NOT NULL,
    CONSTRAINT fk_questions_categorie_id FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
);
CREATE TABLE evaluation_ranges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    min_value INT NOT NULL,
    max_value INT NOT NULL
);
CREATE TABLE result_ranges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    min_value INT NOT NULL,
    max_value INT NOT NULL
);
CREATE TABLE evaluation_subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluation_subjects_teacher_id FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluation_subjects_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE

);
CREATE TABLE evaluators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    subject_id INT NOT NULL,
    period_id INT NOT NULL,
    type INT NOT NULL,
    CONSTRAINT fk_evaluators_teacher_id FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluators_subject_id FOREIGN KEY (subject_id) REFERENCES evaluation_subjects(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluators_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE
);

CREATE TABLE evaluator_students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluator_students_student_id FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_students_subject_id FOREIGN KEY (subject_id) REFERENCES evaluation_subjects(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_students_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE

);
CREATE TABLE evaluator_parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT NOT NULL,
    subject_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluator_parents_parent_id FOREIGN KEY (parent_id) REFERENCES parents(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_parents_subject_id FOREIGN KEY (subject_id) REFERENCES evaluation_subjects(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_parents_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE
);
CREATE TABLE question_assigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT NOT NULL,
    teacher_id INT NOT NULL,
    target VARCHAR(100) NOT NULL,
    question_id INT NOT NULL,
    categorie_id INT NOT NULL,
    CONSTRAINT fk_question_assigns_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE,
    CONSTRAINT fk_question_assigns_teacher_id FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
    CONSTRAINT fk_question_assigns_question_id FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE,
    CONSTRAINT fk_question_assigns_categorie_id FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
);
CREATE TABLE evaluations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT NOT NULL,
    teacher_id INT NOT NULL,
    evaluator_id INT NOT NULL,
    question_id INT NOT NULL,
    score INT NOT NULL,
    target VARCHAR(100) NOT NULL,
    CONSTRAINT fk_evaluations_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluations_teacher_id FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluations_evaluator_id FOREIGN KEY (evaluator_id) REFERENCES evaluators(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluations_question_id FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);