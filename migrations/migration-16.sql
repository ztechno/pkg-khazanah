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