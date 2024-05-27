-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 11:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Uncategorized', 'All post who have no categories will belong to this category'),
(14, 'Crops', 'A crop is a plant that can be grown and harvested extensively for profit or subsistence. When the plants of the same kind are cultivated at one place on a large scale, it is called a crop. Most crops are cultivated in agriculture or hydroponics'),
(15, 'Vegetables', 'Most vegetables are low in calories and have a water content of over 70 percent, with only about 3.5 percent protein and less than 1 percent fat. Vegetables are good sources of minerals, especially calcium and iron, and vitamins, principally A and C. Nearly all vegetables are rich in dietary fiber and antioxidants.'),
(16, 'Fruits', 'In botany, a fruit is the seed-bearing structure in flowering plants that is formed from the ovary after flowering. Fruits are the means by which flowering plants disseminate their seeds.'),
(19, 'News', 'a\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `d_id` int(11) UNSIGNED NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `description` varchar(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`d_id`, `d_name`, `description`, `user_id`) VALUES
(2, 'Amreli', '0', 4),
(7, 'Amdavad', '0', 4),
(9, 'Bhavnagar', '0', 4),
(10, 'Rajkot', '0', 4),
(11, 'Banaskatha', '0', 4),
(12, 'Surat', '0', 4),
(13, 'Navsari', '0', 4),
(14, 'Dahod', '0', 4),
(15, 'Morbi', '0', 4),
(17, 'Junagadh', '0', 22),
(18, 'a', 'a', 22),
(19, 'gandhinagar', 'qw', 22);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'Tractor sales down 11% in April due to unseasonal rains', '12 September 2022, New Delhi: The last two months have been difficult for the tractor industry as the sales did not pickup. The month of July saw a 27% fall in sales followed by August with further fall in sales reaching 32% decline over last year. The total tractors sold in the month of August 2022 is 49,305. The industry has blamed the monsoon for this low sales volumes for second consecutive month.\r\n\r\nThe over all agriculture season in India was impacted due to erratic monsoon in the start of the season which resulted in low area coverage in major crops such as paddy which saw a decline of 6% reaching 393 lakh hectares compared to last year area coverage of 414 lakh hectares. However, the total sown area reported by the Agriculture Ministry is 1084.15 lakh hectares which is about 1% down when compared to last year&rsquo;s area coverage of corresponding week.\r\n\r\nMahindra &amp; Mahindra Tractors reported the highest sales for the month of August with 11,605 tractor sold followed by Mahindra Swaraj Division on second with 8135 Tractors sold, TAFE Limited on 3rd with 6,447 Units.\r\n', '1692258929jd3.jpg', '2023-08-17 07:55:29', 19, 4, 0),
(2, 'Seeds for growth: How technology can boost Indian agriculture', 'Agriculture and allied sectors are central to the Indian economy. Keeping this and a sustainable future in mind, the Indian government, quite rightly, is promoting technology-enabled sustainable farming, including natural, regenerative and organic systems, during its G20 presidency.\r\n\r\nThough India has achieved food security with the production of food grains reaching 330 MT, the demand for coarse cereals, pulses, oilseeds and vegetables is not fully met. In addition, they are not affordable for a large part of the population, leading to a high proportion of the under/malnourished population, with a sizable percentage of child wasting (19.3 per cent).\r\n\r\nAlongside fulfilling its goal of increasing profitability in agriculture and its share of export in the world market, India needs to close the gap between potential and achievable productivity in most grain crops and vegetables, reduce the cost of production, promote cultivation and consumption of nutritionally-rich crops like millets, and focus on the quality of the agricultural produce. Therefore, it&rsquo;s imperative that focus be given to ensuring the availability of quality seeds and maximising the performance value of every seed &mdash; the most critical input in agriculture.\r\n\r\nThe Indian seed industry was built on a strong foundation in the 1960s with the establishment of the National Seeds Corporation and further boosted with several enabling policies and regulatory support from the late &rsquo;80s. The introduction of the Protection of Plant Varieties &amp; Farmers Rights Act, 2001, and the release of Bt cotton hybrids for commercial cultivation in 2002 were important milestones towards the era of a technology-driven seed sector, which boosted the industry and helped Indian farmers with better productivity. As a result, the size of the Indian seed market has reached an estimated $ &lt;4.0 to &gt;6.0 billion (ISC, 2023; IMARC, 2023), with untapped potential to be the seed hub for G20 countries. The focus of the seed industry should be to promote varieties and technologies to combat the serious threats posed by climate change.\r\n\r\nDepleting natural resources, a burgeoning population, extreme weather conditions and natural disasters because of climate change pose bigger challenges to Indian and regional agriculture, dominated by smallholder farmers. India&rsquo;s performance in achieving the SDGs, especially goals one, two and three, ones linked to agriculture, are yet to reach desired levels. To ensure that we meet the targets for food and nutrition security, and the population&rsquo;s well-being in a sustainable manner, it&rsquo;s crucial to effectively utilise every available technology including traditional knowledge in agriculture.', '1692259105seed.jpg', '2023-08-17 07:58:25', 19, 4, 0),
(3, 'India Agricultural Tractor Machinery Market Analysis', 'The India Agricultural Tractor Market size is expected to grow from USD 2.24 billion in 2023 to USD 2.96 billion by 2028, at a CAGR of 5.80% during the forecast period (2023-2028).\r\n\r\nThe tractor industry in India remained largely unaffected due to the impact of COVID-19, and tractor sales in India decreased only in April 2020 due to lockdown restrictions. Throughout the remaining part of 2020 and moving into 2021, the demand for agricultural machinery, including tractors, increased due to higher Kharif sowing, good cash flows to farmers, a timely and normal monsoon in the country across June and July, continued higher rural spending by the government, and exemption from lockdown restrictions. \r\n\r\nGovernment initiatives toward rural development, farm mechanization, and various factors, such as high rural wages and scarcity of farm labor, are likely to increase the tractor volume over the long term. In terms of units, India is one of the largest tractor markets globally, selling 600,000 to 700,000 tractors per annum on average between 2016-2021.\r\n\r\nTwo-wheel drive tractors are found to be more popular than four-wheel-drive tractors in the Indian market. The agriculture tractor market is dominated by aboriginal Indian OEMs, namely Mahindra &amp; Mahindra Limited, TAFE, International Tractors Ltd (Sonalika), and Escorts Limited. Key international tractor manufacturers, such as Deere &amp; Company, CNH penetrated the market and established a decent market presence.\r\n\r\nIndia remains a highly lucrative tractor market because of the decreasing availability of farm labor and the rise of innovative business models, such as custom hiring solutions for tractors. In India, under the mechanization component of the macro-management scheme of agriculture by the Indian government, there is a provision of subsidy for promoting agricultural mechanization, including 25% of the cost limited to INR 30,000 for buying tractors of up to 35 PTO HP. Thus, with the rising government support for enhancing farm mechanizations and expansion in crop production, the sale of agriculture tractors is anticipated to rise in the upcoming years.\r\n\r\nIndia Agricultural Tractor Machinery Industry Segmentation\r\n\r\nA tractor is an industrial vehicle, usually with one or two small wheels in front and two large wheels at the back for agricultural and other functions. It is used to move the attached implement that plows the field or performs other activities. For the purpose of this report, tractors used in agricultural operations have been considered. The report does not cover other agricultural machinery and attachments to tractors. Tractors used for industrial and construction purposes are also excluded from the study. \r\n\r\nThe India Agricultural Tractor Market is Segmented by Engine Power (Less than 30 HP, 31-50 HP, 51-80 HP, and Above 80 HP), Drive Type (Two-wheel Drive and Four-wheel Drive), and Application (Row Crop Tractors, Orchard Tractors, and Other Applications). The report offers market estimation and forecast in value (USD million) for the abovementioned segments.', '1692259323jd2.jpg', '2023-08-17 08:02:03', 19, 4, 0),
(4, 'Wheat prices drop at in FCI&rsquo;s e-auction to average ₹2,156/quintal', 'The latest round of weekly e-auction on Wednesday under the Centre&rsquo;s Open Market Sale Scheme (OMSS) surprised the trade and industry as there was a big fall in wheat prices, which is attributed to the Centre&rsquo;s announcement of releasing 50 lakh tonnes additional wheat in market as well as offering higher quantity. The average price in current round of auction was ₹2,155.96/quintal &mdash; down from ₹2,254.71 last week.\r\n\r\nIn the previous round, there was 94 per cent off take in wheat, after the government rationalised the offered quantity as per actual demand\r\n\r\nThe off take of wheat in the sixth round of e-auction on Wednesday, as part of the Centre&rsquo;s Open Market Sale Scheme (OMSS) to tame rising foodgrain prices, witnessed sales of 97 per cent of the 1.09 lakh tonnes (lt) on offer. However, there was an increase of ₹26/quintal in the selling price from the previous week&rsquo;s auction.', '1692259449wheat.jpg', '2023-08-17 08:04:09', 19, 4, 0),
(5, 'Harvester : Goa Government is to Re-implement Harvesting Machine Subsidy Scheme', 'Gujarat government has decided to re-implement the scheme for subsidy on harvesters after a gap of nearly one season by considering the growing demand of small-time farmers across the state.\r\n\r\nThe department of agriculture had stopped the scheme, launched by the erstwhile Congress government and instead announced the support price of Rs 2 on per kilogram of rice. Under the scheme, farmers clubs were provided subsidy on purchase of harvesters.\r\n\r\n&ldquo;The government has decided to reconsider the scheme. Many farmers have placed their genuine problems before us. In Canacona and other talukas, there are hilly agricultural lands where harvesters cannot be moved. Secondly, the government has considered the genuine requests of small-time farmers, more of Salcete, who cultivate their small land holdings for their own consumption and, hence, a decision has been taken to re-implement the scheme,&rsquo;&rsquo; said Minister for Agriculture Ramesh Tawadkar.\r\n\r\nThe scheme will be reintroduced and the farmers can avail of the benefit of the subsidy this season, he added. Harvesting of the second crop is normally taken up between last week of October and November end. The scheme was stopped after the government observed that despite providing subsidy to the farmers clubs of upto Rs 17.5 lakh for purchase of harvesters, few farmers clubs did not rent it out at subsidised rates.\r\n\r\nThe harvesters that provided to the farmers clubs were brought from outside the state by paying hire charges. Due to this high charges the government to have a rethink on the scheme. Salcete farmers were the most affected with the state government&rsquo;s decision of stopping the scheme as nearly 40 per cent of the total 6000 HA of land, which is under paddy cultivation, is being cultivated by small-time farmers and that too for their own consumption.\r\n\r\nThe state government has considered the impact on the farmers caused by stoppage of the scheme and, therefore, a decision has been taken to re-implement it, the minister said. The department is committed to boost agriculture and, hence, will protect the interest of small-time farmers, Director of agriculture Ulhas Pai Kakode said.', '1692259538hw.jpg', '2023-08-17 08:05:38', 19, 4, 1),
(6, 'Farmers call off protest after CM assures action in case linked to BJP MLA', 'A farmers&rsquo; &ldquo;padyatra&rdquo; that was headed towards Gandhinagar was called off Wednesday after Chief Minister Bhupendra Patel met farmers&rsquo; leaders and assured them of action in a case linked to Deodhar BJP MLA Keshaji Thakur.\r\n\r\nThe government action comes at a time when Gandhinagar is hosting a three-day G20 health track event starting August 17.\r\n\r\nWhile the rally of farmers from Banaskantha was halted by the police near Gozaria in Mehsana district, leaders from the agitating group of farmers were taken to Gandhinagar to meet the chief minister. After the meeting, the farmers called off the rally saying they have been assured of action against the MLA. The farmers have been marching towards the state capital for the last seven days.', '1692259623farmer-g.jpg', '2023-08-17 08:07:03', 19, 4, 0),
(7, 'India&#039;s rice export ban could hit planting, farm income: Farmers&#039; body', 'Rice planting in India could fall by 5% as New Delhi&#039;s decision to ban non-basmati white rice exports will cut farm income and encourage growers to switch to other crops, a leading farmers&#039; group with close ties to the ruling Bharatiya Janata Party said.\r\n\r\nThe world&#039;s biggest rice exporter - accounting for more than 40% of global supplies of the staple - last month ordered a halt to non-basmati white rice exports, driving prices to multi-year highs.', '1692259734farmer-u.jpg', '2023-08-17 08:08:54', 19, 4, 0),
(8, 'Delhi government proposes to increase circle rate for agricultural land', 'The Delhi government&#039;s proposal to raise the circle rate for agricultural land from Rs 53 lakh to up to Rs 5 crore per acre is likely to drive up farmhouse prices amid high post-Covid demand.\r\n\r\nDuring its announcement on Monday, the Delhi government stated that the new circle rates for agricultural land would be Rs 5 crore per acre in south and New Delhi, and Rs 3 crore per acre in north, west, north-west, and south-west regions\r\n', '1692259866farmer-c.jpg', '2023-08-17 08:11:06', 19, 4, 0),
(9, 'John Deere updates precision ag technology', 'For many years, John Deere has offered reliable and high-performance precision ag technology. In 2023, all essentials of the advanced equipment are receiving an update to be prepared for the future.\r\n\r\nImportant components are the brand-new John Deere G5 display family and the new JDLinkTM M modem. These updates make the John Deere Precision Ag Technology faster, more powerful, and more affordable for every farmer and contractor.\r\n\r\nThe New G5 Display Family\r\n\r\nWith the brand new John Deere G5 display family, John Deere delivers the latest technology directly to customers. Full HD resolution, additional memory and increased processing power make the G5 monitor one of the most powerful displays available. It comes with two portable versions, which can be used on all brands, two integrated monitors for specific John Deere machines and an Extended Monitor option. The G5 display is 10.1 inches and the G5Plus is 12.8 inches, meaning the G5 display family offers up to 33% more space for maps and information compared to its predecessors. Both portable displays offer additional protection through their water resistance (IP65). The John Deere G5Plus comes with AutoTrac and Section Control as standard. Of course, the full AEF ISOBUS compatibility remains.\r\n\r\nAll G5 displays will retain the reliable and familiar user interface from Generation 4 displays. The combination of modern technology and familiar user interface provides an immediate performance boost without the need for lengthy re-learning. The new license program for advanced features means that farmers and contractors only pay for what they need, and upfront costs are reduced. Regular software updates are being developed and ensure that the G5 display family is already equipped for the future.\r\n\r\nThe G5Plus Universal display and the G5 Universal display will be available for order later this year. The G5Plus CommandCentre and G5 CommandCentre will be available on John Deere machines from Model Year 2024.\r\n\r\nJDLink M and R Modem\r\n\r\nFarmers and contractors with a mixed fleet can continue to take advantage of connectivity between machines and the cloud. The brand new JDLink M Modem offers an affordable alternative to the familiar JDLinkTM R Modem. The JDLink M Modem is a plug and play solution, which allows mixed fleets to be fully equipped easily. The JDLink M and R Modems are compatible with the SAE J1939 protocol and can process over 14 data points from different machine brands. This compatibility enables the management of an entire mixed fleet in just one portal: The John Deere Operations Centre.\r\n\r\nThe John Deere StarFireTM 7000\r\n\r\nThe John Deere StarFire 7000 was introduced last year together with the new StarFire RTK signal. With an RTK accuracy of 2.5 cm and a pull-in time of fewer than 8 minutes, the new StarFire RTK signal offers a very attractive entry into RTK. The John Deere StarFire 7000 performs with even better connectivity than previous generations due to the additions of Galileo and Beidou satellite signals. The John Deere StarFireTM 7000 receivers are available for orders and delivery starts now.', '1692259962john.jpg', '2023-08-17 08:12:42', 19, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) UNSIGNED NOT NULL,
  `d_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lowest_price` int(11) UNSIGNED DEFAULT NULL,
  `highest_price` int(11) UNSIGNED DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `d_id`, `name`, `lowest_price`, `highest_price`, `category_id`, `date_time`) VALUES
