CREATE TABLE evaluation_subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluation_subjects_teacher_id FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluation_subjects_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE

);