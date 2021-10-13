-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 13.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_test_big`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `invoiceID` int(11) NOT NULL,
  `shiftID` int(11) NOT NULL,
  `invoiceTotal_Payment` int(11) NOT NULL,
  `invoiceTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `storeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `itemName` int(11) NOT NULL,
  `itemStock` int(11) NOT NULL,
  `itemPrice` int(11) NOT NULL,
  `itemDetail` varchar(255) NOT NULL,
  `itemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `orderTotal_Payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shifts`
--

CREATE TABLE `shifts` (
  `shiftID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `shiftName` varchar(20) NOT NULL,
  `shiftTime_Start` time NOT NULL,
  `shiftTime_End` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stores`
--

CREATE TABLE `stores` (
  `storeID` int(11) NOT NULL,
  `storeName` varchar(20) NOT NULL,
  `storeAddress` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `FK_InvoiceAtStore` (`storeID`),
  ADD KEY `FK_InvoiceShift` (`shiftID`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `FK_ItemStore` (`storeID`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_OrderItems` (`itemID`),
  ADD KEY `FK_OrderInvoice` (`invoiceID`);

--
-- Indeks untuk tabel `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shiftID`),
  ADD KEY `FK_ShiftInStore` (`storeID`);

--
-- Indeks untuk tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shifts`
--
ALTER TABLE `shifts`
  MODIFY `shiftID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stores`
--
ALTER TABLE `stores`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `FK_InvoiceAtStore` FOREIGN KEY (`storeID`) REFERENCES `stores` (`storeID`),
  ADD CONSTRAINT `FK_InvoiceShift` FOREIGN KEY (`shiftID`) REFERENCES `shifts` (`shiftID`);

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_ItemStore` FOREIGN KEY (`storeID`) REFERENCES `stores` (`storeID`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_OrderInvoice` FOREIGN KEY (`invoiceID`) REFERENCES `invoices` (`invoiceID`),
  ADD CONSTRAINT `FK_OrderItems` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`);

--
-- Ketidakleluasaan untuk tabel `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `FK_ShiftInStore` FOREIGN KEY (`storeID`) REFERENCES `stores` (`storeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
