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