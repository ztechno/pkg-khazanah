CREATE TABLE evaluator_parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT NOT NULL,
    subject_id INT NOT NULL,
    period_id INT NOT NULL,
    CONSTRAINT fk_evaluator_parents_parent_id FOREIGN KEY (parent_id) REFERENCES parents(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_parents_subject_id FOREIGN KEY (subject_id) REFERENCES evaluation_subjects(id) ON DELETE CASCADE,
    CONSTRAINT fk_evaluator_parents_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE
);