(1, 2, 'Apple', 120, 140, 16, '2023-08-03 15:48:12'),
(2, 2, 'Garlik', 35, 56, 15, '2023-08-03 16:02:02'),
(3, 2, 'Kapas', 1500, 2000, 14, '2023-08-07 09:49:24'),
(4, 2, 'Grapes', 120, 140, 16, '2023-08-07 09:51:21'),
(5, 2, 'Onions', 130, 140, 15, '2023-08-07 09:51:53'),
(6, 7, 'Apple', 120, 130, 16, '2023-08-14 09:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(4, 'Jatin', 'Ramani', 'jatin', 'jatinrmn@gmail.com', '$2y$10$O6oG2RvSGBLXQA9jFghQYeHudO8wy44.MyKGDtcSuONIe3fZ/U5oK', 'jatinavatar.jpg', 1),
(5, 'nilesh', 'ghoghari', 'nilesh', 'ghogharinilesh7@gmail.com', '$2y$10$F5th0jBoGNlrlKfv4Ph8YOuHqLU8gOlRX4vT2HDJmBoqGpFqxqu7y', '169165059915r.jpg', 0),
(27, 'keyur', 'vaghasiya', 'kt', 'keyur@gmail.com', '$2y$10$fzn5Bb0QsmNM5Zaq3MuNYuwZMK10rQh05gXALe9m0kYN2fFbMueBW', '1692774027m91e7m.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_agriculture_category` (`category_id`),
  ADD KEY `FK_agriculture_author` (`author_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FK_agriculture_pcategory` (`category_id`),
  ADD KEY `FK_agriculture_district` (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `d_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_agriculture_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_agriculture_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_agriculture_district` FOREIGN KEY (`d_id`) REFERENCES `district` (`d_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_agriculture_pcategory` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
