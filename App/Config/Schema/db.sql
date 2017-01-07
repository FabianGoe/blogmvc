-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2017 at 01:46 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.1.0-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `introduction`, `content`, `date`) VALUES
(1, 'This is the first blog', 'this_is_the_first_blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in ullamcorper neque. Suspendisse auctor sagittis velit at finibus. Aliquam feugiat metus non lectus viverra mattis. Quisque vel enim vitae justo ornare varius. Nullam hendrerit turpis sit amet nulla efficitur posuere sit amet sit amet odio. Quisque in suscipit tellus, ac lobortis ex.', 'Integer efficitur nulla vel tortor luctus ullamcorper. Etiam dignissim justo quis est congue dignissim. Donec ac mi ac urna rutrum dictum. Etiam non pretium nisl. Nulla quis tortor at neque dapibus suscipit et sit amet enim. Morbi ultricies sollicitudin sollicitudin. Proin aliquam quis ipsum id mollis. Maecenas dictum blandit tincidunt.\r\n\r\nNullam quis massa nec nunc tincidunt ultrices. Aenean cursus lectus laoreet tempor blandit. Nullam dui quam, rutrum ut dolor at, imperdiet tincidunt erat. In nec est convallis, laoreet nunc eu, fringilla enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut vel condimentum metus, vel varius urna. Vivamus ullamcorper nisi ut dapibus porta. Morbi ultrices nulla a turpis gravida tincidunt. Donec tincidunt ullamcorper enim, non auctor felis scelerisque non. Ut vel ullamcorper mi. Quisque congue malesuada libero pretium efficitur. Nunc dolor ipsum, venenatis quis vestibulum id, vestibulum sed erat. Vestibulum ex velit, porta ut ultrices quis, pellentesque non est.\r\n\r\nDuis lectus risus, semper vel facilisis sed, tempus sed lacus. Aenean malesuada urna purus, at finibus turpis semper ac. Cras convallis neque id nisi vestibulum, pulvinar pharetra dui rutrum. Etiam at eros fermentum, convallis purus quis, molestie sem. Ut a mattis augue. Vivamus blandit quam id nunc venenatis, mattis ultrices diam auctor. Etiam vulputate arcu in neque mollis tempor. Aenean sit amet nunc rhoncus, aliquam dolor a, commodo nunc. Pellentesque dictum erat at volutpat consectetur. Ut fermentum urna et felis vulputate, eget pretium justo iaculis. Aenean auctor eros nec massa rhoncus venenatis eu vel tellus. Nunc suscipit pharetra auctor.', '2017-01-07 12:21:31'),
(2, 'This is the second blog', 'this_is_the_second_blog', 'Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.', 'Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.\r\n\r\nCurabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis.\r\n\r\nAenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '2017-01-07 13:46:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;