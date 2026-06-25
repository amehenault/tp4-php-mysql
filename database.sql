CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tasks` (`title`, `description`) VALUES 
('Acheter un chien', 'Choisir un harnais et une médaille'),
('Lire le livre Mon deuxième cerveau', 'Déployer les notes sur Obsidian');
