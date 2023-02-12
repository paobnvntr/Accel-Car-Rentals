-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2023 at 08:35 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u858871135_accel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_type` varchar(100) NOT NULL,
  `car_seat_capacity` varchar(50) NOT NULL,
  `car_transmission` varchar(50) NOT NULL,
  `rent_price` double NOT NULL,
  `location` varchar(100) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `car_img` varchar(100) NOT NULL,
  `car_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_type`, `car_seat_capacity`, `car_transmission`, `rent_price`, `location`, `client_username`, `car_img`, `car_availability`) VALUES
(9, 'Audi A4', 'Sedan', '5', 'Automatic', 2000, 'Luzon', 'admin', 'assets/img/cars/Audi_A4.jpg', 'yes'),
(10, 'BMW 6', 'Sedan', '5', 'Automatic', 2500, 'Visayas', 'admin', 'assets/img/cars/BMW_6.jpg', 'yes'),
(11, 'Hyundai Creta', 'SUV', '5', 'Automatic', 2000, 'Luzon', 'admin', 'assets/img/cars/Hyundai_Creta.jpg', 'yes'),
(12, 'Toyota Fortuner', 'SUV', '7', 'Manual', 2850, 'Mindanao', 'admin', 'assets/img/cars/Toyota_Fortuner.jpg', 'yes'),
(14, 'Jaguar XF', 'Sports', '5', 'Manual', 5000, 'Luzon', 'admin', 'assets/img/cars/Jaguar_XF.jpg', 'yes'),
(15, 'Ford Mustang', 'Coupe', '4', 'Automatic', 5500, 'Visayas', 'admin', 'assets/img/cars/Ford_Mustang.jpg', 'yes'),
(16, 'Ford Transit Custom', 'Van', '6', 'Automatic', 4500, 'Mindanao', 'admin', 'assets/img/cars/Ford_Transit_Custom.jpg', 'yes'),
(17, 'Ford F-150', 'Pickup', '6', 'Automatic', 4850, 'Visayas', 'admin', 'assets/img/cars/Ford_F-150.jpg', 'yes'),
(18, 'Toyota Vios', 'Sedan', '5', 'Automatic', 2000, 'Mindanao', 'admin', 'assets/img/cars/Toyota_Vios.jpg', 'yes'),
(19, 'Honda Civic', 'Sedan', '5', 'Automatic', 2250, 'Luzon', 'admin', 'assets/img/cars/Honda_Civic.jpg', 'yes'),
(20, 'Mitsubishi Mirage G4', 'Sedan', '5', 'Manual', 1850, 'Visayas', 'admin', 'assets/img/cars/Mitsubishi_Mirage_G4.jpg', 'yes'),
(21, 'Isuzu MU-X', 'SUV', '7', 'Automatic', 2100, 'Visayas', 'admin', 'assets/img/cars/Isuzu_MU-X.jpg', 'yes'),
(22, 'Nissan Terra', 'SUV', '7', 'Automatic', 2250, 'Visayas', 'admin', 'assets/img/cars/Nissan_Terra.jpg', 'yes'),
(23, 'Mitsubishi Montero', 'SUV', '7', 'Automatic', 2500, 'Mindanao', 'admin', 'assets/img/cars/Mitsubishi_Montero.jpg', 'yes'),
(24, 'Dodge Challenger', 'Coupe', '4', 'Manual', 5500, 'Luzon', 'admin', 'assets/img/cars/Dodge_Challenger.jpg', 'yes'),
(25, 'Hyundai Genesis', 'Coupe', '4', 'Manual', 5850, 'Mindanao', 'admin', 'assets/img/cars/Hyundai_Genesis.jpg', 'yes'),
(26, 'Lexus LC', 'Coupe', '4', 'Automatic', 6000, 'Luzon', 'admin', 'assets/img/cars/Lexus_LC.jpg', 'yes'),
(27, 'Nissan GTR', 'Coupe', '4', 'Manual', 6500, 'Visayas', 'admin', 'assets/img/cars/Nissan_GTR.jpg', 'yes'),
(29, 'Toyota Tundra', 'Pickup', '5', 'Automatic', 4500, 'Luzon', 'admin', 'assets/img/cars/Toyota_Tundra.jpg', 'yes'),
(30, 'Chevrolet Silverado 1500', 'Pickup', '6', 'Automatic', 5150, 'Mindanao', 'admin', 'assets/img/cars/Chevrolet_Silverado.jpg', 'yes'),
(31, 'Ram 1500', 'Pickup', '6', 'Automatic', 5000, 'Mindanao', 'admin', 'assets/img/cars/Ram_1500.jpg', 'yes'),
(32, 'Ford F-250 Super Duty', 'Pickup', '6', 'Manual', 4900, 'Visayas', 'admin', 'assets/img/cars/Ford_F250.jpg', 'yes'),
(33, 'Honda Brio', 'Hatchback', '5', 'Manual', 2500, 'Luzon', 'admin', 'assets/img/cars/Honda_Brio.jpg', 'yes'),
(34, 'Suzuki Swift', 'Hatchback', '5', 'Manual', 2000, 'Visayas', 'admin', 'assets/img/cars/Suzuki_Swift.jpg', 'yes'),
(35, 'Toyota Wigo', 'Hatchback', '5', 'Manual', 2250, 'Mindanao', 'admin', 'assets/img/cars/Toyota_Wigo.jpg', 'yes'),
(36, 'Suzuki Celerio', 'Hatchback', '5', 'Automatic', 1950, 'Mindanao', 'admin', 'assets/img/cars/Suzuki_Celerio.jpg', 'yes'),
(37, 'Ford Tourneo Custom', 'Van', '9', 'Automatic', 6000, 'Luzon', 'admin', 'assets/img/cars/Ford_Tourneo_Custom.jpg', 'yes'),
(38, 'Toyota Hiace Grandia', 'Van', '9', 'Manual', 6250, 'Visayas', 'admin', 'assets/img/cars/Toyota_Hiace_Grandia.jpg', 'yes'),
(39, 'Volkswagen Transporter', 'Van', '9', 'Automatic', 5950, 'Mindanao', 'admin', 'assets/img/cars/Volkswagen_Transporter.jpg', 'yes'),
(40, 'Mercedes-Benz Sprinter', 'Van', '9', 'Automatic', 5800, 'Luzon', 'admin', 'assets/img/cars/Mercedes-Benz_Sprinter.jpg', 'yes'),
(41, 'Toyota Sienna', 'MiniVan', '7', 'Automatic', 4500, 'Luzon', 'admin', 'assets/img/cars/Toyota_Sienna.jpg', 'yes'),
(42, 'Honda Odyssey', 'MiniVan', '8', 'Automatic', 4350, 'Visayas', 'admin', 'assets/img/cars/Honda_Odyssey.jpg', 'yes'),
(43, 'Kia Carnival', 'MiniVan', '8', 'Manual', 4400, 'Mindanao', 'admin', 'assets/img/cars/Kia_Carnival.jpg', 'yes'),
(44, 'Chrysler Pacifica', 'MiniVan', '7', 'Automatic', 4650, 'Luzon', 'admin', 'assets/img/cars/Chrysler Pacifica.jpg', 'yes'),
(45, 'Hyundai Starex', 'MiniVan', '9', 'Manual', 4750, 'Visayas', 'admin', 'assets/img/cars/Hyundai_Starex.jpg', 'yes'),
(46, 'Chevrolet Camaro', 'Sports', '4', 'Automatic', 6500, 'Visayas', 'admin', 'assets/img/cars/Chevrolet_Camaro.jpg', 'yes'),
(47, 'Porsche 911', 'Sports', '2', 'Automatic', 6600, 'Mindanao', 'admin', 'assets/img/cars/Porsche_911.jpg', 'no'),
(48, 'Toyota GR Supra', 'Sports', '4', 'Manual', 6750, 'Luzon', 'admin', 'assets/img/cars/Toyota_GR_Supra.jpg', 'no'),
(49, 'Audi S6 Avant', 'Wagons', '4', 'Automatic', 3450, 'Luzon', 'admin', 'assets/img/cars/Audi S6 Avant.jpg', 'yes'),
(50, 'Audi RS 4 Avant', 'Wagons', '5', 'Automatic', 4850, 'Mindanao', 'admin', 'assets/img/cars/Audi RS 4 Avant.jpg', 'yes'),
(51, 'Volvo v90 Cross Country', 'Wagons', '5', 'Automatic', 3450, 'Mindanao', 'admin', 'assets/img/cars/Volvo v90 Cross Country.jpg', 'yes'),
(52, 'Audi A6 Allroad', 'Wagons', '5', 'Automatic', 3850, 'Luzon', 'admin', 'assets/img/cars/Audi A6 Allroad.jpg', 'no'),
(53, 'Subaru Outback', 'Wagons', '5', 'Manual', 3600, 'Visayas', 'admin', 'assets/img/cars/Subaru Outback.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_username`, `client_name`, `client_email`, `client_password`) VALUES
(1, 'admin', 'admin', 'admin@test.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
(5, 'MarkAnthony', 'Mark Anthony Valenzuela', '09156789123', 'markvalenzuela@gmail.com', '1234 Ayala Street, Makati City', '6fc7a06346de54f8e48546aff5f32b6a'),
(6, 'LourdesMarie', 'Lourdes Marie Gutierrez', '09098765432', 'lourdesmarie@gmail.com', '876 J. P. Rizal Street, Cebu City', 'd6c2e1dd609c97a111c949b66a8d8c2b'),
(7, 'EstrellaCruz', 'Estrella dela Cruz', '09321234567', 'estrellacruz@gmail.com', '345 Rizal Street, Zamboanga City', 'e2736ccdde4af6a39bdacd6b12cf9245'),
(8, 'jade00', 'Jade Anne Calda', '09123456789', 'jade00@gmail.com', 'San Pedro, Laguna', 'bf17e568257ec4f32a1128167e882312'),
(9, 'ndantonio', 'Noel Antonio', '09156789123', 'ndantonio@pup.edu.ph', 'Blk 1 Lot 8 Olivarez Homes Brgy. Fatima', '6a9b3f6559a13fd6bb8a0aaa125cab05'),
(10, 'tecson123', 'Genesis Tecson', '09231134116', 'kylebasquena@gmail.com', 'Langgam SPC', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Sarj', 'Sarra Jane Lirio', '09998529791', 'SARJXVI@GMAIL.COM', 'B3 L9 ALMEIDA HOMES BRGY NARRA SPL', '42d388f8b1db997faaf7dab487f11290'),
(12, 'Emi', 'Emi Neimy Valajhz', '6969696969', 'Emi@y8.com', 'South Fairway', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'joshuagg', 'joshuacreds', '09469113225', 'joshuagg@gmail.com', '022oh3 ', '0aafe53f6868c00a22de20788b9a5277'),
(14, 'joshua123', 'joshua creds', '0949 981 9596', 'Joshuagg123@gmail.com', '48 Arandia St.', '0aafe53f6868c00a22de20788b9a5277'),
(15, 'pathehe', 'pat', '09152252661', 'patpat@gmail.com', 'Blk 1 Lot 8 Olivarez Homes Brgy. Fatima', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'eren', 'eren', '09056391411', 'eirenesarmiento5@gmail.com', 'sjv9', 'a209541310cac0ba0f9d419d51061198'),
(17, 'abellarryan8', 'ryan', '123456789', 'abellarryan8@gmail.com', 'asdsa', '10c7ccc7a4f0aff03c915c485565b9da'),
(18, 'crycry', 'cryphier', '09356442537', 'cryphiergamer@gmail.com', 'San Pedro, Laguna', '59e5d04a8ed45e0d509c3f2ada58b5f1'),
(19, 'emz123', 'Emmanuel De Vera', '09067209879', 'emmanueldevera@shabu.com', '123 Southstar Village Alabang, Muntinlupa City', '827ccb0eea8a706c4c34a16891f84e7b'),
(20, 'cmbm', 'Chelz M', '09123456789', 'cmbm@gmail.com', '123 ', '7815696ecbf1c96e6894b779456d330e'),
(21, 'lexza25', 'Alexzandra Jinn C. Alaiza', '09179086294', 'alexza.jinn@gmail.com', 'Blk. 1 Lot 10 Southfairway Homes Brgy. Landayan San Pedro, Laguna', 'ac02115382ead64345ac68836398fdeb'),
(22, 'Carlo', 'Carlo Terrado', 'gggxxssssssss', 'test@gmail.com', 'GMA Cavite', '098f6bcd4621d373cade4e832627b4f6'),
(23, 'Rawr', 'John Kenneth ', '0963826282846', 'rawr@email.com', '#84 san pedro Laguna ', '6f10ae4af2b1216275234f1b4f4040ef'),
(24, 'Sicat', 'Queen', '09333246335', 'qsicat@gmail.com', 'Quezon St.', '5f60296e7cd7ac63a72a3b0f611ea06f'),
(25, 'Fed', 'Fiderico Dela Torre ', '09958910257', 'musicacademy6@gmail.com', 'San Pedro Laguna ', '202cb962ac59075b964b07152d234b70'),
(26, 'Jenny', 'ijen', '09093491901', 'ortegaijen@yahoo.com', 'asd', '33f5a7e8f4f310f9774894d807728e3c'),
(27, 'test', 'test', '123456', 'test@gmail.com', 'test', 'cc03e747a6afbbcbf8be7668acfebee5'),
(28, 'BEN', 'BEN', 'N/A', 'jmarkraven13@gmail.com', 'N/A', '64fd58fc23a78108913dddc74c66175c'),
(29, 'Izza', 'Izza', '12345678999', 'Izza@gmail.com', '908 Marikina', '4b569f5568af7aea0bd5b56c8267d22c');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `driver_address` varchar(100) NOT NULL,
  `driver_gender` varchar(15) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `driver_availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender`, `client_username`, `driver_availability`) VALUES
(10, 'Maria Theresa Cruz', 'MNO 345', '09321234567', '789 Gorordo Avenue, Cebu City', 'Female', 'admin', 'no'),
(11, 'Rene David Lim', 'GHI 890', '09156789123', '654 Quirino Avenue, Quezon City', 'Male', 'admin', 'yes'),
(12, 'Mario Alberto Perez', 'XYZ 234', '09161234567', '987 Magsaysay Avenue, Davao City', 'Male', 'admin', 'yes'),
(13, 'Juan Carlos Santos', 'PQR 678', '0926987643', '345 A. S. Fortuna Street, Mandaue City', 'Male', 'admin', 'yes'),
(14, 'Carmen Editha Martinez', 'FFI 789', '09098765432', '901 Gen. Luna Street, Baguio City', 'Female', 'admin', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rentedcars`
--

CREATE TABLE `rentedcars` (
  `rent_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `car_return_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(20) NOT NULL,
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentedcars`
--

INSERT INTO `rentedcars` (`rent_id`, `customer_username`, `car_id`, `driver_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `car_return_date`, `fare`, `no_of_days`, `total_amount`, `return_status`, `feedback`) VALUES
(45, 'MarkAnthony', 11, NULL, '2023-02-10', '2023-02-11', '2023-02-12', '2023-02-10', 2000, 1, 2000, 'Returned', 'I recently used the Accel car rental service and I have to say I was extremely impressed with the level of professionalism and customer service provided. The process of reserving and picking up the car was seamless and the staff was incredibly helpful and knowledgeable.'),
(46, 'LourdesMarie', 10, 13, '2023-02-10', '2023-02-13', '2023-02-17', '2023-02-10', 2500, 4, 10000, 'Returned', 'I was blown away by the level of service I received. The staff was incredibly friendly and helpful, and the car was in excellent condition. I was pleasantly surprised at the value I received for my money, and would definitely recommend this service to anyone looking for a reliable and affordable car rental option. I will definitely be using this service again in the future.'),
(47, 'EstrellaCruz', 30, NULL, '2023-02-10', '2023-02-12', '2023-02-18', '2023-02-10', 5150, 6, 30900, 'Returned', 'I was delighted with my experience. The car itself was clean, well-maintained, and exceeded my expectations. I will definitely be using this service again in the future.'),
(52, 'ndantonio', 31, 10, '2023-02-11', '2023-02-11', '2023-02-12', '2023-02-11', 5000, 1, 5000, 'Returned', 'very very good! nice experience.'),
(53, 'tecson123', 46, NULL, '2023-02-11', '2023-02-14', '2023-02-15', '2023-02-11', 6500, 1, 6500, 'Returned', 'Gucci '),
(54, 'Sarj', 29, NULL, '2023-02-11', '2023-02-12', '2023-02-13', '2023-02-11', 4500, 1, 4500, 'Returned', NULL),
(58, 'Emi', 45, NULL, '2023-02-11', '2023-02-11', '2023-02-12', '2023-02-11', 4750, 1, 4750, 'Returned', 'Sarap nung nag tuturo saken, kaso sinabihan ako ng ****'),
(59, 'pathehe', 48, NULL, '2023-02-11', '2023-02-12', '2023-02-28', '2023-02-11', 6750, 16, 108000, 'Returned', 'wow, nice'),
(60, 'crycry', 46, 14, '2023-02-11', '2023-02-11', '2023-02-13', '2023-02-11', 6500, 2, 13000, 'Returned', 'Nice nice :)'),
(61, 'cmbm', 48, NULL, '2023-02-11', '2023-02-14', '2023-02-15', '2023-02-11', 6750, 1, 6750, 'Returned', NULL),
(62, 'lexza25', 14, NULL, '2023-02-11', '2023-11-25', '2024-01-23', '2023-02-11', 5000, 59, 295000, 'Returned', 'maganda syang gamitin '),
(63, 'Rawr', 19, 13, '2023-02-11', '2023-02-28', '2023-03-01', '2023-02-11', 2250, 1, 2250, 'Returned', NULL),
(64, 'Izza', 22, 12, '2023-02-11', '2023-02-11', '2023-02-15', '2023-02-11', 2250, 4, 9000, 'Returned', 'Excellent service! ');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `reservation_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `booking_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `reservation_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_username`, `car_id`, `driver_id`, `reservation_date`, `rent_start_date`, `rent_end_date`, `booking_date`, `fare`, `no_of_days`, `total_amount`, `reservation_status`) VALUES
(59, 'MarkAnthony', 11, NULL, '2023-02-10', '2023-02-11', '2023-02-12', '2023-02-10', 2000, 1, 2000, 'Paid'),
(60, 'LourdesMarie', 10, 13, '2023-02-10', '2023-02-13', '2023-02-17', '2023-02-10', 2500, 4, 10000, 'Paid'),
(61, 'EstrellaCruz', 30, NULL, '2023-02-10', '2023-02-12', '2023-02-18', '2023-02-10', 5150, 6, 30900, 'Paid'),
(62, 'MarkAnthony', 48, NULL, '2023-02-10', '2023-02-11', '2023-02-12', '2023-02-10', 6750, 1, 6750, 'Paid'),
(65, 'EstrellaCruz', 27, 12, '2023-02-10', '2023-02-25', '2023-02-26', '2023-02-10', 6500, 1, 6500, 'Paid'),
(66, 'ndantonio', 31, 10, '2023-02-11', '2023-02-11', '2023-02-12', '2023-02-11', 5000, 1, 5000, 'Paid'),
(67, 'tecson123', 46, NULL, '2023-02-11', '2023-02-14', '2023-02-15', '2023-02-11', 6500, 1, 6500, 'Paid'),
(68, 'Sarj', 29, NULL, '2023-02-11', '2023-02-12', '2023-02-13', '2023-02-11', 4500, 1, 4500, 'Paid'),
(69, 'Emi', 45, NULL, '2023-02-11', '2023-02-11', '2023-02-12', '2023-02-11', 4750, 1, 4750, 'Paid'),
(70, 'pathehe', 48, NULL, '2023-02-11', '2023-02-12', '2023-02-28', '2023-02-11', 6750, 16, 108000, 'Paid'),
(71, 'eren', 46, NULL, '2023-02-11', '2023-02-22', '2023-02-28', NULL, 6500, 6, 39000, 'Cancelled'),
(72, 'abellarryan8', 47, 10, '2023-02-11', '2023-02-12', '2023-02-20', NULL, 6600, 8, 52800, 'Pending'),
(73, 'crycry', 46, 14, '2023-02-11', '2023-02-11', '2023-02-13', '2023-02-11', 6500, 2, 13000, 'Paid'),
(74, 'emz123', 48, 11, '2023-02-11', '2023-02-13', '2023-02-28', NULL, 6750, 15, 101250, 'Cancelled'),
(75, 'cmbm', 48, NULL, '2023-02-11', '2023-02-14', '2023-02-15', '2023-02-11', 6750, 1, 6750, 'Paid'),
(76, 'lexza25', 14, NULL, '2023-02-11', '2023-11-25', '2024-01-23', '2023-02-11', 5000, 59, 295000, 'Paid'),
(77, 'Carlo', 53, NULL, '2023-02-11', '2023-02-21', '2023-02-28', NULL, 3600, 7, 25200, 'Pending'),
(78, 'Rawr', 19, 13, '2023-02-11', '2023-02-28', '2023-03-01', '2023-02-11', 2250, 1, 2250, 'Paid'),
(79, 'Fed', 48, NULL, '2023-02-11', '2023-02-11', '2023-02-25', NULL, 6750, 14, 94500, 'Pending'),
(80, 'Jenny', 52, NULL, '2023-02-11', '2023-02-11', '2023-02-12', NULL, 3850, 1, 3850, 'Pending'),
(81, 'Izza', 22, 12, '2023-02-11', '2023-02-11', '2023-02-15', '2023-02-11', 2250, 4, 9000, 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_username` (`customer_username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `dl_number` (`dl_number`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `rentedcars`
--
ALTER TABLE `rentedcars`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rentedcars`
--
ALTER TABLE `rentedcars`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
