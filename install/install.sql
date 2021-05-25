-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 02:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `category_order` int(11) DEFAULT NULL,
  `show_on_menu` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `keywords`, `parent_id`, `category_order`, `show_on_menu`, `created_at`, `status`) VALUES
(1, 'updates', 'updates', NULL, NULL, 0, NULL, 1, NULL, '1'),
(2, 'versions', 'versions', NULL, NULL, 0, NULL, 1, NULL, '1'),
(3, 'technology', 'technology', NULL, NULL, 0, NULL, 1, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `name`) VALUES
(1, 'compoxition@gmail.com', '2021-05-22 16:58:08', 'qasim');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `is_custom` int(11) DEFAULT 1,
  `content` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `keywords`, `slug`, `is_custom`, `content`, `parent_id`, `created_at`, `status`, `img`) VALUES
(1, 'About', 'about', 'about', 'about-us', 0, 'about', 0, '2019-03-08 21:59:53', '1', NULL),
(2, 'Contact', 'contact', 'contact', 'contact-us', 0, 'contact', 0, '2019-03-08 22:01:38', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `status`, `title`, `slug`, `content`, `keywords`, `user_id`, `category_id`, `subcategory_id`, `img`, `hits`, `created_at`) VALUES
(1, 1, 'PHP blog script about to release its first beta version v1', 'php-blog-script-about-to-release-its-first-beta-version-v1', '<p>PHP Blog script is about to release its first beta version this year 2021. the initial testing has been already completed and the development is about to clean up with production-based bugs.&nbsp;<br><br>At the initial stage, we are looking for more people to download and testing our beta version. so we can get more testing details from UI UX to backend functionality.&nbsp;<br><br>We hope everyone will contribute to this amazing opportunity. as working with PHP blog script we enjoyed a lot.&nbsp;<br><br>Just give it a try its very simple fast secure and super SEO friendly.&nbsp;</p>', 'beta version, php blog script, initial release, php blog system, php blog based script', 1, 1, NULL, '24-05-2021-1621849776.jpg', 22, '2021-05-24 06:41:42'),
(2, 1, 'Whats new in PHP 8', 'whats-new-in-php-8', '<p>PHP 8 has been officially released to the General Availability on November 26, 2020!</p><p>&nbsp;</p><p><a href=\"https://demo.kinsta.com/register?utm_campaign=mykinsta%20demo&amp;utm_source=blog&amp;utm_medium=sidebar%20video%20button\"><strong>Try a free demo</strong></a></p><p>This new major update brings many optimizations and powerful features to the language. We’re excited to drive you through the most interesting changes that will allow us to write better code and build more robust applications.</p><p>&nbsp;</p>', 'php 8, new version', 1, 1, NULL, '24-05-2021-1621850033.jpg', 4, '2021-05-24 06:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) DEFAULT 'Infinite',
  `home_title` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `whatsapp_url` varchar(500) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `about_footer` varchar(1000) DEFAULT NULL,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `copyright` varchar(500) DEFAULT 'Copyright © 2018 Infinite - All Rights Reserved.',
  `cookies_warning` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `site_url` varchar(250) DEFAULT NULL,
  `theme_color` varchar(255) NOT NULL,
  `header_code` varchar(555) DEFAULT NULL,
  `footer_code` varchar(555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `home_title`, `description`, `keywords`, `whatsapp_url`, `facebook_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `about_footer`, `contact_address`, `contact_email`, `contact_phone`, `copyright`, `cookies_warning`, `created_at`, `site_url`, `theme_color`, `header_code`, `footer_code`) VALUES
(1, 'PHP Blog', 'PHP Blog Script', 'PHP blog script helping you to build your blog super fast within 5 minutes of installation and configuration. SEO optimized with backend admin panel', 'php blog script, best blogging platform, easy bloggin, wordpress alternative, opensource blogging script', 'https://whatsapp.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://pinterest.com', 'https://linkedin.com', '', '', '', '', '', 0, '2019-03-08 22:05:14', 'http://localhost/blog/blog/', '#4f00ff', '<!-- your html js or css can be here -->', '<!-- your html js or css can be here -->');

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `visits` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traffic`
--

INSERT INTO `traffic` (`id`, `code`, `country`, `visits`) VALUES
(1, 'AF', 'Afghanistan', '16'),
(2, 'AL', 'Albania', ''),
(3, 'DZ', 'Algeria', ''),
(4, 'DS', 'American Samoa', ''),
(5, 'AD', 'Andorra', ''),
(6, 'AO', 'Angola', ''),
(7, 'AI', 'Anguilla', ''),
(8, 'AQ', 'Antarctica', ''),
(9, 'AG', 'Antigua and Barbuda', ''),
(10, 'AR', 'Argentina', ''),
(11, 'AM', 'Armenia', ''),
(12, 'AW', 'Aruba', ''),
(13, 'AU', 'Australia', ''),
(14, 'AT', 'Austria', ''),
(15, 'AZ', 'Azerbaijan', ''),
(16, 'BS', 'Bahamas', ''),
(17, 'BH', 'Bahrain', ''),
(18, 'BD', 'Bangladesh', ''),
(19, 'BB', 'Barbados', ''),
(20, 'BY', 'Belarus', ''),
(21, 'BE', 'Belgium', ''),
(22, 'BZ', 'Belize', ''),
(23, 'BJ', 'Benin', ''),
(24, 'BM', 'Bermuda', ''),
(25, 'BT', 'Bhutan', ''),
(26, 'BO', 'Bolivia', ''),
(27, 'BA', 'Bosnia and Herzegovina', ''),
(28, 'BW', 'Botswana', ''),
(29, 'BV', 'Bouvet Island', ''),
(30, 'BR', 'Brazil', ''),
(31, 'IO', 'British Indian Ocean Territory', ''),
(32, 'BN', 'Brunei Darussalam', ''),
(33, 'BG', 'Bulgaria', ''),
(34, 'BF', 'Burkina Faso', ''),
(35, 'BI', 'Burundi', ''),
(36, 'KH', 'Cambodia', ''),
(37, 'CM', 'Cameroon', ''),
(38, 'CA', 'Canada', ''),
(39, 'CV', 'Cape Verde', ''),
(40, 'KY', 'Cayman Islands', ''),
(41, 'CF', 'Central African Republic', ''),
(42, 'TD', 'Chad', ''),
(43, 'CL', 'Chile', ''),
(44, 'CN', 'China', ''),
(45, 'CX', 'Christmas Island', ''),
(46, 'CC', 'Cocos (Keeling) Islands', ''),
(47, 'CO', 'Colombia', ''),
(48, 'KM', 'Comoros', ''),
(49, 'CD', 'Democratic Republic of the Congo', ''),
(50, 'CG', 'Republic of Congo', ''),
(51, 'CK', 'Cook Islands', ''),
(52, 'CR', 'Costa Rica', ''),
(53, 'HR', 'Croatia (Hrvatska)', ''),
(54, 'CU', 'Cuba', ''),
(55, 'CY', 'Cyprus', ''),
(56, 'CZ', 'Czech Republic', ''),
(57, 'DK', 'Denmark', ''),
(58, 'DJ', 'Djibouti', ''),
(59, 'DM', 'Dominica', ''),
(60, 'DO', 'Dominican Republic', ''),
(61, 'TP', 'East Timor', ''),
(62, 'EC', 'Ecuador', ''),
(63, 'EG', 'Egypt', ''),
(64, 'SV', 'El Salvador', ''),
(65, 'GQ', 'Equatorial Guinea', ''),
(66, 'ER', 'Eritrea', ''),
(67, 'EE', 'Estonia', ''),
(68, 'ET', 'Ethiopia', ''),
(69, 'FK', 'Falkland Islands (Malvinas)', ''),
(70, 'FO', 'Faroe Islands', ''),
(71, 'FJ', 'Fiji', ''),
(72, 'FI', 'Finland', ''),
(73, 'FR', 'France', ''),
(74, 'FX', 'France, Metropolitan', ''),
(75, 'GF', 'French Guiana', ''),
(76, 'PF', 'French Polynesia', ''),
(77, 'TF', 'French Southern Territories', ''),
(78, 'GA', 'Gabon', ''),
(79, 'GM', 'Gambia', ''),
(80, 'GE', 'Georgia', ''),
(81, 'DE', 'Germany', ''),
(82, 'GH', 'Ghana', ''),
(83, 'GI', 'Gibraltar', ''),
(84, 'GK', 'Guernsey', ''),
(85, 'GR', 'Greece', ''),
(86, 'GL', 'Greenland', ''),
(87, 'GD', 'Grenada', ''),
(88, 'GP', 'Guadeloupe', ''),
(89, 'GU', 'Guam', ''),
(90, 'GT', 'Guatemala', ''),
(91, 'GN', 'Guinea', ''),
(92, 'GW', 'Guinea-Bissau', ''),
(93, 'GY', 'Guyana', ''),
(94, 'HT', 'Haiti', ''),
(95, 'HM', 'Heard and Mc Donald Islands', ''),
(96, 'HN', 'Honduras', ''),
(97, 'HK', 'Hong Kong', ''),
(98, 'HU', 'Hungary', ''),
(99, 'IS', 'Iceland', ''),
(100, 'IN', 'India', ''),
(101, 'IM', 'Isle of Man', ''),
(102, 'ID', 'Indonesia', ''),
(103, 'IR', 'Iran (Islamic Republic of)', ''),
(104, 'IQ', 'Iraq', ''),
(105, 'IE', 'Ireland', ''),
(106, 'IL', 'Israel', ''),
(107, 'IT', 'Italy', ''),
(108, 'CI', 'Ivory Coast', ''),
(109, 'JE', 'Jersey', ''),
(110, 'JM', 'Jamaica', ''),
(111, 'JP', 'Japan', ''),
(112, 'JO', 'Jordan', ''),
(113, 'KZ', 'Kazakhstan', ''),
(114, 'KE', 'Kenya', ''),
(115, 'KI', 'Kiribati', ''),
(116, 'KP', 'Korea, Democratic People\'s Republic of', ''),
(117, 'KR', 'Korea, Republic of', ''),
(118, 'XK', 'Kosovo', ''),
(119, 'KW', 'Kuwait', ''),
(120, 'KG', 'Kyrgyzstan', ''),
(121, 'LA', 'Lao People\'s Democratic Republic', ''),
(122, 'LV', 'Latvia', ''),
(123, 'LB', 'Lebanon', ''),
(124, 'LS', 'Lesotho', ''),
(125, 'LR', 'Liberia', ''),
(126, 'LY', 'Libyan Arab Jamahiriya', ''),
(127, 'LI', 'Liechtenstein', ''),
(128, 'LT', 'Lithuania', ''),
(129, 'LU', 'Luxembourg', ''),
(130, 'MO', 'Macau', ''),
(131, 'MK', 'North Macedonia', ''),
(132, 'MG', 'Madagascar', ''),
(133, 'MW', 'Malawi', ''),
(134, 'MY', 'Malaysia', ''),
(135, 'MV', 'Maldives', ''),
(136, 'ML', 'Mali', ''),
(137, 'MT', 'Malta', ''),
(138, 'MH', 'Marshall Islands', ''),
(139, 'MQ', 'Martinique', ''),
(140, 'MR', 'Mauritania', ''),
(141, 'MU', 'Mauritius', ''),
(142, 'TY', 'Mayotte', ''),
(143, 'MX', 'Mexico', ''),
(144, 'FM', 'Micronesia, Federated States of', ''),
(145, 'MD', 'Moldova, Republic of', ''),
(146, 'MC', 'Monaco', ''),
(147, 'MN', 'Mongolia', ''),
(148, 'ME', 'Montenegro', ''),
(149, 'MS', 'Montserrat', ''),
(150, 'MA', 'Morocco', ''),
(151, 'MZ', 'Mozambique', ''),
(152, 'MM', 'Myanmar', ''),
(153, 'NA', 'Namibia', ''),
(154, 'NR', 'Nauru', ''),
(155, 'NP', 'Nepal', ''),
(156, 'NL', 'Netherlands', ''),
(157, 'AN', 'Netherlands Antilles', ''),
(158, 'NC', 'New Caledonia', ''),
(159, 'NZ', 'New Zealand', ''),
(160, 'NI', 'Nicaragua', ''),
(161, 'NE', 'Niger', ''),
(162, 'NG', 'Nigeria', ''),
(163, 'NU', 'Niue', ''),
(164, 'NF', 'Norfolk Island', ''),
(165, 'MP', 'Northern Mariana Islands', ''),
(166, 'NO', 'Norway', ''),
(167, 'OM', 'Oman', ''),
(168, 'PK', 'Pakistan', '138'),
(169, 'PW', 'Palau', ''),
(170, 'PS', 'Palestine', ''),
(171, 'PA', 'Panama', ''),
(172, 'PG', 'Papua New Guinea', ''),
(173, 'PY', 'Paraguay', ''),
(174, 'PE', 'Peru', ''),
(175, 'PH', 'Philippines', ''),
(176, 'PN', 'Pitcairn', ''),
(177, 'PL', 'Poland', ''),
(178, 'PT', 'Portugal', ''),
(179, 'PR', 'Puerto Rico', ''),
(180, 'QA', 'Qatar', ''),
(181, 'RE', 'Reunion', ''),
(182, 'RO', 'Romania', ''),
(183, 'RU', 'Russian Federation', ''),
(184, 'RW', 'Rwanda', ''),
(185, 'KN', 'Saint Kitts and Nevis', ''),
(186, 'LC', 'Saint Lucia', ''),
(187, 'VC', 'Saint Vincent and the Grenadines', ''),
(188, 'WS', 'Samoa', ''),
(189, 'SM', 'San Marino', ''),
(190, 'ST', 'Sao Tome and Principe', ''),
(191, 'SA', 'Saudi Arabia', ''),
(192, 'SN', 'Senegal', ''),
(193, 'RS', 'Serbia', ''),
(194, 'SC', 'Seychelles', ''),
(195, 'SL', 'Sierra Leone', ''),
(196, 'SG', 'Singapore', '2'),
(197, 'SK', 'Slovakia', ''),
(198, 'SI', 'Slovenia', ''),
(199, 'SB', 'Solomon Islands', ''),
(200, 'SO', 'Somalia', ''),
(201, 'ZA', 'South Africa', ''),
(202, 'GS', 'South Georgia South Sandwich Islands', ''),
(203, 'SS', 'South Sudan', ''),
(204, 'ES', 'Spain', ''),
(205, 'LK', 'Sri Lanka', ''),
(206, 'SH', 'St. Helena', ''),
(207, 'PM', 'St. Pierre and Miquelon', ''),
(208, 'SD', 'Sudan', ''),
(209, 'SR', 'Suriname', ''),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', ''),
(211, 'SZ', 'Swaziland', ''),
(212, 'SE', 'Sweden', ''),
(213, 'CH', 'Switzerland', ''),
(214, 'SY', 'Syrian Arab Republic', ''),
(215, 'TW', 'Taiwan', ''),
(216, 'TJ', 'Tajikistan', ''),
(217, 'TZ', 'Tanzania, United Republic of', ''),
(218, 'TH', 'Thailand', ''),
(219, 'TG', 'Togo', ''),
(220, 'TK', 'Tokelau', ''),
(221, 'TO', 'Tonga', ''),
(222, 'TT', 'Trinidad and Tobago', ''),
(223, 'TN', 'Tunisia', ''),
(224, 'TR', 'Turkey', ''),
(225, 'TM', 'Turkmenistan', ''),
(226, 'TC', 'Turks and Caicos Islands', ''),
(227, 'TV', 'Tuvalu', ''),
(228, 'UG', 'Uganda', ''),
(229, 'UA', 'Ukraine', ''),
(230, 'AE', 'United Arab Emirates', ''),
(231, 'GB', 'United Kingdom', ''),
(232, 'US', 'United States', ''),
(233, 'UM', 'United States minor outlying islands', ''),
(234, 'UY', 'Uruguay', ''),
(235, 'UZ', 'Uzbekistan', ''),
(236, 'VU', 'Vanuatu', ''),
(237, 'VA', 'Vatican City State', ''),
(238, 'VE', 'Venezuela', ''),
(239, 'VN', 'Vietnam', ''),
(240, 'VG', 'Virgin Islands (British)', ''),
(241, 'VI', 'Virgin Islands (U.S.)', ''),
(242, 'WF', 'Wallis and Futuna Islands', ''),
(243, 'EH', 'Western Sahara', ''),
(244, 'YE', 'Yemen', ''),
(245, 'ZM', 'Zambia', ''),
(246, 'ZW', 'Zimbabwe', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'name@domain.com',
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `about_me` varchar(5000) DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `show_email_on_profile` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `type` enum('admin','user') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `slug`, `email`, `password`, `token`, `avatar`, `status`, `about_me`, `last_seen`, `facebook_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `youtube_url`, `show_email_on_profile`, `created_at`, `type`) VALUES
(1, 'Blog Admin', 'admin', 'admin@blog.com', '61152c80d1514e22fba66002597d0104', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-21 00:24:26', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
