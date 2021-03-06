-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 12, 2017 at 08:33 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes_ccny`
--

CREATE TABLE `classes_ccny` (
  `course_prefix` varchar(20) NOT NULL,
  `course_num` int(64) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `days_taught` varchar(20) NOT NULL COMMENT 'MTWTF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses_brooklyn`
--

CREATE TABLE `courses_brooklyn` (
  `Prefix` varchar(10) NOT NULL,
  `course_num` int(10) NOT NULL,
  `course_name` varchar(75) NOT NULL,
  `Credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_brooklyn`
--

INSERT INTO `courses_brooklyn` (`Prefix`, `course_num`, `course_name`, `Credits`) VALUES
('CORC', 1110, 'Classical Cultures', 2),
('CORC', 1120, 'Introduction To Art', 2),
('CORC', 1220, 'Shaping Of The Modern World', 2),
('CORC', 1311, 'Thinking Mathematically', 2),
('CORC', 1312, 'Computing: Nature, Power, and Limits', 2),
('CORC', 1321, 'Biology for Today''s World', 2),
('CORC', 1322, 'Science in Modern Life: Chemistry', 2),
('CORC', 1331, 'Physics: The Simple Laws That Govern the Universe', 2),
('CORC', 1332, 'Geology: The Science of Our World', 2),
('CORC', 3101, 'Literature, Ethnicity, and Immigration', 2),
('CORC', 3102, 'Ideas of Character in the Western Literary Tradition', 2),
('CORC', 3103, 'Italian American Literature and Film', 2),
('CORC', 3104, 'Literature and Film', 2),
('CORC', 3105, 'Philosophical Issues in Literature', 2),
('CORC', 3106, 'Text/Context: Special Topics', 2),
('CORC', 3107, 'The Emergence of the Modern', 2),
('CORC', 3108, 'The Quest for Ethnic, Cultural, and National Identities in Literature', 2),
('CORC', 3109, 'The Self and Society', 2),
('CORC', 3110, 'Literature of the African Diaspora', 2),
('CORC', 3111, 'Classical Jewish Texts Moving Toward Modernity', 2),
('CORC', 3201, 'Art and Archaeology of Late Period Egypt, 1070 B.C.-A.D. 642', 2),
('CORC', 3202, 'Classical Philosophies of India and China', 2),
('CORC', 3203, 'Latin@ Diasporas in the United States', 2),
('CORC', 3204, 'The Global Spanish-Speaking Community From Imperial Conquests to Latino Dia', 2),
('CORC', 3205, 'The Jewish Diaspora', 2),
('CORC', 3206, 'The Development of the Silk Road', 2),
('CORC', 3207, 'The Caribbeanization of North America', 2),
('CORC', 3208, 'Comparative Studies in Cultures and Transformation', 2),
('CORC', 3209, 'After Alexander A Confluence of Cultures', 2),
('CORC', 3210, 'Islamic Perspectives on Modernity, Politics, and Culture', 2),
('CORC', 3211, 'Black Political Identity in a Transnational Context', 2),
('CORC', 3212, 'Mathematics of Non-Western Civilizations', 2),
('CORC', 3301, 'Cosmology', 2),
('CORC', 3302, 'Energy Use and Climate Change', 2),
('CORC', 3303, 'Exploring Robotics', 2),
('CORC', 3304, 'Exploring the Earth System', 2),
('CORC', 3305, 'Exploring Scientific Issues Methodology, Theory, and Ethics in the Sciences', 2),
('CORC', 3306, 'Scientific Revolutions', 2),
('CORC', 3307, 'Studies in Forensic Science', 2),
('CORC', 3308, 'The Making of the Atomic Bomb', 2),
('CORC', 3309, 'Climate Change: Torn Between Myth and Fact', 2),
('CORC', 3310, 'Paradoxes of Reason', 2),
('CORC', 3311, 'Society and the Ocean', 2),
('CORC', 3312, 'Mathematics of Non-Western Civilizations', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses_ccny`
--

CREATE TABLE `courses_ccny` (
  `Prefix` varchar(10) NOT NULL,
  `course_num` int(10) NOT NULL,
  `course_name` varchar(75) NOT NULL,
  `Credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_ccny`
--

INSERT INTO `courses_ccny` (`Prefix`, `course_num`, `course_name`, `Credits`) VALUES
('ENGL', 11000, 'Freshman Composition', 2),
('FIQWS', 10103, 'Composition for WCGI History and Culture', 2),
('FIQWS ', 10105, 'Composition for WCGI Literature', 2),
('FIQWS ', 10108, 'Composition for Individual and Society', 2),
('FIQWS ', 10111, 'Composition for Scientific World', 2),
('FIQWS ', 10113, 'Composition for Creative Expression', 2),
('FIQWS ', 10115, 'Composition for US Experience', 2),
('ENGL', 21001, 'Writing for the Humanities and the Arts', 2),
('ENGL', 21002, 'Writing for the Social Sciences', 2),
('ENGL', 21003, 'Writing for the Sciences', 2),
('ENGL', 21007, 'Writing for Engineers', 2),
('FQUAN', 10050, 'Freshman Quantitative Analysis: Developing a Taste for Numbers ', 2),
('MATH', 15000, 'Mathematics for the Contemporary World', 2),
('MATH', 17300, 'Introduction to Probability and Statistics', 2),
('BIO', 10004, 'Biology: Human Biology', 2),
('CHEM', 11000, 'Exploring Chemistry: Energy and Environment', 2),
('EAS', 10400, 'Perspectives on Global Warming', 2),
('AES', 23202, 'Survey of World Architecture I', 2),
('ART', 10000, 'Introduction to Visual Arts of the World', 2),
('MUS', 10100, 'Introduction to Music', 2),
('MUS', 10200, 'Introduction to World Music', 2),
('MUS', 14500, 'Introduction to Jazz', 2),
('THTR', 13100, 'Introduction to Theatre', 2),
('THTR', 21100, 'Theatre History 1', 2),
('THTR', 21200, 'Theatre History 2', 2),
('THTR', 21300, 'Theatre History 3', 2),
('WHUM', 10100, 'World Humanities I', 2),
('WHUM', 10200, 'World Humanities II', 2),
('WHUM', 10312, 'World Humanities: Modern World Literature', 2),
('ANTH', 10100, 'General Anthropology', 2),
('ASIA', 10100, 'Asia and its Peoples', 2),
('ASIA', 20200, 'Contemporary Asia', 2),
('ASIA', 20500, 'Contemporary China', 2),
('BLST', 10200, 'African Heritage: Caribbean-Brazilian Experience', 2),
('WCIV', 10100, 'World Civilizations I: Prehistory to 1500 AD', 2),
('WCIV', 10200, 'World Civilizations II:1500 AD to present', 2),
('HIST', 20400, 'Early Modern Europe', 2),
('HIST', 20600, 'Modern Europe', 2),
('ECO', 10250, 'Principles of Microeconomics', 2),
('JWST', 10411, 'Psychology of Religion', 2),
('PSY', 10200, 'Psychology in Modern World', 2),
('SOC', 10500, 'Individual, Group and Society: An Introduction to Sociology', 2),
('WS', 10000, 'Women?s/Gender Roles in Contemporary Society', 2),
('ASTR', 30500, 'Methods in Astronomy', 2),
('EAS ', 10000, 'The Dynamic Earth', 2),
('MED', 10000, 'Introduction to Drug Abuse and Addiction', 2),
('PSC', 10100, 'American Government and Politics', 2),
('USSO', 10100, 'US Society', 2),
('HIST', 24100, 'The United States: From Its Origins to 1877', 2),
('HIST', 24100, 'The United States since 1865', 2),
('PHIL', 10200, 'Intro to Philosophy', 2),
('PHIL', 20100, 'Logical Reasoning', 2),
('PHIL', 30500, 'History of Philosophy I: Ancient Philosophy', 2),
('PHIL', 30800, 'Ethics', 2),
('PHIL', 32200, 'Philosophy of Science', 2),
('PHIL', 34905, 'Bioethics', 2),
('PSC', 12400, 'Political Ideas and Issues', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses_hunter`
--

CREATE TABLE `courses_hunter` (
  `Prefix` varchar(10) NOT NULL,
  `course_num` int(10) NOT NULL,
  `course_name` varchar(75) NOT NULL,
  `Credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_hunter`
--

INSERT INTO `courses_hunter` (`Prefix`, `course_num`, `course_name`, `Credits`) VALUES
('AFPRL', 120, 'Introduction to Caribbean History: 1900 - Present', 2),
('AFPRL', 182, 'Culture and Ethnic Identity', 2),
('AFPRL', 201, 'African History from Human Origins to 1600 CE', 2),
('AFPRL', 202, 'African History Since 1600 CE', 2),
('AFPRL', 209, ' Introduction to Caribbean History to 1900', 2),
('AFPRL', 222, 'African Civilization\r', 2),
('AFPRL', 243, 'Puerto Rican Culture', 2),
('ANTHC', 126, 'Introduction to Prehistoric Archaeology', 2),
('ANTHC', 151, 'Introduction to Linguistics', 2),
('ANTHP', 101, 'Human Evolution', 2),
('ANTHP', 101, 'Human Evolution', 2),
('ANTHP', 102, 'Human Variation', 2),
('ANTHP', 102, 'Human Variation', 2),
('ANTHP', 105, 'The Human Species', 2),
('ARB', 101, 'Beginning Arabic I', 2),
('ARB', 148, 'Beginning Arabic for Heritage Speakers', 2),
('ARB', 250, 'The Arab Novel', 2),
('ARB', 251, 'Arab Cinema', 2),
('ARB', 252, 'Literatures from the Islamic World ', 2),
('ARB', 253, 'Literatures and Cultures of Muslim Spain ', 2),
('ARTH', 111, 'Introduction to History of Art', 2),
('ASTRO', 102, 'Laboratory Explorations in Astronomy', 2),
('BIOL', 105, 'Introduction to Genome Biology', 2),
('BIOL', 105, 'Introduction to Genome Biology', 2),
('BIOL(STEM)', 100, 'Principles of Biology I', 2),
('BIOL(STEM)', 100, 'Principles of Biology I', 2),
('BIOL(STEM)', 102, 'Principles of Biology II', 2),
('BIOL(STEM)', 102, 'Principles of Biology II', 2),
('BIOL(STEM)', 125, 'Human Biology', 2),
('BIOL(STEM)', 125, 'Human Biology', 2),
('BIOL(STEM)', 150, 'Forensic Biology', 2),
('BIOL(STEM)', 150, 'Forensic Biology', 2),
('CHEM', 101, 'Inquires into the nature of matter', 2),
('CHEM', 101, 'Inquires into the nature of matter', 2),
('CHEM(STEM)', 100, 'Essentials of General Chemisry Lecture', 2),
('CHEM(STEM)', 100, 'Essentials of General Chemisry Lecture', 2),
('CHEM(STEM)', 102, 'General Chemistry I', 2),
('CHEM(STEM)', 102, 'General Chemistry I', 2),
('CHEM(STEM)', 103, 'General Chemistry Laboratory I', 2),
('CHEM(STEM)', 103, 'General Chemistry Laboratory I', 2),
('CHEM(STEM)', 104, 'General Chemistry II', 2),
('CHEM(STEM)', 104, 'General Chemistry II', 2),
('CHEM(STEM)', 105, 'General Chemistry Laboratory II', 2),
('CHEM(STEM)', 105, 'General Chemistry Laboratory II', 2),
('CHEM(STEM)', 106, 'General Chemistry Laboratory ', 2),
('CHEM(STEM)', 106, 'General Chemistry Laboratory ', 2),
('CHEM(STEM)', 111, 'Chemical Principles', 2),
('CHEM(STEM)', 111, 'Chemical Principles', 2),
('CHEM(STEM)', 112, 'Thermodynamics', 2),
('CHEM(STEM)', 112, 'Thermodynamics', 2),
('CHEM(STEM)', 120, 'Organic Chemistry Lecture', 2),
('CHEM(STEM)', 120, 'Organic Chemistry Lecture', 2),
('CHEM(STEM)', 121, 'Organic Chemistry Laboratory', 2),
('CHEM(STEM)', 121, 'Organic Chemistry Laboratory', 2),
('CHIN', 101, 'Elementary Chinese I', 2),
('CHIN', 111, 'Chinese Culture I', 2),
('CHIN', 112, 'Chinese Culture II', 2),
('CHIN', 251, 'Topics in Chinese Literature in English Translation ', 2),
('CLA', 101, 'Classical Mythology\r', 2),
('CLA', 110, 'The Greek and Latin Roots of English', 2),
('CLA', 201, 'Greek Civilization ', 2),
('CLA', 203, 'Roman Civilization ', 2),
('CLA', 204, 'Introduction to Classical, and Egyptian Archaeology (', 2),
('CLA', 250, 'Greek and Roman Tragedy', 2),
('CLA', 251, 'Ancient Comedy', 2),
('CLA', 253, 'Homer and Vergil ', 2),
('CORC', 1110, 'Classical Cultures', 2),
('CORC', 1120, 'Introduction To Art', 2),
('CORC', 1220, 'Shaping Of The Modern World', 2),
('CORC', 1311, 'Thinking Mathematically', 2),
('CORC', 1312, 'Computing: Nature, Power, and Limits', 2),
('CORC', 1321, 'Biology for Today''s World', 2),
('CORC', 1322, 'Science in Modern Life: Chemistry', 2),
('CORC', 1331, 'Physics: The Simple Laws That Govern the Universe', 2),
('CORC', 1332, 'Geology: The Science of Our World', 2),
('CORC', 3101, 'Literature, Ethnicity, and Immigration', 2),
('CORC', 3102, 'Ideas of Character in the Western Literary Tradition', 2),
('CORC', 3103, 'Italian American Literature and Film', 2),
('CORC', 3104, 'Literature and Film', 2),
('CORC', 3105, 'Philosophical Issues in Literature', 2),
('CORC', 3106, 'Text/Context: Special Topics', 2),
('CORC', 3107, 'The Emergence of the Modern', 2),
('CORC', 3108, 'The Quest for Ethnic, Cultural, and National Identities in Literature', 2),
('CORC', 3109, 'The Self and Society', 2),
('CORC', 3110, 'Literature of the African Diaspora', 2),
('CORC', 3111, 'Classical Jewish Texts Moving Toward Modernity', 2),
('CORC', 3201, 'Art and Archaeology of Late Period Egypt, 1070 B.C.-A.D. 642', 2),
('CORC', 3202, 'Classical Philosophies of India and China', 2),
('CORC', 3203, 'Latin@ Diasporas in the United States', 2),
('CORC', 3204, 'The Global Spanish-Speaking Community From Imperial Conquests to Latino Dia', 2),
('CORC', 3205, 'The Jewish Diaspora', 2),
('CORC', 3206, 'The Development of the Silk Road', 2),
('CORC', 3207, 'The Caribbeanization of North America', 2),
('CORC', 3208, 'Comparative Studies in Cultures and Transformation', 2),
('CORC', 3209, 'After Alexander A Confluence of Cultures', 2),
('CORC', 3210, 'Islamic Perspectives on Modernity, Politics, and Culture', 2),
('CORC', 3211, 'Black Political Identity in a Transnational Context', 2),
('CORC', 3212, 'Mathematics of Non-Western Civilizations', 2),
('CORC', 3301, 'Cosmology', 2),
('CORC', 3302, 'Energy Use and Climate Change', 2),
('CORC', 3303, 'Exploring Robotics', 2),
('CORC', 3304, 'Exploring the Earth System', 2),
('CORC', 3305, 'Exploring Scientific Issues Methodology, Theory, and Ethics in the Sciences', 2),
('CORC', 3306, 'Scientific Revolutions', 2),
('CORC', 3307, 'Studies in Forensic Science', 2),
('CORC', 3308, 'The Making of the Atomic Bomb', 2),
('CORC', 3309, 'Climate Change: Torn Between Myth and Fact', 2),
('CORC', 3310, 'Paradoxes of Reason', 2),
('CORC', 3311, 'Society and the Ocean', 2),
('CORC', 3312, 'Mathematics of Non-Western Civilizations', 2),
('CSCI', 120, 'Introduction to Computers', 2),
('CSCI', 121, 'Computers and money: Quantitative Reasoning in Context', 2),
('CSCI', 127, 'Introduction to Computer Science', 2),
('CSCI', 132, 'Practical UNIX and Programming, with Lab', 2),
('CSCI', 133, 'Programming for Everyone', 2),
('DAN', 102, 'Dance', 2),
('DAN', 232, 'Dance History', 2),
('ECO', 221, 'Economic Statistics', 2),
('ENGL', 120, 'Expository Wrtiting', 2),
('ENGL', 220, 'Introduction to writing about literature', 2),
('ENGL', 250, 'Topics in Literature', 2),
('ENGL', 251, 'Topics in Literature', 2),
('FILM', 101, 'Introduction to Cinema', 2),
('FREN', 101, 'Elementary French I', 2),
('FREN', 241, 'Early French Civilization: From Gothic to Revolution', 2),
('FREN', 242, 'Modern French Civilization: From Revolution to Present', 2),
('GEOL', 101, 'Introduction to geology', 2),
('GEOL', 101, 'Introduction to geology', 2),
('GERMN', 101, 'Elementary German I', 2),
('GERMN', 241, 'German Fairy Tails', 2),
('GRK', 101, 'Beginning Greek', 2),
('HEBR', 101, 'Elementary Hebrew I', 2),
('HEBR', 105, 'Elementary Biblical Hebrew I', 2),
('HEBR', 211, 'Masterpieces of Medieval Hebraic Literature in Translation ', 2),
('HEBR', 221, 'Modern Israeli Culture\r', 2),
('HEBR', 222, 'Introduction to Jewish Texts and Writings', 2),
('HEBR', 240, 'Introduction to the Old Testament', 2),
('HEBR', 259, 'Old Testament Religion', 2),
('HEBR', 290, 'Biblical Archaeology', 2),
('HEBR', 292, 'The Hebrew Prophets\r', 2),
('HEBR', 295, 'Ancient Hebrew Law', 2),
('HIST', 111, 'World History to 1500', 2),
('HIST', 112, 'World History from 1500 to the Present', 2),
('HIST', 121, 'Early Modern Europe 1500 to 1815', 2),
('HIST', 122, '19th and 20th Century Europe ', 2),
('HIST', 151, 'The United States from the Colonial Era to the Civil War', 2),
('HIST', 152, 'The United States from the Colonial Era to the Civil War ', 2),
('HIST', 208, 'History of the Jews', 2),
('HIST', 277, 'East Asia to 1600', 2),
('HIST', 278, 'East Asia, 1600 to the Present', 2),
('HUM', 110, 'Map of Knowledge ', 2),
('HUM', 201, 'Explorations in the Arts', 2),
('ITAL', 101, 'Elementary Italian I', 2),
('ITAL', 280, 'The Italian Renaissance: An Introduction', 2),
('JAP', 101, 'Elementary Japanese I', 2),
('JPN', 251, 'Japanese Culture Before 1600', 2),
('LAT', 101, 'Beginning Latin', 2),
('MATH', 100, 'Basic Strusctures of Mathematics', 2),
('MATH', 102, 'Mathmatics and everyday life', 2),
('MATH(STEM)', 104, 'Mathmatics for elemantary education I', 2),
('MATH(STEM)', 125, 'Precalculus ', 2),
('MATH(STEM)', 150, 'Calculus with Analytic Geometry I', 2),
('MATH(STEM)', 155, 'Calculus with Analytic Geometry II', 2),
('MATH(STEM)', 250, 'Calculus with Analytic Geometry III', 2),
('MEDIA', 180, 'Introduction to Media Studies', 2),
('MHC', 100, 'The Arts of NY', 2),
('MHC', 200, 'MHC Seminar 3: Science and Technology (W)', 2),
('MUSHL', 101, 'INtroduction to Music', 2),
('MUSHL', 107, 'The World of Music', 2),
('MUSTH', 101, 'Music Theory', 2),
('PGEOP(STEM', 130, 'Weather and Climate', 2),
('PGEOP(STEM', 130, 'Weather and Climate', 2),
('PHILO', 101, 'Introduction to Philosophy', 2),
('PHILO', 104, 'Introduction to Ethics', 2),
('PHILO', 204, 'Great Philosophers', 2),
('PHYS', 101, 'Basic concepts of physics', 2),
('PHYS', 101, 'Basic concepts of physics', 2),
('PHYS', 110, ' General Physics: Introductory Course in Mechanics, and Heat', 2),
('PHYS', 110, ' General Physics: Introductory Course in Mechanics, and Heat', 2),
('PHYS', 111, ' General Physics: Introductory Course in Mechanics, and Heat', 2),
('PHYS', 111, ' General Physics: Introductory Course in Mechanics, and Heat', 2),
('PHYS', 120, 'General Physics: Introductory Course in Electricity ', 2),
('PHYS', 120, 'General Physics: Introductory Course in Electricity ', 2),
('PHYS', 121, 'General Physics: Introductory Course in Electricity ', 2),
('PHYS', 121, 'General Physics: Introductory Course in Electricity ', 2),
('POLSC', 100, 'Introduction to Politics: Democracy, Anarchy and State', 2),
('POLSC', 110, 'American Government: A Historical Introduction ', 2),
('POLSC', 250, 'Comparing Countries', 2),
('PRL', 238, 'Introduction to the literature of the African Diaspora', 2),
('REL', 110, 'Nature of Religion ', 2),
('REL', 111, 'Approaches to Religion ', 2),
('REL', 204, 'Religious Experience ', 2),
('REL', 205, 'Faith and Disbelief ', 2),
('REL', 206, 'Ideas of God in Contemporary Western Thought ', 2),
('REL', 207, 'Religious Sources for Morality ', 2),
('REL', 208, 'Religion and Social Justice ', 2),
('REL', 209, 'Religion and Human Rights ', 2),
('REL', 251, 'Asian Religions ', 2),
('REL', 252, 'Ancient Near Eastern Religions ', 2),
('REL', 253, 'Abrahamic Religions ', 2),
('REL', 254, 'Tribal Religions: From Australia to the Americas ', 2),
('REL', 255, 'Religions of Two Gods ', 2),
('REL', 256, 'Afro-Caribbean Religions ', 2),
('REL', 257, 'Religions of Ancient Central and South America ', 2),
('REL', 258, ' Religions of Ancient Europe ', 2),
('REL', 270, 'Religion and Psychology ', 2),
('RUSS', 101, 'Elementary Russian', 2),
('RUSS', 157, 'The Age of the Great Masters', 2),
('RUSS', 250, '19th Century Russian Literature in English Translation ', 2),
('RUSS', 252, 'Modern Russian Literature in English Translation ', 2),
('RUSS', 253, 'Russian Theater', 2),
('RUSS', 254, 'The Silver Age of Russian Literature in English Translation ', 2),
('RUSS', 255, 'Russian Folklore, in Translation ', 2),
('RUSS', 270, 'Soviet and Post-Soviet Cinema and Society ', 2),
('RUSS', 295, 'The Vampire in Lore', 2),
('SPAN', 101, 'Elementary Spanish I', 2),
('SPAN', 105, 'Basic Reading and Writing for Native Speakers of Spanish', 2),
('SPAN', 241, 'Civilization of Spain, in English', 2),
('STAT', 113, 'Elmentary Probability and Statistcs', 2),
('STAT', 212, 'Discrete Probability ', 2),
('STAT(STEM)', 213, 'Introduction to Applied Statistics', 2),
('THEA', 101, 'Introduction to Theatre', 2),
('THEA', 211, 'World Theatre I', 2),
('THEA', 212, 'World Theatre II', 2),
('THEA', 213, 'World Theatre III', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses_queens`
--

CREATE TABLE `courses_queens` (
  `Prefix` varchar(10) NOT NULL,
  `course_num` int(10) NOT NULL,
  `course_name` varchar(75) NOT NULL,
  `Credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_queens`
--

INSERT INTO `courses_queens` (`Prefix`, `course_num`, `course_name`, `Credits`) VALUES
('ACCT', 261, 'Business Law I', 2),
('ACCT', 261, 'Business Law L', 2),
('ANTH', 101, 'Introduction to Cultural Anthropology', 2),
('ANTH', 102, 'Introduction to Human Evolution', 2),
('ANTH', 102, 'Introduction to Human Evolution', 2),
('ANTH', 103, 'Introduction to Archaeology', 2),
('ANTH', 103, 'Introduction to Archaeology', 2),
('ANTH', 104, 'Language, Culture, and Society', 2),
('ARTH', 1, 'Introduction to Art', 2),
('ARTH', 102, 'History of Western Art II', 2),
('ARTH', 110, 'Survey of Ancient Art', 2),
('ARTH', 113, 'Survey of Modern Art', 2),
('ARTH', 114, 'Survey of Asian Art', 2),
('ARTH', 220, 'Renaissance Art and the Birth of Modernity', 2),
('ARTH', 256, 'Contemporary Art Practices', 2),
('ARTH', 258, 'History of Photography', 2),
('ARTS', 333, 'Introduction to Socially Engaged Art Practice', 2),
('ASTR', 1, 'General Astronomy', 2),
('ASTR', 1, 'General Astronomy', 2),
('ASTR', 2, 'General Astronomy With Laboratory', 2),
('ASTR', 3, 'Introductory Astronomy With Laboratory', 2),
('ASTR', 3, 'Introductory Astronomy With Laboratory', 2),
('BIOL', 105, 'General Biology I', 2),
('BIOL', 105, 'General Biology I', 2),
('BIOL', 105, 'General Biology I', 2),
('BIOL', 105, 'General Biology: Physiology and Cell Biology', 2),
('BIOL', 105, 'General Biology: Physiology and Cell Biology', 2),
('BIOL', 106, 'General Biology II', 2),
('BIOL', 106, 'General Biology II', 2),
('BIOL', 106, 'General Biology II', 2),
('BIOL', 106, 'General Biology: Life-Forms and Ecosystems', 2),
('BIOL', 106, 'General Biology: Life-Forms and Ecosystems', 2),
('BIOL', 11, 'Introduction to College Biology', 2),
('BIOL', 11, 'Introduction to College Biology', 2),
('BIOL', 11, 'Introduction to College Biology', 2),
('BIOL', 13, 'Writing in the Sciences - Evolutionary Themes', 2),
('BIOL', 13, 'Writing in the Sciences- Life Science Themes', 2),
('BIOL', 14, 'Introduction to Biology and Society', 2),
('BIOL', 14, 'Introduction to Biology and Society', 2),
('BIOL', 22, 'Introduction to Human Physiology', 2),
('BIOL', 24, 'Biology and Society', 2),
('BIOL', 25, 'Biological Evolution', 2),
('BIOL', 25, 'Biological Evolution', 2),
('BIOL', 34, 'Genomics Research Experience I', 2),
('BIOL', 35, 'Genomics Research Experience II', 2),
('CHEM', 1011, 'Basic Chemistry Laboratory', 2),
('CHEM', 1011, 'Basic Chemistry Laboratory', 2),
('CHEM', 1011, 'Basic Chemistry Laboratory', 2),
('CHEM', 1013, 'Basic Chemistry', 2),
('CHEM', 1013, 'Basic Chemistry', 2),
('CHEM', 1013, 'Basic Chemistry', 2),
('CHEM', 1021, 'Basic Organic Chemistry Laboratory', 2),
('CHEM', 1021, 'Basic Organic Chemistry Laboratory', 2),
('CHEM', 1021, 'Basic Organic Chemistry Laboratory', 2),
('CHEM', 1023, 'Basic Organic Chemistry', 2),
('CHEM', 1023, 'Basic Organic Chemistry', 2),
('CHEM', 1023, 'Basic Organic Chemistry', 2),
('CHEM', 1031, 'Basic Biochemistry Laboratory', 2),
('CHEM', 1031, 'Basic Biochemistry Laboratory', 2),
('CHEM', 1031, 'Basic Biochemistry Laboratory', 2),
('CHEM', 1033, 'Basic Biochemistry', 2),
('CHEM', 1033, 'Basic Biochemistry', 2),
('CHEM', 1033, 'Basic Biochemistry', 2),
('CHEM', 1131, 'Introduction to Chemical Techniques', 2),
('CHEM', 1131, 'Introduction to Chemical Techniques', 2),
('CHEM', 1131, 'Introduction to Chemical Techniques', 2),
('CHEM', 1134, 'General Chemistry I', 2),
('CHEM', 1134, 'General Chemistry I', 2),
('CHEM', 1134, 'General Chemistry I', 2),
('CHEM', 1134, 'General Chemistry L', 2),
('CHEM', 1134, 'General Chemistry L', 2),
('CHEM', 1141, 'Quantitative and Qualitative Analysis', 2),
('CHEM', 1141, 'Quantitative and Qualitative Analysis', 2),
('CHEM', 1141, 'Quantitative and Qualitative Analysis', 2),
('CHEM', 1144, 'General Chemistry II', 2),
('CHEM', 1144, 'General Chemistry II', 2),
('CHEM', 1144, 'General Chemistry II', 2),
('CHEM', 163, 'Chemistry in Modern Society', 2),
('CHEM', 163, 'Chemistry in Modern Society', 2),
('CHEM', 2511, 'Organic Chemistry Laboratory I', 2),
('CHEM', 2511, 'Organic Chemistry Laboratory I', 2),
('CHEM', 2511, 'Organic Chemistry Laboratory I', 2),
('CHEM', 2514, 'Organic Chemistry I', 2),
('CHEM', 2514, 'Organic Chemistry I', 2),
('CHEM', 2514, 'Organic Chemistry I', 2),
('CLAS', 150, 'Greek and Latin Classics in Translation', 2),
('CMLIT', 100, 'Writing About World Literature', 2),
('CMLIT', 101, 'Global Literatures I', 2),
('CMLIT', 101, 'Global Literatures I', 2),
('CMLIT', 102, 'Great Books I', 2),
('CMLIT', 103, 'Global Literatures II', 2),
('CMLIT', 104, 'Great Books II', 2),
('CMLIT', 205, 'Modern Poetry', 2),
('CMLIT', 206, 'Literature and Conflict', 2),
('CMLIT', 208, 'Literature and Society in North Africa and the Middle East', 2),
('CMLIT', 210, 'The Early Modern Atlantic World', 2),
('CMLIT', 215, 'Topics in Modern Literature', 2),
('CMLIT', 225, 'Literature and Anthropology', 2),
('CMLIT', 229, 'Women in Modern World Literature', 2),
('CMLIT', 230, 'African Literatures', 2),
('CMLIT', 231, 'African Literatures in a World Context', 2),
('CMLIT', 242, 'Francophone Literature in a World Context', 2),
('CSCI', 100, 'Information and Intelligence', 2),
('CSCI', 100, 'Information and Intelligence', 2),
('CSCI', 111, 'Introduction to Algorithmic Problem - Solving', 2),
('CSCI', 112, 'Introduction to Algorithmic Problem Solving in Java', 2),
('CSCI', 12, 'Introduction to Computers and Computation', 2),
('CSCI', 211, 'Object-Oriented Programming in C++', 2),
('CSCI', 212, 'Object-Oriented Programming in Java', 2),
('CSCI', 48, 'Spreadsheet Programming', 2),
('DANCE', 150, 'Introduction to Dance', 2),
('DANCE', 151, 'Dance and Culture: Dancing Values', 2),
('DRAM', 1, 'Introduction to Drama and Theatre', 2),
('DRAM', 100, 'Introduction to Acting', 2),
('DRAM', 111, 'Introduction to Design for the Theater', 2),
('DRAM', 111, 'Introduction to Design for the Theatre', 2),
('DRAM', 130, 'Writing About Performance', 2),
('EAST', 250, 'Modern Chinese Fiction in Translation', 2),
('EAST', 251, 'Modern Japanese Fiction in Translation', 2),
('ECON', 100, 'Economics and Society', 2),
('ECON', 101, 'Introduction to Macroeconomics', 2),
('ECON', 102, 'Introduction to Microeconomics', 2),
('EDUCN', 105, 'Education in Global Times: Radical to Conservative Agendas', 2),
('ENGL', 110, 'College Writing I', 2),
('ENGL', 130, 'Writing About Literature in English', 2),
('ENGL', 151, 'Works of English Literature: A Course for Nonmajors', 2),
('ENGL', 152, 'Works of American Literature: A Course for Nonmajors', 2),
('ENGL', 153, 'Introduction to the Bible', 2),
('ENGL', 157, 'Great Works of Global Literatures in English', 2),
('ENGL', 157, 'Great Works of Global Literatures in English', 2),
('ENGL', 160, 'Introduction to Narrative', 2),
('ENGL', 162, 'Literature and Place', 2),
('ENGL', 165, 'Introduction to Poetry', 2),
('ENGL', 165, 'Introduction to Poetry', 2),
('ENGL', 251, 'British Literature Survey I', 2),
('ENGL', 252, 'British Literature Survey II', 2),
('ENGL', 253, 'American Literature Survey I', 2),
('ENGL', 254, 'American Literature Survey II', 2),
('ENGL', 255, 'Global Literatures in English', 2),
('ENGL', 311, 'Literature of the Anglo-Saxon Period', 2),
('ENGL', 312, 'Medieval Literature, 1100-1500', 2),
('ENGL', 313, 'The Arthurian Tradition', 2),
('ENGL', 320, 'Literature of the English Renaissance', 2),
('ENGL', 321, 'Literature of the Seventeenth Century', 2),
('ENGL', 322, 'Literature of the Restoration and Eighteenth Century', 2),
('ENGL', 330, 'Chaucer: The Early Works', 2),
('ENGL', 331, 'Chaucer: The Canterbury Tales', 2),
('ENGL', 332, 'Shakespeare I', 2),
('ENGL', 333, 'Shakespeare II', 2),
('ENGL', 334, 'Milton', 2),
('ENGL', 340, 'English Drama From Its Beginnings to 1642', 2),
('ENGL', 344, 'The English Novel I', 2),
('ENGL', 349, 'Colonial American Literature', 2),
('ENGL', 350, 'Early American Literature', 2),
('ENGL', 350, 'Topics in Early American Literature', 2),
('ENGL', 351, 'Nineteenth-Century Us Literature', 2),
('ENGL', 352, 'American Novel to 1918', 2),
('ENGL', 352, 'Late-Nineteenth- and Early-Twentieth-Century Us Literature', 2),
('ENGL', 354, 'African-American Literature I', 2),
('ENGL', 354, 'African-American Literature I (1619-1930)', 2),
('ENGL', 355, 'African-American Literature II', 2),
('ENGL', 355, 'African-American Literature II (1930 to the Present)', 2),
('ENGL', 356, 'Literature of the American Indians', 2),
('ENGL', 358, 'Nineteenth-Century American Transcendentalism', 2),
('ENGL', 359, 'Regionalism, Realism, and Naturalism in American Literature', 2),
('ENGL', 360, 'Topics in Latino/latina Literature in English', 2),
('ENGL', 363, 'Studies in Global Literatures in English', 2),
('ENGL', 364, 'Studies in African American Drama, Film, and Literature', 2),
('ENGL', 364, 'Studies in African Drama, Film, and Literature', 2),
('ENGL', 366, 'Introduction to Irish Literature', 2),
('ENGL', 367, 'Modern Irish Literature', 2),
('ENGL', 368, 'Irish Writers', 2),
('ENGL', 369, 'Asian-American Literature', 2),
('ENGL', 377, 'Modern South Asian Literature', 2),
('ENGL', 378, 'Topics in Caribbean Literature', 2),
('ENGL', 379, 'Topics in Transnational/postcoloinial Literature', 2),
('ENCSI', 100, 'Our Planet in the 21st Century: Challenges to Humanity', 2),
('ENCSI', 100, 'Our Planet in the 21st Century: Challenges to Humanity', 2),
('ENCSI', 100, 'Our Planet in the 21st Century: Challenges to Humanity', 2),
('ENCSI', 112, 'Our Changing Planet', 2),
('ENCSI', 112, 'Our Changing Planet', 2),
('ENCSI', 99, 'A Practical Guide to Environmental Choices', 2),
('ENCSI', 99, 'A Practical Guide to Environmental Choices', 2),
('EURO', 120, 'Writing About European Literature and Culture', 2),
('FNES', 101, 'The Science of Foods', 2),
('FNES', 101, 'The Science of Foods', 2),
('FNES', 101, 'The Science of Foods', 2),
('FNES', 163, 'General Nutrition', 2),
('FNES', 163, 'General Nutrition', 2),
('FREN', 203, 'Intermediate French I', 2),
('FREN', 204, 'French Composition and Grammar I', 2),
('FREN', 205, 'Introduction to Literary Analysis', 2),
('FREN', 205, 'Introduction to Literary Analysis', 2),
('FREN', 223, 'Advanced Conversation and Phonetics', 2),
('FREN', 370, 'Topics in Francophone Literature', 2),
('FREN', 370, 'Topics in Francophone Literature', 2),
('FREN', 41, 'Masterpieces of French Literature in Translation', 2),
('FREN', 42, 'French and Francophone Literatures in Translation', 2),
('FREN', 45, 'French and Francophone Cultures and Thought', 2),
('FREN', 45, 'French Civilization', 2),
('GEOL', 101, 'Physical Geology', 2),
('GEOL', 101, 'Physical Geology', 2),
('GEOL', 101, 'Physical Geology', 2),
('GEOL', 102, 'Historical Geology', 2),
('GEOL', 102, 'Historical Geology', 2),
('GEOL', 102, 'Historical Geology', 2),
('GEOL', 11, 'Survey of Atmospheric Science', 2),
('GEOL', 12, 'Natural Disasters', 2),
('GEOL', 12, 'Natural Disasters', 2),
('GEOL', 16, 'Earthquakes, Volcanoes, and Moving Continents', 2),
('GEOL', 16, 'Earthquakes, Volcanoes, and Moving Continents', 2),
('GEOL', 25, 'Natural Resources and the Environment', 2),
('GEOL', 25, 'Natural Resources and the Environment', 2),
('GEOL', 77, 'Weather, Climate, and Climate Change', 2),
('GEOL', 77, 'Weather, Climate, and Climate Change', 2),
('GEOL', 8, 'Introduction to Oceanography', 2),
('GEOL', 9, 'Environmental Issues and Answers', 2),
('GEOL', 9, 'Environmental Issues and Answers', 2),
('GEOL', 99, 'Planet Earth: Resources (And Hazards) for the 21st Century', 2),
('GEOL', 99, 'Planet Earth: Resources (And Hazards) for the 21st Century', 2),
('GEOL', 99, 'Planet Earth: Resources and (Hazards) for the 21st Century', 2),
('GERM', 204, 'Intermediate German II', 2),
('GERM', 223, 'Conversation, Level I', 2),
('GERM', 41, 'Masterpieces of German', 2),
('GERM', 42, 'German Literature in Translation', 2),
('GRKMD', 203, 'Intermediate Modern Greek I', 2),
('GRKMD', 204, 'Intermediate Modern Greek II', 2),
('GRKMD', 223, 'Modern Greek Conversation', 2),
('GRKMD', 250, 'Modern Greek Cinema', 2),
('GRKMD', 250, 'Modern Greek Film and Media', 2),
('GRKMD', 335, 'Studies in Modern Greek Literature', 2),
('GRKMD', 41, 'Modern Greek Literature in Translation', 2),
('HEBRW', 150, 'Modern Hebrew Literature in Translation', 2),
('HIST', 101, 'Early Modern Europe, 1500-1815', 2),
('HIST', 102, 'Modern Europe, 1815 to the Present', 2),
('HIST', 160, 'Global History: World', 2),
('HIST', 160, 'Vt: Topics in Global History', 2),
('HIST', 166, 'Vt: History and Memory', 2),
('HIST', 190, 'Writing and History', 2),
('HIST', 229, 'Politics and Religion in Early Modern England and Ireland', 2),
('HIST', 255, 'Vt: Transformational Moments in the Arab/israeli Conflict', 2),
('HNRS', 125, 'The Arts in New York City', 2),
('HNRS', 225, 'Science and Technology in New York City', 2),
('HNRS', 225, 'Science and Technology in New York City', 2),
('HNRS', 226, 'Shaping the Future of New York City', 2),
('HSS', 200, 'Social Sciences and Society', 2),
('HTH', 102, 'Freshman Humanities Colloquium', 2),
('ITAL', 203, 'Intermediate Italian I', 2),
('ITAL', 204, 'Intermediate Italian II', 2),
('ITAL', 40, 'Masterpieces of Italian Literature in Translation', 2),
('ITAL', 41, 'Italian Literature in Translation', 2),
('ITAL', 45, 'Ital Renaissan 2', 2),
('ITAL', 45, 'Italian Civilization', 2),
('ITAL', 45, 'Italian Culture and Thought', 2),
('KOR', 305, 'Advanced Korean I', 2),
('KOR', 306, 'Advanced Korean II', 2),
('LCD', 102, 'Analyzing Language', 2),
('LCD', 102, 'Analyzing Language', 2),
('LCD', 104, 'Language, Culture, and Society', 2),
('LIBR', 170, 'Writing and Library Research Methods', 2),
('LIBR', 170, 'Writing With Research: Fan Cultures', 2),
('MATH', 110, 'Mathematical Literacy - an Introduction to College Mathematics', 2),
('MATH', 114, 'Elementary Probability and Statistics', 2),
('MATH', 119, 'Mathematics for Elementary School Teachers', 2),
('MATH', 120, 'Discrete Mathematics for Computer Science', 2),
('MATH', 122, 'Precalculus', 2),
('MATH', 131, 'Calculus With Applications to the Social Sciences I', 2),
('MATH', 141, 'Calculus/differentiation', 2),
('MATH', 142, 'Calculus/integration', 2),
('MATH', 143, 'Calculus/infinite Series', 2),
('MATH', 151, 'Calculus/differentiation & Integration', 2),
('MATH', 152, 'Calculus/integration & Infinite Series', 2),
('MATH', 157, 'Honors Calculus I', 2),
('MATH', 158, 'Honors Calculus II', 2),
('MATH', 201, 'Calculus', 2),
('MATH', 201, 'Multivariable Calculus', 2),
('MATH', 202, 'Advanced Calculus', 2),
('MATH', 231, 'Linear Algebra I', 2),
('MATH', 237, 'Honors Linear Algebra', 2),
('MATH', 241, 'Introduction to Probability and Mathematical Statistics', 2),
('MES', 160, 'Classical Islamic Literature and Civilization', 2),
('MNSCI', 113, 'Contemporary Issues in the Sciences', 2),
('MNSCI', 113, 'Contemporary Issues in the Sciences', 2),
('MUSIC', 1, 'Appr of Music 1', 2),
('MUSIC', 1, 'Introduction to Music', 2),
('MUSIC', 121, 'Writing About Music', 2),
('MUSIC', 122, 'Writing Musical Culture', 2),
('MUSIC', 122, 'Writing Musical Cultures', 2),
('PHIL', 101, 'Introduction to Philosophy', 2),
('PHIL', 104, 'Introduction to Ethics', 2),
('PHIL', 116, 'Introduction to Philosophy of Religion', 2),
('PHIL', 225, 'Philosophy of the Natural Sciences', 2),
('PHIL', 225, 'Philosophy of the Natural Sciences', 2),
('PHYS', 103, 'Physics for Computer Science I', 2),
('PHYS', 103, 'Physics for Computer Science I', 2),
('PHYS', 103, 'Physics for Computer Science I', 2),
('PHYS', 11, 'Conceptual Physics Laboratory', 2),
('PHYS', 1211, 'General Physics I Laboratory', 2),
('PHYS', 1211, 'General Physics I Laboratory', 2),
('PHYS', 1211, 'General Physics I Laboratory', 2),
('PHYS', 1214, 'General Physics I', 2),
('PHYS', 1214, 'General Physics I', 2),
('PHYS', 1214, 'General Physics I', 2),
('PHYS', 1221, 'General Physics II Laboratory', 2),
('PHYS', 1221, 'General Physics II Laboratory', 2),
('PHYS', 1221, 'General Physics II Laboratory', 2),
('PHYS', 1224, 'General Physics II', 2),
('PHYS', 1224, 'General Physics II', 2),
('PHYS', 1224, 'General Physics II', 2),
('PHYS', 14, 'Conceptual Physics', 2),
('PHYS', 1451, 'Principles of Physics I Laboratory', 2),
('PHYS', 1451, 'Principles of Physics I Laboratory', 2),
('PHYS', 1451, 'Principles of Physics I Laboratory', 2),
('PHYS', 1454, 'Principles of Physics I', 2),
('PHYS', 1454, 'Principles of Physics I', 2),
('PHYS', 1454, 'Principles of Physics I', 2),
('PHYS', 1461, 'Principles of Physics II Laboratory', 2),
('PHYS', 1461, 'Principles of Physics II Laboratory', 2),
('PHYS', 1461, 'Principles of Physics II Laboratory', 2),
('PHYS', 1464, 'Principles of Physics II', 2),
('PHYS', 1464, 'Principles of Physics II', 2),
('PHYS', 1464, 'Principles of Physics II', 2),
('PHYS', 204, 'Physics for Computer Science 2', 2),
('PHYS', 204, 'Physics for Computer Science 2', 2),
('PHYS', 204, 'Physics for Computer Science II', 2),
('PHYS', 204, 'Physics for Computer Science II', 2),
('PHYS', 204, 'Physics for Computer Science II', 2),
('PHYS', 3, 'Physics of Musical Sound', 2),
('PHYS', 3, 'Physics of Musical Sound', 2),
('PHYS', 5, 'Physics and the Future', 2),
('PHYS', 7, 'Introduction to the Physics of Musical Sounds', 2),
('PORT', 203, 'Intermediate Portuguese I', 2),
('PSCI', 101, 'Introduction to Political Science', 2),
('PSCI', 103, 'Comparative Politics', 2),
('PSCI', 104, 'International Politics', 2),
('PSCI', 105, 'Introduction to Political Thought', 2),
('PSCI', 105, 'Political Theory', 2),
('PSYCH', 101, 'General Psychology', 2),
('PSYCH', 101, 'General Psychology', 2),
('PSYCH', 103, 'Pleasure and Pain', 2),
('PSYCH', 103, 'Pleasure and Pain', 2),
('PSYCH', 107, 'Statistical Methods', 2),
('PSYCH', 213, 'Experimental Psychology', 2),
('PSYCH', 213, 'Experimental Psychology', 2),
('PSYCH', 213, 'Experimental Psychology', 2),
('PSYCH', 252, 'Application of Behavior Analysis in Animal Training', 2),
('PSYCH', 252, 'Application of Behavior Analysis in Animal Training', 2),
('RUSS', 155, 'Keys to Russian Literature', 2),
('SOC', 101, 'General Introduction to Sociology', 2),
('SOC', 190, 'Writing for Sociology', 2),
('SOC', 205, 'Social Statistics I', 2),
('SOC', 206, 'Introduction to Social Statistics', 2),
('SOC', 208, 'Social Problems', 2),
('SOC', 212, 'Sociological Analysis', 2),
('SOC', 212, 'Sociological Analysis', 2),
('SOC', 215, 'Sociology of Education', 2),
('SPAN', 201, 'Spanish for Heritage Speakers IIi', 2),
('SPAN', 203, 'Intermediate Spanish I', 2),
('SPAN', 204, 'Intermediate Spanish II', 2),
('SPAN', 221, 'Language Workshop for Spanish Heritage Students', 2),
('SPAN', 222, 'Language Workshop for Non-Native Spanish Heritage Students', 2),
('SPAN', 222, 'Language Workshop for Non-Spanish Heritage Students', 2),
('SPAN', 225, 'Composition', 2),
('SPAN', 41, 'Masterpieces of Hispanic Literature in Translation', 2),
('SPAN', 45, 'Hispanic Civilization', 2),
('SPAN', 51, 'Hispanic-Jewish Literature in Translation', 2),
('SPAN', 53, 'Don Quixote in Translation', 2),
('SPAN', 60, 'Hispanic Literature and Culture in the United States', 2),
('URBST', 120, 'Writing in Urban Studies', 2),
('URBST', 326, 'Cities and Diasporas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_ccny`
--

CREATE TABLE `teachers_ccny` (
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers_ccny`
--
ALTER TABLE `teachers_ccny`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);