CREATE TABLE `ft_table` (`id` int NOT NULL AUTO_INCREMENT, `login` varchar(10) NOT NULL DEFAULT 'toto', `group` enum('staff', 'student', 'other') NOT NULL, `creation_date` date NOT NULL, PRIMARY KEY (`id`));