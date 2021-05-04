-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 05:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `catId` int(12) NOT NULL,
  `catName` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`catId`, `catName`, `image`) VALUES
(1, 'food', ''),
(2, 'books', ''),
(3, 'Movies', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(12) NOT NULL,
  `subCatId` int(12) NOT NULL,
  `productName` text NOT NULL,
  `productDesc` text NOT NULL,
  `image` text NOT NULL,
  `sentimentAnalysis` double NOT NULL,
  `website` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `subCatId`, `productName`, `productDesc`, `image`, `sentimentAnalysis`, `website`) VALUES
(1, 1, 'peas', 'The pea is most commonly the small spherical seed or the seed-pod of the pod fruit Pisum sativum. Each pod contains several peas, which can be green or yellow. Pea pods are botanically fruit, since they contain seeds and develop from the ovary of a (pea) flower. The name is also used to describe other edible seeds from the Fabaceae such as the pigeon pea (Cajanus cajan), the cowpea (Vigna unguiculata), and the seeds from several species of Lathyrus.', '', 0, ''),
(2, 1, 'cucumber', 'Cucumber (Cucumis sativus) is a widely cultivated plant in the gourd family, Cucurbitaceae. It is a creeping vine that bears cucumiform fruits that are used as vegetables. There are three main varieties of cucumber: slicing, pickling, and seedless. Within these varieties, several cultivars have been created. In North America, the term \"wild cucumber\" refers to plants in the genera Echinocystis and Marah, but these are not closely related. The cucumber is originally from South Asia, but now grows on most continents. Many different types of cucumber are traded on the global market.', '', 0, ''),
(3, 2, 'oranges', 'The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae, native to China. It is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange. The sweet orange reproduces asexually (apomixis through nucellar embryony); varieties of sweet orange arise through mutations.', '', 0, ''),
(4, 2, 'lemons', 'The lemon, Citrus limon (L.) Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern India.', '', 0, ''),
(5, 3, 'wheat', 'Wheat is a grass widely cultivated for its seed, a cereal grain which is a worldwide staple food. The many species of wheat together make up the genus Triticum; the most widely grown is common wheat', '', 0, ''),
(6, 3, 'corn', 'Maize, also known as corn in American English, is a cereal grain first domesticated by indigenous peoples in southern Mexico about 10,000 years ago. The leafy stalk of the plant produces pollen inflorescences and separate ovuliferous inflorescences called ears that yield kernels or seeds, which are fruits.', '', 0, ''),
(7, 4, 'The Autobiography of Benjamin Franklin by Benjamin Franklin', 'The Autobiography of Benjamin Franklin is the traditional name for the unfinished record of his own life written by Benjamin Franklin from 1771 to 1790; however, Franklin himself appears to have called the work his Memoirs. Although it had a tortuous publication history after Franklin\'s death, this work has become one of the most famous and influential examples of an autobiography ever written.', '', 78, ''),
(8, 4, 'The Story of My Experiments with Truth by Mahatma Gandhi', 'The Story of My Experiments with Truth is the autobiography of Mohandas K. Gandhi, covering his life from early childhood through to 1921. It was written in weekly installments and published in his journal Navjivan from 1925 to 1929. Its English translation also appeared in installments in his other journal Young India. It was initiated at the insistence of Swami Anand and other close co-workers of Gandhi, who encouraged him to explain the background of his public campaigns. In 1999, the book was designated as one of the \"100 Best Spiritual Books of the 20th Century\" by a committee of global spiritual and religious authorities.', '', 56, ''),
(9, 5, 'The Last Mughal by William Dalrymple', 'The book, Dalrymple\'s sixth, and his second to reflect his long love affair with the city of Delhi, won praise for its use of \"The Mutiny Papers\", which included previously ignored Indian accounts of the events of 1857. He worked on these documents in association with the Urdu scholar Mahmood Farooqui.', '', 80, ''),
(10, 5, 'The Wonder That Was India by Arthur Llewellyn Basham', 'The Wonder That Was India: A Survey of the Culture of the Indian Sub-Continent Before the Coming of the Muslims, is a book on Indian history written by Arthur Llewellyn Basham and first published in 1954.', '', 67, ''),
(11, 6, '2 States: The Story Of My Marriage by Chetan Bhagat', '2 States: The Story of My Marriage commonly known as 2 States is a 2009 novel written by Chetan Bhagat. It is the story about a couple coming from two different states in India, who face hardships in convincing their parents to approve of their marriage.', 'https://www.google.com/search?q=2+States:+The+Story+Of+My+Marriage+By+Chetan+Bhagat&safe=active&rlz=1C1SQJL_enIN795IN795&sxsrf=ACYBGNQ1jnUBzCRXHBQKMnzuKCRyAEZgvg:1571115605967&tbm=isch&source=iu&ictx=1&fir=vs7uY2Zmgpq1UM%253A%252CVKUwqSypkPLZVM%252C_&vet=1&usg=AI4_-kTcdlMwEJIM46Ee2Q-KFcdwo20vdw&sa=X&ved=2ahUKEwjW0uDcvZ3lAhUW8XMBHc7cB4sQ9QEwAHoECAMQAw#imgrc=vs7uY2Zmgpq1UM:', 79, ''),
(12, 6, 'Law of Averages: A Hilarious Love Story - Filmi Ishtyle by Kshitish Padhy', 'Ritwik is your average boy next door, struggling to make it as a scriptwriter in the Comics industry and his love story will take you through a rollercoaster ride, full of thrill and adventure, mishaps and most unexpected twists and turns.', '', 81, ''),
(13, 7, 'The Bhagavad Gita by Krishna-Dwaipayana Vyasa', 'The Bhagavad Gita is an intensely spiritual work that forms the cornerstone of the Hindu faith, and is also one of the masterpieces of Sanskrit poetry. It describes how, at the beginning of a mighty battle between the Pandava and Kaurava armies, the god Krishna gives spiritual enlightenment to the warrior Arjuna, who realizes that the true battle is for his own soul.', '', 64, ''),
(14, 7, 'The Principal Upanishads by Sarvepalli Radhakrishnan', 'The Principal Upanishads is a 1953 book written by Sarvepalli Radhakrishnan, then Vice President of India, about the main Upanishads, which carry central teachings of the Vedanta. Originally published in 1953 by Harper, the book has been republished several times.', 'https://www.google.com/search?q=The+Principal+Upanishads+by+Sarvepalli+Radhakrishnan&safe=active&rlz=1C1SQJL_enIN795IN795&sxsrf=ACYBGNQ2nJ6rT1vo2HmCni2zhybPaGI3aA:1571109712456&tbm=isch&source=iu&ictx=1&fir=9ROPNkJEJs8frM%253A%252CArMd1m2tsGfDrM%252C%252Fm%252F067xrhw&vet=1&usg=AI4_-kRi9Gtyf0rfGJJz-XOxfRyTUhjojQ&sa=X&ved=2ahUKEwjSpsHip53lAhXDIbcAHeG_BTMQ_B0wEXoECAsQAw#imgrc=9ROPNkJEJs8frM:', 45, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `subCatId` int(12) NOT NULL,
  `catId` int(12) NOT NULL,
  `subCatName` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`subCatId`, `catId`, `subCatName`, `image`) VALUES
(1, 1, 'Vegetables', ''),
(2, 1, 'Fruits', ''),
(3, 1, 'Grains, Beans and Nuts', ''),
(4, 2, 'autobiography', ''),
(5, 2, 'history', ''),
(6, 2, 'love story', ''),
(7, 2, 'philosophy', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `password`, `fname`, `lname`) VALUES
(1, 'meetdoshi193@gmail.com', 'qwertyuiop', 'Meet', 'Doshi');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `reviewId` int(12) NOT NULL,
  `productId` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`subCatId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `catId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `subCatId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `reviewId` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
