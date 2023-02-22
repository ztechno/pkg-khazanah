CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT NOT NULL,
    description TEXT NOT NULL,
    CONSTRAINT fk_questions_categorie_id FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
);