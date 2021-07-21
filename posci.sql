-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 01:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posci`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` char(5) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `hrgjual` int(11) NOT NULL,
  `hrgbeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `id_kategori`, `id_satuan`, `hrgjual`, `hrgbeli`) VALUES
('54565', 'Baju', 1, 3, 4000, 7000),
('67890', 'Daia', 1, 1, 5000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `katid` int(11) NOT NULL,
  `katnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`katid`, `katnama`) VALUES
(1, 'Busana');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `konkode` char(5) NOT NULL,
  `konnama` varchar(100) DEFAULT NULL,
  `konalamat` varchar(200) DEFAULT NULL,
  `konnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`konkode`, `konnama`, `konalamat`, `konnotelp`) VALUES
('K0001', 'Ridho Surya', 'jl.lontar', '08765675'),
('K0002', 'Marini Alsa Khairana', 'Jl.rambutan', '087676545');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nrp` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`) VALUES
(1, 'Ridho Surya', 876765456, 'ridho@gmail.com', 'Teknik Informatika'),
(2, 'Marini Alsa Khairana', 876765456, 'rana@gmail.com', 'Teknik Informatika'),
(3, 'Harun aw', 11111101, 'harun@gmail.com', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `pemkode` char(5) NOT NULL,
  `pemnama` varchar(100) DEFAULT NULL,
  `pemalamat` varchar(200) DEFAULT NULL,
  `pemnotelp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`pemkode`, `pemnama`, `pemalamat`, `pemnotelp`) VALUES
