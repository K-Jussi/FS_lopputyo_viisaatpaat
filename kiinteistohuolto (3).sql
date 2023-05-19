-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19.05.2023 klo 12:24
-- Palvelimen versio: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuolto`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asunnot`
--

CREATE TABLE `asunnot` (
  `asuntoid` int(11) NOT NULL,
  `asunto` varchar(15) NOT NULL,
  `asoyid` int(11) NOT NULL,
  `asukas` varchar(30) NOT NULL,
  `puhelin` varchar(15) NOT NULL,
  `salasana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `asunnot`
--

INSERT INTO `asunnot` (`asuntoid`, `asunto`, `asoyid`, `asukas`, `puhelin`, `salasana`) VALUES
(1, 'A1', 1, 'Matti Meikäläinen', '0441234567', 'matti'),
(2, 'A2', 1, 'Teppo Teikäläinen', '0442345678', 'teppo'),
(3, 'A3', 1, 'Henna Heikäläinen', '0443456789', 'henna'),
(4, 'A4', 1, 'Rami Rämäpää', '0444567890', 'rami'),
(5, 'A5', 1, 'Ville Valopää', '0440987654', 'ville'),
(6, 'A6', 1, 'Neea Nuttura', '0449876543', 'neea'),
(7, 'A7', 1, 'Tiina Tallaaja', '0448765432', 'tiina'),
(8, 'A8', 1, 'Sami Seppä', '0447654321', 'sami'),
(9, 'B1', 1, 'Mikko Mallikas', '0442347654', 'mikko'),
(10, 'B2', 1, 'Harri Heiluri', '0448903124', 'harri'),
(11, 'B3', 1, 'Jutta Jalopää', '0446544321', 'jutta'),
(12, 'B4', 1, 'Nooa Neppaaja', '0445849357', 'nooa'),
(13, 'B5', 1, 'Pasi Puolijumala', '0449135967', 'pasi'),
(14, 'B6', 1, 'Ilmari Ilmamies', '0411234567', 'ilmari'),
(15, 'B7', 1, 'Sanna Sekopää', '0412345678', 'sanna'),
(16, 'B8', 1, 'Jari Jakopää', '0413456789', 'jari'),
(17, 'Piha-alueet', 1, '', '', ''),
(18, 'Yleiset tilat', 1, '', '', ''),
(20, '1', 2, 'Jaakko Junttura', '0414567890', 'jaakko'),
(21, '2', 2, 'Taru Terävä', '0410987654', 'taru'),
(22, '3', 2, 'Riitta Rinsessa', '0419876543', 'riitta'),
(23, '3', 2, 'Otso Kontio', '04187654321', 'otso'),
(24, '4', 2, 'Titta Tavallinen', '0411122334', 'titta'),
(25, 'Piha-alueet', 2, '', '', ''),
(26, 'A1', 3, 'Nelli Nuttura', '0451234567', 'nelli'),
(27, 'A2', 3, 'Hemuli Hirviö', '0452345678', 'hemuli'),
(28, 'A3', 3, 'Jarkko Jepari', '0453456789', 'jarkko'),
(29, 'A4', 3, 'Lassi Lipevä', '0454567890', 'lassi'),
(30, 'A5', 3, 'Minna Mallikas', '0450987654', 'minna'),
(31, 'A6', 3, 'Sini Sinisimmu', '0459876543', 'sini'),
(32, 'B1', 3, 'Miina Äkkijyrkkä', '0458765432', 'miina'),
(33, 'B2', 3, 'Rolle Romuttaja', '0502374555', 'rolle'),
(34, 'B3', 3, 'Samppa Siedettävä', '0448877223', 'samppa'),
(35, 'B4', 3, 'Noora Näppi', '0452266897', 'noora'),
(36, 'B5', 3, 'Linnea Linnatuuli', '0447755332', 'linnea'),
(37, 'B6', 3, 'Kalle Könsikäs', '0506633773', 'kalle'),
(38, 'Piha-alueet', 3, '', '', ''),
(39, 'Yleiset tilat', 3, '', '', '');

-- --------------------------------------------------------

--
-- Rakenne taululle `hstatus`
--

CREATE TABLE `hstatus` (
  `statusid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `hstatus`
--

INSERT INTO `hstatus` (`statusid`, `status`) VALUES
(1, 'Avoin'),
(2, 'Määrätty'),
(3, 'Työn alla'),
(4, 'Tehty');

-- --------------------------------------------------------

--
-- Rakenne taululle `huoltotyo`
--

CREATE TABLE `huoltotyo` (
  `huoltoid` int(11) NOT NULL,
  `asuntoid` int(11) NOT NULL,
  `asoyid` int(11) NOT NULL,
  `ilmoittaja` varchar(30) NOT NULL,
  `kuvaus` varchar(300) NOT NULL,
  `statusid` int(11) NOT NULL DEFAULT 1,
  `tyontekijaid` int(11) DEFAULT 1,
  `kommentit` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `huoltotyo`
--

INSERT INTO `huoltotyo` (`huoltoid`, `asuntoid`, `asoyid`, `ilmoittaja`, `kuvaus`, `statusid`, `tyontekijaid`, `kommentit`) VALUES
(2, 2, 1, 'Asukas', 'Suihkun lattiakaivo ei vedä', 4, 3, 'Lattiakaivo TESTIputsattu, toimii taas!'),
(17, 1, 1, 'Teppo Teikäläinen', 'ovikello on painunut pohjaan', 1, 4, 'ovikello on korjattu'),
(21, 2, 2, 'Työmies', 'Asunnossa on kuuma', 1, 2, 'Käydään pian'),
(24, 2, 1, 'Asukas', 'TESTI', 1, 4, ''),
(27, 1, 1, 'Minna Mäkelä', 'Asunnossa on kylmä', 1, 2, 'hei'),
(28, 1, 1, 'Minna Mäkelä', 'Asunnossa on kylmä', 1, 2, 'Lattiakaivo putsattu, toimii taas!'),
(33, 1, 1, 'Minna Mäkelä', 'Suihkun lattiakaivo ei vedä', 1, 2, '1'),
(39, 38, 3, 'Teppo Toimari', 'Penkkien maalaus.', 1, 1, 'Kesäkuun ensimmäisellä viikolla.'),
(40, 13, 1, 'Pasi Puolijumala', 'Kanki tukki pöntön!', 1, 1, '');

-- --------------------------------------------------------

--
-- Rakenne taululle `taloyhtio`
--

CREATE TABLE `taloyhtio` (
  `asoyid` int(11) NOT NULL,
  `asoy` varchar(20) NOT NULL,
  `katuosoite` varchar(30) NOT NULL,
  `postinro` int(6) NOT NULL,
  `kaupunki` varchar(20) NOT NULL,
  `salasana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `taloyhtio`
--

INSERT INTO `taloyhtio` (`asoyid`, `asoy`, `katuosoite`, `postinro`, `kaupunki`, `salasana`) VALUES
(1, 'Kippari', 'Kipparinkuja 1', 95400, 'Tornio', 'kippari'),
(2, 'Nappila', 'Nappitie 2', 95400, 'Tornio', 'nappila'),
(3, 'Kalliola', 'Kalliokuja 7', 95400, 'Tornio', 'kalliola');

-- --------------------------------------------------------

--
-- Rakenne taululle `tstatus`
--

CREATE TABLE `tstatus` (
  `statusid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `tstatus`
--

INSERT INTO `tstatus` (`statusid`, `status`) VALUES
(1, 'Vapaa'),
(2, 'Keikalla'),
(3, 'Poissa');

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijat`
--

CREATE TABLE `tyontekijat` (
  `tyontekijaid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `puhelin` int(15) NOT NULL,
  `sposti` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `salasana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `tyontekijat`
--

INSERT INTO `tyontekijat` (`tyontekijaid`, `nimi`, `puhelin`, `sposti`, `status`, `salasana`) VALUES
(1, 'Ei määritelty', 1, '1', 1, '1'),
(2, 'Teppo Toimari', 501231234, 'teppo.toimari@khrautio.fi', 2, 'ttoimari'),
(3, 'Milla Maalari', 501122334, 'milla.maalari@khrautio.fi', 2, 'mmaalari'),
(4, 'Topias Talkkari', 501231238, 'topias.talkkari@khrautio.fi', 1, 'ttalkkari'),
(5, 'Jukka Jokamies', 501122339, 'jukka.jokamies@khrautio.fi', 1, 'jjokamies'),
(6, 'Pertti Philips', 502233446, 'pertti.philips@khrautio.fi', 1, 'pphilips');

-- --------------------------------------------------------

--
-- Rakenne taululle `viestit`
--

CREATE TABLE `viestit` (
  `viestiid` int(11) NOT NULL,
  `nimi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `puhelin` int(25) NOT NULL,
  `sahkoposti` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `viesti` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `viestit`
--

INSERT INTO `viestit` (`viestiid`, `nimi`, `puhelin`, `sahkoposti`, `viesti`) VALUES
(2, '', 0, '', ''),
(3, 'Milla Maalari', 987865573, 'ttj@jotain.fi', 'testi'),
(4, 'Milla Maalari', 32435647, 'ttj@jotain.fi', 'dagdgdaadg'),
(5, '', 0, '', ''),
(6, 'Sini Siniselkä', 987865573, 'sselka@jotain.fi', 'Naapurissa paukkuu'),
(7, 'Tiina Tallustaja', 13245, 'ttj@jotain.f', 'Saisinko tarjouksen pihakivetyksestä kiitos!'),
(8, 'Jussi Karhula', 2147483647, 'jussi@jotain.fi', 'Testailua!'),
(9, 'Jussi Karhula', 507766554, 'jussi@jotain.fi', 'Testi 2!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asunnot`
--
ALTER TABLE `asunnot`
  ADD PRIMARY KEY (`asuntoid`),
  ADD KEY `asoy` (`asoyid`);

--
-- Indexes for table `hstatus`
--
ALTER TABLE `hstatus`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `huoltotyo`
--
ALTER TABLE `huoltotyo`
  ADD PRIMARY KEY (`huoltoid`),
  ADD KEY `asuntoid` (`asuntoid`,`statusid`,`tyontekijaid`),
  ADD KEY `statusid` (`statusid`),
  ADD KEY `tyontekijatid` (`tyontekijaid`),
  ADD KEY `asoyid` (`asoyid`);

--
-- Indexes for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  ADD PRIMARY KEY (`asoyid`);

--
-- Indexes for table `tstatus`
--
ALTER TABLE `tstatus`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD PRIMARY KEY (`tyontekijaid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `viestit`
--
ALTER TABLE `viestit`
  ADD PRIMARY KEY (`viestiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asunnot`
--
ALTER TABLE `asunnot`
  MODIFY `asuntoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hstatus`
--
ALTER TABLE `hstatus`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `huoltotyo`
--
ALTER TABLE `huoltotyo`
  MODIFY `huoltoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  MODIFY `asoyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tstatus`
--
ALTER TABLE `tstatus`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekijaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viestit`
--
ALTER TABLE `viestit`
  MODIFY `viestiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `asunnot`
--
ALTER TABLE `asunnot`
  ADD CONSTRAINT `asunnot_ibfk_1` FOREIGN KEY (`asoyid`) REFERENCES `taloyhtio` (`asoyid`);

--
-- Rajoitteet taululle `huoltotyo`
--
ALTER TABLE `huoltotyo`
  ADD CONSTRAINT `huoltotyo_ibfk_1` FOREIGN KEY (`statusid`) REFERENCES `hstatus` (`statusid`),
  ADD CONSTRAINT `huoltotyo_ibfk_2` FOREIGN KEY (`asuntoid`) REFERENCES `asunnot` (`asuntoid`),
  ADD CONSTRAINT `huoltotyo_ibfk_3` FOREIGN KEY (`tyontekijaid`) REFERENCES `tyontekijat` (`tyontekijaid`),
  ADD CONSTRAINT `huoltotyo_ibfk_4` FOREIGN KEY (`asoyid`) REFERENCES `taloyhtio` (`asoyid`);

--
-- Rajoitteet taululle `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijat_ibfk_1` FOREIGN KEY (`status`) REFERENCES `tstatus` (`statusid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
