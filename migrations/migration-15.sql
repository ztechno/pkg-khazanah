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