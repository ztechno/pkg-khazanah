CREATE TABLE evaluator_students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluator_students_student_id FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_students_subject_id FOREIGN KEY (subject_id) REFERENCES evaluation_subjects(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_students_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE

);