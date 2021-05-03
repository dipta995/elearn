-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 03:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_table`
--

CREATE TABLE `about_table` (
  `id` int(11) NOT NULL,
  `head` varchar(300) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_table`
--

INSERT INTO `about_table` (`id`, `head`, `body`) VALUES
(1, 'About Our University', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nesciunt quaerat ad reiciendis perferendis voluptate fugiat sunt fuga error totam.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus assumenda omnis tempora ullam alias amet eveniet voluptas, incidunt quasi aut officiis porro ad, expedita saepe necessitatibus rem debitis architecto dolore? Nam omnis sapiente placeat blanditiis voluptas dignissimos, itaque fugit a laudantium adipisci dolorem enim ipsum cum molestias? Quod quae molestias modi fugiat quisquam. Eligendi recusandae officiis debitis quas beatae aliquam?');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(266) NOT NULL,
  `last_name` varchar(266) NOT NULL,
  `email` varchar(266) NOT NULL,
  `image` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `first_name`, `last_name`, `email`, `image`, `password`, `status`) VALUES
(6, 'md', 'parvez', 'admin@gmail.com', '', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `audio_table`
--

CREATE TABLE `audio_table` (
  `audio_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `audio_title` varchar(300) NOT NULL,
  `audio` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audio_table`
--

INSERT INTO `audio_table` (`audio_id`, `course_id`, `audio_title`, `audio`, `status`, `teacher_id`) VALUES
(10, 75, 'test audio', 'images/6f158e0fff.mp3', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `catagory_table`
--

CREATE TABLE `catagory_table` (
  `catId` int(11) NOT NULL,
  `catName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory_table`
--

INSERT INTO `catagory_table` (`catId`, `catName`) VALUES
(1, 'Languages'),
(2, 'Programming'),
(3, 'Accounting'),
(8, 'Cocking'),
(9, 'IELTS'),
(10, 'Drawing');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `student_comment` varchar(500) NOT NULL,
  `teacher_comment` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_status` tinyint(4) NOT NULL,
  `teacher_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`c_id`, `s_id`, `t_id`, `student_comment`, `teacher_comment`, `course_id`, `student_status`, `teacher_status`) VALUES
(37, 30, 0, 'fasdfsdf', '', 74, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `courseId` int(11) NOT NULL,
  `course_name` varchar(266) NOT NULL,
  `image` varchar(255) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `course_overview` text NOT NULL,
  `popular` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`courseId`, `course_name`, `image`, `teacherId`, `catId`, `course_overview`, `popular`) VALUES
(74, 'java', 'images/14fcb77d21.jpg', 23, 1, 'java basic', 0),
(75, 'fdsfdsf', 'images/1081fea807.jpg', 25, 3, 'sdfdsfdsf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_table`
--

CREATE TABLE `data_table` (
  `data_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `data_title` varchar(300) NOT NULL,
  `video` varchar(400) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `hour` varchar(300) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_table`
--

INSERT INTO `data_table` (`data_id`, `course_id`, `data_title`, `video`, `status`, `teacher_id`, `hour`, `detail`) VALUES
(65, 74, 'sfsdf', 'dCxtdeZ6dio', 1, 23, '', ''),
(66, 74, 'gyu', '1i7nb57NCkc', 1, 23, '', ''),
(67, 75, 'stsdafd', 'k9K9ATKjmZo', 1, 25, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `file_table`
--

CREATE TABLE `file_table` (
  `file_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_title` varchar(300) NOT NULL,
  `file_txt` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_table`
--

INSERT INTO `file_table` (`file_id`, `course_id`, `file_title`, `file_txt`, `status`, `teacher_id`) VALUES
(20, 75, 'dsfsdf', 'images/dca818f210.jpg', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `message_table`
--

CREATE TABLE `message_table` (
  `message_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `rcv_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_table`
--

INSERT INTO `message_table` (`message_id`, `f_name`, `l_name`, `phone`, `email`, `message`, `status`, `rcv_date`) VALUES
(18, 'Dipta', 'Dey', 'ggdfgg', 'parvez@gmail.com', 'dfdfdf', 0, '2021-03-05'),
(19, 'sumon', 'ms', '123456789', 'parvez@gmail.com', 'jffklds jsdlkfjdsl', 0, '2021-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `news_table`
--

CREATE TABLE `news_table` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_details` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_table`
--

INSERT INTO `news_table` (`news_id`, `news_title`, `news_details`, `image`, `date`) VALUES
(8, 'THE Group CEO of WNS Global Services and Ex-Chairman NASSCOM Mr. Keshav R. Murugesh interacts with Chitkara University Students', 'Sunstone Eduversity (owned by Sunstone Education Tech. Pvt. Ltd.) an edtech startup offering industry-ready higher education programs with Pay after Placement, has raised INR 24 crore in Series A funding. The funding was led by Saama Capital, with participation from Ashish Gupta, MD – Helion Advisors, Pankaj Bansal, Co-founder &amp; CEO – PeopleStrong. Existing investors, Prime Venture Partners, Rajul Garg and Purvi Capital also participated in the round. The company will use the fresh capital to invest in its technology platform, hiring and curriculum. Sunstone is also planning to use the funds to strengthen its efforts in creating industry-ready professionals and building its network of colleges across multiple cities.\r\n\r\nSunstone takes complete accountability of a student’s career by operating on a pay after placement model. Students pay a nominal registration amount as an upfront fee and the remaining fee is to be paid only after getting placed at a job at the completion of the 2 year full time program. This unique Pay after Placement model aligns with students’ interest making it a highly attractive proposition for students. Owing to the huge demand from students, Sunstone received 10,000+ applications this year as compared to 2500 last year. Sunstone has enrolled 1000 students this year, a 3x growth over last year.\r\n\r\nWith the growing number of new-age businesses and dynamic job profiles, the requirement of graduates with a high-level domain knowledge and core competencies is the need of the hour. Sunstone works closely with corporates to develop industry ready specializations such as BFSI, Logistics, Analytics, Sales Management, Digital Marketing and others. The programs are designed to equip the students with the required expertise to tackle everyday business problems and build competencies across industry verticals. The industry-focused and constantly updated curriculum coupled with dual specializations ensure that the students at Sunstone Eduversity are job ready and have the desired skill sets that are in sync with the requirements of any industry.\r\n\r\nFounded by IMT-Ghaziabad alumnus Ashish Munjal and Piyush Nangru, Sunstone has eight partner institutions in six cities and will have 20 partners in 15 cities by July 2021. Sunstone Eduversity graduates of the batch of 2018-20 secured 100% placements. Some of the prominent recruiters were Axis Bank, HDFC, WNS, Genpact, Amazon, TCS, Karvy, Byjus, Reliance Retail, PolicyBazaar and Swiggy among others.', 'images/f42b028feb.jpg', '2020-10-01 10:36:37'),
(9, 'Prince Mohammad Bin Fahd University (PMU) launches a Youth Leadership Program', 'Effective leadership will be paramount in meeting and overcoming the significant challenges faced by our world’s nearly eight billion people, from community-level issues such as poverty to the planet-wide threats posed by climate change.\r\n\r\nTo help develop critical leadership skills, PMU launched a special Youth Leadership Program. The goal is to empower young people through hands-on learning activities, expanding their knowledge and equipping them to be global change leaders.\r\n\r\n“Leadership is one of the core competencies that the PMU curricula are built around,” said Dr. Issa Al Ansari, President of PMU. “This institutional experience has evolved into a broader vision for PMU related to community service, now PMU aims to convey that experience to Saudi youth in general through a leadership program.”\r\n\r\nTowards these ends, the YLP has been designed to align with twin strategies for national and international development. The first strategic framework, The Saudi National Vision 2030, is building for the country’s future through diversification of the economy. The second strategy is the Sustainable Development Goals (SDGs) of the United Nations, a set of 17 objectives to achieve a better, more sustainable global society.\r\n\r\n“This strategic approach makes the YLP efficient and responsive to the needs planned for by the KSA and the world at a larger scale,” said Dr. Al Ansari.\r\n\r\nA global outlook Participants need to possess a strong sense of motivation and dedication to making the world a better place.\r\n\r\nThe YLP consists of a range of activities held at workshops in local, regional, and international camps to promote innovation and service through constructive competitions, hackathons and social awareness campaigns. The workshops and camps will explore topics inspired by grouping the UN’s 17 SDG’s into seven major themes; Fighting Poverty, Health and Wellness, Education For All, Sustainability, Environment, Governance, and Innovation.\r\n\r\nThose wishing to earn the Youth Leader Certificate will spearhead a Capstone Project, which will engage all the skills, competencies, and concepts presented across the seven themes. The project’s culmination will be as a proposal for solutions to existing community problems, or innovative ways to improve lives and impact societies locally or globally.\r\n\r\n“Leadership is an invaluable skill in our increasingly connected, complex, and challenged world, and we at PMU believe we can help inspire and teach these skills to today’s global youth,” Dr. Al Ansari concluded.', 'images/a0fbe61739.jpg', '2020-10-01 10:38:01'),
(10, 'Steps taken by Ministry of Education to ensure Quality Education to Students across the Country', 'In order to target Universalisation of Secondary Education, the Department of School Education &amp; Literacy has launched the Integrated Centrally Sponsored Scheme of Samagra Shiksha from 2018-19, which subsumes the erstwhile Centrally Sponsored Schemes of SarvaShikshaAbhiyan, RashtriyaMadhyamikShikshaAbhiyan and Teacher Education. The scheme provides support inter-alia to the States and UTs for upgradation and strengthening of schools, including secondary schools in un-covered areas, and various other initiatives for enhancing the quality of education such as Induction and In-service training of teachers and School Heads, Remedial teaching, conduct of assessment surveys, use of ICT in teaching-learning, innovative pedagogies, composite school grant for providing conducive learning environment, grant for library and sports etc.Further, the Learning Outcomes at the Secondary Stage have been developed by NCERT. It contains the competencies which learners should develop by the end of classes IX and X in all subjects.\r\n\r\nThe National Education Policy 2020 states that the Centre &amp; States will work together to increase the public investment in education sector to reach 6% of GDP at the earliest.\r\n\r\nThe National Education Policy, 2020 emphasizes on teachers at the heart of the learning process and for enhancing at the earliest the quality of teacher education, recruitment of qualified teachers and their rational deployment so that all schools meet the prescribed PTR norms. Education is a subject in the Concurrent List of the Constitution, the recruitment and service conditions of teachers are in the domain of respective State Government/UT Administrations. The Central Government through the Centrally Sponsored Schemes of SamagraShiksha provides support to the States and UTs as per the approved norms, for additional teachers in order to maintain appropriate Pupil Teacher Ratio at Elementary and Secondary levels of schooling, respectively.\r\n\r\nUnder Samagra Shiksha Scheme, support is given for strengthening of infrastructure of government schools at all levels.\r\n\r\nUnder Centrally Sponsored Scheme of SamagraShiksha, financial assistance is provided to the States and UTs for various activities to reduce number of dropouts, which include opening/strengthening of new schools upto senior secondary level, construction of school buildings &amp; additional classrooms, setting up, up-gradation and running of Kasturba Gandhi BalikaVidyalayas, setting up of residential schools/hostels, free uniforms, free text books, transport allowance and undertaking enrolment drives, residential as well as non residential trainings etc. Financial assistance is also provided for Inclusive Education of children with special needs. Also, Mid-Day-Meal is provided to students at the elementary level of education.\r\n\r\nThe information was given by the Union Minister for Human Resource Development, Shri Ramesh Pokhriyal ‘Nishank’ in a written reply in the Lok Sabha today.', 'images/5c386206f6.jpg', '2020-10-01 10:38:54'),
(11, 'Digital Skills to Jobless People', 'Digital Skills are crucial in the post Covid era to ensure  skilling for the youth  and also to address the requirements of Industrial Revolution 4. Directorate General of Training (DGT), under the Ministry plays a key role in the implementation of long term training schemes including training in the latest cutting edge technologies. DGT has entered into an MOU with IBM in June 2020 for Free Digital Learning Platform “Skills Build Reignite” to reach more Job Seekers and  provide new resources to Business Owners in India. The Skills Build Reignite aims to provide job seekers and entrepreneurs, with access to free online coursework and mentoring support designed to help them reinvent their careers and businesses. Multifaceted digital skill training in the area of Cloud Computing and Artificial Intelligence (AI) is provided to students &amp; trainers across the nation in the National Skill Training Institutes (NSTIs). The Ministry of Education has launched an initiative ‘YUKTI 2.0’ in June 2020 to help systematically assimilate technologies having commercial potential and information related to incubated start-ups in the higher education institutions.\r\n\r\nThe Government of India has taken various steps for digital push in  healthcare in the form of eSanjeevani” and “eSanjeevani/OPD”.  The eSanjeevani platform has enabled two types of telemedicine services viz. Doctor-to-Doctor (eSanjeevani) and Patient-to-Doctor (eSanjeevani OPD) Tele-consultations. The former is being implemented under the Ayushman Bharat Health and Wellness Centre (AB-HWCs) programme. It is planned to implement tele-consultation in all the 1.5 lakh Health and Wellness Centres (as spokes) in a ‘Hub and Spoke’ model, by December 2022. States have identified and set up dedicated ‘Hubs’ in Medical Colleges and District hospitals to provide tele-consultation services to ‘Spokes’, i.e SHCs and PHCs. As on date, 12,000 users comprising Community Health Officers and Doctors have been trained to make use of this national e-platform. Presently, telemedicine is being provided through more than 3,000 HWCs in 10 States.In a short span of time since November 2019, tele-consultation by eSanjeevani and eSanjeevani OPD have been implemented by 23 States (which covers 75% of the population) and other States are in the process of rolling it out. National telemedicine service has completed more than 1,50,000 tele-consultations enabling patient to doctor consultations from the confines of their home, as well as doctor to doctor consultations.\r\n\r\nThis information was given by the Minister of State for Skill Development and Entrepreneurship Shri R.K. Singh in a written reply in the Lok Sabha today.', 'images/9d8ba5f726.jpeg', '2020-10-01 10:39:44'),
(12, 'Union HRD Minister Presents CBSE Teacher Awards – 2018 to 34 Teachers of the Country', 'Union Human Resource Development Minister Shri Ramesh Pokhriyal ‘Nishank’ presented CBSE Teacher Awards – 2018 to 34 teachers of the country.Minister of State for HRD, Shri Sanjay Dhotre also graced the occasion.\r\n\r\nShri Pokhriyal greeted all the awardees and thanked the dedicated teacher community in nation building through teaching. He said that these awards are a symbol of their hard work. He called upon the teachers to create a positive environment with quality and values ​​that meet the present and future needs of students.\r\n\r\nDuring the function, the Minister also launched CBSE’s portal ‘Vidyadhan’ on Diksha App, a Digital Infrastructure for Knowledge Sharing’s (National Forum for Teachers) and released CBSE’s annual activity calendar. Apart from this, he released 10 CBSE Manuals on various subjects like art integration, experiential learning, enjoyable teaching and learning of maths, new initiatives, school quality assessment and assurance, 10 + 2 post-academic courses, artificial intelligence, hubs of learning and eco-club and water conservation.\r\n\r\nShri Sanjay Dhotre  congratulated the awardee teachers and commended them for their important role as a mentor and for successful discharge of their duties. He said that since every student is different and unique, education should be according to the individual needs and nature of each student so that children become courageous, confident human beings with strong character and may be able to build their bright future.\r\n\r\nOn this occasion, CBSE Chairperson Smt. Anita Karwal congratulated the teachers on being selected for this prestigious award and said that it will give new energy to the recipients and at the same time inspire many other teachers to uplift the education sector. Along with this, she spoke about the utility of 10 new CBSE manuals, ‘Vidyadhan’ and activity calendars for schools, for teacher community and students. Shri Anurag Tripathi, Secretary CBSE also made his gracious presence in the program.Many distinguished dignitaries from MHRD, CBSE, NVS, KVS and schools also graced the event.', 'images/d5c5a25080.png', '2020-10-01 10:40:40'),
(13, 'Mody University (Rajasthan) awarded India’s Most Admirable Education Brand -2020', 'Established in 2004, Mody University (Rajasthan) has emerged as one of Asia’s leading Women Universities. With a 265 acres campus, the University offers contemporary graduation, postgraduation, and doctoral courses in Engineering and Technology, Design, Law, Business, Liberal Arts &amp; Science, and Architecture.\r\n\r\nThe University is the culmination of Shri R.P Mody’s vision and belief. A visionary, legendary scholar and devoted philanthropist, Shri R.P Modi has always firmly believed in the need for holistic development and progress of young ladies. Under his leadership, the University courses have been designed to teach the rich Indian values, heritage, and age-old traditions infused in science. The Mody School was founded in 1989, followed by Mody University and a finishing school.\r\n\r\nThe University offers courses under the Schools of Engineering and Technology, Design, Law, Business, Liberal Arts &amp; Science, Architecture, and School of Etiquette and Finishing Skills, in sync with its vision of “becoming a world-class University of learning for women with Indian values, dedicated to nurturing excellence through the best facilities in maximum possible fields.”\r\n\r\nTo aid holistic grooming and facilitate round the clock learning, Mody University has perfected a unique model based on the three pillars of Infrastructure, Curriculum, and Collaborations.  \r\n \r\nThe 265-acre campus has 70+ state of the art buildings, schools, hostels, outdoor and indoor sports facilities, auditoriums, meditation halls, and round the clock medical facilities. The campus boasts Asia’s second-largest mess with a dining facility for over 1800 students. Along with state-of-the-art interactive classrooms, and wi-fi connectivity, the University maintains 55+ laboratories across the schools on campus to facilitate practical learning and prepare tech-savvy women graduates.\r\n\r\nThe campus is ISO 14001:2004 certified and equipped with round the clock security and power backup.\r\nThe University offers infrastructure and coaching for yoga, equestrian, athletics (including track and field events like pole vault, high jump, long and triple jump), tennis, volleyball, basketball and badminton courts, and grounds for cricket, hockey, and football.\r\n\r\nThe University boasts one of its kind in the country, a 55-horse equestrian wing with an Olympian trainer.\r\n\r\nThe campus is full of greenery with a wide variety of trees and other plants. A survey of 96 species of birds (certified by an ornithologist from WWF-India) and 16 species of butterflies (approved by lepidopterists from WWF-India) have been identified.\r\n\r\nThe university curriculum is the blend of science and spirituality. With a solid grounding in age-old tradition and globally accepted science, technology, and liberal arts curriculum, the University offers a one-of-its-kind environment that fosters lifelong learning and respect for its students’ traditions. The University has Industry experts to aid course design, delivery, and training for teachers, and students with a sole aim to create industry-ready students.\r\n \r\nWith international collaborations with premier global universities like Florida International University (USA), Stony Brook University (USA), University of North Texas (USA), Saint Xavier University (USA), University of Colorado (USA), CERN (Europe), and GSI (Germany), the University not only attracts but churns out finest talent in the country.\r\n\r\nThe University also offers its students international internships and fellowships with top-notch companies and research laboratories like GE Foundation in USA and GSI in Darmstadt, Germany.\r\n\r\nStudents have been offered prestigious summer internships at CERN (European Centre for Nuclear Research), Geneva, Switzerland, a full-time fellowship at GSI, Germany, and a one-year internship in Nuclear Technology at Ecole De Nantes, France.\r\n\r\nTo minimize the impact of Covid-19 on the international experience of students and faculty, the University has incorporated online educational, language and cultural exchange programs with various international partners, respectively.  \r\n\r\nTo prepare students for corporate world and life, Mody University has two centres in place; first, School of Etiquette and Finishing Skills (SEFS),  teaches the art of social graces, deportment and confidence so that each SEFS student bears the lifetime badge of elegance and dignity encapsulated in the Indian Value System; Second, Career Development Centre (CDC) a Central Department, which is responsible for the overall Career, including Training and Placement of the students of all the Schools of the University. The CDC acts as a single-window nodal point for their Career Counselling, higher learning, and thrives for the 100 percent placement of all university-eligible students.\r\n\r\nCompanies like Infosys, Accenture, Ericsson, IBM, TCS, Wipro, Bank of Baroda, Deutsche Bank, Punjab National Bank, Patni Computers, HCL Technologies, Citi Financial, ICICI, ICFAI, Satyam Mahindra, IFB, I flex, Motorola, Nokia, Siemens Networks, ST Microsystems, Texas Instruments, etc. regularly visit the University for recruitments.\r\n\r\nMody University was awarded as best Women University in the Asia Pacific by ASSOCHAM &amp; The Education Post in 2020, and 2019 along with many top ranks in various prestigious surveys.\r\n\r\nThe Brand Story acknowledges the contribution of Mody University for redefining the education delivery and doing so with excellence. Mr. Abhay Kaushik, Editor in Chief and Director, The Brand Story, shared, “The contribution of Mody University is commendable in terms of its unwavering commitment to quality education, holistic development of women students and setting a benchmark of academic success. The Brand Story feels privileged to honour Mody University with India’s Most Admirable Education Brand -2020”.', 'images/b38766c941.jpg', '2020-10-01 10:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `office_table`
--

CREATE TABLE `office_table` (
  `id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_table`
--

INSERT INTO `office_table` (`id`, `address`, `email`, `phone`) VALUES
(1, 'malibagh dhaka-1212\r\nsantibag', 'elearn@gmail.com', '+880 174-1022067');

-- --------------------------------------------------------

--
-- Table structure for table `ratechack_table`
--

CREATE TABLE `ratechack_table` (
  `checkId` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate_table`
--

CREATE TABLE `rate_table` (
  `rateId` int(11) NOT NULL,
  `rateNum` int(11) NOT NULL,
  `totalHit` int(11) NOT NULL,
  `course_name` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_table`
--

INSERT INTO `rate_table` (`rateId`, `rateNum`, `totalHit`, `course_name`) VALUES
(46, 0, 0, 'java'),
(47, 0, 0, 'fdsfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `slide_table`
--

CREATE TABLE `slide_table` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide_table`
--

INSERT INTO `slide_table` (`id`, `title`, `image`) VALUES
(1, 'Biggest Online Accedemy', 'images/49ecbf2315.jpg'),
(5, 'Come to learn', 'images/6aa843a120.jpg'),
(6, 'Free Couses', 'images/4bc3fa5457.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_table`
--

CREATE TABLE `social_table` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `twit` varchar(300) NOT NULL,
  `linked` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_table`
--

INSERT INTO `social_table` (`id`, `link`, `facebook`, `twit`, `linked`) VALUES
(1, '', 'facebook.com', 'linkedin.com', 'twitter.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(266) NOT NULL,
  `last_name` varchar(266) NOT NULL,
  `email` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `first_name`, `last_name`, `email`, `password`, `status`, `login_time`) VALUES
(30, 'fsdf', 'fsdf', 'parvez@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2021-03-07 16:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(266) NOT NULL,
  `last_name` varchar(266) NOT NULL,
  `email` varchar(266) NOT NULL,
  `image` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`teacher_id`, `first_name`, `last_name`, `email`, `image`, `password`, `phone`, `status`, `timestamp`) VALUES
(23, 'teacher', 'teacher', 'teacher@gmail.com', 'images/7288d901ea.jpg', '25d55ad283aa400af464c76d713c07ad', '12345678978', 0, '2021-03-05 14:13:16'),
(24, 'teacher', 'sdfds', 'teacher@live.com', 'images/302f5d241a.jpg', '25d55ad283aa400af464c76d713c07ad', '55655656566', 0, '2021-03-07 16:47:45'),
(25, 'fs', 'sdfs', 'parvez@gmail.com', 'images/1678d24588.jpg', '25d55ad283aa400af464c76d713c07ad', '016323156058', 0, '2021-03-07 17:11:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_table`
--
ALTER TABLE `about_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `audio_table`
--
ALTER TABLE `audio_table`
  ADD PRIMARY KEY (`audio_id`);

--
-- Indexes for table `catagory_table`
--
ALTER TABLE `catagory_table`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `data_table`
--
ALTER TABLE `data_table`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `file_table`
--
ALTER TABLE `file_table`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `office_table`
--
ALTER TABLE `office_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratechack_table`
--
ALTER TABLE `ratechack_table`
  ADD PRIMARY KEY (`checkId`);

--
-- Indexes for table `rate_table`
--
ALTER TABLE `rate_table`
  ADD PRIMARY KEY (`rateId`);

--
-- Indexes for table `slide_table`
--
ALTER TABLE `slide_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_table`
--
ALTER TABLE `social_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_table`
--
ALTER TABLE `about_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audio_table`
--
ALTER TABLE `audio_table`
  MODIFY `audio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `catagory_table`
--
ALTER TABLE `catagory_table`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `data_table`
--
ALTER TABLE `data_table`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `file_table`
--
ALTER TABLE `file_table`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `message_table`
--
ALTER TABLE `message_table`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news_table`
--
ALTER TABLE `news_table`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `office_table`
--
ALTER TABLE `office_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratechack_table`
--
ALTER TABLE `ratechack_table`
  MODIFY `checkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rate_table`
--
ALTER TABLE `rate_table`
  MODIFY `rateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `slide_table`
--
ALTER TABLE `slide_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_table`
--
ALTER TABLE `social_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
