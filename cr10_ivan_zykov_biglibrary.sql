-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 11:07 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_ivan_zykov_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `creator_id` int(11) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`creator_id`, `last_name`, `first_name`) VALUES
(1, 'Tolstoy', 'Leo'),
(2, 'Salinger', 'Jerome'),
(3, 'Kesey', 'Ken'),
(4, 'Rowling', 'Joanne'),
(5, 'Hemingway', 'Ernest'),
(6, 'Preslye', 'Elvis'),
(7, 'Wright', 'Edgar');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `isbn` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `publish_date` year(4) DEFAULT NULL,
  `img_link` varchar(200) DEFAULT NULL,
  `short_description` text,
  `fk_creator_id` int(11) DEFAULT NULL,
  `fk_publisher_id` int(11) DEFAULT NULL,
  `fk_type_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`isbn`, `title`, `publish_date`, `img_link`, `short_description`, `fk_creator_id`, `fk_publisher_id`, `fk_type_id`, `fk_user_id`) VALUES
(2, 'Shaun of the Dead', 2004, 'https://m.media-amazon.com/images/M/MV5BMTg5Mjk2NDMtZTk0Ny00YTQ0LWIzYWEtMWI5MGQ0Mjg1OTNkXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY1200_CR86,0,630,1200_AL_.jpg', 'A man decides to turn his moribund life around by winning back his ex-girlfriend, reconciling his relationship with his mother, and dealing with an entire community that has returned from the dead to eat the living', 7, 5, 3, NULL),
(3, 'Hot Fuzz', 2007, 'http://moviereviews.s3.amazonaws.com/2015/08/24/04/25/25/27/vdswo67lSLVUppYwa8c99QnpxXb.jpg', 'A skilled London police officer is transferred to a small town that\'s harbouring a dark secret.', 7, 5, 3, NULL),
(4, 'Scott Pilgrim vs. the World', 2010, 'https://upload.wikimedia.org/wikipedia/en/1/14/Scott_Pilgrim_vs._the_World_teaser.jpg', 'Scott Pilgrim must defeat his new girlfriend\'s seven evil exes in order to win her heart.', 7, 5, 3, NULL),
(5, 'AAAAnna Karenina', 1901, 'https://upload.wikimedia.org/wikipedia/commons/c/c7/AnnaKareninaTitle.jpg', 'Widely regarded as a pinnacle in realist fiction, Tolstoy considered Anna Karenina his first true novel, after he came to consider War and Peace to be more than a novel. Fyodor Dostoyevsky declared it \"flawless as a work of art.\" His opinion was shared by Vladimir Nabokov, who especially admired \"the flawless magic of Tolstoy\'s style,\" and by William Faulkner, who described the novel as \"the best ever written.\" The novel remains popular, as demonstrated by a 2007 Time poll of 125 contemporary authors in which Anna Karenina was voted the \"greatest book ever written.\"', 1, 3, 1, NULL),
(6, 'War and peace', 1901, 'https://i.pinimg.com/736x/01/2b/d0/012bd032d8a176fb4d1cae107d846aeb--leo-tolstoy-big-books.jpg', 'The novel chronicles the history of the French invasion of Russia and the impact of the Napoleonic era on Tsarist society through the stories of five Russian aristocratic families. Portions of an earlier version, titled The Year 1805, were serialized in The Russian Messenger from 1865 to 1867. The novel was first published in its entirety in 1869.', 1, 3, 1, NULL),
(7, 'The Catcher in the Rye', 1951, 'https://upload.wikimedia.org/wikipedia/en/3/32/Rye_catcher.jpg', 'The Catcher in the Rye is a story by J. D. Salinger, first published in serial form in 1945-6 and as a novel in 1951. A classic novel originally published for adults, it has since become popular with adolescent readers for its themes of teenage angst and alienation. It has been translated into almost all of the world\'s major languages. Around 1 million copies are sold each year, with total sales of more than 65 million books. The novel\'s protagonist Holden Caulfield has become an icon for teenage rebellion. The novel also deals with complex issues of innocence, identity, belonging, loss, and connection.', 2, 1, 1, NULL),
(8, 'One Flew Over the Cuckoo\'s Nest', 1962, 'https://upload.wikimedia.org/wikipedia/en/c/c1/OneFlewOverTheCuckoosNest.jpg', 'One Flew Over the Cuckoo\'s Nest (1962) is a novel written by Ken Kesey. Set in an Oregon psychiatric hospital, the narrative serves as a study of the institutional processes and the human mind as well as a critique of behaviorism and a celebration of humanistic principles. It was adapted into the broadway (and later off-broadway) play One Flew Over the Cuckoo\'s Nest by Dale Wasserman in 1963. Bo Goldman adapted the novel into a 1975 film directed by Milos Forman, which won five Academy Awards.', 3, 1, 1, NULL),
(9, 'Harry Potter', 1997, 'https://upload.wikimedia.org/wikipedia/en/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg', 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J. K. Rowling. It is the first novel in the Harry Potter series and Rowling\'s debut novel, first published in 1997 by Bloomsbury. It was published in the United States as Harry Potter and the Sorcerer\'s Stone by Scholastic Corporation in 1998. The plot follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardy. Harry makes close friends and a few enemies during his first year at the Hogwarts School of Witchcraft and Wizardry. With the help of his friends, Harry faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry\'s parents, but failed to kill Harry when he was just 15 months old.', 4, 5, 1, NULL),
(10, 'The Old Man and the Sea', 1952, 'https://upload.wikimedia.org/wikipedia/en/7/73/Oldmansea.jpg', 'The Old Man and the Sea is a short novel written by the American author Ernest Hemingway in 1951 in Cuba, and published in 1952. It was the last major work of fiction by Hemingway that was published during his lifetime. One of his most famous works, it tells the story of Santiago, an aging Cuban fisherman who struggles with a giant marlin far out in the Gulf Stream off the coast of Cuba.', 5, 1, 1, NULL),
(11, 'Promised Land', 1975, 'https://upload.wikimedia.org/wikipedia/en/5/58/Elvis_Presley_Promised_Land.jpg', 'Promised Land is a 1975 album by American singer and musician Elvis Presley on RCA Records. It was recorded in December 1973 at Stax Records studios in Memphis and released on Presley\'s 40th birthday in January, 1975. In the US the album reached number 47 on the Billboard Top 200 chart and number 1 in Billboard\'s Top Country LPs chart. The album rose to number 1 in the Country Cashbox albums chart. In the UK the album reached #21.', 6, 4, 2, NULL),
(17, 'Stalker', 1979, 'https://upload.wikimedia.org/wikipedia/ru/8/8b/1980_stalker.jpg', 'Stalker is a 1979 Soviet science fiction art film directed by Andrei Tarkovsky with a screenplay written by Boris and Arkady Strugatsky, loosely based on their novel Roadside Picnic (1972). The film combines elements of science fiction with dramatic philosophical and psychological themes.', 1, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `house_num` smallint(6) DEFAULT NULL,
  `postal_code` mediumint(9) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `fk_size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `city`, `name`, `street`, `house_num`, `postal_code`, `country`, `fk_size_id`) VALUES