('P0001', 'Juki Awana', 'jl.rental', '0876765654');

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `address`, `email`) VALUES
(1, 'Abdiel Gutkowski', '0757 Quigley Shores', 'alysha.greenfelder@example.org'),
(2, 'Prof. Meaghan Weissnat DVM', '7708 Toy Rapid Apt. 590', 'jaylan.gleichner@example.net'),
(3, 'Dustin Ward', '765 Sterling Track', 'ryley02@example.org'),
(4, 'Alfredo Veum', '3102 Marlen Circles Apt. 356', 'jorn@example.net'),
(5, 'Gertrude Hickle', '7021 Effertz Pike Apt. 883', 'windler.nora@example.org'),
(6, 'Ms. Pattie Vandervort II', '2228 Gregoria Crest', 'else54@example.com'),
(7, 'Delmer Hauck', '59543 Olson Ridges', 'lhalvorson@example.net'),
(8, 'Mr. Layne Goldner I', '81179 Gislason Fords', 'torphy.maya@example.org'),
(9, 'Victoria Kozey', '08091 Roberts Canyon Apt. 449', 'jazmyne.ritchie@example.net'),
(10, 'Royal Bins', '827 Monahan Creek Suite 557', 'sauer.bonnie@example.net'),
(11, 'Cayla Kris', '899 Leonel Haven Apt. 314', 'qsmith@example.com'),
(12, 'Will Walsh', '302 Effertz Neck Apt. 376', 'emerson56@example.net'),
(13, 'Lafayette Ankunding', '36851 Camila Island Suite 091', 'plockman@example.com'),
(14, 'Brett Gusikowski Sr.', '69928 Kelvin Estates', 'thoeger@example.org'),
(15, 'Marco Mosciski DDS', '36772 Estel Rue', 'mbecker@example.net'),
(16, 'Jacklyn Reinger', '953 Llewellyn Walks', 'qlindgren@example.com'),
(17, 'Prof. Domenico Harvey Jr.', '023 Bode Pike Suite 782', 'russel.ana@example.com'),
(18, 'Mr. Donny Howell IV', '226 Gutkowski Park', 'do\'reilly@example.net'),
(19, 'Dr. Coy Auer V', '37493 Zulauf Mount', 'jschowalter@example.org'),
(20, 'Mr. Elwin Pagac', '861 Dach Flat Suite 567', 'mariah94@example.net'),
(21, 'Miss Margot Barrows', '503 Jayde Cove Suite 645', 'frami.pascale@example.net'),
(22, 'Prof. Nya Torphy DVM', '4340 Nolan Glen Suite 858', 'jakayla.jones@example.net'),
(23, 'Chaim Koss', '0579 Buckridge Throughway Apt. 210', 'heidenreich.karina@example.com'),
(24, 'Conrad Buckridge', '9654 Ebert Villages Apt. 514', 'shahn@example.net'),
(25, 'Allie Witting', '286 Sporer Bridge', 'shemar.spinka@example.org'),
(26, 'Jaron Quigley', '30773 Kuhlman Valleys', 'stehr.zelma@example.com'),
(27, 'Dr. Augusta McGlynn', '9869 Christiansen Locks Suite 909', 'hilbert42@example.net'),
(28, 'Dr. Rudolph Romaguera III', '0395 Zemlak Shores', 'rabshire@example.com'),
(29, 'Thalia Anderson', '729 Halle Field', 'kris.juliana@example.org'),
(30, 'Jennie Langosh Sr.', '783 Osinski Light Suite 478', 'bergnaum.dulce@example.org'),
(31, 'Ismael Block', '80904 Gerhard Light Apt. 275', 'lonie.vonrueden@example.net'),
(32, 'Georgiana Kerluke', '763 McClure Junction', 'vincent33@example.org'),
(33, 'Carolyne Auer', '0940 Orn Spring Apt. 033', 'hhahn@example.com'),
(34, 'Mr. August Boyle', '20485 Franecki Field', 'feil.johathan@example.org'),
(35, 'Prof. Shana Carter', '60367 Lon Trail', 'fbeer@example.com'),
(36, 'Remington Conn', '2473 Kassulke Manors', 'kilback.marta@example.com'),
(37, 'Mr. Murray Heller', '824 Witting Path', 'fgreenholt@example.org'),
(38, 'Dr. Terrence Macejkovic I', '2515 Hammes Roads', 'lonzo.nolan@example.org'),
(39, 'Dr. Blake Stiedemann', '398 McDermott Plaza Suite 503', 'willy.carter@example.org'),
(40, 'Dr. Mara Jacobs MD', '45056 Erdman Springs', 'bbarrows@example.com'),
(41, 'Dr. Jammie Breitenberg', '8682 Sophie Center', 'desmond.murphy@example.org'),
(42, 'Marty Prosacco', '573 Wolf Ford Suite 205', 'jake.nienow@example.com'),
(43, 'Emil Russel', '630 Coty Fields Suite 421', 'roberts.rahsaan@example.com'),
(44, 'Gene Kessler DDS', '844 Lebsack Plaza Suite 609', 'chanel.lockman@example.net'),
(45, 'Oleta Connelly DVM', '030 Arianna Spring', 'florine.hauck@example.net'),
(46, 'Justen Wilkinson', '2821 Hagenes Villages', 'janessa95@example.com'),
(47, 'Jarrod Schmitt', '002 Magdalen Plain', 'rogahn.haley@example.net'),
(48, 'Velva Berge', '5295 Mayer Route Suite 200', 'kchamplin@example.net'),
(49, 'Enola Senger Sr.', '244 Schultz Fall Suite 475', 'cremin.ava@example.net'),
(50, 'Otto Cartwright', '86081 Effertz Pass', 'hills.marlen@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `satid` int(11) NOT NULL,
  `satnama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`satid`, `satnama`) VALUES
(1, 'Pcs'),
(2, 'Pack'),
(3, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` enum('1','2') NOT NULL,
  `is_active` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama`, `password`, `role_id`, `is_active`, `foto`) VALUES
(9, 'harun@gmail.com', 'Harun Saputra', '$2y$10$lxOS8F/CSWfoEu52NTywoeZ84za6mwYAn.Tw5QHIsMurfH3ycRTqy', '1', 1, '25591856_1675144532551692_416306291824335043_n.jpg'),
(10, 'ridhosurya71@gmail.com', 'Ridho Surya', '$2y$10$v9AMBDfE1hXjsNP1xQkC9e6smDqK47VodroKnVH2GBhRPNNCIlsx2', '1', 1, '1132617_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 3, 'Menu Management', 'menu', 'fa fa-user', 1),
(3, 3, 'SubMenu Management', 'menu/submenu', 'fa fa-users', 1),
(6, 2, 'My Profile', 'user', 'fa fa-trash', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-user-tie', 1),
(8, 2, 'Edit Profile', 'user/edit', 'fa fa-user-edit', 1),
(9, 2, 'Ganti Password', 'user/changepassword', 'fa fa-key', 1),
(10, 7, 'Konsumen', 'konsumen', 'fa fa-user-circle-o', 1),
(11, 1, 'Konsumen', 'konsumen', 'fa fa-user-circle', 1),
(12, 1, 'Pemasok', 'pemasok', 'fa fa-car', 1),
(13, 1, 'Kategori', 'kategori', 'fa fa-tag', 1),
(14, 1, 'Satuan', 'satuan', 'fa fa-archive', 1),
(15, 0, 'Barang', 'barang', 'fa fa-bars', 1),
(16, 1, 'Barang', 'barang', 'fa fa-bars', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`konkode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`pemkode`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
