-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 07:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mock_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_date` datetime DEFAULT current_timestamp(),
  `total_questions` int(11) NOT NULL,
  `countdown` int(11) NOT NULL,
  `unanswered_questions` int(11) NOT NULL,
  `answered_questions` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `wrong_answers` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `attempt` int(11) DEFAULT NULL,
  `answer0` int(11) DEFAULT NULL,
  `answer2` varchar(1) DEFAULT NULL,
  `answer3` varchar(1) DEFAULT NULL,
  `answer4` varchar(1) DEFAULT NULL,
  `answer5` varchar(1) DEFAULT NULL,
  `answer6` varchar(1) DEFAULT NULL,
  `answer7` varchar(1) DEFAULT NULL,
  `answer8` varchar(1) DEFAULT NULL,
  `answer9` varchar(1) DEFAULT NULL,
  `answer10` varchar(1) DEFAULT NULL,
  `answer11` varchar(1) DEFAULT NULL,
  `answer12` varchar(1) DEFAULT NULL,
  `answer13` varchar(1) DEFAULT NULL,
  `answer14` varchar(1) DEFAULT NULL,
  `answer15` varchar(1) DEFAULT NULL,
  `answer16` varchar(1) DEFAULT NULL,
  `answer17` varchar(1) DEFAULT NULL,
  `answer18` varchar(1) DEFAULT NULL,
  `answer19` varchar(1) DEFAULT NULL,
  `answer20` varchar(1) DEFAULT NULL,
  `answer21` varchar(1) DEFAULT NULL,
  `answer22` varchar(1) DEFAULT NULL,
  `answer23` varchar(1) DEFAULT NULL,
  `answer24` varchar(1) DEFAULT NULL,
  `answer25` varchar(1) DEFAULT NULL,
  `answer26` varchar(1) DEFAULT NULL,
  `answer27` varchar(1) DEFAULT NULL,
  `answer28` varchar(1) DEFAULT NULL,
  `answer29` varchar(1) DEFAULT NULL,
  `answer30` varchar(1) DEFAULT NULL,
  `answer31` varchar(1) DEFAULT NULL,
  `answer32` varchar(1) DEFAULT NULL,
  `answer33` varchar(1) DEFAULT NULL,
  `answer34` varchar(1) DEFAULT NULL,
  `answer35` varchar(1) DEFAULT NULL,
  `answer36` varchar(1) DEFAULT NULL,
  `answer37` varchar(1) DEFAULT NULL,
  `answer38` varchar(1) DEFAULT NULL,
  `answer39` varchar(1) DEFAULT NULL,
  `answer40` varchar(1) DEFAULT NULL,
  `answer41` varchar(1) DEFAULT NULL,
  `answer42` varchar(1) DEFAULT NULL,
  `answer43` varchar(1) DEFAULT NULL,
  `answer44` varchar(1) DEFAULT NULL,
  `answer45` varchar(1) DEFAULT NULL,
  `answer46` varchar(1) DEFAULT NULL,
  `answer47` varchar(1) DEFAULT NULL,
  `answer48` varchar(1) DEFAULT NULL,
  `answer49` varchar(1) DEFAULT NULL,
  `answer50` varchar(1) DEFAULT NULL,
  `answer51` varchar(1) DEFAULT NULL,
  `answer52` varchar(1) DEFAULT NULL,
  `answer53` varchar(1) DEFAULT NULL,
  `answer54` varchar(1) DEFAULT NULL,
  `answer55` varchar(1) DEFAULT NULL,
  `answer56` varchar(1) DEFAULT NULL,
  `answer57` varchar(1) DEFAULT NULL,
  `answer58` varchar(1) DEFAULT NULL,
  `answer59` varchar(1) DEFAULT NULL,
  `answer60` varchar(1) DEFAULT NULL,
  `answer61` varchar(1) DEFAULT NULL,
  `answer62` varchar(1) DEFAULT NULL,
  `answer63` varchar(1) DEFAULT NULL,
  `answer64` varchar(1) DEFAULT NULL,
  `answer65` varchar(1) DEFAULT NULL,
  `answer66` varchar(1) DEFAULT NULL,
  `answer67` varchar(1) DEFAULT NULL,
  `answer68` varchar(1) DEFAULT NULL,
  `answer69` varchar(1) DEFAULT NULL,
  `answer70` varchar(1) DEFAULT NULL,
  `answer71` varchar(1) DEFAULT NULL,
  `answer72` varchar(1) DEFAULT NULL,
  `answer73` varchar(1) DEFAULT NULL,
  `answer74` varchar(1) DEFAULT NULL,
  `answer75` varchar(1) DEFAULT NULL,
  `answer76` varchar(1) DEFAULT NULL,
  `answer77` varchar(1) DEFAULT NULL,
  `answer78` varchar(1) DEFAULT NULL,
  `answer79` varchar(1) DEFAULT NULL,
  `answer80` varchar(1) DEFAULT NULL,
  `answer81` varchar(1) DEFAULT NULL,
  `answer82` varchar(1) DEFAULT NULL,
  `answer83` varchar(1) DEFAULT NULL,
  `answer84` varchar(1) DEFAULT NULL,
  `answer85` varchar(1) DEFAULT NULL,
  `answer86` varchar(1) DEFAULT NULL,
  `answer87` varchar(1) DEFAULT NULL,
  `answer88` varchar(1) DEFAULT NULL,
  `answer89` varchar(1) DEFAULT NULL,
  `answer90` varchar(1) DEFAULT NULL,
  `answer91` varchar(1) DEFAULT NULL,
  `answer92` varchar(1) DEFAULT NULL,
  `answer93` varchar(1) DEFAULT NULL,
  `answer94` varchar(1) DEFAULT NULL,
  `answer95` varchar(1) DEFAULT NULL,
  `answer96` varchar(1) DEFAULT NULL,
  `answer97` varchar(1) DEFAULT NULL,
  `answer98` varchar(1) DEFAULT NULL,
  `answer99` varchar(1) DEFAULT NULL,
  `answer100` varchar(1) DEFAULT NULL,
  `answer101` varchar(1) DEFAULT NULL,
  `answer102` varchar(1) DEFAULT NULL,
  `answer103` varchar(1) DEFAULT NULL,
  `answer104` varchar(1) DEFAULT NULL,
  `answer105` varchar(1) DEFAULT NULL,
  `answer106` varchar(1) DEFAULT NULL,
  `answer107` varchar(1) DEFAULT NULL,
  `answer108` varchar(1) DEFAULT NULL,
  `answer109` varchar(1) DEFAULT NULL,
  `answer110` varchar(1) DEFAULT NULL,
  `answer111` varchar(1) DEFAULT NULL,
  `answer112` varchar(1) DEFAULT NULL,
  `answer113` varchar(1) DEFAULT NULL,
  `answer114` varchar(1) DEFAULT NULL,
  `answer115` varchar(1) DEFAULT NULL,
  `answer116` varchar(1) DEFAULT NULL,
  `answer117` varchar(1) DEFAULT NULL,
  `answer118` varchar(1) DEFAULT NULL,
  `answer119` varchar(1) DEFAULT NULL,
  `answer120` varchar(1) DEFAULT NULL,
  `answer121` varchar(1) DEFAULT NULL,
  `answer122` varchar(1) DEFAULT NULL,
  `answer123` varchar(1) DEFAULT NULL,
  `answer124` varchar(1) DEFAULT NULL,
  `answer125` varchar(1) DEFAULT NULL,
  `answer126` varchar(1) DEFAULT NULL,
  `answer127` varchar(1) DEFAULT NULL,
  `answer128` varchar(1) DEFAULT NULL,
  `answer129` varchar(1) DEFAULT NULL,
  `answer130` varchar(1) DEFAULT NULL,
  `answer131` varchar(1) DEFAULT NULL,
  `answer132` varchar(1) DEFAULT NULL,
  `answer133` varchar(1) DEFAULT NULL,
  `answer134` varchar(1) DEFAULT NULL,
  `answer135` varchar(1) DEFAULT NULL,
  `answer136` varchar(1) DEFAULT NULL,
  `answer137` varchar(1) DEFAULT NULL,
  `answer138` varchar(1) DEFAULT NULL,
  `answer139` varchar(1) DEFAULT NULL,
  `answer140` varchar(1) DEFAULT NULL,
  `answer141` varchar(1) DEFAULT NULL,
  `answer142` varchar(1) DEFAULT NULL,
  `answer143` varchar(1) DEFAULT NULL,
  `answer144` varchar(1) DEFAULT NULL,
  `answer145` varchar(1) DEFAULT NULL,
  `answer146` varchar(1) DEFAULT NULL,
  `answer147` varchar(1) DEFAULT NULL,
  `answer148` varchar(1) DEFAULT NULL,
  `answer149` varchar(1) DEFAULT NULL,
  `answer150` varchar(1) DEFAULT NULL,
  `answer151` varchar(1) DEFAULT NULL,
  `answer152` varchar(1) DEFAULT NULL,
  `answer153` varchar(1) DEFAULT NULL,
  `answer154` varchar(1) DEFAULT NULL,
  `answer155` varchar(1) DEFAULT NULL,
  `answer156` varchar(1) DEFAULT NULL,
  `answer157` varchar(1) DEFAULT NULL,
  `answer158` varchar(1) DEFAULT NULL,
  `answer159` varchar(1) DEFAULT NULL,
  `answer160` varchar(1) DEFAULT NULL,
  `answer161` varchar(1) DEFAULT NULL,
  `answer162` varchar(1) DEFAULT NULL,
  `answer163` varchar(1) DEFAULT NULL,
  `answer164` varchar(1) DEFAULT NULL,
  `answer165` varchar(1) DEFAULT NULL,
  `answer166` varchar(1) DEFAULT NULL,
  `answer167` varchar(1) DEFAULT NULL,
  `answer168` varchar(1) DEFAULT NULL,
  `answer169` varchar(1) DEFAULT NULL,
  `answer170` varchar(1) DEFAULT NULL,
  `answer171` varchar(1) DEFAULT NULL,
  `answer172` varchar(1) DEFAULT NULL,
  `answer173` varchar(1) DEFAULT NULL,
  `answer174` varchar(1) DEFAULT NULL,
  `answer175` varchar(1) DEFAULT NULL,
  `answer176` varchar(1) DEFAULT NULL,
  `answer177` varchar(1) DEFAULT NULL,
  `answer178` varchar(1) DEFAULT NULL,
  `answer179` varchar(1) DEFAULT NULL,
  `answer180` varchar(1) DEFAULT NULL,
  `answer181` varchar(1) DEFAULT NULL,
  `answer182` varchar(1) DEFAULT NULL,
  `answer183` varchar(1) DEFAULT NULL,
  `answer184` varchar(1) DEFAULT NULL,
  `answer185` varchar(1) DEFAULT NULL,
  `answer186` varchar(1) DEFAULT NULL,
  `answer187` varchar(1) DEFAULT NULL,
  `answer188` varchar(1) DEFAULT NULL,
  `answer189` varchar(1) DEFAULT NULL,
  `answer190` varchar(1) DEFAULT NULL,
  `answer191` varchar(1) DEFAULT NULL,
  `answer192` varchar(1) DEFAULT NULL,
  `answer193` varchar(1) DEFAULT NULL,
  `answer194` varchar(1) DEFAULT NULL,
  `answer195` varchar(1) DEFAULT NULL,
  `answer196` varchar(1) DEFAULT NULL,
  `answer197` varchar(1) DEFAULT NULL,
  `answer198` varchar(1) DEFAULT NULL,
  `answer199` varchar(1) DEFAULT NULL,
  `answer200` varchar(1) DEFAULT NULL,
  `answer201` varchar(1) DEFAULT NULL,
  `answer202` varchar(1) DEFAULT NULL,
  `answer203` varchar(1) DEFAULT NULL,
  `answer204` varchar(1) DEFAULT NULL,
  `answer205` varchar(1) DEFAULT NULL,
  `answer206` varchar(1) DEFAULT NULL,
  `answer207` varchar(1) DEFAULT NULL,
  `answer208` varchar(1) DEFAULT NULL,
  `answer209` varchar(1) DEFAULT NULL,
  `answer210` varchar(1) DEFAULT NULL,
  `answer211` varchar(1) DEFAULT NULL,
  `answer212` varchar(1) DEFAULT NULL,
  `answer213` varchar(1) DEFAULT NULL,
  `answer214` varchar(1) DEFAULT NULL,
  `answer215` varchar(1) DEFAULT NULL,
  `answer216` varchar(1) DEFAULT NULL,
  `answer217` varchar(1) DEFAULT NULL,
  `answer218` varchar(1) DEFAULT NULL,
  `answer219` varchar(1) DEFAULT NULL,
  `answer220` varchar(1) DEFAULT NULL,
  `answer221` varchar(1) DEFAULT NULL,
  `answer222` varchar(1) DEFAULT NULL,
  `answer223` varchar(1) DEFAULT NULL,
  `answer224` varchar(1) DEFAULT NULL,
  `answer225` varchar(1) DEFAULT NULL,
  `answer226` varchar(1) DEFAULT NULL,
  `answer227` varchar(1) DEFAULT NULL,
  `answer228` varchar(1) DEFAULT NULL,
  `answer229` varchar(1) DEFAULT NULL,
  `answer230` varchar(1) DEFAULT NULL,
  `answer231` varchar(1) DEFAULT NULL,
  `answer232` varchar(1) DEFAULT NULL,
  `answer233` varchar(1) DEFAULT NULL,
  `answer234` varchar(1) DEFAULT NULL,
  `answer235` varchar(1) DEFAULT NULL,
  `answer236` varchar(1) DEFAULT NULL,
  `answer237` varchar(1) DEFAULT NULL,
  `answer238` varchar(1) DEFAULT NULL,
  `answer239` varchar(1) DEFAULT NULL,
  `answer240` varchar(1) DEFAULT NULL,
  `answer241` varchar(1) DEFAULT NULL,
  `answer242` varchar(1) DEFAULT NULL,
  `answer243` varchar(1) DEFAULT NULL,
  `answer244` varchar(1) DEFAULT NULL,
  `answer245` varchar(1) DEFAULT NULL,
  `answer246` varchar(1) DEFAULT NULL,
  `answer247` varchar(1) DEFAULT NULL,
  `answer248` varchar(1) DEFAULT NULL,
  `answer249` varchar(1) DEFAULT NULL,
  `answer250` varchar(1) DEFAULT NULL,
  `answer251` varchar(1) DEFAULT NULL,
  `answer252` varchar(1) DEFAULT NULL,
  `answer253` varchar(1) DEFAULT NULL,
  `answer254` varchar(1) DEFAULT NULL,
  `answer255` varchar(1) DEFAULT NULL,
  `answer256` varchar(1) DEFAULT NULL,
  `answer257` varchar(1) DEFAULT NULL,
  `answer258` varchar(1) DEFAULT NULL,
  `answer259` varchar(1) DEFAULT NULL,
  `answer260` varchar(1) DEFAULT NULL,
  `answer261` varchar(1) DEFAULT NULL,
  `answer262` varchar(1) DEFAULT NULL,
  `answer263` varchar(1) DEFAULT NULL,
  `answer264` varchar(1) DEFAULT NULL,
  `answer265` varchar(1) DEFAULT NULL,
  `answer266` varchar(1) DEFAULT NULL,
  `answer267` varchar(1) DEFAULT NULL,
  `answer268` varchar(1) DEFAULT NULL,
  `answer269` varchar(1) DEFAULT NULL,
  `answer270` varchar(1) DEFAULT NULL,
  `answer271` varchar(1) DEFAULT NULL,
  `answer272` varchar(1) DEFAULT NULL,
  `answer273` varchar(1) DEFAULT NULL,
  `answer274` varchar(1) DEFAULT NULL,
  `answer275` varchar(1) DEFAULT NULL,
  `answer276` varchar(1) DEFAULT NULL,
  `answer277` varchar(1) DEFAULT NULL,
  `answer278` varchar(1) DEFAULT NULL,
  `answer279` varchar(1) DEFAULT NULL,
  `answer280` varchar(1) DEFAULT NULL,
  `answer281` varchar(1) DEFAULT NULL,
  `answer282` varchar(1) DEFAULT NULL,
  `answer283` varchar(1) DEFAULT NULL,
  `answer284` varchar(1) DEFAULT NULL,
  `answer285` varchar(1) DEFAULT NULL,
  `answer286` varchar(1) DEFAULT NULL,
  `answer287` varchar(1) DEFAULT NULL,
  `answer288` varchar(1) DEFAULT NULL,
  `answer289` varchar(1) DEFAULT NULL,
  `answer290` varchar(1) DEFAULT NULL,
  `answer291` varchar(1) DEFAULT NULL,
  `answer292` varchar(1) DEFAULT NULL,
  `answer293` varchar(1) DEFAULT NULL,
  `answer294` varchar(1) DEFAULT NULL,
  `answer295` varchar(1) DEFAULT NULL,
  `answer296` varchar(1) DEFAULT NULL,
  `answer297` varchar(1) DEFAULT NULL,
  `answer298` varchar(1) DEFAULT NULL,
  `answer299` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `user_id`, `test_name`, `test_date`, `total_questions`, `countdown`, `unanswered_questions`, `answered_questions`, `correct_answers`, `wrong_answers`, `total_marks`, `attempt`, `answer0`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`, `answer11`, `answer12`, `answer13`, `answer14`, `answer15`, `answer16`, `answer17`, `answer18`, `answer19`, `answer20`, `answer21`, `answer22`, `answer23`, `answer24`, `answer25`, `answer26`, `answer27`, `answer28`, `answer29`, `answer30`, `answer31`, `answer32`, `answer33`, `answer34`, `answer35`, `answer36`, `answer37`, `answer38`, `answer39`, `answer40`, `answer41`, `answer42`, `answer43`, `answer44`, `answer45`, `answer46`, `answer47`, `answer48`, `answer49`, `answer50`, `answer51`, `answer52`, `answer53`, `answer54`, `answer55`, `answer56`, `answer57`, `answer58`, `answer59`, `answer60`, `answer61`, `answer62`, `answer63`, `answer64`, `answer65`, `answer66`, `answer67`, `answer68`, `answer69`, `answer70`, `answer71`, `answer72`, `answer73`, `answer74`, `answer75`, `answer76`, `answer77`, `answer78`, `answer79`, `answer80`, `answer81`, `answer82`, `answer83`, `answer84`, `answer85`, `answer86`, `answer87`, `answer88`, `answer89`, `answer90`, `answer91`, `answer92`, `answer93`, `answer94`, `answer95`, `answer96`, `answer97`, `answer98`, `answer99`, `answer100`, `answer101`, `answer102`, `answer103`, `answer104`, `answer105`, `answer106`, `answer107`, `answer108`, `answer109`, `answer110`, `answer111`, `answer112`, `answer113`, `answer114`, `answer115`, `answer116`, `answer117`, `answer118`, `answer119`, `answer120`, `answer121`, `answer122`, `answer123`, `answer124`, `answer125`, `answer126`, `answer127`, `answer128`, `answer129`, `answer130`, `answer131`, `answer132`, `answer133`, `answer134`, `answer135`, `answer136`, `answer137`, `answer138`, `answer139`, `answer140`, `answer141`, `answer142`, `answer143`, `answer144`, `answer145`, `answer146`, `answer147`, `answer148`, `answer149`, `answer150`, `answer151`, `answer152`, `answer153`, `answer154`, `answer155`, `answer156`, `answer157`, `answer158`, `answer159`, `answer160`, `answer161`, `answer162`, `answer163`, `answer164`, `answer165`, `answer166`, `answer167`, `answer168`, `answer169`, `answer170`, `answer171`, `answer172`, `answer173`, `answer174`, `answer175`, `answer176`, `answer177`, `answer178`, `answer179`, `answer180`, `answer181`, `answer182`, `answer183`, `answer184`, `answer185`, `answer186`, `answer187`, `answer188`, `answer189`, `answer190`, `answer191`, `answer192`, `answer193`, `answer194`, `answer195`, `answer196`, `answer197`, `answer198`, `answer199`, `answer200`, `answer201`, `answer202`, `answer203`, `answer204`, `answer205`, `answer206`, `answer207`, `answer208`, `answer209`, `answer210`, `answer211`, `answer212`, `answer213`, `answer214`, `answer215`, `answer216`, `answer217`, `answer218`, `answer219`, `answer220`, `answer221`, `answer222`, `answer223`, `answer224`, `answer225`, `answer226`, `answer227`, `answer228`, `answer229`, `answer230`, `answer231`, `answer232`, `answer233`, `answer234`, `answer235`, `answer236`, `answer237`, `answer238`, `answer239`, `answer240`, `answer241`, `answer242`, `answer243`, `answer244`, `answer245`, `answer246`, `answer247`, `answer248`, `answer249`, `answer250`, `answer251`, `answer252`, `answer253`, `answer254`, `answer255`, `answer256`, `answer257`, `answer258`, `answer259`, `answer260`, `answer261`, `answer262`, `answer263`, `answer264`, `answer265`, `answer266`, `answer267`, `answer268`, `answer269`, `answer270`, `answer271`, `answer272`, `answer273`, `answer274`, `answer275`, `answer276`, `answer277`, `answer278`, `answer279`, `answer280`, `answer281`, `answer282`, `answer283`, `answer284`, `answer285`, `answer286`, `answer287`, `answer288`, `answer289`, `answer290`, `answer291`, `answer292`, `answer293`, `answer294`, `answer295`, `answer296`, `answer297`, `answer298`, `answer299`) VALUES