(1, 'New York', 'Phoenix', 'Central avenue', 134, 12343, 'USA', 3),
(2, 'Vienna', 'Orac', 'Universitaetsring', 1, 1010, 'Austria', 2),
(3, 'Moscow', 'Alpha', 'Arbat', 15, 112233, 'Russia', 3),
(4, 'Munich', 'Unicorn', 'Lindenstrasse', 10, 987789, 'Germany', 1),
(5, 'London', 'Sky', 'Baker str.', 221, 777777, 'UK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publishers_sizes`
--

CREATE TABLE `publishers_sizes` (
  `size_id` int(11) NOT NULL,
  `name` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishers_sizes`
--

INSERT INTO `publishers_sizes` (`size_id`, `name`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'big');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `name`) VALUES
(1, 'Book'),
(2, 'CD'),
(3, 'DVD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(1, 'Ivan', 'Zykov', 'ivan.v.zykov@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'Ivan', 'Zykov', 'myemail@gmail.com', 'ec4c88ca7f69534f10c0611c1ecd13e7c2cdf73e1b915e9fd0cf27ac10da43fa'),
(3, 'Max', 'Dav', 'max@gmail.com', 'af41e68e1309fa29a5044cbdc36b90a3821d8807e68c7675a6c495112bc8a55f'),
(4, 'Ivan', 'Zykov', 'ivan@gmail.com', '92925488b28ab12584ac8fcaa8a27a0f497b2c62940c8f4fbc8ef19ebc87c43e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`creator_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_creator_id` (`fk_creator_id`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`),
  ADD KEY `fk_type_id` (`fk_type_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`),
  ADD KEY `fk_size_id` (`fk_size_id`);

--
-- Indexes for table `publishers_sizes`
--
ALTER TABLE `publishers_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creators`
--
ALTER TABLE `creators`
  MODIFY `creator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publishers_sizes`
--
ALTER TABLE `publishers_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_creator_id`) REFERENCES `creators` (`creator_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publishers` (`publisher_id`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_type_id`) REFERENCES `types` (`type_id`),
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `publishers`
--
ALTER TABLE `publishers`
  ADD CONSTRAINT `publishers_ibfk_1` FOREIGN KEY (`fk_size_id`) REFERENCES `publishers_sizes` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
