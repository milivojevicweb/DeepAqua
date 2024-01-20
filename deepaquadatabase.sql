-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 07:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepaquadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `nameLastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `text` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `datesend` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idContact`, `nameLastName`, `email`, `text`, `status`, `date`, `datesend`) VALUES
(1, 'Marko Milivojevic', 'markoczv314@gmail.com', 'Poruka!', 1, '0000-00-00 00:00:00', '2022-11-17 00:06:08'),
(2, 'Proba Proba', 'proba@proba.com', 'Proba1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Proba Proba', 'proba@proba.com', 'Proba3', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Proba', 'proba@proba.com', 'Proba6', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Proba', 'proba@proba.com', 'Proba7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'kmkmkm', 'kmkmkmkmk', 'mm m m n ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'fghfgh', 'fghfgh', 'fghfgh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'fghfgh', 'fghfgh', 'fghfgh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'fghfgh', 'fghfgh', 'fghfgh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Proba Proba', 'markoczv314@gmail.com', 'Proba', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Marko Milivojevic', 'markoczv314@gmail.com', 'Probaa', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Marko Milivojevic', 'markoczv314@gmail.com', 'Proba', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Marko Milivojevic', 'markoczv314@gmail.com', 'adssad', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Marko Milivojevic', 'markoczv314@gmail.com', 'adssad', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `idGallery` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idGallery`, `image`, `name`) VALUES
(35, '1667962683310740536_215507944150875_7917875758712725971_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(36, '1667962689311065482_215213914180278_5888546026499039300_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(37, '1667962694311116622_215011484200521_1202353323086372000_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(38, '1667962698311364010_214889014212768_763545148613888479_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(39, '1667962702312043505_216454480722888_7485245299263223728_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(40, '1667962707312048900_218838103817859_583963655403220295_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(41, '1667962711312329310_216645894037080_5604031888905203872_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(42, '1667962715312348851_217228710645465_6759858301832463311_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(43, '1667962722312460195_216820774019592_4115689789531623889_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(44, '1667962726312537481_217041417330861_3872697978699422468_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(45, '1667962733312621385_217228717312131_5050992409926159258_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(46, '1667962741313027730_217842463917423_2609452508673517266_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(47, '1667962746313036299_217842457250757_8820801547377821005_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(48, '1667962751313198735_218029537232049_8113810066212386585_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(49, '1667962756313354984_218838080484528_8981589594900743469_n.jpg', 'Detailing pranje auto dubinsko ciscenje polimerizacija farovi poliranje'),
(51, '1668269266313354984_218838080484528_8981589594900743469_n.jpg', 'zdfdsfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(255) NOT NULL,
  `path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idService` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `path`, `alt`, `idService`) VALUES
(15, '1669863313dubinskoPranje.jpg', 'Dubinsko pranje', 15),
(16, '1669766608poliranjeAuta.jpg', 'Poliranje vozila', 17),
(17, '1669766695polimerizacijaFarova.jpg', 'Polimerizacija Farova', 18),
(18, '1669765693keramickaZastita.jpg', 'Keramička zaštita', 19),
(19, '1669766178spoljnoPranje.jpg', 'Premium spoljno pranje', 20),
(20, '1669766309detailingEnterijera.jpg', 'Detailing enterijera', 21),
(21, '1669766517detailingFelni1.jpg', 'Detailing Felni', 22),
(22, '1669766772pranjeMotora.jpg', 'Pranje motora', 22),
(23, '1669766917masinskoSusenje.jpg', 'Mašinsko sušenje', 24),
(24, '1674698274dubinskoPranjeNamestaja.jpg', 'Dubinsko pranje nameštaja', 16);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `idPackage` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`idPackage`, `name`, `price`) VALUES
(1, 'Bronza', '180€ - 280€'),
(2, 'Silver', '250 - 400 EUR'),
(3, 'Gold', '400 - 700 EUR');

-- --------------------------------------------------------

--
-- Table structure for table `registrationkey`
--

CREATE TABLE `registrationkey` (
  `idRegistrationKey` int(255) NOT NULL,
  `registrationKey` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrationkey`
--

INSERT INTO `registrationkey` (`idRegistrationKey`, `registrationKey`) VALUES
(1, 'sifra123');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `idService` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`idService`, `name`, `text`, `price`, `idUser`) VALUES
(15, 'Dubinsko pranje', 'Čišćenje enterijera je proces detaljnog (dubinskog) čišćenja unutrašnjosti vozila u okviru koga se detaljno čiste nebo, vrata, patosnice, tabla, sedišta, prostor gepeka, itd. Kao i kod nameštaja, vremenom se u sedištima, tapacirungu i ostalim delovima enterijera vozila, nakupi prljavština i nemali broj bakterija. Dubinsko pranje automobila obuhvata: čišćenje i zaštitu kože vozila, hemijsko pranje svih tekstilnih i plastičnih površina, detaljno sređivanje kontrolne table paročistačem, suvo pranje neba, keramičku zaštitu kožnih površina. Cene dubinskog pranja su 5000 za manja vozila, 6000 za srednja 7000 za veca vozila.', '5000 - 7000 RSD', 6),
(16, 'Dubinsko pranje nameštaja', 'Svaki vid namestaja sakuplja dosta prljavštine i prašine a ispod njega su grinje i alergeni koji vrlo loše utiču na naš zdravstveni sistem a od njih se mozete odbraniti jedino dubinskim pranjem. Naše profesionalne mašine će vaš nameštaj očistiti kako na površini tako i u dubini, a procenat vlage je vrlo mali jer već na sobnoj temperaturi vaš nameštaj postaje vrlo brzo suv! Cene: Stolica od 250din, fotelja od 700din, dvosed od 1200din, trosed od 1500din, ugaona garnitura (mesto) od 600din, tabure od 400din, jastuci od 250din, forelja na rasklapanje od 1000din, dvosed na rasklapanje od 1500din, trosed na rasklapanje od 2000din, dušek singl od 800din, obostrano od 1200din, bračni dušek od 1200din, obostrano od 1800din, dečiji dušek obostrano od 600din, fotelja (koža) od 1200din, dvosed (koža) od 1700din, trosed (koža) od 2200din, ugaona garnitura (mesto koža) od 1200din', '250 - 2200 RSD', 6),
(17, 'Poliranje vozila', 'Poliranje automobila je trajni mehanički proces kojim se otklanjaju sitnije ogrebotine sa limarije Vašeg automobila. Uslugu radimo sa najsavremenijim dual action mašinama za poliranje, najboljim pastama na tržištu i obavezno merimo lak Vašeg metalnog ljubimca pre nego što počnemo sa poliranjem. Usluga poliranja automobila obuhvata: detaljno pranje, hemijsku i fizičku dekontaminaciju laka, poliranje automobila u više faza, keramičku zaštitu svih površina vozila. Jednoslojno od 80e do 120e, dvoslojno od 130e do 180e, troslojno i više slojeva od 200e do 350e', '80 - 350 EUR\r\n', 6),
(18, 'Polimerizacija Farova', 'Polimerizacija, odnosno bezbojno hemijsko lakiranje je najsavremeniji i najbolji način vraćanja farova u fabričko stanje. Princip rada je takav da se specijalna hemija koja je u tečnom stanju greje i kada predje u gasovito stanje nanosi na prethodno detaljno pripremljene farove za tretman. Prednosti su: drastično je dugotrajnija i osim 100% UV zaštite pruža čak i fizičku zaštitu od insekata i sitnih kamenčića, garantuje proziran i nov izgled farova čak 3 god. i duže od klasičnog lakiranja.\r\n\r\n', '4000 RSD', 6),
(19, 'Keramička zaštita', 'Keramička zaštita vozila namenjena je zaštiti laka od sitnijih oštećenja i dugoročnog, a čak i kratkoročnog lošeg održavanja. Nanosi keramičke zaštite mogu Vaše vozilo zaštititi od ptičijeg izmeta, buba i insekata, oštećenja nastalih i prouzrokovanih održavanjem ulica (so, asfalt, mašinska pranja puteva), ultraljubičastog zračenja i generalno svih agenasa koji nagrizaju auto-lak ili neku drugu površinu na Vašem vozilu, u vidu trajanja od 1 do 5 godina. Cena usluga za poliranje je 6 meseci 50e, do 12 meseci 100e, do 3 godine 200e-250e.', '50 - 250 EUR\r\n', 6),
(20, 'Premium spoljno pranje', 'Premium spoljno pranje Spoljno pranje je izuzetno bitno kao i unutrasnje za očuvanje vašeg limenog ljubimca. Naše premium pranje (takozvano two bucket wash) je pranje gde posle svakog korišćenja sundjera taj isti ispiramo i krećemo ponovo. U ovom paketu ništa nije iskljuceno tu su podkrila, felne, sve metalne površine i stakla, sa ručnim pranje uz pomoć cetkica kako bi svaka prljavština bila izvadjena i odstranjena. Uz spoljno pranje dolaze i različiti voskovi sa različitom dužinom trajanja (3,6,12 meseci), a u ovom paketu nismo izostavili ni unutrašnjost. Unutrašnjost se usisava i briše se prašina kako bi se dovelo do normalnog izgleda. Cene iznose za premium spoljno pranje + unutrašnjost sa voskom do mesec dana od 1500, sa voskom do 3 meseca od 3000, sa voskom do 12 meseci od 6000\r\n\r\n', '1500 - 6000 RSD\r\n', 6),
(21, 'Detailing enterijera', 'Ova usluga podrazumeva detaljno čišćenje svih nepristupačnih delova i uskih prostora četkicom, kako bi vratili fabrički izgled i sjaj Vašeg automobila.Cene za detailing enterijera (bez dubinskog) za mala vozila se krecu od 2500, srednja vozila od 3000, velika vozila od 4000.\r\n\r\n', '2500 - 4000 RSD\r\n', 6),
(22, 'Detailing Felni', 'Tokom vožnje felne i podkrila su konstantno u kontaktu sa štetnim uticajem prljavštine, snega, kiše, blata, zimske soli i masnoće. Kako bi odmastili i očistili felne i vratili im fabricki izgled, koristimo samo profesionalne hemikalije, a imamo i uslugu apliciranja keramike na iste. Cene za detailing felni su bez keramike od 3000, sa keramikom do 12 meseci 6000.\r\n\r\n', '3000 - 6000 RSD\r\n', 6),
(23, 'Pranje motora', 'Detailing motornog prostora je proces estetskog čišćenja motora automobila koji obuhvata sve vidljive i dostupne površine motornog prostora. Proces se radi sa minimalnim korišćenjem vode i sušačem kako bi i ta minimalna kolicina vode nestala!\r\n\r\n', '3000 RSD\r\n', 6),
(24, 'Mašinsko sušenje', 'Po završetku dubinskog pranja, profesionalne mašine će usisati vodu iz Vašeg automobila, a zatim Vaš automobil priključujemo na mašinsko sušenje naredna 2 sata, kako bi sva vlaga izašla iz kabine. Tokom zimskog perioda, veliki problem predstavlja to što automobil posle bilo kakvog unutrašnjeg pranja nije dovoljno suv, tada kreću stvari da se komplikuju i u automobilu počinje da se oseća buđ, ustajao vazduh i trulež. Zato uvek predlažemo sušenje nakon dubinskog pranja, kako bi dobili kompletnu profesionalnu uslugu!\r\n\r\n', 'Uračunato u pakete\r\n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `token` int(255) DEFAULT NULL,
  `developer` tinyint(1) NOT NULL,
  `idUserLevel` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastName`, `email`, `password`, `created`, `updated`, `token`, `developer`, `idUserLevel`) VALUES
(6, 'Marko', 'Milivojevic', 'marko.milivojevic.167.17@ict.edu.rs', '4fb6f7fdae2dbc006a1d90cd0405bcc9', '2022-02-01 02:50:09', '2022-02-01 02:50:09', 1644771651, 1, 2),
(8, 'Marko', 'Milivojevic', 'markoczv314@gmail.com', 'f7741f81f9edb5fb4880bf093e66f8b5', '2022-02-06 23:16:13', '2022-02-06 23:24:52', NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `idUserLevel` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`idUserLevel`, `name`) VALUES
(1, 'Korisnik'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idGallery`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `idProject` (`idService`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`idPackage`);

--
-- Indexes for table `registrationkey`
--
ALTER TABLE `registrationkey`
  ADD PRIMARY KEY (`idRegistrationKey`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUserLevel` (`idUserLevel`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`idUserLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `idPackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrationkey`
--
ALTER TABLE `registrationkey`
  MODIFY `idRegistrationKey` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `idUserLevel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`) ON DELETE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idUserLevel`) REFERENCES `userlevel` (`idUserLevel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
