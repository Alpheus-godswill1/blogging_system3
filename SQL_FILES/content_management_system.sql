-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 03:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_comment`
--

CREATE TABLE `auth_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapproved',
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_comment`
--

INSERT INTO `auth_comment` (`comment_id`, `comment_name`, `comment_email`, `body`, `comment_status`, `post_id`) VALUES
(3, 'Student', 'utibeabasipeter@gmail.com', 'Hi Utibe!', 'Approved', 5),
(4, 'Pastor williams', 'Zaccharia@gmail.com', 'Hi Disciples!', 'Unapproved', 5),
(5, 'Pastor williams', 'Zaccharia@gmail.com', 'Hi Sons And Daughters Of God!', 'Approved', 4),
(6, 'Mavins Beacon', 'willyharry@gmail.com', 'Hi HarryVentures,\r\nHope you guys have started the project, I will really need to get the project by the end of this month.', 'Approved', 6),
(7, 'Mavins Beacon', 'willyharry@gmail.com', 'Hi HarryVentures,\r\nHope you guys have started the project, I will really need to get the project by the end of this month.', 'Unapproved', 6),
(8, 'Pastor williams', 'willyharry@gmail.com', 'Hi Harry!\r\n', 'unapproved', 8),
(9, 'Pastor williams', 'willyharry@gmail.com', 'Hi Harry!\r\n', 'Unapproved', 8),
(10, 'Alpheus', 'Zaccharia@gmail.com', 'Allies are here', 'approved', 10),
(11, 'Alpheus', 'Zaccharia@gmail.com', 'Allies are here', 'Unapproved', 10),
(12, 'bsjshj', 'harrylouise23@gmail.com', 'shsjsgsugdjsfg', 'approved', 16),
(13, 'bsjshj', 'harrylouise23@gmail.com', 'shsjsgsugdjsfg', 'Unapproved', 16);

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `user_profile_pic` text NOT NULL,
  `user_active` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`user_id`, `username`, `email`, `user_password`, `user_profile_pic`, `user_active`, `post_id`, `title`) VALUES
(29, 'Alpheus_Godswill', 'CEO@admin.com', 'b41fde7e062c8828e41ec895d8715984', './users/profile_pics/Alph635ab04f8be669.46704374.png', 'yes', 0, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'tags'),
(3, 'SQQL'),
(4, 'PHP'),
(5, 'Python'),
(6, 'food'),
(8, 'money');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_views` int(255) NOT NULL,
  `post_tags` text NOT NULL,
  `post_status` varchar(255) DEFAULT 'draft',
  `post_track` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_category`, `post_category_id`, `post_author`, `post_content`, `post_date`, `post_image`, `post_comment_count`, `post_views`, `post_tags`, `post_status`, `post_track`) VALUES
(1, 'Administrator', 'Python', 5, 'Richy', 'Hi Alex, \r\nThere are several other ways to solve this problem of yours, but these are the solutions that will best fit this project on board.', 'Friday: 22: July: 2022', '../imgs/Alph634ffb4bcc69b5.67694411.png', 0, 0, 'Administrator', 'published', ''),
(2, 'curator', 'SQQL', 0, 'Alpheus Godswill', 'Hi Bright,\r\nThe solutions to your problem are listed below in the sections, go through them and ensure to give me a proper call back for proper integration to your project.', 'Friday: 22: July: 2022', '../imgs/Alph632492787897d6.40162228.png', 0, 0, 'curator', 'published', ''),
(3, 'blogger1', 'PHP', 0, 'Alpheus Godswill', 'Hi Harry,\r\nThese is to inform you that the project is completed and I will really want my payment in full before we can hop on to the next project as planned.', 'Friday: 22: July: 2022', '../imgs/Alph6324923e9db5e1.22707294.png', 0, 0, 'blogger1', 'published', ''),
(4, 'Proposal styles', 'food\r\n', 0, 'Alpheus Godswill', 'Hi Ross,\r\nThese is to inform you that you have been of great support to my growth and life on Upwork the best platform to freelance and learn about business and otherwise in life, I would really appreciate if you can send your account details, so I can send you a token  of appreciation \r\n\r\nBest regards.', 'Friday: 22: July: 2022', '../imgs/Alph6324928de217d0.08495019.png', 0, 0, 'Proposal styles', 'published', ''),
(5, 'How To Create a Blogging System Like This.', 'tags', 5, 'Alpheus', 'Hi Friends,\r\nThese is just a short one to let you know how you could, create an amazing blogging system like this.\r\nNote these particular project is a project I have been working on for over a year now but I think now it\'s going to take me not less than 5 days to complete these amazing project. \r\n\r\nPREREQUISITE :\r\n1.PHP --fundamentals\r\n2.XAMPP Control Panel.\r\n3.Courage.\r\n4.Deligence.', 'Friday: 22: July: 2022', '../imgs/seafood.png', 0, 0, '#love #best_regard #Expecting your calls', 'Draft', ''),
(6, 'victor is a stubborn boy', 'food', 6, 'Alpheus Godswill', 'hi victor,what did you plan for today, and I hope you are fixing your confidence habits to the way it will serve the better good of you and others', 'Monday: 25: July: 2022', '../imgs/Alph63249207e6fe52.68846612.png', 0, 0, 'victor is a stubborn boy', 'published', ''),
(8, 'How To Overcome The Spirit Of Anger.', 'food', 6, 'Ufanabasi', 'There\'re very few ways to overcome the spirit of anger around you and in you.\r\n1.Prayers.\r\n2.Talking about your accomplishment to yourself.\r\n3.Attracting good people to your life.\r\n4.Fasting On God.\r\n5.Living By The Principles Of Jesus.', 'Tuesday: 26: July: 2022', '../imgs/comfortable-inter.png', 0, 0, '#food , #Adapting the nature of God , #Jesus ,#love', 'published', ''),
(10, 'How to prepare good soup with little ideas', 'Python', 0, 'Alpheus Godswill', 'List down every thing that first come to mind to ensure no idea has been left out.', 'Saturday: 30: July: 2022', '../imgs/Alph632491b2b85ef0.04894777.png', 0, 0, 'How to prepare good soup with little ideas', 'published', ''),
(15, '', 'tags', 1, 'Alpheus Godswill', '', 'Friday: 16: September: 2022', '../imgs/salad.png', 0, 0, '', 'published', ''),
(16, 'July', 'tags', 1, 'Richy', 'He just got the same Roll royce as mine and he changed the color of the cars', 'Wednesday: 19: October: 2022', '../imgs/img_7.jpg', 0, 0, '#food , #Adapting the nature of God , #Jesus ,#love', 'published', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_comment`
--
ALTER TABLE `auth_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_comment`
--
ALTER TABLE `auth_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
