
DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `ShowAds` ()   BEGIN
    select ads.id,ads.content,ads.date,supervisors.name
    FROM ads
INNER JOIN supervisors
ON ads.supervisor_id = supervisors.id WHERE ads.supervisor_id = supervisors.id 
;
    
    
    
    
END$$

CREATE PROCEDURE `ShowChatsSS` (IN `student_id` INT, IN `supervisor_id` INT)   BEGIN
    select students.id AS student_id,students.name as student_name,students.email AS student_email,supervisors.id AS supervisor_id, supervisors.name AS supervisor_name ,supervisors.email , supervisors.course , chats.message,chats.to,chats.messagesent 
    
    FROM chats
INNER JOIN students
INNER JOIN supervisors
ON students.id = chats.student_id AND supervisors.id = chats.supervisor_id WHERE chats.student_id = student_id AND chats.supervisor_id = supervisor_id ;
    
    
    
    
END$$

CREATE PROCEDURE `ShowChatStudent` (IN `supervisor_id` INT)   BEGIN
    select students.id AS student_id,students.name as student_name,students.email AS student_email,supervisors.id AS supervisor_id, supervisors.name AS supervisor_name ,supervisors.email , supervisors.course , chats.message,chats.to,chats.messagesent 
    
    FROM chats
INNER JOIN students
INNER JOIN supervisors
ON students.id = chats.student_id AND supervisors.id = chats.supervisor_id WHERE chats.supervisor_id = supervisor_id 
;
    
    
    
    
END$$

CREATE  PROCEDURE `ShowChatSupervisor` (IN `student_id` INT)   BEGIN
    select students.id AS student_id,students.name as student_name,students.email AS student_email,supervisors.id AS supervisor_id, supervisors.name AS supervisor_name ,supervisors.email , supervisors.course , chats.message,chats.to,chats.messagesent 
    
    FROM chats
INNER JOIN students
INNER JOIN supervisors
ON students.id = chats.student_id AND supervisors.id = chats.supervisor_id WHERE chats.student_id = student_id 
;
    
    
    
    
END$$

CREATE PROCEDURE `Showorders` ()   BEGIN
    select students.id AS student_id,students.name as student_name,students.email AS student_email,orders.course_name,orders.id AS order_id ,orders.course_id,orders.course_hours,orders.order_type,orders.order_status
    
    FROM orders
INNER JOIN students

ON students.id = orders.student_id ;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '49308bda8b5e0ab9688ec4bedf6d572c');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `content`, `date`, `supervisor_id`) VALUES
(3, 'mo', '2022-10-12 09:17:40', 7);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `to` int(11) NOT NULL,
  `messagesent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `img`) VALUES
(3, 'jhbjbjh3432', 't2.png'),
(5, 'jknjknk', 'table.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `course_id` varchar(300) NOT NULL,
  `course_hours` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `order_type` varchar(255) NOT NULL DEFAULT 'اضافة',
  `order_status` varchar(255) NOT NULL DEFAULT 'قيد الانتظار'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `course_name`, `course_id`, `course_hours`, `student_id`, `order_type`, `order_status`) VALUES
(6, 'jinjkn', '788', 7, 8, 'اضافة', 'مقبول'),
(8, 'الرياضة', 'تى', 2, 8, 'اضافة', 'مقبول'),
(20, 'jinjkn', '788', 7, 8, 'حذف', 'مقبول'),
(23, 'mo', '21', 1, 8, 'حذف', 'قيد الانتظار'),
(24, 'kok', '32', 2, 8, 'حذف', 'رفض');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`) VALUES
(3, 'jknjkn', 'imsda'),
(4, 'jknjknjknjk', 'adskjadskn'),
(5, 'njknknk', 'asdjknknk');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `university_id` int(11) NOT NULL,
  `phone` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `department`, `university_id`, `phone`) VALUES
(1, 'mo', 'mo@mo.com', 'sdamjksadkmsda', '2332', 1242, ''),
(2, 'doo', 'mo@mo.ww', '1c1a727e5bba0334d4e9097af09f54dc', '2332', 1242, ''),
(3, 'asdnsdjk', '', '64e1b8d34f425d19e1ee2ea7236d3028', '0', 378782, 'kjnjknsdjknjk'),
(4, 'dsajkjnjknkj', '', '64e1b8d34f425d19e1ee2ea7236d3028', '0', 3232, '2323'),
(5, 'dsajkjnjknkj', '', '64e1b8d34f425d19e1ee2ea7236d3028', '0', 3232, '2323'),
(6, 'dasklmdlml', '', '64e1b8d34f425d19e1ee2ea7236d3028', '0', 212, '211212'),
(7, 'mohammed', '', '64e1b8d34f425d19e1ee2ea7236d3028', 'asdjknjkdsnknk', 1111, '2323'),
(8, 'ajskndknk', 'admin@admin.com', '64e1b8d34f425d19e1ee2ea7236d3028', '32', 788, '787'),
(9, 'mo', 'admin@admin.com', '64e1b8d34f425d19e1ee2ea7236d3028', 'kjd', 778, '483748'),
(10, 'jinsajkn', 'jknjknjkn@jhdfnsj.ds', '0068e51076249138989fdd729fc23237', 'nkjnkjjk', 32723, '32237'),
(11, 'jinsajkn', 'jknjknjkn@jhdfnsj.ds', '1c1a727e5bba0334d4e9097af09f54dc', '32', 23, '32237'),
(12, 'mo', 'mo@mo.com', '1c1a727e5bba0334d4e9097af09f54dc', 'mo', 123, '123'),
(13, 'moc', 'mo@m.c', '27c9d5187cd283f8d160ec1ed2b5ac89', 'mo2', 0, '2382'),
(14, 'mo', 'po@po.com', 'aa9ecd3624229ea1f100ca4409919b18', 'mo', 0, '223'),
(15, 'ejknsdjk', '123723823723@s.mu.edu.sa', 'ad94e630eab4581d2d5ae417a0d98289', 'kj', 0, '2333'),
(16, 'dkmsmk', 'sdinikjsdnjknsdjknk@sdncjknckj.com', '31a2eda6d58f9fe0f4289a4379afdda7', 'njknk3', 0, '333'),
(17, 'mo', 'qomoed@fkdnsjm.sdf', '27adce629fe8c8012687d29e8f43e7ab', '676g', 0, '3'),
(18, 'injuk', 'Array', '46b9fade1f6febb6d786e610bf8b9adc', 'nuijknjk', 0, '32'),
(19, 'mo', 'Array', '6992d54e6b5af7d371bbe51aa070dc27', 'jhsdfnsdkjnjsdn', 0, '73278378');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `course` varchar(300) NOT NULL,
  `superadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `name`, `email`, `password`, `course`, `superadmin`) VALUES
(7, 'mo', 'mo@mo.mo', '64e1b8d34f425d19e1ee2ea7236d3028', 'mo', 1),
(11, 'pop', 'pop@pop.com', '771f85252a846145bd2e349591394b3b', 'ods', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