(414, 'karthifairhawn', 'Chemistry 11 Cyclic', '2021-12-09 11:56:11', 6, 10724, 0, 6, 2, 4, 2, 2, 2, '1', '3', '2', '1', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 'karthifairhawn', 'Chemistry 11 Cyclic', '2021-12-09 11:55:55', 6, 10787, 6, 0, 0, 0, 0, 1, 1, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL DEFAULT 'General',
  `ques_no` int(11) NOT NULL,
  `positive` int(11) NOT NULL,
  `negative` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `hint` varchar(2000) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `solution` varchar(100) NOT NULL,
  `difficulty` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `ques_no`, `positive`, `negative`, `question`, `option1`, `option2`, `option3`, `option4`, `hint`, `answer`, `name`, `solution`, `difficulty`) VALUES
(1, 'General', 1, 4, -1, 'Tell me your answer ?', 'Answer is 6', 'Answer is 8', 'Answer is 10', 'Answer is 3', 'Do addition', '1', 'Physics_21', '1.png', 1),
(2, 'General', 2, 4, -1, 'hello.jpg', '1.png', '3.png', '2.png', '4.png', 'Use Google', '1', 'Physics_21', '3.png', 1),
(3, 'General', 1, 4, -1, '9.png', 'Liquid', 'Solid', 'Gas', 'Opaq', 'Use google', '1', 'English_test', '4.png', 1),
(4, 'General', 3, 4, -1, '9.png', 'Language', 'Project', 'Water', 'Liquid', 'Use Google', '1', 'Physics_21', '1.png', 1),
(5, 'General', 4, 4, -1, 'Why Google is Popular ?', '1.png', '2.png', '3.png', '4.png', 'Use Google', '1', 'Physics_21', '2.png', 1),
(6, 'General', 1, 3, -1, 'Which one of the following is non-crystalline or amorphous?\r\n', 'Diamond', 'Graphite', 'Glass', 'Common Salt', '3', '1', 'Chemistry 11 Cyclic', '', 1),
(7, 'General', 2, 3, -1, 'NaCl typecrystal (with coordination no. 6 : 6) can be converted into CsCl type crystal (with coordination no. 8 : 8) by applying', 'high temperature', ' high pressure', 'high temperature and high pressure', 'low temperature and low pressure Salt', '2', '1', 'Chemistry 11 Cyclic', '3.png', 1),
(8, 'General', 3, 3, -1, 'How many chloride ions are surrounding sodium ion in sodium chloride crystal ?\r\n', '4', ' 8', '6', '12', '3', '1', 'Chemistry 11 Cyclic', '2.png', 1),
(9, 'General', 4, 3, -1, 'In NaCl structure\r\n', 'all octahedral and tetrahedral sites are occupied', ' only octahedral sites are occupied', 'only tetrahedral sites are occupied', 'neither octahedral nor tetrahedral sites are occupied', '2', '1', 'Chemistry 11 Cyclic', '1.png', 1),
(10, 'General', 5, 3, -1, 'In Zinc blende structure\r\n', 'zinc ions occupy half of the tetrahedral sites', 'each Zn2- ion is surrounded by six sulphide ions', 'each S2- ion is surrounded by six Zn2+ ions', 'it has fee structure', '3', '1', 'Chemistry 11 Cyclic', '2.png', 1),
(11, 'General', 6, 3, -1, 'A unit cell of BaCl2 (fluorite structure) is made up of\r\n', 'four Ba2+ ions and four Cl– ions', ' four Ba2- ions and eight Cl– ions', 'eight Ba² ions and four Cl– ions', 'four Ba² ions and six Cl– ions', '2', '1', 'Chemistry 11 Cyclic', '4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `type` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `timeout` int(11) NOT NULL,
  `ans_pdf` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `class`, `subject`, `type`, `name`, `date`, `timeout`, `ans_pdf`) VALUES
(2, '12', 'PCB', 'PCB', 'Physics_21', '2021-04-28 00:00:00', 180, ''),
(3, '11', 'PCB', 'PCB', 'Chemistry 11 Cyclic', '2021-04-28 00:00:00', 10800, ''),
(4, '12', 'PCB', 'PCB', 'English_test', '2021-04-29 00:00:00', 180, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
