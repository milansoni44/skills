-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 01:01 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skills`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_password`, `date`) VALUES
(1, 'amdin', 'admin@123', '2016-06-20 11:33:05'),
(2, 'admin', 'admin', '2016-06-20 12:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_titile` varchar(100) NOT NULL,
  `b_description` varchar(500) NOT NULL,
  `b_image` varchar(200) NOT NULL,
  `seq` varchar(2) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `b_titile`, `b_description`, `b_image`, `seq`, `icon`, `date`) VALUES
(1, 'Adobe Photoshop', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'banner1.jpg', '1', 'icon1.png', '2016-08-01 20:02:15'),
(2, 'Adobe Photoshop2', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'banner2.jpg', '2', 'icon2.png', '2016-08-01 20:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `comment` longtext CHARACTER SET utf8 NOT NULL,
  `pco_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`co_id`, `v_id`, `u_id`, `comment`, `pco_id`, `date`) VALUES
(1, 1, 1, 'test comment', 0, '2016-08-22 15:41:51'),
(24, 11, 1, 'test', 0, '2016-08-22 15:41:43'),
(25, 6, 1, 'test', 0, '2016-08-22 15:41:53'),
(26, 1, 1, 'hello', 1, '2016-08-22 17:01:31'),
(27, 1, 1, 'sd', 0, '2016-08-22 15:41:58'),
(28, 1, 1, 'sddfcf', 0, '2016-08-22 15:42:01'),
(29, 1, 1, 'test sub comment', 1, '2016-08-22 15:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name_lan1` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan2` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan3` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan4` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan5` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan6` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_description_lan1` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan2` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan3` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan4` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan5` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan6` longtext CHARACTER SET utf8 NOT NULL,
  `cat_v_url` text NOT NULL,
  `c_icon` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name_lan1`, `c_name_lan2`, `c_name_lan3`, `c_name_lan4`, `c_name_lan5`, `c_name_lan6`, `c_description_lan1`, `c_description_lan2`, `c_description_lan3`, `c_description_lan4`, `c_description_lan5`, `c_description_lan6`, `cat_v_url`, `c_icon`, `p_id`, `status`, `date`) VALUES
(1, 'Business ', 'बिजनेस ', 'બિઝનેસ ', '', '', '', '', '', '', '', '', '', '154629750', 'business.jpg', 0, '', '2016-08-12 20:17:53'),
(2, 'Web tools ', 'वेब टूल्स', 'વેબ ટૂલ્સ ', '', '', '', '', '', '', '', '', '', '154629750', 'webtools.jpg', 0, '', '2016-08-12 20:17:53'),
(3, 'Cloud Storage', ' क्लाउड स्टोरेज ', 'કલાઉડ સ્ટોરેજ ', '', '', '', '', '', '', '', '', '', '154629750', 'cloud_storage.jpg', 0, '', '2016-08-12 20:17:53'),
(4, 'E-Mail', 'ई मेल', 'ઈ મેઈલ ', '', '', '', '', '', '', '', '', '', '154629750', 'email.jpg', 0, '', '2016-08-12 20:17:53'),
(5, 'Audio+Video', ' ऑडियो + वीडयो', 'ઓડીઓ + વિડ્યો ', '', '', '', '', '', '', '', '', '', '154629750', 'audio-video.jpg', 0, '', '2016-08-12 20:17:53'),
(6, 'Computer Skills ', 'कम्प्यूटर स्किल्स ', 'કોમ્પ્યુટર સ્કિલ્સ ', '', '', '', '', '', '', '', '', '', '154629750', 'comp_skills.jpg', 0, '', '2016-08-12 20:17:53'),
(7, 'Accounting', 'अकाउंटिंग', 'એકકોઉંટીંગ ', '', '', '', '', '', '', '', '', '', '154629750', 'accounting.jpg', 0, '', '2016-08-12 20:17:53'),
(8, 'Office Tools', 'ऑफिस टूल्स', 'ઓફિસ ટૂલ્સ ', '', '', '', '', '', '', '', '', '', '154629750', 'office_tools.jpg', 0, '', '2016-08-12 20:17:53'),
(9, 'Productivity Tools', ' प्रोडक्टिविटी टूल्स', 'પ્રોડક્ટિવિટી ટૂલ્સ ', '', '', '', '', '', '', '', '', '', '154629750', 'prod_tools.jpg', 0, '', '2016-08-12 20:17:53'),
(10, 'VOIP', 'विओईपि', 'વીઓઆઈપી ', '', '', '', '', '', '', '', '', '', '154629750', 'voip.jpg', 0, '', '2016-08-12 20:17:53'),
(11, 'Microsoft PowerPoint', 'माइक्रोसॉफ्ट पावर पॉइंट', 'માઈક્રોસોફ્ટ પાવર પોઈન્ટ ', '', '', '', '', 'माइक्रोसॉफ्ट पावर पॉइंट स्लाइड प्रेजेंटेशन प्रोग्राम है I ये सॉफ्टवेयर माइक्रोसॉफ्ट कंपनी  ने बनाया है I कंपनी ने पावर पॉइंट को ऑफिशियली  22 मई, 1990 मे प्रस्तूत किया था I\nमाइक्रोसॉफ्ट पावर पॉइंट का इस्तमाल स्लाइड प्रेजेंटेशन के लिए होता है I आपके काम की स्लाइड बनाकर उसका प्रेजेंटेशन कर सकते है I इस स्लाइड मे टेक्स्ट , इमेजेज , शपस , वीडियो , थीम , बैकग्राउंड  और म्यूजिक  ऐड करके प्रेजेंटेशन को बेहतरीन और आकर्षक बना सकते है I\nमाइक्रोसॉफ्ट पावर पॉइंट की सबसे अच्छी बात यह है की स्लाइड मे एनीमेशन ऐड कर सकते है और उस एनीमेशन  द्वारा प्रेजेंटेशन कर सकते है I\n', 'માઈક્રોસોફ્ટ પવરપોઇન્ટ એ સ્લાઈડ  પ્રેસેંટેશન પ્રોગ્રામ છે. આ સોફ્ટવેર માઈક્રોસોફ્ટ કંપની  બનાવેલ છે. કંપની એ  પવરપોઇન્ટ ને ઓફિશ્યલી  ૨૨,મેં ૧૯૯૦ માં રજુ કર્યું.\nમાઈક્રોસોફ્ટ  પવરપોઇન્ટ  નો ઉસ સ્લાઈડ પ્રેસેંટેશન માટે થાય છે. તમારા વોર્ક  ની સ્લાઈડ બનાવી તેનું પ્રેસેંટેશન કરી શકાય છે. આ સ્લાઈડ માં ટેક્સટ, ઇમાગેસ, શેપસ, વિડિઓ, થીમ, બેક્ગ્રોઉંન્દ અને મ્યુઝિક એડ કરી પ્રેસેંટેશન ને ખુબ સરસ અને આકર્ષિત બનાવી શકાય છે.\nએમએસ  પવરપોઇન્ટ  માં સૌથી મજાની વાત એ છે, સ્લાઈડ  માં એનિમેશન એડ કરી શકાય છે. અને તેનું એનિમેશન દ્વારા પ્રેસેંટેશન કરી શકાય છે.\n', '', '', '', '154629750', 'powerpoint.jpg', 1, '', '2016-08-12 20:17:53'),
(12, 'Google Slides', ' गूगल स्लाइड', 'ગૂગલ સ્લાઈડ ', '', '', '', '', 'गूगल स्लाइड के साथ, आप कहीं भी प्रस्तुतिकरण बना सकते हैं, संपादित कर सकते हैं, उनमें सहयोग कर सकते हैं और उन्हें प्रस्तुत कर सकते हैं. गूगल स्लाइड आपके विचारों को, विभिन्न प्रस्तुतिकरण थीम, सैंकड़ों फ़ॉन्ट, एम्बेड किए गए वीडियो, एनिमेशन आदि के द्वारा सबसे अलग बनाता है. अपने प्रस्तुतिकरणों को कहीं से भी अपने फ़ोन, टैबलेट या कंप्यूटर से एक्सेस कर सकते है\n', 'તો સૌપ્રથમ જાણીએ કે ગૂગલે સ્લાઈડ શું છે? \nગૂગલે સ્લાઈડ ની મદદથી આપણે ઓનલાઇન  પ્રેસેંટેશન, ટેક્સટ, ઈમેજીસ, વિડિઓ નું એનિમેશન કરી શકીએ છીએ.\nગૂગલે સ્લાઈડ ની મદદ થી સ્લાઈડ માં ટેક્સટ ફોરમેશન, ઈમેજીસ and વિડિઓ ઇન્સર્ટ, સ્લાઈડ નું એનિમેશન વગેરે ફેચર નો ઉપયોગ કરીને તમને જોઈતું પ્રેસેંટેશન ઓનલાઇન ક્રિએટ કરી શકો છો. એનિમેશન માટે આપેલા ફેચર ખુબ સરળ અને ઉઝર  ફ્રેંડલી છે.\nખુબ જ સરળ રીતે સ્લાઈડ ને બીજા ઈમૈલ આઈડી  પર શેર કરી શકો છો.\nઓનલાઇન  સ્લાઈડ પર વોર્ક કરતા હોવાથી એક કરતા વધારે લોકો એક સાથે સ્લાઈડ પર વોર્ક કરી શકે છે જે ગૂગલે સ્લાઈડ નો ખુબ જ ઉપયોગી ફેચર  છે.\nગૂગલે સ્લાઈડ માં રેડી ટેમ્પ્લેટસ, થીમ્સ, એનિમેશન નો ઉપયોગ કરી ને ઝડપથી અને ખુબ સરસ સ્લાઈડ બનાવી શકો છો.\nગૂગલે સ્લાઈડ નો ઉપયોગ અલગ અલગ ક્ષેત્રો માં કરી શકો છો જેમ કે એડયુકેશન, બિઝનેસ, લૅબોરેટોરી વગેરે.\nમિત્રો, ગૂગલે સ્લાઈડ એ ખૂબ જ ઉપયોગી તેમજ free મળી આવતી ઓનલાઇન ફેસિલિટી છે, તેનો use કરવા કોઈ પણ સોફ્ટવેર  કે ઇન્સ્ટાલ્લશન ની જરૂરીયાત હોતી નથી.\n', '', '', '', '154629750', 'googleslide.jpg', 1, '', '2016-08-12 20:17:53'),
(13, 'Gmail', ' जीमेल ', 'જીમૈલ ', '', '', '', '', 'जीमेल  एक गूगल का प्रोडक्ट हैजो आपको ईमेल की सेवा देता है जिसके द्वारा आप अपना email एड्रेस बना सकते है , जिस ईमेल एड्रेस में आप ईमेल प्राप्त भी कर सकते है और किसी को ईमेल सेंड भी कर सकते हैं |जीमेल एक गूगल कीफ्री ईमेल सर्विस है |\n', 'સૌ પ્રથમ આપણે જાણીએ ગૂગલે શું છે. ગૂગલે એ એક પ્રકારનું ખુબજ પ્રખ્યાત સર્ચ એન્જિન છે. જેની મદદથી તમે કોઈ પણ કૈંવાર્ડ  ટાઈપ  કરીને સર્ચ દ્વારા તેને લગતી માહિતી મેળવી શકો છો. ગૂગલ જેવા બીજા સર્ચ  એન્જિન  પણ છે જેમ કે યાહૂ, એમએસએન , આસ્ક .મી, બિંગ વગેરે. ગૂગલ ઘણી ઝડપી અને બીજી ઘણી સર્વિસ પ્રોવાઇડ કરે છે જેમાં ગૂગલ મેઈલ , ગૂગલ+, મેપ્સ, ન્યૂઝ , ટ્રાન્સલેટેર  વગેરે જેવી એપ્સ પણ ઘણી ઉપયોગી નીવડે છે. આ ઉપરાંત ગૂગલ  એ પોતાનું બ્રોંઝર  ગૂગલ  કોર્મ બનાવેલું છે જેથી વધારે ઝડપથી ગૂગલ  સર્ચ  એન્જિન  નો ઉપયોગ કરી શકાય છે.\nગૂગલ  મેઈલ વિશે માહિતી મેળવીએ. ગૂગલ  મેઈલ ની મદદથી કોઇપણ ડોક્યુમેન્ટ ની લેવડ-દેવડ, મેઈલ  મોકલી તથા રિપ્લાઈ આપી શકાય છે. કોઇ પણ મેઈલ  ઉપડેટસ  ની જાણકારી મેળવી શકીએ છીએ, આપણી સાથે જોડાયેલા વ્યક્તિઓ સાથે વાતચીત પણ કરી શકીએ છીએ.\n', '', '', '', '154629750', 'gmail.jpg', 1, '', '2016-08-12 20:17:53'),
(14, 'Google Calander', 'गूगल कैलेंडर', 'ગૂગલ કેલેન્ડર ', '', '', '', '', 'गूगल कैलेंडर में दिखने वाला कैलेंडर  आम कैलेंडर नहीं है | गूगल कैलेंडर में काफी सारे अड्वान्स फीचर्स दीये गये है |  इस तरह के रूप में यहाँ प्लानिंग काम कर सकते हैं , तारीख के साथ-साथ वर्क  प्लानिंग , साथ ही छुट्टी निर्धारित करने की घटना, जन्मदिन की नोटिफिकेशन  एक तारीख और समय निर्धारित रिमाइंडर  सर समय का उपयोग किया जा सकता है, तो आप अपने कंप्यूटर , फोन, या टेबलेट पर गूगल कैलेंडर का उपयोग कर सकते हैं।\n', 'ગૂગલ કૅલેન્ડર માં જોવા મળતું કૅલેન્ડર એ સમાન્ય કૅલેન્ડર નથી ગૂગલ કૅલેન્ડર માં ઘણા એડવાન્સ ફેચર્સ આપવામાં આવીયા છે  જેમકે અહી તારીખ મુજબ વર્ક  પ્લાનિંગ કરી શકો છો તેમજ જેતે તારીખ અને સમય સેટ કરી રિમીડેર સેટ કરી શકો છો, તેમજ હોલીડે, ઇવેન્ટ, બર્થડે ના નોટિફિકેશન ની મદદ થી સમય સર પ્લાનિંગ કરી શકાય છે, કમ્પ્યુટર, ફોન, અથવા ટેબ્લેટ પર ગૂગલ કૅલેન્ડર નો ઉપયોગ કરી શકો છો. ', '', '', '', '154629750', 'calander.jpg', 1, '', '2016-08-12 20:17:53'),
(15, 'Evernote', 'ऐवरनॉट ', 'એવરનોટ ', '', '', '', '', 'एवरनोट सभी जानकारी ओर जरुरी चिजो क्रो याद रखने कि एप्प है। एवरनोट गूगल कीप जैसी एप्प है। यहा नया अकाउंट बनाना पडेगा। एवरनोट अनेक चीजो को समय अनुसार याद रखने कि एप्प है । हम लोग हरेक चीज उसके निर्धारित समय पर याद रखने को सक्षम नहि है या तो कोइ चीज किसि निर्धारित समय पर तय किये जाने का निर्णय किया होता है लेकिन याद ना आने कि वजह से हम वो चीज नहि कर पाते । \nतो हम वो भुल ना जाय ओर समय अनुसार सब काम हो इसलिये एवरनोट नाम कि एप्प बनाइ गइ है । जिसकि मदद से हम हरेक चिज लिख कर save कर सकते है ओर इच्छा अनूसार समय पर उसे देख सकते है । \nएवरनोट के द्वारा हमारी लिखि हुइ नोटस दुसरे व्यक्ति के साथ शेर कर सकते है, रिमाइंडर रख सकतें है, कलरिंग द्वारा अलग कर सकते है ओर नॉट का इम्पोर्टेंस सैट कर सकते है । \n', 'એવેરનોટ બધી જરૂરી માહિતી અને ચીજ-વસ્તુ ને યાદ રાખવા માટે ની એપ્લિકેશન છે. એવેરનોટ ગૂગલ કીપ જેવી જ એક એપ્લિકેશન છે. અહી નવું અકગણત બનાવવું પડશે એવેરનોટ ઘણી બધી ચીજ -વસ્તુ ને સમય પ્રમાણે યાદ રાખવાની એપ છે . આપણે લોકો બધી વસ્તુ ને તેના સમય પ્રમાણે યાદ રાખવા માટે સક્ષમ હોતા નથી કા તો કોઈ વસ્તુ કામ ના ધરેલા સમય પ્રમાણે કરવાનો નિર્ણય કર્યો હોઈ પણ કામ યાદ ના આવવાને કરને થઇ શકતું નથી. ત્યારે એવેરનોટ કાર્ય ને યાદ રાખવા માટે ની ખુબ જ જરૂરી એપ છે . ', '', '', '', '154629750', 'evernote.jpg', 1, '', '2016-08-12 20:17:53'),
(16, 'Wunder List', 'वुन्दर लिस्ट ', 'વૂનડર   લિસ્ટ ', '', '', '', '', 'वुन्दर लिस्ट ये ऑनलाइन क्लाउड़ द्यारा होनेवाली कार्य प्रणाली है| इस ऐप का कंप्यूटर, टेबलेट मोबाईल मे  भी उपयोग कर सकते है जिससे कार्य करने मे आसानी हो| वुन्दर लिस्ट ये मुफ्त ऐप है और अभी अप्रैल 2013 मे वुन्दर लिस्ट प्रो भी लौनच किया है इसमे फ्री से भी ज्यादा फीचर्स दिए गए है| वुन्दर लिस्ट ये 2011 मे बर्लिन स्तित 6 वुन्दर किंडर नाम की कंपनी ने चालू किया था और 2015 माइक्रोसॉफ्ट ने इस कंपनी को साथमे कर लिया|\n', 'વુંનડર લિસ્ટ એ ઓનલાઇન કલોઉડ દ્વારા થતી કાર્ય પ્રણાલી છે. આ એપ થી કોમ્પ્યુટર ,ટેબલટે મોબાઇલ માં પણ ઉપયોગ કરી શકીએ છીએ, આ એપ ની મદદથી કાર્ય કરવામાં સરળતા રહે છે. વુંનડર લિસ્ટ એ મફત એપ છે અપ્રિલ 2013 માં વુંનડર લિસ્ટ પ્રો પણ લૌંચ કર્યું જેમાં ફ્રી કરતા વધારે લાક્ષ્નીકતા આપવા માં આવી છે. વુંનડર લિસ્ટ એ 2011 માં બર્લિન સ્થિત 6 વુંનડર કિન્ડર નામની કંપની એ ચાલુ કરી હતી જે 2015 માં માઈક્રોસોફ્ટ એ આ કંપની ને પોતાની સાથે કરી લીધી.', '', '', '', '154629750', 'wunderlist.jpg', 1, '', '2016-08-12 20:17:53'),
(17, 'Google Keep', 'गूगल कीप ', 'ગૂગલ  કીપ ', '', '', '', '', 'गूगल कि एक ऐप  गूगल कीप के बारे मे जानकारी प्राप्त करेंगे। गूगल  कीप को गूगल  नॉट  के द्वारा भी जाना जाता है ।\nगूगल  कीप अनेक चीजो को समय अनुसार याद रखने कि ऐप है । हम लोग हरेक चीज उसके निर्धारित समय पर याद रखने को सक्षम नहि है या तो कोइ चीज किसि निर्धारित समय पर तय किये जाने का निर्णय किया होता है लेकिन याद ना आने कि वजह से हम वो चीज नहि कर पाते ।\nतो हम वो भुल ना जाय ओर समय अनुसार सब काम हो इसलिये गूगल कीप नाम कि ऐप  बनाइ गइ है । जिसकि मदद से हम हरेक चिज लिख कर सेव कर सकते है ओर इच्छा अनूसार समय पर उसे देख सकते है ।\nगूगल  कीप के द्वारा हमारी लिखि हुइ नोट  दुसरे व्यक्ति के साथ शेर कर सकते है, रिमाइंडर रख सकतें है, कलरिंग द्वारा अलग कर सकते है ओर नॉट  का इम्पोर्टेंस सैट कर सकते है । \n', 'ગૂગલ કીપ ને ગૂગલ નોટ  તરીકે પણ ઓળખવામાં આવે છે. \nગૂગલ કીપ એ વસ્તુઓને સમયસર યાદ રાખવા માટેની એક એપ છે. આપણે બધી વસ્તુઓ યાદ રાખી શકતા નથી અથવા તો આપણે અમુક વસ્તુ કોઈક ચોક્કસ સમયે કરવાનું નક્કી કરેલું હોય પણ યાદ ન આવતા આપણે તે કરી શકતા નથી.\nતો આપણે તે ભૂલી ન જઈએ અને સમયસર આપણું કામ થાય તેના માટે ગૂગલ એ ગૂગલ કીપ એપ બનાવેલી છે. જેની મદદથી આપણે દરેક વસ્તુને લખીને save કરી શકીએ છીએ અને ઈચ્છિત સમયે આપણે તેને જોઈ શકીએ છીએ.\nગૂગલ કીપ દ્વારા આપણે લખેલી નોટસ ને બીજા વ્યક્તિઓ સાથે share કરી શકાય, રેમિંદર રાખી શકાય, કલરીંગ વડે અલગ તારવી શકાય તથા નોટે નું ઇમ્પોર્ટન્સ સેટ કરી શકાય.\n', '', '', '', '154629750', 'google_keep.jpg', 1, '', '2016-08-12 20:17:53'),
(18, 'Google Forms', 'गूगल फॉर्म्स ', 'ગૂગલ  ફોર્મ્સ ', '', '', '', '', 'गूगल फॉर्म्स को किसतरह से युज कर सकते है और उसका सबसे ज्यादा उपयोग कहा कर सकते है| सबसे पहले आपको जीमेल  पर लोगिन होना जरुरी है तो ही आप फीचर्स का उपयोग कर सकते हो| \nआपको पता ही होगा फॉर्म के बोहोत सारे प्रकार होते है जिसेकी एंट्री फॉर्म्स, रजिस्ट्रेशन फॉर्म्स वैगरह| आप आपके वेब साइट के लिए भी फॉर्म्स बना सकते हो| टीचर के लिए ये बोहोतही उपयोगी है क्यू की स्टूडेंट के पास से फॉर्म्स भरवाना फिर पेरेंट्स के पास से फॉर्म्स भरवाना और स्टूडेंट को टीचर द्यारा सवाल जवाब करने के लिए फॉर्म्स उपयोगी है| और बिज़नेस पर्पस के लिए भी बोहोत उपयोगी है| गूगल फॉर्म्स को करिएट  करना बोहोत इजी है|\n', '', '', '', '', '154629750', 'forms.jpg', 1, '', '2016-08-12 20:17:53'),
(19, 'Microsoft Word', 'माइक्रोसॉफ्ट वर्ड ', 'માઈક્રોસોફ્ટ વર્ડ ', '', '', '', '', 'Microsoft word ये Microsoft office package का एक महत्वपूर्ण tool है|  \nMicrosoft word की typing सुविधा से अलग अलग documents बनाकर save कर सकते है| जिसमे letters, labels, advertisement इत्यादी का समावेश होता है| \nMicrosoft word के मदद से documents को formatting, layout, tools से edit करके आकर्षक बनाया जा सकता है| \nMicrosoft word ये official तथा unofficial documents बनाने का और संभल के रखने का एक महत्वपूर्ण program है|  \n', '', '', '', '', '154629750', 'word.jpg', 1, '', '2016-08-12 20:17:53'),
(20, 'Microsoft Excel', 'माइक्रोसॉफ्ट एक्सेल ', 'માઈક્રોસોફ્ટ એક્સસેલ ', '', '', '', '', 'Microsoft Excel एक बहुत ही उपयोगी Office Software है, आज कल आप तो जानते ही हैं, कि Office में वर्कलोड कितना बढ गया है, हर माह बहुत सारा डाटा तैयार करना पडता है, जिसमें सबसे बडी समस्‍या आती है, Calculation करने की, और उसके लिये ज्‍यादातर लोग कैल्‍यूलेटर की मदद लेते हैं, कैल्‍यूलेटर छोटी मोटे हिसाब किताब के लिये तो सही है लेकिन अगर हिसाब किताब बडे स्‍तर का है और प्रोफेशनल हैं, तो Excel से अच्‍छा विकल्‍प और कोई नहीं है।\nयह बहुत ही सरल और तेज है, टेबल कार्य के लिये पहले से ही सैल बने होते हैं, और आप इसमें कितना भी लम्‍बा चौडा हिसाब किताब एक ही पेज पर बना सकते हो, इसलिये प्रोफेशनल काम के लिये ज्‍यादातर लोग एक्‍सल का प्रयोग करते हैं, साथ ही एक बार कोई भी फार्मूला भरने पर वह सेव हो जाता है, और बार बार आप उसका प्रयोग एक कैल्‍यूलेटर की तरह कर सकते हो, लेकिन यह कैल्‍यूलेटर आपके द्वारा बनाया गया होगा, यानी एक तरह से आप के दिये गये निर्देशन में काम करेगा, जिससे आपका काम और भी सरल हो जायेगा। \n', '', '', '', '', '154629750', 'exeal.jpg', 1, '', '2016-08-12 20:17:53'),
(21, 'Google Docs', 'गूगल डॉक्स ', 'ગૂગલ ડોક્સ ', '', '', '', '', 'Google docs का उपयोग online documents create, edit, save और open करने के लिए होता है| online data save होने के कारण कोइभी जगह से या computer, mobile, tablet मे से document edit & save कर सकते है|\n\nGoogle docs के interface के मदद से documents मे text formation, table, graph ect. feature का उपयोग करके आपको चाहिए वो document online create कर सकते है|\nबोहोत ही आसान तरीकेसे document को दुसरे email id पर share कर सकते है|\nOnline document पर work करनेसे एक से ज्यादा लोक एकसाथ एक ही document पर work कर सकते है| ये Google docs का बोहोत ही उपयोगी feature है | \nGoogle docs के ready templates का उपयोग करके document जल्दी ready कर सकते है| \nGoogle docs का उपयोग अलग अलग क्षेत्रों मे कर सकते है जेसे education, business, book writing ect.\nदोस्तों, Google docs ये बोहोत ही उपयोगी और free मिलनेवाला online product है, उसका use करने के लिए कोइभी software setup या installation की जरुरत नहीं होती |\n', 'Google docs નો ઉપયોગ online documents create, edit, save અને open કરવા માટે થાય છે, online data save હોવાથી કોઈ પણ જગ્યાએથી તેમજ computer , mobile , tablet માંથી document edit & save કરી શકાઈ છે\ngoogle docs ના interface ની મદદથી documents માં text formation , table , graph વગેરે featureનો ઉપયોગ કરીને તમને જોઈતું document online create કરી શકો છો\nખુબજ સરળ રીતે document ને બીજા email id પર share કરી શકો છો.\nOnline document પર work કરતા હોવાથી  એક કરતા વધારે લોકો એક સાથે એક document પર work કરી શકે છે જે Google docs નો ખુબજ ઉપયોગી feature છે.\nGoogle docs ની ready templates નો ઉપયોગ કરી ને ઝડપથી document ready કરી શકો છો\nGoogle docs નો ઉપયોગ અલગ અલગ ક્ષેત્રો માં કરી શકો છો જેમ કે education, business , book writing વગેરે\nમિત્રો,  Google docs એ ખુબ જ ઉપયોગી તેમજ free મળી આવતી online product છે, તેનો use કરવા કોઈ પણ  software setup કે installation ની જરૂરીયાત હોતી નથી.\n', '', '', '', '154629750', 'docs.jpg', 1, '', '2016-08-12 20:17:53'),
(22, 'Google Sheets', 'गूगल शीट्स ', 'ગૂગલ  શીટ્સ ', '', '', '', '', 'हम Google Sheets के बारे मे चर्चा करेगे I\nGoogle sheet, Google drive की सेवा मे Google द्वारा बनाई हुई बिना मुल्य की web पे आधारित office suit है I Google sheet मे जानकारी का संग्रह और गणितीय व्याख्या और जानकारी को आसान तरीके से रखने के लिए होता हे।\nGoogle Sheet मे user द्वारा दी गई कोई भी संग्रहित जानकारी की कीमत का मूल्यांकन का गणितिक संमलोलन और उसमे होते changes का अवलोकन कर देते है । Google sheet द्वारा paper accounting जैसे काम को computerized बनाने मे इस्तमाल होता है । जिससे इस प्रकार की जानकारी को संभालना आसान होता है ।\nGoogle sheet online application है जो बहुत ही आसान और friendly है । Google sheet मे आप माहिती को अच्छी तरह से रख सकते हो । इसके उपर माहिती को Table, Graph, Chart, Form etc के रूप मे भी प्रस्तुत कर सकते है । Google sheet मे मौजूद option और function की मदद से जानकारी का गणितिय विशलेषण तेजी से कर देते है।\nGoogle sheet मे दी गई इस जानकारी को आप दूसरे users के साथ मी share कर सकते है I\n', 'Google Sheet  એ Google Drive ની સેવામાં અપાતી Google દ્વારા બનાવાયેલ વિનામૂલ્યે વેબ આધારિત office suite છે.\nGoogle sheet માં માહિતીનો સંગ્રહ તથા ગાણિતિક અર્થઘટન અને માહિતીને સરળ સ્વરૂપમાં ગોઠવવા માટે થાય છે.\nGoogle Sheet  માં user દ્વારા આપેલ કોઈ પણ સંગ્રહિત માહિતી કિમતો નું મુલ્યાંકન નું ગાણિતિક સમતોલન અને તેમાં થતા ફેરફારો નું અવલોકન કરી આપે છે. \nGoogle sheet દ્વારા paper accounting પ્રકારના કામ ને કોમ્પ્યુટરાઈઝડ બનાવવા ઉપયોગમાં લેવા માટે વિકસાવવામાં આવેલ છે.\nજેથી આ પ્રકારની માહિતીની જાણવણી અને ગાણિતિક અર્થઘટન સરળ બને.\nGoogle sheet એ online application છે જે ખુબ સરળ અને મૈત્રીપૂર્ણ છે. \nGoogle sheet માં તમે માહિતીને સારી રીતે ગોઠવી શકો. આ ઉપરાંત માહિતીને Table, Graph, Chart , Form વગેરે ચિત્રાત્મક રૂપે રજુ કરી શકાય છે.\nGoogle sheet  માં આપવામાં આવેલા option અને functions વડે માહિતીનું ગાણિતિક વિશ્લેષણ ઝડપી કરી આપે છે. \nGoogle sheet માં આપવામાં આવેલી માહિતીને તમે બીજા Users સાથે share પણ કરી શકો છો.\n', '', '', '', '154629750', 'sheet.jpg', 1, '', '2016-08-12 20:17:53'),
(23, 'Tally', 'टैली ', 'ટેલી', '', '', '', '', '"Windows 8.1 कयांहे? Windows 8.1 वह एक Microsoft company कि operating system है। इस्से हम उसे Windows 8 OS तरह से जानते है। Windows 8.1 version वह Windows 8 series का part हि है।\nअगर आपकी window 8 कर रहे हो तो आप directly windows 8 मे सै windows 8.1 free मे update कर सकते है।\nपिछले कुछ सालो से technology मे बडे बडे बदलाव हुऐ है। इसके कारन लोग computer को अलग अलग जगह पे use करने लगे हे। बहुत लोग आज Desktop पर जेठ के Keyboard ओर mouse सै Access नहीँ करते लेकीन वेसा आजकल Mobile या Tablet से\nअपना सब काम कर सकते हे जो पहेले Desktop या Laptop पर करते थै I"\n', '', '', '', '', '154629750', 'tally.jpg', 1, '', '2016-08-12 20:17:53'),
(28, 'Google Drive', 'गूगल ड्राइव ', 'ગૂગલ  ડ્રાઈવ ', '', '', '', 'Google Drive', '', '', '', '', '', '154629750', 'Google Drive.png', 3, 'Enables', '2016-08-12 20:17:53'),
(29, 'Google Hangout', 'गूगल हैंगऑउट ', 'ગૂગલ  હેંગઆઉંટ ', '', '', '', 'Google Hangout', '', '', '', '', '', '154629750', 'Google Hangout.png', 10, 'Enables', '2016-08-12 20:17:53'),
(30, 'Google IME', 'गूगल आईएमइ ', 'ગૂગલે આઈએમઈ ', '', '', '', 'Google IME', '', '', '', '', '', '154629750', 'Google IME.png', 6, 'Enables', '2016-08-12 20:17:53'),
(31, 'Google Translate', 'गूगल ट्रांसलेट ', 'ગૂગલે ટ્રાન્સલેટ ', '', '', '', 'Google Translate', '', '', '', '', '', '154629750', 'Google Translate.png', 2, 'Enables', '2016-08-12 20:17:53'),
(32, 'Youtube', 'युट्यूब ', 'યુટ્યૂબ', '', '', '', 'Youtube', '', '', '', '', '', '154629750', 'Youtube.png', 0, 'Enables', '2016-08-12 20:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_complete`
--

CREATE TABLE IF NOT EXISTS `course_complete` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `complete` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_complete`
--

INSERT INTO `course_complete` (`cc_id`, `c_id`, `u_id`, `complete`, `date`) VALUES
(1, 11, 1, '23', '2016-08-19 22:02:33'),
(2, 12, 1, '14', '2016-07-22 10:50:44'),
(3, 0, 1, '0', '2016-07-25 14:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_value` varchar(150) NOT NULL,
  `seq` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`e_id`, `e_value`, `seq`, `date`) VALUES
(1, 'Primary', '1', '2016-09-13 13:57:57'),
(2, 'Secondary', '2', '2016-09-13 13:58:02'),
(3, 'SSC', '3', '2016-09-13 13:58:06'),
(4, 'HSC', '4', '2016-09-13 13:58:14'),
(5, 'Diploma', '5', '2016-09-13 13:58:17'),
(6, 'Bachelors', '6', '2016-09-13 13:58:21'),
(7, 'Masters', '7', '2016-09-13 13:58:24'),
(8, 'B.Tech.', '8', '2016-09-13 13:58:28'),
(9, 'M.Tech.', '9', '2016-09-13 13:58:32'),
(10, 'Doctor', '10', '2016-09-13 13:58:35'),
(11, 'MBA', '11', '2016-09-13 13:58:39'),
(12, 'CA', '12', '2016-09-13 13:58:43'),
(13, 'Ph.D.', '13', '2016-09-13 13:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `intro_vid`
--

CREATE TABLE IF NOT EXISTS `intro_vid` (
  `iv_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `v_url` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`iv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `intro_vid`
--

INSERT INTO `intro_vid` (`iv_id`, `c_id`, `v_url`, `date`) VALUES
(1, 13, '179857679', '2016-08-24 00:30:44'),
(2, 19, '179861992', '2016-08-24 00:32:28'),
(3, 20, '179863516', '2016-08-24 00:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `l_slug` varchar(150) CHARACTER SET utf8 NOT NULL,
  `l_code` varchar(150) CHARACTER SET utf8 NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`l_id`, `l_name`, `l_slug`, `l_code`, `status`, `date`) VALUES
(1, 'English', 'lan1', 'eng', 'deactive', '2016-08-16 21:56:42'),
(2, 'Hindi', 'lan2', 'hi', 'active', '2016-07-07 12:53:49'),
(3, 'Gujarati', 'lan3', 'guj', 'active', '2016-07-07 12:53:56'),
(4, 'Language4', 'lan4', 'lan4', 'deactive', '2016-07-06 08:24:28'),
(5, 'Language5', 'lan5', 'lan5', 'deactive', '2016-07-05 10:37:27'),
(6, 'Language6', 'lan6', 'lan6', 'deactive', '2016-07-05 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_value` varchar(50) NOT NULL,
  `seq` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`o_id`, `o_value`, `seq`, `date`) VALUES
(1, 'Student', '1', '2016-09-12 22:40:17'),
(2, 'Business', '2', '2016-09-12 22:40:17'),
(3, 'Service', '3', '2016-09-12 22:40:42'),
(4, 'Homemaker', '4', '2016-09-12 22:40:45'),
(5, 'Retired', '5', '2016-09-12 22:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ur_id`, `rate`, `cat_id`, `u_id`, `date`) VALUES
(1, '5', 11, 1, '2016-09-13 17:18:30'),
(2, '2', 12, 1, '2016-08-20 01:26:00'),
(3, '3', 20, 2061, '2016-08-24 00:44:08'),
(4, '3', 11, 0, '2016-08-26 22:13:12'),
(5, '4', 13, 1, '2016-08-29 18:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `language` varchar(20) NOT NULL,
  `u_type` varchar(20) NOT NULL,
  `user_limit` varchar(20) NOT NULL,
  `add_by` int(11) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dob` varchar(20) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `education` varchar(150) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `full_name`, `email`, `mobile`, `u_name`, `password`, `profile_pic`, `language`, `u_type`, `user_limit`, `add_by`, `validity`, `status`, `date`, `dob`, `state`, `country`, `education`, `occupation`, `phone`) VALUES
(1, 'Snehal Trapsiya', 'snehal.trapsiya@gmail.com', '8866739817', 'test@gmail.com', 'test', 'ldlogo.gif', 'lan2', 'user', '', 3, '2016-09-29', 'active', '2016-09-14 21:45:35', '1993-08-02', 'Gujarat', 'India', 'Bachelors', 'Service', ''),
(2, 'Aur Seekho', 'test@gmail.com', '8866739817', 'admin', 'admin', '', 'lan1', 'admin', '', 0, '2016-09-29', '', '2016-07-25 14:57:35', '', '', '', '', '', ''),
(3, 'test', 'test@test.com', '1234567890', 'test', 'test', 'Capture.JPG', 'lan1', 'vendor', '2', 2, '2016-09-29', 'active', '2016-07-25 15:27:43', '', '', '', '', '', ''),
(4, 'mehul', 'mehul@gmail.com', '2785687364', 'mehul', 'mehul', 'Mehul_Patel.jpg', 'lan3', '', '', 3, '2016-08-31', 'deactive', '2016-09-12 16:05:28', '', '', '', '', '', ''),
(8, 'abhay jethva', 'abhay@gmail.com', '1234567890', 'abhay', 'abhay', 'YouTube-logo-play-icon.png', 'lan2', '', '', 3, '2016-08-31', 'active', '2016-09-14 22:57:59', '', '', '', '', '', ''),
(9, 'raju1', 'raju@gmail.com1', '123478902341', 'raju1', 'raju1', 'logo.png', 'lan3', 'vendor', '7', 2, '2016-09-29', 'deactive', '2016-07-08 13:15:16', '', '', '', '', '', ''),
(10, 'mehul patel kadi', 'mehulkadi@gmail.com', '8866739817', 'mehulkadi', 'mehul', 'video.JPG', 'lan3', 'user', '', 3, '2016-09-29', 'deactive', '2016-09-12 20:31:34', '', '', '', '', '', ''),
(11, '', '', '', 'ortest', 'ortest', '', 'lan2', 'user', '', 3, '2016-09-29', 'deactive', '2016-09-14 22:57:54', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE IF NOT EXISTS `user_course` (
  `uc_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`uc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`uc_id`, `u_id`, `cat_id`, `status`) VALUES
(3, 1, 11, 'Active'),
(4, 3, 11, 'Active'),
(5, 2061, 11, 'Active'),
(7, 1, 12, 'Active'),
(8, 1, 13, 'Active'),
(9, 1, 20, 'Active'),
(10, 1, 14, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name_lan1` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_lan2` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_lan3` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_lan4` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_lan5` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_lan6` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_url_lan1` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_lan2` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_lan3` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_lan4` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_lan5` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_lan6` longtext CHARACTER SET utf8 NOT NULL,
  `v_level` varchar(30) NOT NULL,
  `v_duration` varchar(30) NOT NULL,
  `v_rating` varchar(20) NOT NULL,
  `v_view_count` varchar(20) NOT NULL,
  `v_order` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=291 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`v_id`, `v_name_lan1`, `v_name_lan2`, `v_name_lan3`, `v_name_lan4`, `v_name_lan5`, `v_name_lan6`, `v_url_lan1`, `v_url_lan2`, `v_url_lan3`, `v_url_lan4`, `v_url_lan5`, `v_url_lan6`, `v_level`, `v_duration`, `v_rating`, `v_view_count`, `v_order`, `cat_id`, `date`) VALUES
(1, 'Introduction', 'पावर पोइन्ट का परिचय', 'પાવર પોઈન્ટનો પરિચય', '', '', '', '', '154007606', '154629750', '', '', '', 'Beginner', '1:22', '', '', '', 11, '2016-09-08 17:19:24'),
(2, 'Interface', 'पावर पोइन्ट के इन्टरफेस', 'પાવર પોઈન્ટની ઇન્ટરફેસ', '', '', '', '', '154007611', '153330044', '', '', '', 'Beginner', '3:03', '', '', '', 11, '2016-09-08 17:19:24'),
(3, 'Creating and Opening Presentation', 'क्रिएटिंग एन्ड ओपनिंग प्रेजेंटेशन', 'ક્રિએટીંગ એન્ડ ઓપનીંગ પ્રેઝન્ટેશન', '', '', '', '', '154007607', '153368112', '', '', '', 'Beginner', '2:31', '', '', '', 11, '2016-09-08 17:19:24'),
(4, 'Saving and Sharing', 'सेविंग एन्ड शेरिंग', 'સેવિંગ એન્ડ શેરિંગ', '', '', '', '', '153594014', '153483181', '', '', '', 'Beginner', '1:47', '', '', '', 11, '2016-09-08 17:19:24'),
(5, 'Slide Basics', 'स्लाइड बेज़िक्स', 'સ્લાઈડ બેઝિક', '', '', '', '', '154007605', '153472036', '', '', '', 'Beginner', '3:51', '', '', '', 11, '2016-09-08 17:19:24'),
(6, 'Text Basics', 'टेक्स्ट बेजिक', 'ટેક્ષ્ટ બેઝિક', '', '', '', '', '154007621', '153472039', '', '', '', 'Beginner', '4:01', '', '', '', 11, '2016-09-08 17:19:24'),
(7, 'Find and Replace', 'फाइंड एन्ड रिप्लेस', 'ફાઈન્ડ એન્ડ રિપ્લેસ', '', '', '', '', '154007622', '153472048', '', '', '', 'Beginner', '2:53', '', '', '', 11, '2016-09-08 17:19:25'),
(8, 'Applying Themes', 'एप्लायिंग थीम', 'એપ્લાયિંગ થીમ', '', '', '', '', '154007618', '153472057', '', '', '', 'Beginner', '2:38', '', '', '', 11, '2016-09-08 17:19:25'),
(9, 'Applying Transition', 'एप्लायिंग ट्रांजिशन', 'એપ્લાયિંગ ટ્રાન્ઝીશન', '', '', '', '', '153594013', '153483823', '', '', '', 'Beginner', '2:23', '', '', '', 11, '2016-09-08 17:19:25'),
(10, 'Managing Slides', 'मेनेजिंग स्लाइड', 'મેનેજિંગ સ્લાઈડ', '', '', '', '', '153594017', '153484025', '', '', '', 'Beginner', '1:41', '', '', '', 11, '2016-09-08 17:19:25'),
(11, 'Printing', 'प्रिंटिंग', 'પ્રિન્ટીંગ', '', '', '', '', '153594019', '153472056', '', '', '', 'Beginner', '3:43', '', '', '', 11, '2016-09-08 17:19:25'),
(12, 'Presenting your slideshow 1', 'प्रेज़ेन्टिंग स्लाइड शो 1', 'પ્રેઝેન્ટીંગ સ્લાઈડ શો 1', '', '', '', '', '153594022', '153472043', '', '', '', 'Intermediate', '4:09', '', '', '', 11, '2016-09-08 17:19:25'),
(13, 'Presenting your slideshow 2', 'प्रेज़ेन्टिंग स्लाइड शो 2', '13 પ્રેઝેન્ટીંગ સ્લાઈડ શો 2', '\r\n', '', '', '', '153594023', '153472047', '', '', '', 'Intermediate', '3:17', '', '', '', 11, '2016-09-08 17:19:25'),
(14, 'Lists', 'लिस्ट', 'લિસ્ટ', '', '', '', '', '153594024', '153472055', '', '', '', 'Intermediate', '2:56', '', '', '', 11, '2016-09-08 17:19:25'),
(15, 'Indent and Line Spacing', 'इंडेंट एन्ड लाइन स्पेसिंग', 'ઇન્ડેન્ટ એન્ડ લાઈન સ્પેસીંગ', '', '', '', '', '153594012', '153485161', '', '', '', 'Intermediate', '2:21', '', '', '', 11, '2016-09-08 17:19:25'),
(16, 'Insert Pictures', 'इन्सर्ट पिक्चर', 'ઇન્સર્ટ પિક્ચર', '', '', '', '', '153594660', '153485360', '', '', '', 'Intermediate', '2:13', '', '', '', 11, '2016-09-08 17:19:25'),
(17, 'Formatting Pictures', 'फोर्मेटिंग पिक्चर', 'ફોર્મેટિંગ પિક્ચર', '', '', '', '', '153594015', '153472034', '', '', '', 'Intermediate', '4:14', '', '', '', 11, '2016-09-08 17:19:25'),
(18, 'Shapes', 'शेइप', 'શેઈપ', '', '', '', '', '153594021', '153472037', '', '', '', 'Intermediate', '2:18', '', '', '', 11, '2016-09-08 17:19:25'),
(19, 'Textbox', 'टेक्स्ट बॉक्स', 'ટેક્ષ્ટ બોક્ષ', '', '', '', '', '153594016', '153485621', '', '', '', 'Intermediate', '2:25', '', '', '', 11, '2016-09-08 17:19:25'),
(20, 'Wordart', 'वर्ड आर्ट', 'વર્ડઆર્ટ', '', '', '', '', '153594025', '153485831', '', '', '', 'Intermediate', '2:35', '', '', '', 11, '2016-09-08 17:19:25'),
(21, 'Arranging Objects', 'एरेन्ज ऑब्जेक्ट', 'એરેન્જ ઓબ્જેક્ટ', '', '', '', '', '154007609', '153472038', '', '', '', 'Intermediate', '4:01', '', '', '', 11, '2016-09-08 17:19:25'),
(22, 'Animating Text', 'एनीमेशन टेक्स्ट', 'એનિમેશન ટેક્ષ્ટ', '', '', '', '', '154007619', '153472042', '', '', '', 'Intermediate', '5:22', '', '', '', 11, '2016-09-08 17:19:26'),
(23, 'Inserting Videos', 'इन्सर्टिंग विडिओ', 'ઇન્સર્ટિંગ વિડીઓ', '', '', '', '', '154007612', '153472054', '', '', '', 'Intermediate', '3:21', '', '', '', 11, '2016-09-08 17:19:26'),
(24, 'Inserting Audio', 'इन्सर्टिंग ऑडियो', 'ઇન્સર્ટિંગ ઓડીઓ', '', '', '', '', '153594659', '153486734', '', '', '', 'Intermediate', '2:57', '', '', '', 11, '2016-09-08 17:19:26'),
(25, 'Tables', 'इन्सर्ट टेबल', 'ઇન્સર્ટ ટેબલ', '', '', '', '', '153659546', '153472035', '', '', '', 'Advanced', '3:44', '', '', '', 11, '2016-09-08 17:19:26'),
(26, 'Chart', 'चार्ट', 'ચાર્ટ', '', '', '', '', '153659862', '153472050', '', '', '', 'Advanced', '4:14', '', '', '', 11, '2016-09-08 17:19:26'),
(27, 'Inserting Graphics', 'इन्सर्ट चार्ट', 'ઇન્સર્ટ ચાર્ટ', '', '', '', '', '153659544', '153472046', '', '', '', 'Advanced', '5:25', '', '', '', 11, '2016-09-08 17:19:26'),
(28, 'Smart Art Graphics', 'स्मार्ट आर्ट ग्राफिक', 'સ્માર્ટ આર્ટ ગ્રાફિક', '', '', '', '', '153659548', '153487102', '', '', '', 'Advanced', '2:26', '', '', '', 11, '2016-09-08 17:19:26'),
(29, 'Checking Spelling and Grammer', 'चेक स्पेलिंग एन्ड ग्रामर', 'ચેક સ્પેલિંગ એન્ડ ગ્રામર', '', '', '', '', '153594661', '153487262', '', '', '', 'Advanced', '1:12', '', '', '', 11, '2016-09-08 17:19:26'),
(30, 'Reviewing presentation', 'रिव्यू प्रेज़न्टेशन', 'રીવ્યુ પ્રેઝન્ટેશન', '', '', '', '', '153659545', '153487438', '', '', '', 'Advanced', '2:01', '', '', '', 11, '2016-09-08 17:19:26'),
(31, 'Protecting Presentations', 'प्रोटेक्ट डोक्युमेंट', 'પ્રોટેક્ટ ડોક્યુમેન્ટ', '', '', '', '', '153659542', '153487603', '', '', '', 'Advanced', '1:52', '', '', '', 11, '2016-09-08 17:19:26'),
(32, 'Themes', 'थीम्स', 'થીમ્સ', '', '', '', '', '153594658', '153487589', '', '', '', 'Advanced', '1:55', '', '', '', 11, '2016-09-08 17:19:26'),
(33, 'Slide Master View', 'स्लाइड मास्टर', 'સ્લાઈડ માસ્ટર', '', '', '', '', '153659543', '153487598', '', '', '', 'Advanced', '2:30', '', '', '', 11, '2016-09-08 17:19:26'),
(34, 'Hyperlinks and Action Buttons', 'हायपरलिंक एन्ड एक्शन बटन', 'હાઇપરલિંક એન્ડ એક્શન બટન', '', '', '', '', '154007616', '153472051', '', '', '', 'Advanced', '3:21', '', '', '', 11, '2016-09-08 17:19:26'),
(35, 'Advanced Presentation Options', 'एडवान्स प्रेज़न्टेशन', 'એડવાન્સ પ્રેઝન્ટેશન', '', '', '', '', '153659541', '153487600', '', '', '', 'Advanced', '4:07', '', '', '', 11, '2016-09-08 17:19:26'),
(36, 'Google Slides introduction', 'परिचय', 'પરિચય', '', '', '', '', '153877812', '153877025', '', '', '', 'Beginner', '1:37', '', '', '', 12, '2016-09-08 17:19:26'),
(37, 'Sign-in in and creating a Slides', 'साइन इन एन्ड क्रिएटिंग स्लाइड्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ સ્લાઈડસ', '', '', '', '', '153877876', '153663630', '', '', '', 'Beginner', '1:31', '', '', '', 12, '2016-09-08 17:19:26'),
(38, 'Google Slides Interface', 'गूगल स्लाइड्स इन्टरफेस', 'ગુગલ સ્લાઈડસ ઇન્ટરફેસ', '', '', '', '', '153877861', '153663638', '', '', '', 'Beginner', '2:37', '', '', '', 12, '2016-09-08 17:19:27'),
(39, 'Create slide and presentation', 'क्रिएट स्लाइड एन्ड प्रेज़न्टेशन', 'ક્રિએટ સ્લાઈડ એન્ડ પ્રેઝન્ટેશન', '', '', '', '', '153877836', '153663631', '', '', '', 'Beginner', '1:24', '', '', '', 12, '2016-09-08 17:19:27'),
(40, 'Slide Basics', 'स्लाइड्स बेज़िक्स', 'સ્લાઈડસ બેઝીક્સ', '', '', '', '', '153877818', '153663639', '', '', '', 'Beginner', '3:17', '', '', '', 12, '2016-09-08 17:19:27'),
(41, 'Text Formatting', 'टेक्स्ट फोर्मेटिंग', 'ટેક્ષ્ટ ફોર્મેટિંગ', '', '', '', '', '153879358', '153663634', '', '', '', 'Beginner', '3:11', '', '', '', 12, '2016-09-08 17:19:27'),
(42, 'Insert Image', 'इन्सर्ट इमेज', 'ઇન્સર્ટ ઈમેજ', '', '', '', '', '153879359', '153663635', '', '', '', 'Beginner', '3:44', '', '', '', 12, '2016-09-08 17:19:27'),
(43, 'Insert Shape and Lines', 'इन्सर्ट शेइप्स एन्ड लाइंस', 'ઇન્સર્ટ શેઈપ્સ એન્ડ લાઈન્સ', '', '', '', '', '153879361', '153663636', '', '', '', 'Intermediate', '2:48', '', '', '', 12, '2016-09-08 17:19:27'),
(44, 'Theme and Background', 'थीम एन्ड ब्रेक्ग्राउन्द', 'થીમ એન્ડ બેકગ્રાઉન્ડ', '', '', '', '', '153877842', '153663633', '', '', '', 'Intermediate', '1:44', '', '', '', 12, '2016-09-08 17:19:27'),
(45, 'Insert video and Word art', 'इन्सर्ट विडिओ एन्ड वर्डआर्ट', 'ઇન્સર્ટ વિડીઓ એન્ડ વર્ડઆર્ટ', '', '', '', '', '153877855', '153663632', '', '', '', 'Intermediate', '1:29', '', '', '', 12, '2016-09-08 17:19:27'),
(46, 'slide numbers and comments', 'स्लाइड नम्बर्स एन्ड कोमेंट्स', 'સ્લાઈડ નંબર્સ એન્ડ કોમેન્ટ્સ', '', '', '', '', '153877821', '153771042', '', '', '', 'Intermediate', '1:30', '', '', '', 12, '2016-09-08 17:19:27'),
(47, 'Animation in Slides', 'एनीमेशन इन स्लाइड', 'એનિમેશન ઇન સ્લાઈડ', '', '', '', '', '153877838', '153771025', '', '', '', 'Intermediate', '2:53', '', '', '', 12, '2016-09-08 17:19:27'),
(48, 'Insert Table & Function', 'इन्सर्ट टेबल एन्ड फंक्शन', 'ઇન્સર્ટ ટેબલ એન્ડ ફંક્શન', '', '', '', '', '153877819', '153771035', '', '', '', 'Intermediate', '2:39', '', '', '', 12, '2016-09-08 17:19:27'),
(49, 'File menu part-1', 'फ़ाइल मेनु पार्ट - 1', 'ફાઈલ મેનુ પાર્ટ - 1', '', '', '', '', '153877875', '153771036', '', '', '', 'Intermediate', '3:57', '', '', '', 12, '2016-09-08 17:19:27'),
(50, 'File menu Part- 2', 'फ़ाइल मेनु पार्ट - 2', 'ફાઈલ મેનુ પાર્ટ - 2', '', '', '', '', '153877847', '153877015', '', '', '', 'Advanced', '3:44', '', '', '', 12, '2016-09-08 17:19:27'),
(51, 'Find and replace', 'फाइंड एन्ड रिप्लेस', 'ફાઈન્ડ એન્ડ રિપ્લેસ', '', '', '', '', '153879615', '153771037', '', '', '', 'Advanced', '1:55', '', '', '', 12, '2016-09-08 17:19:27'),
(52, 'Arrange menu', 'अरेंज मेनु', 'અરેંજ મેનુ', '', '', '', '', '153877877', '153771038', '', '', '', 'Advanced', '2:06', '', '', '', 12, '2016-09-08 17:19:28'),
(53, 'Tools menu', 'टूल्स मेनु', 'ટૂલ્સ મેનુ', '', '', '', '', '153879621', '153771033', '', '', '', 'Advanced', '2:14', '', '', '', 12, '2016-09-08 17:19:28'),
(54, 'Master option', 'मास्टर ऑप्शन', 'માસ્ટર ઓપ્શન', '', '', '', '', '153879612', '153771031', '', '', '', 'Advanced', '1:25', '', '', '', 12, '2016-09-08 17:19:28'),
(55, 'Introduction to Google Slide Mobile', 'गूगल स्लाइड मोबाइल परिचय', 'ગુગલ સ્લાઈડ મોબાઈલ પરિચય', '', '', '', '', '153877814', '153771039', '', '', '', 'Advanced', '7:29', '', '', '', 12, '2016-09-08 17:19:28'),
(56, 'Introduction advance features', 'एडवान्स फीचर्स परिचय', 'એડવાન્સ ફીચર્સ પરિચય', '', '', '', '', '153659541', '153774267', '', '', '', 'Advanced', '3:47', '', '', '', 12, '2016-09-08 17:19:28'),
(57, 'Introduction', 'परिचय', 'પરિચય', '', '', '', '', '154569282', '154393044', '', '', '', 'Beginner', '1:49', '', '', '', 13, '2016-09-08 17:19:28'),
(58, 'Gmail Use', 'जिमेइल का उपयोग', 'જીમેઇલનો ઉપયોગ', '', '', '', '', '153755547', '154396006', '', '', '', 'Beginner', '1:18', '', '', '', 13, '2016-09-08 17:19:28'),
(59, 'Create new Account', 'नया अकाउंट बनाए', 'નવું એકાઉન્ટ બનાવો', '', '', '', '', '154693815', '154396406', '', '', '', 'Beginner', '4:31', '', '', '', 13, '2016-09-08 17:19:28'),
(60, 'Inbox', 'इनबॉक्स', 'ઇનબોક્ષ', '', '', '', '', '154569284', '153669926', '', '', '', 'Beginner', '3:36', '', '', '', 13, '2016-09-08 17:19:28'),
(61, 'Themes and Inbox Type', 'थीम्स एन्ड इनबॉक्स टाइप', 'થીમ્સ એન્ડ ઇનબોક્ષ ટાઇપ', '', '', '', '', '154046583', '154396471', '', '', '', 'Beginner', '4:52', '', '', '', 13, '2016-09-08 17:19:28'),
(62, 'Compose Email & Formatting Email', 'कम्पोज़ मेइल एन्ड फोर्मेटिंग मेइल', 'કમ્પોઝ મેઈલ એન્ડ ફોર્મેટિંગ મેઈલ', '', '', '', '', '153755626', '153669911', '', '', '', 'Beginner', '4:09', '', '', '', 13, '2016-09-08 17:19:28'),
(63, 'Replying', 'रिप्लायिंग', 'રીપ્લાયીંગ', '', '', '', '', '154046568', '154396532', '', '', '', 'Beginner', '4:46', '', '', '', 13, '2016-09-08 17:19:28'),
(64, 'Starred, Important, Sent Mail, etc', 'स्टार्ड, इम्पोर्टेन्ट, सेंट मेइल, चेट', 'સ્ટાર્ડ, ઈમ્પોર્ટન્ટ, સેન્ટ મેઈલ, ચેટ', '', '', '', '', '153755589', '154395117', '', '', '', 'Beginner', '2:45', '', '', '', 13, '2016-09-08 17:19:28'),
(65, 'Working With Attachments', 'अटेचमेन्ट के साथ काम', 'અટેચમેન્ટસ સાથે કામ', '', '', '', '', '153755553', '153669925', '', '', '', 'Beginner', '2:38', '', '', '', 13, '2016-09-08 17:19:28'),
(66, 'Quick Action', 'क्विक एक्शन', 'ક્વિક એક્શન', '', '', '', '', '153755600', '154395097', '', '', '', 'Intermediate', '1:43', '', '', '', 13, '2016-09-08 17:19:28'),
(67, 'Muting Conversation', 'म्युटिंग कन्वर्ज़ेशन', 'મ્યુટીંગ કન્વર્ઝેશન', '', '', '', '', '153755606', '153669932', '', '', '', 'Intermediate', '1:38', '', '', '', 13, '2016-09-08 17:19:28'),
(68, 'Multiple Messages', 'मल्टिपल मेसेजिस', 'મલ્ટીપલ મેસેજીસ', '', '', '', '', '153755632', '154395110', '', '', '', 'Intermediate', '2:08', '', '', '', 13, '2016-09-08 17:19:29'),
(69, 'Creating Labels', 'करिएटिंग लेबल्स', 'ક્રિએટીંગ લેબલ્સ', '', '', '', '', '153755584', '154396675', '', '', '', 'Intermediate', '3:15', '', '', '', 13, '2016-09-08 17:19:29'),
(70, 'Moving Messages', 'मूविंग मेसेजिस', 'મુવીંગ મેસેજીસ', '', '', '', '', '153755540', '153669910', '', '', '', 'Intermediate', '1:53', '', '', '', 13, '2016-09-08 17:19:29'),
(71, 'Creating Filters', 'करिएटिंग फिल्टर्स', 'ક્રિએટીંગ ફિલ્ટર્સ', '', '', '', '', '153755609', '154396750', '', '', '', 'Intermediate', '3:40', '', '', '', 13, '2016-09-08 17:19:29'),
(72, 'Managing Labels', 'मेनेजिंग लेबल्स', 'મેનેજીંગ લેબલ્સ', '', '', '', '', '153755539', '153669910', '', '', '', 'Intermediate', '2:53', '', '', '', 13, '2016-09-08 17:19:29'),
(73, 'Advanced Searching', 'एडवान्स सर्चिंग', 'એડવાન્સ સર્ચીંગ', '', '', '', '', '153755591', '153669921', '', '', '', 'Intermediate', '3:53', '', '', '', 13, '2016-09-08 17:19:29'),
(74, 'Managing Account', 'मेनेजिंग एकाउन्ट्स', 'મેનેજીંગ એકાઉન્ટસ', '', '', '', '', '153755554', '153669929', '', '', '', 'Intermediate', '2:23', '', '', '', 13, '2016-09-08 17:19:29'),
(75, 'Gmail Settings', 'जिमेइल सेटिंग', 'જીમેઇલ સેટીંગ્સ', '', '', '', '', '153760435', '153669939', '', '', '', 'Intermediate', '1:33', '', '', '', 13, '2016-09-08 17:19:29'),
(76, 'Creating Contacts', 'करिएटिंग कोंटेक्स', 'ક્રિએટીંગ કોન્ટેક્સ', '', '', '', '', '153755637', '154395111', '', '', '', 'Advanced', '2:06', '', '', '', 13, '2016-09-08 17:19:30'),
(77, 'Creating Groups', 'करिएटिंग ग्रुप्स', 'ક્રિએટીંગ ગ્રુપ્સ', '', '', '', '', '153755663', '154395115', '', '', '', 'Advanced', '1:31', '', '', '', 13, '2016-09-08 17:19:30'),
(78, 'Importing Contacts & Settings', 'इम्पोटिंग कोंटेक्स एन्ड सेटिंग', 'ઈમ્પોર્ટીંગ કોન્ટેક્સ એન્ડ સેટીંગ્સ', '', '', '', '', '154047340', '153669923', '', '', '', 'Advanced', '3:14', '', '', '', 13, '2016-09-08 17:19:30'),
(79, 'Introducing Chat, Chat Status & Settings', 'इंट्रोडयुसिंग चेट, चेट स्टेट्स एन्ड सेटिंग', 'ઇન્ટ્રોડયુસીંગ ચેટ, ચેટ સ્ટેટ્સ & સેટીંગ્સ', '', '', '', '', '154047348', '154396800', '', '', '', 'Advanced', '3:39', '', '', '', 13, '2016-09-08 17:19:30'),
(80, 'Initiating Video', 'इनिशिएटिंग विडिओ', 'ઈનીશીએટીંગ વિડીઓ', '', '', '', '', '154047335', '154395096', '', '', '', 'Advanced', '1:01', '', '', '', 13, '2016-09-08 17:19:30'),
(81, 'Creating Tasks', 'करिएटिंग टास्क', 'ક્રિએટીંગ ટાસ્ક', '', '', '', '', '154047351', '154396924', '', '', '', 'Advanced', '3:02', '', '', '', 13, '2016-09-08 17:19:30'),
(82, 'Vacation Responder', 'वेकेशन रिस्पोंडर', 'વેકેશન રીસ્પોંડર', '', '', '', '', '154047346', '154395108', '', '', '', 'Advanced', '1:48', '', '', '', 13, '2016-09-08 17:19:30'),
(83, 'Signature Files', 'सिग्नेचर फाइल्स', 'સિગ્નેચર ફાઈલ્સ', '', '', '', '', '154047367', '153669899', '', '', '', 'Advanced', '1:53', '', '', '', 13, '2016-09-08 17:19:30'),
(84, 'Shortcuts of gmail', 'शार्टकटस', 'શોર્ટકટસ', '', '', '', '', '154047354', '154396866', '', '', '', 'Advanced', '3:15', '', '', '', 13, '2016-09-08 17:19:30'),
(85, 'Quick Links', 'क्विक लिंक्स', 'ક્વિક લીન્ક્સ', '', '', '', '', '154047345', '153669907', '', '', '', 'Advanced', '1:48', '', '', '', 13, '2016-09-08 17:19:30'),
(86, 'Gmail for Mobile login', 'मोबाइल - जीमेइल लॉग इन', 'જીમેઇલનો - લૉગ ઇન વિથ મોબાઇલ', '', '', '', '', '154047359', '153669938', '', '', '', '', '2:46', '', '', '', 13, '2016-09-08 17:19:30'),
(87, 'Google Calendar Interface', 'गूगल केलेन्डर का परिचय', 'ગુગલ કેલેન્ડરનો પરિચય', '', '', '', '', '154045144', '153873839', '', '', '', 'Beginner', '1:35', '', '', '', 14, '2016-09-08 17:19:30'),
(88, 'Create new event', 'नयी इवेन्ट', 'નવી ઇવેન્ટ', '', '', '', '', '154045147', '153873838', '', '', '', 'Beginner', '4:10', '', '', '', 14, '2016-09-08 17:19:30'),
(89, 'Create new Calendar', 'नया केलेन्डर', 'નવું કેલેન્ડર', '', '', '', '', '154045145', '153873841', '', '', '', 'Beginner', '1:16', '', '', '', 14, '2016-09-08 17:19:30'),
(90, 'Getting Started', 'एवरनोट गेटिंग स्टार्टेड', 'એવરનોટ ગેટીંગ સ્ટાર્ટેડ', '', '', '', '', '154007107', '154397992', '', '', '', 'Beginner', '1:40', '', '', '', 15, '2016-09-08 17:19:30'),
(91, 'Interface', 'एवरनोट इन्टरफेस', 'એવરનોટ ઇન્ટરફેસ', '', '', '', '', '154007108', '154397993', '', '', '', 'Beginner', '2:40', '', '', '', 15, '2016-09-08 17:19:31'),
(92, 'Create New Notebook & Tag', 'क्रिएट न्यू टेग और नोटबुक', 'ક્રિએટ ન્યુ ટેગ એન્ડ નોટબુક', '', '', '', '', '154007110', '155211167', '', '', '', 'Beginner', '1:28', '', '', '', 15, '2016-09-08 17:19:31'),
(93, 'Evernote - Mobile app', 'एवरनोट मोबाइल एप', 'એવરનોટ મોબાઈલ એપ', '', '', '', '', '154007109', '154839279', '', '', '', 'Beginner', '1:38', '', '', '', 15, '2016-09-08 17:19:31'),
(94, 'Introduction', 'वंडरलिस्ट का परिचय 1', 'વન્ડરલિસ્ટનો પરિચય 1', '', '', '', '', '154397391', '153876216', '', '', '', 'Beginner', '3:52', '', '', '', 16, '2016-09-08 17:19:31'),
(95, 'How to use wunderlist', 'वंडरलिस्ट का परिचय 2', 'વન્ડરલિસ્ટનો પરિચય 2', '', '', '', '', '154397392', '153876085', '', '', '', 'Beginner', '4:34', '', '', '', 16, '2016-09-08 17:19:31'),
(96, 'How to use wunderlist by mobile', 'वंडरलिस्ट का उपयोग मोबाइल में कैसे करे', 'વન્ડરલિસ્ટનો ઉપયોગ મોબાઈલમાં કેવી રીતે કરવો', '', '', '', '', '154397393', '153876084', '', '', '', 'Beginner', '8:05', '', '', '', 16, '2016-09-08 17:19:31'),
(97, 'Introduction to Google Keep', 'गूगल किप का परिचय', 'ગૂગલ કિપનો પરિચય', '', '', '', '', '154009341', '154044549', '', '', '', 'Beginner', '1:17', '', '', '', 17, '2016-09-08 17:19:31'),
(98, 'How To Use Google Keep', 'गूगल किप का उपयोग कैसे करे', 'ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો', '', '', '', '', '154009342', '153874774', '', '', '', 'Beginner', '4:06', '', '', '', 17, '2016-09-08 17:19:31'),
(99, 'How To Use Google Keep (Mobile Use)', 'गूगल किप का उपयोग कैसे करे 2 (मोबाइल उपयोग)', 'ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો 2 (મોબાઈલ ઉપયોગ)', '', '', '', '', '154009339', '154044548', '', '', '', 'Beginner', '2:08', '', '', '', 17, '2016-09-08 17:19:31'),
(100, 'Introduction to Google Forms', 'गूगल फॉर्म का परिचय', 'ગુગલ ફોર્મનો પરિચય', '', '', '', '', '153763570', '153874138', '', '', '', 'Beginner', '9:11', '', '', '', 18, '2016-09-08 17:19:31'),
(101, 'Theames & Other Features', 'थीम्स और दूसरी विशेषता', 'થીમ્સ & બીજી વિશેષતા', '', '', '', '', '153763571', '153874140', '', '', '', 'Beginner', '6:26', '', '', '', 18, '2016-09-08 17:19:31'),
(102, 'Introduction', 'माइक्रोसॉफ्ट वर्ड का परिचय', 'માઈક્રોસોફ્ટ વર્ડનો પરિચય', '', '', '', '', '153869214', '153604354', '', '', '', 'Beginner', '1:04', '', '', '', 19, '2016-09-08 17:19:31'),
(103, 'Word Interface', 'माइक्रोसॉफ्ट वर्ड के इन्टरफेस', 'માઈક્રોસોફ્ટ વર્ડની ઇન્ટરફેસ', '', '', '', '', '153869216', '153604349', '', '', '', 'Beginner', '3:07', '', '', '', 19, '2016-09-08 17:19:31'),
(104, 'Getting to Know Word', 'माईक्रोसॉफ्ट वर्ड के बारे में माहिती', 'માઈક્રોસોફ્ટ વર્ડ વિશેની માહિતી', '', '', '', '', '154693948', '153750213', '', '', '', 'Beginner', '1:52', '', '', '', 19, '2016-09-08 17:19:31'),
(105, 'Creating & Opening Documents', 'नये डोक्युमेंट बनाए और पुराने खोले', 'નવા ડોક્યુમેન્ટ બનાવવા અને જુના ખોલવા', '', '', '', '', '153869178', '153604351', '', '', '', 'Beginner', '2:53', '', '', '', 19, '2016-09-08 17:19:32'),
(106, 'Saving & Sharing', 'सेविंग और शेरिंग', 'સેવીંગ અને શેરીંગ', '', '', '', '', '154693945', '153750216', '', '', '', 'Beginner', '2:34', '', '', '', 19, '2016-09-08 17:19:32'),
(107, 'Text Basics', 'टेक्स्ट बेज़िक्स', 'ટેક્ષ્ટ બેઝીક્સ', '', '', '', '', '153869161', '153750215', '', '', '', 'Beginner', '4:29', '', '', '', 19, '2016-09-08 17:19:32'),
(108, 'Formatting Text', 'फोर्मेटिंग टेक्स्ट', 'ફોર્મેટિંગ ટેક્ષ્ટ', '', '', '', '', '154839517', '153661209', '', '', '', 'Beginner', '4:35', '', '', '', 19, '2016-09-08 17:19:32'),
(109, 'Page Layout', 'पेइज ले - आउट', 'પેઈજ લે-આઉટ', '', '', '', '', '153869212', '153750205', '', '', '', 'Beginner', '2:28', '', '', '', 19, '2016-09-08 17:19:32'),
(110, 'Printing Documents', 'प्रिंटिंग डोक्युमेंट', 'પ્રિન્ટીંગ ડોક્યુમેન્ટ', '', '', '', '', '153869191', '153750208', '', '', '', 'Beginner', '3:31', '', '', '', 19, '2016-09-08 17:19:32'),
(111, 'Indents & Tabs 1', 'इन्देंट्स और टेब्स 1', 'ઇન્ડેન્ટસ અને ટેબ્સ 1', '', '', '', '', '153869206', '153588656', '', '', '', 'Beginner', '2:30', '', '', '', 19, '2016-09-08 17:19:32'),
(112, 'Indents & Tabs 2', 'इन्देंट्स और टेब्स 2', 'ઇન્ડેન્ટસ અને ટેબ્સ 2', '', '', '', '', '153869215', '153750219', '', '', '', 'Beginner', '5:39', '', '', '', 19, '2016-09-08 17:19:32'),
(113, 'Line & Paragraph Spacing', 'लाइन और पेरेग्राफ स्पेसिंग', 'લાઈન અને પેરેગ્રાફ સ્પેસીંગ', '', '', '', '', '153869205', '153750222', '', '', '', 'Intermediate', '1:45', '', '', '', 19, '2016-09-08 17:19:32'),
(114, 'bullet & numbering', 'बुलेट्स और नम्बरिंग', 'બુલેટ્સ અને નંબરીંગ', '', '', '', '', '153869210', '153588882', '', '', '', 'Intermediate', '5:33', '', '', '', 19, '2016-09-08 17:19:32'),
(115, 'Hyperlinks', 'हायपरलिंक्स', 'હાઇપરલિંકસ', '', '', '', '', '153869195', '153659969', '', '', '', 'Intermediate', '2:28', '', '', '', 19, '2016-09-08 17:19:32'),
(116, 'Breaks', 'ब्रेक्स', 'બ્રેક્સ', '', '', '', '', '153869223', '153750224', '', '', '', 'Intermediate', '3:57', '', '', '', 19, '2016-09-08 17:19:32'),
(117, 'Columns', 'कोल्म्स', 'કોલમ્સ', '', '', '', '', '153869213', '153750212', '', '', '', 'Intermediate', '3:04', '', '', '', 19, '2016-09-08 17:19:32'),
(118, 'Headers, Footers & page breaks', 'हेडर, फुटर और पेइज नंबर', 'હેડર, ફુટર અને પેઈજ નંબર', '', '', '', '', '153869185', '153752212', '', '', '', 'Intermediate', '7:42', '', '', '', 19, '2016-09-08 17:19:32'),
(119, 'Pictures & Text Wrapping', 'पिक्चर्स और टेक्स्ट रेपिंग', 'પીકચર્સ અને ટેક્ષ્ટ રેપીંગ', '', '', '', '', '153869164', '153750207', '', '', '', 'Intermediate', '3:31', '', '', '', 19, '2016-09-08 17:19:32'),
(120, 'Formatting Pictures', 'फोर्मेटिंग पिक्चर्स', 'ફોર્મેટિંગ પીકચર્સ', '', '', '', '', '153869181', '153750226', '', '', '', 'Intermediate', '5:28', '', '', '', 19, '2016-09-08 17:19:33'),
(121, 'Shapes', 'शेइप्स', 'શેઈપ્સ', '', '', '', '', '153869211', '153659407', '', '', '', 'Intermediate', '5:25', '', '', '', 19, '2016-09-08 17:19:33'),
(122, 'Text Boxes', 'टेक्स्ट बॉक्स', 'ટેક્ષ્ટ બોક્ષ', '', '', '', '', '153594938', '153750214', '', '', '', 'Intermediate', '3:04', '', '', '', 19, '2016-09-08 17:19:33'),
(123, 'Wordart', 'वर्ड आर्ट', 'વર્ડ આર્ટ', '', '', '', '', '153594947', '153750218', '', '', '', 'Intermediate', '4:35', '', '', '', 19, '2016-09-08 17:19:33'),
(124, 'Arranging Objects', 'एरेंजिंग ऑब्जेक्ट', 'એરેન્જિંગ ઓબ્જેક્ટ', '', '', '', '', '153594944', '153661211', '', '', '', 'Advanced', '4:14', '', '', '', 19, '2016-09-08 17:19:33'),
(125, 'Table 1', 'टेबल 1', 'ટેબલ 1', '', '', '', '', '153594943', '153750223', '', '', '', 'Advanced', '3:00', '', '', '', 19, '2016-09-08 17:19:33'),
(126, 'Table 2', 'टेबल 2', 'ટેબલ 2', '', '', '', '', '153594945', '153661208', '', '', '', 'Advanced', '8:10', '', '', '', 19, '2016-09-08 17:19:33'),
(127, 'Chart 1', 'चार्ट 1', 'ચાર્ટ 1', '', '', '', '', '153594950', '153588881', '', '', '', 'Advanced', '4:18', '', '', '', 19, '2016-09-08 17:19:33'),
(128, 'Chart 2', 'चार्ट 2', 'ચાર્ટ 2', '', '', '', '', '153594942', '153588876', '', '', '', 'Advanced', '5:35', '', '', '', 19, '2016-09-08 17:19:33'),
(129, 'Checking Spelling & Grammer', 'चेकिंग स्पेलिंग एन्ड ग्रामर', '28 ચેકીંગ સ્પેલિંગ એન્ડ ગ્રામર', '', '', '', '', '153594940', '153750211', '', '', '', 'Advanced', '3:19', '', '', '', 19, '2016-09-08 17:19:33'),
(130, 'Track Changes & Comments', 'ट्रेक चेंजिस एन्ड कोमेंट्स', 'ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ્સ', '', '', '', '', '153594948', '153588877', '', '', '', 'Advanced', '4:54', '', '', '', 19, '2016-09-08 17:19:33'),
(131, 'Finalizing & Protecting Documents', 'फ़ाइनलाइज़िन्ग एन्ड प्रोटेक्टिंग डोक्युमेंट', 'ફાઈનલાઈઝીંગ એન્ડ પ્રોટેક્ટીંગ ડોક્યુમેન્ટ', '', '', '', '', '153594952', '153588879', '', '', '', 'Advanced', '2:36', '', '', '', 19, '2016-09-08 17:19:33'),
(132, 'Smart Art Graphics', 'स्मार्ट आर्ट ग्राफिक', 'સ્માર્ટ આર્ટ ગ્રાફિક', '', '', '', '', '153594941', '153588880', '', '', '', 'Advanced', '4:49', '', '', '', 19, '2016-09-08 17:19:33'),
(133, 'styles', 'स्टाइल्स', 'સ્ટાઇલ્સ', '', '', '', '', '153594946', '153588878', '', '', '', 'Advanced', '4:33', '', '', '', 19, '2016-09-08 17:19:33'),
(134, 'Themes', 'थीम', 'થીમ', '', '', '', '', '153594949', '153750206', '', '', '', 'Advanced', '2:08', '', '', '', 19, '2016-09-08 17:19:33'),
(135, 'Mail Merge', 'मेइल मर्ज', 'મેઈલ મર્જ', '', '', '', '', '155211316', '153604353', '', '', '', 'Advanced', '6:30', '', '', '', 19, '2016-09-08 17:19:33'),
(136, 'INTRODECTION', 'माइक्रोसॉफ्ट एक्सेल का परिचय', 'માઈક્રોસોફ્ટ એક્સેલ નો પરિચય', '', '', '', '', '153766025', '153649589', '', '', '', 'Beginner', '1:33', '', '', '', 20, '2016-09-08 17:19:34'),
(137, 'GETTING STARTED', 'गेटिंग स्टार्टेड इन्टरफेस', 'ગેટીંગ સ્ટાર્ટેડ ઇન્ટરફેસ', '', '', '', '', '153770393', '153652601', '', '', '', 'Beginner', '2:55', '', '', '', 20, '2016-09-08 17:19:34'),
(138, 'CREATING & OPENING WORKBOOKS', 'क्रिएटिंग एन्ड ओपनिंग वर्कबुक', 'ક્રિએટીંગ એન્ડ ઓપનીંગ વર્કબુક', '', '', '', '', '153589889', '153649597', '', '', '', 'Beginner', '2:31', '', '', '', 20, '2016-09-08 17:19:34'),
(139, 'SAVING & SHARING WORKBOOKS', 'सेविंग एन्ड शेरिंग वर्कबुक', 'સેવીંગ એન્ડ શેરીંગ વર્કબુક', '', '', '', '', '153589888', '153652602', '', '', '', 'Beginner', '2:25', '', '', '', 20, '2016-09-08 17:19:34'),
(140, 'CELL BASICS', 'सेल बेज़िक्स', 'સેલ બેઝીક્સ', '', '', '', '', '153589883', '153649618', '', '', '', 'Beginner', '5:05', '', '', '', 20, '2016-09-08 17:19:34'),
(141, 'MODIFYING COLUMNS, ROWS & CELLS', 'मोडीफायिंग कोलम, रो, सेल्स', 'મોડીફાઈન્ગ કોલમ, રો, સેલ્સ', '', '', '', '', '153766027', '153649594', '', '', '', 'Beginner', '5:08', '', '', '', 20, '2016-09-08 17:19:34'),
(142, 'FORMATTING CELLS', 'फोर्मेटिंग सेल', 'ફોર્મેટિંગ સેલ', '', '', '', '', '153589878', '153649612', '', '', '', 'Beginner', '3:16', '', '', '', 20, '2016-09-08 17:19:34'),
(143, 'WORKSHEET BASICS', 'वर्कशीट बेजिक', 'વર્કશીટ બેઝીક', '', '', '', '', '153589890', '153649598', '', '', '', 'Beginner', '1:54', '', '', '', 20, '2016-09-08 17:19:34'),
(144, 'PAGE LAYOUT', 'पेइज ले - आउट', 'પેજ લે-આઉટ', '', '', '', '', '153589882', '153649615', '', '', '', 'Intermediate', '3:12', '', '', '', 20, '2016-09-08 17:19:34'),
(145, 'PRINTING WORKBOOKS', 'प्रिंटिंग वर्कबुक', 'પ્રિન્ટીંગ વર્કબુક', '', '', '', '', '153766026', '153652603', '', '', '', 'Intermediate', '2:50', '', '', '', 20, '2016-09-08 17:19:34'),
(146, 'SIMPLE FORMULAS', 'सिम्पल फोर्म्युला', 'સિમ્પલ ફોરમ્યુલા', '', '', '', '', '153589887', '153649617', '', '', '', 'Intermediate', '3:02', '', '', '', 20, '2016-09-08 17:19:34'),
(147, 'COMPLEX FORMULAS', 'कोम्प्लेक्स फोर्म्युला', 'કોમ્લેક્ષ ફોરમ્યુલા', '', '', '', '', '153589885', '153649593', '', '', '', 'Intermediate', '2:08', '', '', '', 20, '2016-09-08 17:19:34'),
(148, 'RELATIVE & ABSOLUTE CELL REFERENCES', 'रिलेटिव एन्ड एब्सोल्यूट सेल रेफ़रन्स', 'રીલેટીવ એન્ડ એબ્સોલ્યુટ સેલ રેફરન્સ', '', '', '', '', '153766064', '153649622', '', '', '', 'Intermediate', '5:44', '', '', '', 20, '2016-09-08 17:19:34'),
(149, 'FUNCTIONS', 'फंक्शन', 'ફંકશન', '', '', '', '', '154572135', '153649595', '', '', '', 'Intermediate', '3:27', '', '', '', 20, '2016-09-08 17:19:34'),
(150, 'FREEZING PANES WITH VIEW OPTION', 'फ्रीजिंग पेन्स', 'ફ્રીઝીંગ પેન્સ', '', '', '', '', '153766068', '153649605', '', '', '', 'Intermediate', '3:05', '', '', '', 20, '2016-09-08 17:19:34'),
(151, 'SORTING DATA', 'शोर्टिंग डेटा', 'શોર્ટિંગ ડેટા', '', '', '', '', '153766031', '153649613', '', '', '', 'Intermediate', '2:40', '', '', '', 20, '2016-09-08 17:19:35'),
(152, 'FILTERING DATA', 'फिल्टरिंग डेटा', 'ફિલ્ટરીંગ ડેટા', '', '', '', '', '153766029', '153649616', '', '', '', 'Intermediate', '4:35', '', '', '', 20, '2016-09-08 17:19:35'),
(153, 'GROUPS & SUBTOTALS', 'ग्रुप एन्ड सबटोटल', 'ગ્રુપ એન્ડ સબટોટલ', '', '', '', '', '153766066', '153649591', '', '', '', 'Advanced', '4:49', '', '', '', 20, '2016-09-08 17:19:35'),
(154, 'TABLES', 'टेबल्स', 'ટેબલ્સ', '', '', '', '', '153589901', '153649590', '', '', '', 'Advanced', '2:58', '', '', '', 20, '2016-09-08 17:19:35'),
(155, 'CHARTS', 'चार्ट', 'ચાર્ટ', '', '', '', '', '153589884', '153649614', '', '', '', 'Advanced', '2:47', '', '', '', 20, '2016-09-08 17:19:35'),
(156, 'SPARKLINES', 'स्पार्कलाइन', 'સ્પાર્કલાઈન', '', '', '', '', '153589880', '153649603', '', '', '', 'Advanced', '3:00', '', '', '', 20, '2016-09-08 17:19:35'),
(157, 'TRACK CHANGES & COMMENTS', 'ट्रेक चेंजिस एन्ड कोमेन्ट', 'ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ', '', '', '', '', '153766065', '153649621', '', '', '', 'Advanced', '6:33', '', '', '', 20, '2016-09-08 17:19:35'),
(158, 'FINALIZING & PROTECTING WORKBOOKS', 'प्रोटेक्टिंग वर्कबुक', 'પ્રોટેક્ટીંગ વર્કબુક', '', '', '', '', '153589881', '153649608', '', '', '', 'Advanced', '3:24', '', '', '', 20, '2016-09-08 17:19:35'),
(159, 'CONDITIONAL FORMATTING', 'कंडीशनल फोर्मेटिंग', 'કન્ડીશનલ ફોર્મેટિંગ', '', '', '', '', '153589891', '153649588', '', '', '', 'Advanced', '3:11', '', '', '', 20, '2016-09-08 17:19:35'),
(160, 'PIVOT TABLES', 'प्रोटेक्टिंग वर्कबुक', 'પિવટ ટેબલ', '', '', '', '', '153589881', '153649610', '', '', '', '', '4:28', '', '', '', 20, '2016-09-08 17:19:35'),
(161, 'WHAT-IF ANALYSIS', 'कंडीशनल फोर्मेटिंग', 'વોટ ઇફ અનૈલિસિસ', '', '', '', '', '153589891', '153649620', '', '', '', '', '7:15', '', '', '', 20, '2016-09-08 17:19:35'),
(162, 'Google docs Introdection', 'गूगल डॉक्स का परिचय', 'ગુગલ ડોક્સનો પરિચય', '', '', '', '', '154150353', '153668000', '', '', '', 'Beginner', '1:36', '', '', '', 21, '2016-09-08 17:19:35'),
(163, 'Signi in and creating a doc', 'साइन इन एन्ड करिएटिंग डॉक्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ અ ડોક્સ', '', '', '', '', '154149508', '154148014', '', '', '', 'Beginner', '1:39', '', '', '', 21, '2016-09-08 17:19:35'),
(164, 'Google docs interface', 'गूगल डॉक्स इन्टरफेस', 'ગુગલ ડોક્સ ઇન્ટરફેસ', '', '', '', '', '154149512', '154148012', '', '', '', 'Beginner', '2:23', '', '', '', 21, '2016-09-08 17:19:35'),
(165, 'Text Formatting', 'टेक्स्ट फोर्मेटिंग', 'ટેક્ષ્ટ ફોર્મેટિંગ', '', '', '', '', '154149511', '154148013', '', '', '', 'Beginner', '2:42', '', '', '', 21, '2016-09-08 17:19:36'),
(166, 'creating styles & Paint Format tool', 'क्रिएटिंग स्टाइल एन्ड पेंट फोरमेट टूल्स', 'ક્રિએટીંગ સ્ટાઇલ એન્ડ પેઈન્ટ ફોરમેટ ટૂલ્સ', '', '', '', '', '154149510', '154148347', '', '', '', 'Beginner', '1:53', '', '', '', 21, '2016-09-08 17:19:36'),
(167, 'Inserting lines, footnotes, and page breaks', 'इन्सर्टिंग लाइंस, फुटनोट्स एन्ड पेइज ब्रेक्स', 'ઇન્સર્ટીંગ લાઈન્સ, ફૂટનોટસ એન્ડ પેઈજ બ્રેક્સ', '', '', '', '', '154149516', '154148015', '', '', '', 'Beginner', '1:34', '', '', '', 21, '2016-09-08 17:19:36'),
(168, 'Working with headers and footers', 'हेडर और फूटर्स के साथ काम', 'હેડર અને ફૂટર્સની સાથે કામ', '', '', '', '', '154149513', '154148017', '', '', '', 'Beginner', '1:49', '', '', '', 21, '2016-09-08 17:19:36'),
(169, 'Adding page numbering', 'एडिंग पेइज नम्बर्स', 'એડિંગ પેઈજ નંબર્સ', '', '', '', '', '154149509', '153595938', '', '', '', 'Beginner', '1:38', '', '', '', 21, '2016-09-08 17:19:36'),
(170, 'Creating a table of contents', 'क्रिएटिंग टेबल ऑफ़ कन्टेन्ट', 'ક્રિએટીંગ ટેબલ ઓફ કન્ટેન્ટ', '', '', '', '', '155378819', '153595943', '', '', '', 'Beginner', '3:18', '', '', '', 21, '2016-09-08 17:19:36'),
(171, 'Setting page margins, orientation, and color', 'सेटिंग पेइज, ओरिएंटेशन एन्ड कलर', 'સેટિંગ પેઈજ, ઓરિએન્ટેશન એન્ડ કલર', '', '', '', '', '154150961', '153595942', '', '', '', 'Intermediate', '3:09', '', '', '', 21, '2016-09-08 17:19:36'),
(172, 'Inserting, resizing, and cropping an image', 'इन्सर्टिंग, रिसाइजिंग एन्ड क्रोपिंग इमेज', 'ઇન્સર્ટીંગ, રીસાઈજીંગ એન્ડ ક્રોપીંગ ઈમેજ', '', '', '', '', '154561304', '153595941', '', '', '', 'Intermediate', '3:35', '', '', '', 21, '2016-09-08 17:19:36'),
(173, 'Inserting a image into a header', 'इन्सर्टिंग इमेज इन टू हेडर', 'ઇન્સર્ટીંગ ઈમેજ ઇન ટુ હેડર', '', '', '', '', '154150352', '153595937', '', '', '', 'Intermediate', '1:17', '', '', '', 21, '2016-09-08 17:19:36'),
(174, 'Inserting a Google drawing', 'इन्सर्टिंग गूगल द्रोइंग', 'ઇન્સર્ટીંગ ગુગલ ડ્રોઈંગ', '', '', '', '', '154561039', '153595939', '', '', '', 'Intermediate', '2:14', '', '', '', 21, '2016-09-08 17:19:36'),
(175, 'Inserting and removing a table', 'इन्सर्टिंग एन्ड रिमूविंग टेबल', 'ઇન્સર્ટીંગ એન્ડ રીમુવિંગ ટેબલ', '', '', '', '', '154561040', '153595934', '', '', '', 'Intermediate', '1:28', '', '', '', 21, '2016-09-08 17:19:36'),
(176, 'Setting table options & Resizing a table', 'सेटिंग टेबल ऑप्शन एन्ड रिसाइजिंग टेबल', 'સેટિંગ ટેબલ ઓપ્શન એન્ડ રીસાઈજીંગ ટેબલ', '', '', '', '', '154561041', '153667999', '', '', '', 'Intermediate', '2:34', '', '', '', 21, '2016-09-08 17:19:36'),
(177, 'Inserting and deleting rows and columns', 'इन्सर्टिंग एन्ड दिलिटिंग रो एन्ड कोलम', 'ઇન્સર્ટીંગ એન્ડ ડીલીટીંગ રો એન્ડ કોલમ', '', '', '', '', '154685276', '153595935', '', '', '', 'Intermediate', '1:37', '', '', '', 21, '2016-09-08 17:19:36'),
(178, 'File menu options', 'फ़ाइल् मेनू ऑप्शन', 'ફાઈલ મેનુ ઓપ્શન', '', '', '', '', '154569733', '153668004', '', '', '', 'Intermediate', '3:53', '', '', '', 21, '2016-09-08 17:19:36'),
(179, 'Publishing a doc to the web', 'पब्लिशिंग डोक टू ढ वेब', 'પબ્લીશીંગ ડોક ટુ ધ વેબ', '', '', '', '', '154569732', '153667995', '', '', '', 'Intermediate', '2:44', '', '', '', 21, '2016-09-08 17:19:37'),
(180, 'Printing a doc', 'प्रिन्टिंग डॉक्', 'પ્રિન્ટીંગ ડોક', '', '', '', '', '154569730', '153667996', '', '', '', 'Intermediate', '7:30', '', '', '', 21, '2016-09-08 17:19:37'),
(181, 'Emailing a doc', 'इ मेइलिंग डॉक्', 'ઈમેઇલિન્ગ ડોક', '', '', '', '', '154569731', '154149220', '', '', '', 'Advanced', '1:30', '', '', '', 21, '2016-09-08 17:19:37'),
(182, 'Sharing a doc with others', 'दुसरो के साथ डोक्युमेंट का बटवारा', 'અન્ય સાથે ડોક્યુમેન્ટ શેર', '', '', '', '', '154569736', '153668007', '', '', '', 'Advanced', '3:14', '', '', '', 21, '2016-09-08 17:19:37'),
(183, 'Editing a doc simultaneously with another user', 'भिन्न भिन्न लोगो के साथ डोक्युमेंट एडिटिंग', 'અલગ અલગ યુજર્સ સાથે વારાફરતી ડોક એડીટીંગ', '', '', '', '', '154008604', '153667998', '', '', '', 'Advanced', '1:49', '', '', '', 21, '2016-09-08 17:19:37'),
(184, 'Finding docs others have shared with you', 'फाइंडिंग डॉक्स अधर हेव शेर विथ यु', 'ફાઈન્ડીંગ ડોક્સ અધર હેવ શેર વિથ યુ', '', '', '', '', '154008600', '153668005', '', '', '', 'Advanced', '1:25', '', '', '', 21, '2016-09-08 17:19:37'),
(185, 'Adding comments to docs', 'एडिंग कोमेंट्स टू डॉक्स', 'એડિંગ કોમેન્ટ્સ ટુ ડોક્સ', '', '', '', '', '154008605', '153668003', '', '', '', 'Advanced', '1:50', '', '', '', 21, '2016-09-08 17:19:37'),
(186, 'Spellchecking and translating a doc', 'स्पेलिंग चेकिंग एन्ड ट्रांसलेटिंग डॉक्स', 'સ્પેલિંગ ચેકીંગ એન્ડ ટ્રાન્સલેટીંગ ડોક્સ', '', '', '', '', '154008610', '153668006', '', '', '', 'Advanced', '1:56', '', '', '', 21, '2016-09-08 17:19:37'),
(187, 'Including addons in a doc', 'डॉक्स में एड ओन्स शामिल', 'ડોક્સમાં એડ ઓન નો સમાવેશ', '', '', '', '', '154008608', '153668008', '', '', '', 'Advanced', '2:59', '', '', '', 21, '2016-09-08 17:19:37'),
(188, 'Downloading the Google Docs app and signing in', 'डाउनलोडिंग गूगल डॉक्स एप एन्ड साइन इन', 'ડાઉનલોડીંગ ધ ગુગલ ડોક્સ એપ એન્ડ સાઈન ઇન', '', '', '', '', '154009238', '153668819', '', '', '', 'Advanced', '3:08', '', '', '', 21, '2016-09-08 17:19:37'),
(189, 'Navigating the Google Docs app', 'नेविगेटिंग गूगल डॉक्स एप', 'નેવિગેટીંગ ધ ગુગલ ડોક્સ એપ', '', '', '', '', '154008602', '153667997', '', '', '', 'Advanced', '2:17', '', '', '', 21, '2016-09-08 17:19:37'),
(190, 'Working with docs in the app', 'एप्लीकेशन में डॉक्स के साथ काम', 'એપ્લીકેશન ડોક્સ સાથે કામ', '', '', '', '', '154008607', '153668002', '', '', '', 'Advanced', '1:38', '', '', '', 21, '2016-09-08 17:19:37'),
(191, 'Google Sheets Introduction', 'गूगल शीट्स का परिचय', 'ગુગલ શીટ્સનો પરિચય', '', '', '', '', '154405543', '154553975', '', '', '', 'Beginner', '1:42', '', '', '', 22, '2016-09-08 17:19:37'),
(192, 'Signi in and creating a Sheets', 'साइन इन एन्ड क्रिएटिंग शीट्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ શીટ્સ', '', '', '', '', '154405477', '154556866', '', '', '', 'Beginner', '01;37', '', '', '', 22, '2016-09-08 17:19:37');
INSERT INTO `video` (`v_id`, `v_name_lan1`, `v_name_lan2`, `v_name_lan3`, `v_name_lan4`, `v_name_lan5`, `v_name_lan6`, `v_url_lan1`, `v_url_lan2`, `v_url_lan3`, `v_url_lan4`, `v_url_lan5`, `v_url_lan6`, `v_level`, `v_duration`, `v_rating`, `v_view_count`, `v_order`, `cat_id`, `date`) VALUES
(193, 'Google Sheets interface', 'गूगल शीट्स इन्टरफेस', 'ગુગલ શીટ્સ ઇન્ટરફેસ', '', '', '', '', '154404205', '154556408', '', '', '', 'Beginner', '2:52', '', '', '', 22, '2016-09-08 17:19:38'),
(194, 'Creating Spreadsheets', 'क्रिएटिंग स्प्रेडशीट्स', 'ક્રિએટીંગ સ્પ્રેડશીટ્સ', '', '', '', '', '154405366', '154553969', '', '', '', 'Beginner', '2:08', '', '', '', 22, '2016-09-08 17:19:38'),
(195, 'Add, Copying, Moving & Deleting a spreadsheet', 'एड, कोपिंग, मूविंग एन्ड दिलिटिंग स्प्रेडशीट्स', 'એડ, કોપિંગ, મુવીંગ એન્ડ ડીલીટીંગ સ્પ્રેડશીટ', '', '', '', '', '154405363', '154553968', '', '', '', 'Beginner', '4:49', '', '', '', 22, '2016-09-08 17:19:38'),
(196, 'Editing a data', 'एडिटिंग डेटा', 'એડીટીંગ ડેટા', '', '', '', '', '154404206', '154553973', '', '', '', 'Beginner', '2:35', '', '', '', 22, '2016-09-08 17:19:38'),
(197, 'Inserting, deleting, and clearing rows and columns', 'इन्सर्टिंग, दिलिटिंग एन्ड क्लिअरिंग रो एन्ड कोलम', 'ઇન્સર્ટીંગ, ડીલીટીંગ એન્ડ કલીઅરીંગ રો એન્ડ કોલમ', '', '', '', '', '154404203', '154553976', '', '', '', 'Beginner', '4:31', '', '', '', 22, '2016-09-08 17:19:38'),
(198, 'Moving rows, columns, and cells', 'मूविंग रो, कोलम एन्ड सेल', 'મુવીંગ રો, કોલમ એન્ડ સેલ', '', '', '', '', '154404209', '153660229', '', '', '', 'Beginner', '3:43', '', '', '', 22, '2016-09-08 17:19:38'),
(199, 'Formatting cell, row, and column data', 'फोर्मेटिंग सेल, रो एन्ड कोलम डेटा', 'ફોર્મેટિંગ સેલ, રો એન્ડ કોલમ ડેટા', '', '', '', '', '154404198', '154553974', '', '', '', 'Beginner', '5:13', '', '', '', 22, '2016-09-08 17:19:38'),
(200, 'Sorting data on a spreadsheet', 'सोर्टिंग डेटा ओन स्प्रेडशीट्स', 'સોર્ટિંગ ડેટા ઓન સ્પ્રેડશીટ', '', '', '', '', '154404199', '154553972', '', '', '', 'Beginner', '3:52', '', '', '', 22, '2016-09-08 17:19:38'),
(201, 'Working with multiple sheets', 'ज्यादा स्प्रेडशीट्स के साथ काम', 'એક કરતા વધારે શીટ્સ સાથે કામ', '', '', '', '', '154405720', '154556988', '', '', '', 'Beginner', '3:42', '', '', '', 22, '2016-09-08 17:19:38'),
(202, 'Using keyboard shortcuts', 'किबोर्ड में से शोर्टकट की का उपयोग', 'કીબોર્ડ માંથી શોર્ટકટ કીનો ઉપયોગ', '', '', '', '', '154406612', '154556991', '', '', '', 'Beginner', '3:06', '', '', '', 22, '2016-09-08 17:19:38'),
(203, 'Creating a series of numbers', 'क्रिएटिंग सीरिज ऑफ़ नंबर', 'ક્રિએટીંગ સીરીજ ઓફ નંબર', '', '', '', '', '154405724', '154556989', '', '', '', 'Beginner', '3:01', '', '', '', 22, '2016-09-08 17:19:38'),
(204, 'Using Find and Replace', 'फाइंड और रिप्लेस का उपयोग', 'ફાઈન્ડ અને રિપ્લેસ નો ઉપયોગ', '', '', '', '', '154405723', '153660226', '', '', '', 'Beginner', '3:07', '', '', '', 22, '2016-09-08 17:19:38'),
(205, 'Inserting and clearing note', 'इन्सर्टिंग एन्ड क्लिअरिंग नोट', 'ઇન્સર્ટીંગ એન્ડ કલીઅરીંગ નોટ', '', '', '', '', '154405544', '154557154', '', '', '', 'Beginner', '2:19', '', '', '', 22, '2016-09-08 17:19:38'),
(206, 'Inserting links', 'इन्सर्टिंग लिंक्स', 'ઇન્સર્ટીંગ લિનક્સ', '', '', '', '', '154405545', '153660223', '', '', '', 'Beginner', '2:02', '', '', '', 22, '2016-09-08 17:19:38'),
(207, 'Inserting images into spreadsheets', 'इन्सर्टिंग इमेजिस इन टू स्प्रेडशीट्स', 'ઇન્સર્ટીંગ ઈમેજીસ ઇન ટુ સ્પ્રેડશીટ', '', '', '', '', '154405546', '153660222', '', '', '', 'Beginner', '3:31', '', '', '', 22, '2016-09-08 17:19:38'),
(208, 'Create drawing', 'क्रिएट द्रोइंग', 'ક્રિએટ ડ્રોઈંગ', '', '', '', '', '154407373', '153660221', '', '', '', 'Intermediate', '2:14', '', '', '', 22, '2016-09-08 17:19:39'),
(209, 'Merge cells & Text wrapping', 'मर्ज सेल्स एन्ड टेक्स्ट व्रेपिंग', 'મર્જ સેલ્સ એન્ડ ટેક્ષ્ટ વ્રેપીંગ', '', '', '', '', '154407621', '154557366', '', '', '', 'Intermediate', '3:06', '', '', '', 22, '2016-09-08 17:19:39'),
(210, 'Using conditional formatting', 'कंडीशनल फोर्मेटिंग का उपयोग', 'કન્ડીશનલ ફોર્મેટિંગ ઉપયોગ', '', '', '', '', '154407622', '154557365', '', '', '', 'Intermediate', '3:05', '', '', '', 22, '2016-09-08 17:19:39'),
(211, 'Using Quick Sum', 'त्वरित राशी का उपयोग', 'ઝડપી સરવાળાનો ઉપયોગ', '', '', '', '', '154407375', '153660228', '', '', '', 'Intermediate', '2:20', '', '', '', 22, '2016-09-08 17:19:39'),
(212, 'Using formulas and functions', 'फोर्म्युला और फंक्शन का उपयोग', 'ફોર્મ્યુલા અને ફંક્શનનો ઉપયોગ', '', '', '', '', '154407372', '153660231', '', '', '', 'Intermediate', '3:31', '', '', '', 22, '2016-09-08 17:19:39'),
(213, 'Using IF functions and Nested IF functions', 'इफ फंक्शन और नेस्टेड इफ फंक्शन का उपयोग', 'ઇફ ફંક્શન અને નેસ્ટેડ ઇફ ફંક્શનનો ઉપયોગ', '', '', '', '', '154407378', '154559176', '', '', '', 'Intermediate', '5:19', '', '', '', 22, '2016-09-08 17:19:39'),
(214, 'Referencing data from other sheets', 'रेफ्रेंशिंग डेटा फ्रॉम अधर शीट्स', 'રેફ્રેન્શિંગ ડેટા ફ્રોમ અધર શીટ્સ', '', '', '', '', '154407374', '154559177', '', '', '', 'Intermediate', '1:37', '', '', '', 22, '2016-09-08 17:19:39'),
(215, 'Creating charts in Google Sheets', 'गूगल शीट्स के अंदर चार्ट बनाए', 'ગુગલ શીટ્સની અંદર ચાર્ટ બનાવવો', '', '', '', '', '154407623', '153660230', '', '', '', 'Intermediate', '3:04', '', '', '', 22, '2016-09-08 17:19:39'),
(216, 'Using filters and creating filter views', 'फ़िल्टर बना के देखे और फिल्टर का उपयोग', 'ફિલ્ટર બનાવીને જોવા અને ફિલ્ટરનો ઉપયોગ', '', '', '', '', '154407626', '153660797', '', '', '', 'Intermediate', '3:01', '', '', '', 22, '2016-09-08 17:19:39'),
(217, 'Using pivot tables', 'पिवोट टेबल का उपयोग', 'પિવોટ ટેબલનો ઉપયોગ', '', '', '', '', '154570415', '153660225', '', '', '', 'Intermediate', '3:07', '', '', '', 22, '2016-09-08 17:19:39'),
(218, 'Explore Option', 'एक्सप्लोर ऑप्शन', 'એક્ષ્પ્લોર ઓપ્શન', '', '', '', '', '154407624', '153660224', '', '', '', 'Intermediate', '2:08', '', '', '', 22, '2016-09-08 17:19:39'),
(219, 'Data validation in Google Sheets', 'डेटा वेलिडेशन इन गूगल शीट्स', 'ડેટા વેલિડેશન ઇન ગુગલ શીટ્સ', '', '', '', '', '154408395', '154559333', '', '', '', 'Intermediate', '3:53', '', '', '', 22, '2016-09-08 17:19:39'),
(220, 'Form', 'फॉर्म', 'ફોર્મ', '', '', '', '', '154408398', '154559337', '', '', '', 'Intermediate', '1:33', '', '', '', 22, '2016-09-08 17:19:39'),
(221, 'Protect Sheet & Personal dictionary', 'प्रोटेक्ट शीट एन्ड पर्शनल डिक्शनरी ऑप्शन', 'પ્રોટેક્ટ શીટ એન્ડ પર્શનલ ડીક્ષનરી ઓપ્શન', '', '', '', '', '154408399', '154559334', '', '', '', 'Intermediate', '3:55', '', '', '', 22, '2016-09-08 17:19:39'),
(222, 'Sharing a spreadsheet file with other people', 'दुसरे लोगो के साथ स्प्रेडशीट फ़ाइल् शेरिंग', 'અન્ય લોકો સાથે સ્પ્રેડશીટ ફાઈલ શેરીંગ', '', '', '', '', '154410074', '154559342', '', '', '', 'Advanced', '2:03', '', '', '', 22, '2016-09-08 17:19:40'),
(223, 'Working with Google Sheets that are shared with you', 'वर्किंग विथ गूगल शीट्स धेट आर शेर विथ यु', 'વર્કીંગ વિથ ગુગલ શીટ્સ ધેટ આર શેર વિથ યુ', '', '', '', '', '154408397', '154559336', '', '', '', 'Advanced', '3:10', '', '', '', 22, '2016-09-08 17:19:40'),
(224, 'Commenting on a spreadsheet', 'कोमेंटिंग ओन स्प्रेडशीट', 'કોમેન્ટીંગ ઓન સ્પ્રેડશીટ', '', '', '', '', '154408396', '154559340', '', '', '', 'Advanced', '2:25', '', '', '', 22, '2016-09-08 17:19:40'),
(225, 'Working with spreadsheet revisions', 'स्प्रेडशीट आवृतियो के साथ काम', 'સ્પ્રેડશીટ આવૃતિઓ સાથે કામ', '', '', '', '', '154408394', '154559339', '', '', '', 'Advanced', '2:01', '', '', '', 22, '2016-09-08 17:19:40'),
(226, 'Spreadsheet settings', 'स्प्रेडशीट सेटिंग', 'સ્પ્રેડશીટ સેટિંગ', '', '', '', '', '154409302', '154559994', '', '', '', 'Advanced', '2:20', '', '', '', 22, '2016-09-08 17:19:40'),
(227, 'Importing and converting', 'इम्पोर्टिंग एन्ड कंवर्टिंग', 'ઈમ્પોર્ટીંગ એન્ડ કન્વર્ટીંગ', '', '', '', '', '154409305', '154559993', '', '', '', 'Advanced', '2:40', '', '', '', 22, '2016-09-08 17:19:40'),
(228, 'Download as', 'डाउनलोड एस', 'ડાઉનલોડ એસ', '', '', '', '', '154409304', '154559992', '', '', '', 'Advanced', '1:30', '', '', '', 22, '2016-09-08 17:19:40'),
(229, 'Publish to the web', 'पब्लिश टू ढ वेब', 'પબ્લીશ ટુ ધ વેબ', '', '', '', '', '154410090', '154559995', '', '', '', 'Advanced', '4:00', '', '', '', 22, '2016-09-08 17:19:40'),
(230, 'Email collaborators', 'इ मेइल सहयोगी', 'ઈ મેઈલ સહયોગી', '', '', '', '', '154409303', '154559990', '', '', '', 'Advanced', '1:34', '', '', '', 22, '2016-09-08 17:19:40'),
(231, 'Collaborating simultaneously and using Google Chat', 'बारीबारी सहयोग और गूगल चेट का उपयोग करके', 'વારાફરતી સહયોગ અને ગુગલ ચેટ નો ઉપયોગ કરીને', '', '', '', '', '154409467', '154560248', '', '', '', 'Advanced', '1:47', '', '', '', 22, '2016-09-08 17:19:40'),
(232, 'Email as Attachment', 'इ मेइल अटेचमेन्ट', 'ઈ મેઈલ એટેચમેન્ટ', '', '', '', '', '154409470', '154560736', '', '', '', 'Advanced', '1:31', '', '', '', 22, '2016-09-08 17:19:40'),
(233, 'Spelling check', 'स्पेलिंग चेक', 'સ્પેલિંગ ચેક', '', '', '', '', '154409472', '154560252', '', '', '', 'Advanced', '1:23', '', '', '', 22, '2016-09-08 17:19:40'),
(234, 'Print your Google sheet', 'आपकी गूगलशीट प्रिन्ट', 'તમારી ગુગલ શીટ પ્રિન્ટ', '', '', '', '', '154409468', '154560255', '', '', '', 'Advanced', '2:09', '', '', '', 22, '2016-09-08 17:19:40'),
(235, 'Including addons in a sheet', 'इन्क्लुडिंग एड ओन्स इन शीट्स', 'ઈન્ક્લુડીન્ગ એડ ઓન્સ ઇન શીટ', '', '', '', '', '154409469', '154560250', '', '', '', 'Advanced', '2:39', '', '', '', 22, '2016-09-08 17:19:40'),
(236, 'Downloading the Google sheet app and signing in', 'डाउनलोडिंग गूगल शीट एप एन्ड साइन इन', 'ડાઉનલોડીંગ ગુગલ શીટ એપ એન્ડ સાઈન ઇન', '', '', '', '', '154409903', '154560739', '', '', '', 'Advanced', '1:07', '', '', '', 22, '2016-09-08 17:19:41'),
(237, 'Navigating the Google sheet app', 'नेविगेटिंग गूगल शीट एप', 'નેવિગેટીંગ ગુગલ શીટ એપ', '', '', '', '', '154409900', '154560740', '', '', '', 'Advanced', '2:24', '', '', '', 22, '2016-09-08 17:19:41'),
(238, 'Working with sheet in the app', 'एप्लीकेशन शीट के साथ काम', 'એપ્લીકેશન શીટ સાથે કામ', '', '', '', '', '154409901', '154560735', '', '', '', 'Advanced', '3:54', '', '', '', 22, '2016-09-08 17:19:41'),
(239, 'what is google drive', 'गूगल ड्राइव क्या हें?', 'ગુગલ ડ્રાઈવ શું છે ?', '', '', '', '', '154693518', '154693403', '', '', '', 'Beginner', '2:23', '', '', '', 28, '2016-09-08 17:19:41'),
(240, 'google drive interface', 'गूगल ड्राइव इन्टरफेस', 'ગુગલ ડ્રાઈવ ઇન્ટરફેસ', '', '', '', '', '154693517', '154693404', '', '', '', 'Beginner', '1:39', '', '', '', 28, '2016-09-08 17:19:41'),
(241, 'Google IME', 'गूगल IME का परिचय', 'ગુગલ IMEનો પરિચય', '', '', '', '', '153764730', '153874453', '', '', '', 'Beginner', '4:36', '', '', '', 30, '2016-09-08 17:19:41'),
(242, 'Google Hangout Introduction', 'गूगल हेन्गआउट - परिचय', 'ગુગલ હેન્ગઆઉટ - પરિચય', '', '', '', '', '154009573', '153597521', '', '', '', 'Beginner', '1:15', '', '', '', 29, '2016-09-08 17:19:41'),
(243, 'Google Hangout Interface', 'गूगल हेन्गआउट - इन्टरफेस', 'ગુગલ હેન્ગઆઉટ - ઇન્ટરફેસ', '', '', '', '', '154009577', '153597526', '', '', '', 'Beginner', '2:43', '', '', '', 29, '2016-09-08 17:19:41'),
(244, 'Video Calling & Features', 'गूगल हेन्गआउट - विडिओ कोलिंग और दूसरी विशेषता', 'ગુગલ હેન્ગઆઉટ - વિડીઓ કોલિંગ અને બીજી વિશેષતા', '', '', '', '', '154009574', '154044894', '', '', '', 'Beginner', '2:55', '', '', '', 29, '2016-09-08 17:19:41'),
(245, 'Hangout on Air', 'गूगल हेन्ग आउट - हेन्गआउट ओन एइर', 'ગુગલ હેન્ગઆઉટ - હેન્ગઆઉટ ઓન એઈર', '', '', '', '', '154009570', '153597527', '', '', '', 'Beginner', '3:01', '', '', '', 29, '2016-09-08 17:19:41'),
(246, 'Introduction of youtube', 'यु टयूब परिचय', 'યુ ટ્યુબ પરિચય', '', '', '', '', '155210797', '155210796', '', '', '', 'Beginner', '1:28', '', '', '', 32, '2016-09-08 17:19:41'),
(247, 'How to create youtube account', 'यु टयूब का उपयोग कैसे करे', 'યુ ટ્યુબનો ઉપયોગ કેવી રીતે કરવો', '', '', '', '', '154573959', '155111378', '', '', '', 'Beginner', '3:21', '', '', '', 32, '2016-09-08 17:19:41'),
(248, 'How to verify youtube account', 'यु टयूब चेनल कैसे क्रिएट करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે ક્રિએટ કરવી', '', '', '', '', '154573960', '155109791', '', '', '', 'Beginner', '4:07', '', '', '', 32, '2016-09-08 17:19:41'),
(249, 'How to make youtube channel', 'यु टयूब चेनल कैसे वेरीफाय करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે વેરીફાય કરવી', '', '', '', '', '154573963', '155111370', '', '', '', 'Beginner', '2:11', '', '', '', 32, '2016-09-08 17:19:41'),
(250, 'How to make slide sHow in youtube', 'यु टयूब में स्लाइड शो कैसे करे', 'યુ ટ્યુબમાં સ્લાઈડ શો કેવી રીતે કરવો', '', '', '', '', '155210518', '155111373', '', '', '', 'Beginner', '2:25', '', '', '', 32, '2016-09-08 17:19:42'),
(251, 'How to upload video pc', 'मोबाइल द्वारा विडिओ अपलोड कैसे करे', 'મોબાઈલ દ્વારા વિડીઓ અપલોડ કઈ રીતે કરવો', '', '', '', '', '155210519', '155111372', '', '', '', 'Intermediate', '2:12', '', '', '', 32, '2016-09-08 17:19:42'),
(252, 'How to upload mobile', 'विडिओ अपलोड कैसे करे', 'વિડીઓ અપલોડ કઈ રીતે કરવો', '', '', '', '', '155111369', '155111369', '', '', '', 'Intermediate', '4:57', '', '', '', 32, '2016-09-08 17:19:42'),
(253, 'How to add subtitle & caption in video', 'यु टयूब में सबटाइटल और केप्शन कैसे जोड़े', 'યુ ટ્યુબમાં સબટાઇટલ અને કેપ્શન કેવી રીતે ઉમેરવા', '', '', '', '', '154582840', '155109789', '', '', '', 'Intermediate', '3:47', '', '', '', 32, '2016-09-08 17:19:42'),
(254, 'How to make playlist', 'प्ले लिस्ट कैसे बनाए', 'પ્લેલિસ્ટ કેવી રીતે બનાવવું', '', '', '', '', '154582841', '155109790', '', '', '', 'Intermediate', '2:50', '', '', '', 32, '2016-09-08 17:19:42'),
(255, 'How to enbed a youtube video', 'यु टयूब में विडिओ एम्बेड कैसे करे', 'યુ ટ્યુબમાં વિડીઓ એમ્બેડ કેવી રીતે કરવો', '', '', '', '', '154582844', '155107490', '', '', '', 'Intermediate', '2:13', '', '', '', 32, '2016-09-08 17:19:42'),
(256, 'How to autoplay video', 'यु टयूब में एम्बेड किया हुआ विडिओ कैसे ओतोप्ले करे', 'યુ ટ્યુબમાં એમ્બેડ કરેલો વિડીઓ કેવી રીતે ઓટોપ્લે કરવો', '', '', '', '', '154583940', '155107495', '', '', '', 'Intermediate', '1:56', '', '', '', 32, '2016-09-08 17:19:42'),
(257, 'How to subscribe channel', 'यु टयूब चेनल कैसे सबस्क्राइब करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે સબસ્ક્રાઇબ કરવી', '', '', '', '', '154580769', '155107492', '', '', '', 'Advanced', '1:14', '', '', '', 32, '2016-09-08 17:19:42'),
(258, 'How to take the back up of a youtube channel', 'यु टयूब चेनल का बेकअप कैसे ले', 'યુ ટ્યુબ ચેનલનું બેકઅપ કેવી રીતે લેવું', '', '', '', '', '154580768', '155107493', '', '', '', 'Advanced', '2:28', '', '', '', 32, '2016-09-08 17:19:42'),
(259, 'How to watch offline video', 'यु टयूब में ऑफलाइन विडिओ कैसे देखे', 'યુ ટ્યુબમાં ઓફલાઈન વિડીઓ કેવી રીતે જોવો', '', '', '', '', '154580772', '155111371', '', '', '', 'Advanced', '2:01', '', '', '', 32, '2016-09-08 17:19:42'),
(260, 'How to delete youtube history', 'यु टयूब हिस्टरी कैसे डिलीट करे', 'યુ ટ્યુબ હિસ્ટરી કેવી રીતે ડીલીટ કરવી', '', '', '', '', '154580767', '155109793', '', '', '', 'Advanced', '2:17', '', '', '', 32, '2016-09-08 17:19:42'),
(261, 'How to delete youtube channel', 'यु टयूब चेनल कैसे डिलीट करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે ડીલીટ કરવી', '', '', '', '', '154580770', '155109794', '', '', '', 'Advanced', '2:27', '', '', '', 32, '2016-09-08 17:19:42'),
(262, 'Introduction to Google translate', 'गूगल ट्रान्सलेट का परिचय', 'ગુગલ ટ્રાન્સલેટનો પરિચય', '', '', '', '', '154690090', '153875042', '', '', '', 'Beginner', '3:08', '', '', '', 31, '2016-09-08 17:19:42'),
(263, 'Introduction to Google translate with mobile', 'गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 1', 'ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 1', '', '', '', '', '154690396', '153875045', '', '', '', 'Beginner', '5:10', '', '', '', 31, '2016-09-08 17:19:42'),
(264, 'Introduction to Google speech translate', 'गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 2', 'ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 2', '', '', '', '', '154690394', '153875044', '', '', '', 'Beginner', '3:28', '', '', '', 31, '2016-09-08 17:19:42'),
(265, 'Introduction', 'टेली परिचय', 'ટેલી પરિચય', '', '', '', '', '158806213', '155932199', '', '', '', 'Beginner', '1:09', '', '', '', 23, '2016-09-08 17:19:43'),
(266, 'Interface', 'टेली इन्टरफेस', 'ટેલી ઇન્ટરફેસ', '', '', '', '', '158806239', '155932202', '', '', '', 'Beginner', '1:18', '', '', '', 23, '2016-09-08 17:19:43'),
(267, 'Create company', 'क्रिएटिंग कंपनी', 'ક્રિએટીંગ કંપની', '', '', '', '', '158806244', '155932203', '', '', '', 'Beginner', '4:05', '', '', '', 23, '2016-09-08 17:19:43'),
(268, 'Various keys', 'विविध की', 'વિવિધ કી', '', '', '', '', '158806235', '155932200', '', '', '', 'Beginner', '3:41', '', '', '', 23, '2016-09-08 17:19:43'),
(269, 'Balance sheet', 'बेलेन्स शिट', 'બેલેન્સ શીટ', '', '', '', '', '158806225', '155932201', '', '', '', 'Beginner', '5:54', '', '', '', 23, '2016-09-08 17:19:43'),
(270, 'Rules for debit and credit', 'डेबिट और क्रेडिट के नियम', 'ડેબીટ અને ક્રેડીટ ના નિયમ', '', '', '', '', '158806237', '155934617', '', '', '', 'Beginner', '1:36', '', '', '', 23, '2016-09-08 17:19:43'),
(271, 'Payment voucher', 'भुगतान वाउचर', 'ચુકવણી વાઉચર', '', '', '', '', '158806249', '155939130', '', '', '', 'Intermediate', '2:29', '', '', '', 23, '2016-09-08 17:19:43'),
(272, 'Receipt voucher', 'प्राप्ति वाउचर', 'રસીદ વાઉચર', '', '', '', '', '158806229', '155934620', '', '', '', 'Intermediate', '1:23', '', '', '', 23, '2016-09-08 17:19:43'),
(273, 'Purchase voucher', 'खरीद वाउचर', 'ખરીદ વાઉચર', '', '', '', '', '158806234', '155934619', '', '', '', 'Intermediate', '2:09', '', '', '', 23, '2016-09-08 17:19:43'),
(274, 'Sales voucher', 'बिक्री वाउचर', 'વેચાણ વાઉચર', '', '', '', '', '158806243', '155934621', '', '', '', 'Intermediate', '2:02', '', '', '', 23, '2016-09-08 17:19:43'),
(275, 'Contra voucher', 'कोंट्रा वाउचर', 'કોન્ટ્રા વાઉચર', '', '', '', '', '158806247', '155934834', '', '', '', 'Intermediate', '1:22', '', '', '', 23, '2016-09-08 17:19:43'),
(276, 'Journal voucher', 'पत्रिका का वाउचर', 'જર્નલ વાઉચર', '', '', '', '', '158806226', '155939129', '', '', '', 'Intermediate', '1:29', '', '', '', 23, '2016-09-08 17:19:43'),
(277, 'Creditnote voucher', 'क्रेडिट नोट वाउचर', 'ક્રેડીટ નોટ વાઉચર', '', '', '', '', '158806236', '155934832', '', '', '', 'Intermediate', '1:21', '', '', '', 23, '2016-09-08 17:19:43'),
(278, 'Debitnote voucher', 'डेबिट नोट वाउचर', 'ડેબીટ નોટ વાઉચર', '', '', '', '', '158806241', '155934836', '', '', '', 'Intermediate', '1:25', '', '', '', 23, '2016-09-08 17:19:43'),
(279, 'Memorandum - optional', 'ज्ञापन और वैकल्पिक वाउचर', 'મેમોરેન્ડમ અને વૈકલ્પિક વાઉચર', '', '', '', '', '158806224', '155934833', '', '', '', 'Intermediate', '1:53', '', '', '', 23, '2016-09-08 17:19:43'),
(280, 'Inventory', 'इन्वेंटरी', 'ઇન્વેન્ટરી', '', '', '', '', '158806217', '155935555', '', '', '', 'Advanced', '4:56', '', '', '', 23, '2016-09-08 17:19:44'),
(281, 'Purchase-sales with inventory', 'इन्वेंटरी ने साथ खरीदी बिक्री', 'ઇન્વેન્ટરીની સાથે ખરીદ વેચાણ', '', '', '', '', '158806252', '155935556', '', '', '', 'Advanced', '1:33', '', '', '', 23, '2016-09-08 17:19:44'),
(282, 'Physical stock voucher - stock journal voucher', 'शारीरिक शेयर वाउचर - शेयर पत्रिका वाउचर', 'શારીરિક સ્ટોક વાઉચર - સ્ટોક જર્નલ વાઉચર', '', '', '', '', '158806233', '155935554', '', '', '', 'Advanced', '3:01', '', '', '', 23, '2016-09-08 17:19:44'),
(283, 'Multi unit, stock with expiry date', 'मल्टी यूनिट, एक्सपायरी डेट ने साथ शेयर', 'મલ્ટી યુનિટ, એક્ષ્પાયરિ ડેટની સાથે સ્ટોક', '', '', '', '', '158806246', '155935552', '', '', '', 'Advanced', '2:31', '', '', '', 23, '2016-09-08 17:19:44'),
(284, 'Backup - restore - delete', 'बेकअप, रिस्टोर, डिलीट', 'બેકઅપ, રીસ્ટોર, ડીલીટ', '', '', '', '', '158806227', '155935553', '', '', '', 'Advanced', '2:05', '', '', '', 23, '2016-09-08 17:19:44'),
(285, 'Multi currency', 'बहू मुद्रा', 'મલ્ટી ચલણ', '', '', '', '', '158806253', '155939128', '', '', '', 'Advanced', '1:47', '', '', '', 23, '2016-09-08 17:19:44'),
(286, 'Cost category and cost centre', 'लागत श्रेणी और लागत केन्द्र', 'કિમત શ્રેણી અને કિમત કેન્દ્ર', '', '', '', '', '158806219', '155955946', '', '', '', 'Advanced', '2:14', '', '', '', 23, '2016-09-08 17:19:44'),
(287, 'Reports', 'रिपोर्ट्स', 'રીપોર્ટસ', '', '', '', '', '158806214', '155938815', '', '', '', 'Advanced', '1:54', '', '', '', 23, '2016-09-08 17:19:44'),
(288, 'Display', 'डिस्प्ले', 'ડિસ્પ્લે', '', '', '', '', '158806216', '155938812', '', '', '', 'Advanced', '2:46', '', '', '', 23, '2016-09-08 17:19:44'),
(289, 'Printing options', 'प्रिंटिंग ऑप्शन', 'પ્રિન્ટીંગ ઓપ્શન', '', '', '', '', '158806228', '155938813', '', '', '', 'Advanced', '4:57', '', '', '', 23, '2016-09-08 17:19:44'),
(290, 'Shortcut keys', 'शार्टकट की', 'શોર્ટકટ કી', '', '', '', '', '158806215', '155938816', '', '', '', 'Advanced', '2:16', '', '', '', 23, '2016-09-08 17:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `video_temp`
--

CREATE TABLE IF NOT EXISTS `video_temp` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `eng_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `hi_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `guj_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `hi_url` varchar(50) CHARACTER SET utf8 NOT NULL,
  `guj_url` varchar(50) CHARACTER SET utf8 NOT NULL,
  `duration` varchar(100) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=291 ;

--
-- Dumping data for table `video_temp`
--

INSERT INTO `video_temp` (`v_id`, `eng_name`, `hi_name`, `guj_name`, `hi_url`, `guj_url`, `duration`) VALUES
(1, 'Introduction', 'पावर पोइन्ट का परिचय', 'પાવર પોઈન્ટનો પરિચય', '154007606', '154629750', '1:22'),
(2, 'Interface', 'पावर पोइन्ट के इन्टरफेस', 'પાવર પોઈન્ટની ઇન્ટરફેસ', '154007611', '153330044', '3:03'),
(3, 'Creating and Opening Presentation', 'क्रिएटिंग एन्ड ओपनिंग प्रेजेंटेशन', 'ક્રિએટીંગ એન્ડ ઓપનીંગ પ્રેઝન્ટેશન', '154007607', '153368112', '2:31'),
(4, 'Saving and Sharing', 'सेविंग एन्ड शेरिंग', 'સેવિંગ એન્ડ શેરિંગ', '153594014', '153483181', '1:47'),
(5, 'Slide Basics', 'स्लाइड बेज़िक्स', 'સ્લાઈડ બેઝિક', '154007605', '153472036', '3:51'),
(6, 'Text Basics', 'टेक्स्ट बेजिक', 'ટેક્ષ્ટ બેઝિક', '154007621', '153472039', '4:01'),
(7, 'Find and Replace', 'फाइंड एन्ड रिप्लेस', 'ફાઈન્ડ એન્ડ રિપ્લેસ', '154007622', '153472048', '2:53'),
(8, 'Applying Themes', 'एप्लायिंग थीम', 'એપ્લાયિંગ થીમ', '154007618', '153472057', '2:38'),
(9, 'Applying Transition', 'एप्लायिंग ट्रांजिशन', 'એપ્લાયિંગ ટ્રાન્ઝીશન', '153594013', '153483823', '2:23'),
(10, 'Managing Slides', 'मेनेजिंग स्लाइड', 'મેનેજિંગ સ્લાઈડ', '153594017', '153484025', '1:41'),
(11, 'Printing', 'प्रिंटिंग', 'પ્રિન્ટીંગ', '153594019', '153472056', '3:43'),
(12, 'Presenting your slideshow 1', 'प्रेज़ेन्टिंग स्लाइड शो 1', 'પ્રેઝેન્ટીંગ સ્લાઈડ શો 1', '153594022', '153472043', '4:09'),
(13, 'Presenting your slideshow 2', 'प्रेज़ेन्टिंग स्लाइड शो 2', '13 પ્રેઝેન્ટીંગ સ્લાઈડ શો 2', '153594023', '153472047', '3:17'),
(14, 'Lists', 'लिस्ट', 'લિસ્ટ', '153594024', '153472055', '2:56'),
(15, 'Indent and Line Spacing', 'इंडेंट एन्ड लाइन स्पेसिंग', 'ઇન્ડેન્ટ એન્ડ લાઈન સ્પેસીંગ', '153594012', '153485161', '2:21'),
(16, 'Insert Pictures', 'इन्सर्ट पिक्चर', 'ઇન્સર્ટ પિક્ચર', '153594660', '153485360', '2:13'),
(17, 'Formatting Pictures', 'फोर्मेटिंग पिक्चर', 'ફોર્મેટિંગ પિક્ચર', '153594015', '153472034', '4:14'),
(18, 'Shapes', 'शेइप', 'શેઈપ', '153594021', '153472037', '2:18'),
(19, 'Textbox', 'टेक्स्ट बॉक्स', 'ટેક્ષ્ટ બોક્ષ', '153594016', '153485621', '2:25'),
(20, 'Wordart', 'वर्ड आर्ट', 'વર્ડઆર્ટ', '153594025', '153485831', '2:35'),
(21, 'Arranging Objects', 'एरेन्ज ऑब्जेक्ट', 'એરેન્જ ઓબ્જેક્ટ', '154007609', '153472038', '4:01'),
(22, 'Animating Text', 'एनीमेशन टेक्स्ट', 'એનિમેશન ટેક્ષ્ટ', '154007619', '153472042', '5:22'),
(23, 'Inserting Videos', 'इन्सर्टिंग विडिओ', 'ઇન્સર્ટિંગ વિડીઓ', '154007612', '153472054', '3:21'),
(24, 'Inserting Audio', 'इन्सर्टिंग ऑडियो', 'ઇન્સર્ટિંગ ઓડીઓ', '153594659', '153486734', '2:57'),
(25, 'Tables', 'इन्सर्ट टेबल', 'ઇન્સર્ટ ટેબલ', '153659546', '153472035', '3:44'),
(26, 'Chart', 'चार्ट', 'ચાર્ટ', '153659862', '153472050', '4:14'),
(27, 'Inserting Graphics', 'इन्सर्ट चार्ट', 'ઇન્સર્ટ ચાર્ટ', '153659544', '153472046', '5:25'),
(28, 'Smart Art Graphics', 'स्मार्ट आर्ट ग्राफिक', 'સ્માર્ટ આર્ટ ગ્રાફિક', '153659548', '153487102', '2:26'),
(29, 'Checking Spelling and Grammer', 'चेक स्पेलिंग एन्ड ग्रामर', 'ચેક સ્પેલિંગ એન્ડ ગ્રામર', '153594661', '153487262', '1:12'),
(30, 'Reviewing presentation', 'रिव्यू प्रेज़न्टेशन', 'રીવ્યુ પ્રેઝન્ટેશન', '153659545', '153487438', '2:01'),
(31, 'Protecting Presentations', 'प्रोटेक्ट डोक्युमेंट', 'પ્રોટેક્ટ ડોક્યુમેન્ટ', '153659542', '153487603', '1:52'),
(32, 'Themes', 'थीम्स', 'થીમ્સ', '153594658', '153487589', '1:55'),
(33, 'Slide Master View', 'स्लाइड मास्टर', 'સ્લાઈડ માસ્ટર', '153659543', '153487598', '2:30'),
(34, 'Hyperlinks and Action Buttons', 'हायपरलिंक एन्ड एक्शन बटन', 'હાઇપરલિંક એન્ડ એક્શન બટન', '154007616', '153472051', '3:21'),
(35, 'Advanced Presentation Options', 'एडवान्स प्रेज़न्टेशन', 'એડવાન્સ પ્રેઝન્ટેશન', '153659541', '153487600', '4:07'),
(36, 'Google Slides introduction', 'परिचय', 'પરિચય', '153877812', '153877025', '1:37'),
(37, 'Sign-in in and creating a Slides', 'साइन इन एन्ड क्रिएटिंग स्लाइड्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ સ્લાઈડસ', '153877876', '153663630', '1:31'),
(38, 'Google Slides Interface', 'गूगल स्लाइड्स इन्टरफेस', 'ગુગલ સ્લાઈડસ ઇન્ટરફેસ', '153877861', '153663638', '2:37'),
(39, 'Create slide and presentation', 'क्रिएट स्लाइड एन्ड प्रेज़न्टेशन', 'ક્રિએટ સ્લાઈડ એન્ડ પ્રેઝન્ટેશન', '153877836', '153663631', '1:24'),
(40, 'Slide Basics', 'स्लाइड्स बेज़िक्स', 'સ્લાઈડસ બેઝીક્સ', '153877818', '153663639', '3:17'),
(41, 'Text Formatting', 'टेक्स्ट फोर्मेटिंग', 'ટેક્ષ્ટ ફોર્મેટિંગ', '153879358', '153663634', '3:11'),
(42, 'Insert Image', 'इन्सर्ट इमेज', 'ઇન્સર્ટ ઈમેજ', '153879359', '153663635', '3:44'),
(43, 'Insert Shape and Lines', 'इन्सर्ट शेइप्स एन्ड लाइंस', 'ઇન્સર્ટ શેઈપ્સ એન્ડ લાઈન્સ', '153879361', '153663636', '2:48'),
(44, 'Theme and Background', 'थीम एन्ड ब्रेक्ग्राउन्द', 'થીમ એન્ડ બેકગ્રાઉન્ડ', '153877842', '153663633', '1:44'),
(45, 'Insert video and Word art', 'इन्सर्ट विडिओ एन्ड वर्डआर्ट', 'ઇન્સર્ટ વિડીઓ એન્ડ વર્ડઆર્ટ', '153877855', '153663632', '1:29'),
(46, 'slide numbers and comments', 'स्लाइड नम्बर्स एन्ड कोमेंट्स', 'સ્લાઈડ નંબર્સ એન્ડ કોમેન્ટ્સ', '153877821', '153771042', '1:30'),
(47, 'Animation in Slides', 'एनीमेशन इन स्लाइड', 'એનિમેશન ઇન સ્લાઈડ', '153877838', '153771025', '2:53'),
(48, 'Insert Table & Function', 'इन्सर्ट टेबल एन्ड फंक्शन', 'ઇન્સર્ટ ટેબલ એન્ડ ફંક્શન', '153877819', '153771035', '2:39'),
(49, 'File menu part-1', 'फ़ाइल मेनु पार्ट - 1', 'ફાઈલ મેનુ પાર્ટ - 1', '153877875', '153771036', '3:57'),
(50, 'File menu Part- 2', 'फ़ाइल मेनु पार्ट - 2', 'ફાઈલ મેનુ પાર્ટ - 2', '153877847', '153877015', '3:44'),
(51, 'Find and replace', 'फाइंड एन्ड रिप्लेस', 'ફાઈન્ડ એન્ડ રિપ્લેસ', '153879615', '153771037', '1:55'),
(52, 'Arrange menu', 'अरेंज मेनु', 'અરેંજ મેનુ', '153877877', '153771038', '2:06'),
(53, 'Tools menu', 'टूल्स मेनु', 'ટૂલ્સ મેનુ', '153879621', '153771033', '2:14'),
(54, 'Master option', 'मास्टर ऑप्शन', 'માસ્ટર ઓપ્શન', '153879612', '153771031', '1:25'),
(55, 'Introduction to Google Slide Mobile', 'गूगल स्लाइड मोबाइल परिचय', 'ગુગલ સ્લાઈડ મોબાઈલ પરિચય', '153877814', '153771039', '7:29'),
(56, 'Introduction advance features', 'एडवान्स फीचर्स परिचय', 'એડવાન્સ ફીચર્સ પરિચય', '153659541', '153774267', '3:47'),
(57, 'Introduction', 'परिचय', 'પરિચય', '154569282', '154393044', '1:49'),
(58, 'Gmail Use', 'जिमेइल का उपयोग', 'જીમેઇલનો ઉપયોગ', '153755547', '154396006', '1:18'),
(59, 'Create new Account', 'नया अकाउंट बनाए', 'નવું એકાઉન્ટ બનાવો', '154693815', '154396406', '4:31'),
(60, 'Inbox', 'इनबॉक्स', 'ઇનબોક્ષ', '154569284', '153669926', '3:36'),
(61, 'Themes and Inbox Type', 'थीम्स एन्ड इनबॉक्स टाइप', 'થીમ્સ એન્ડ ઇનબોક્ષ ટાઇપ', '154046583', '154396471', '4:52'),
(62, 'Compose Email & Formatting Email', 'कम्पोज़ मेइल एन्ड फोर्मेटिंग मेइल', 'કમ્પોઝ મેઈલ એન્ડ ફોર્મેટિંગ મેઈલ', '153755626', '153669911', '4:09'),
(63, 'Replying', 'रिप्लायिंग', 'રીપ્લાયીંગ', '154046568', '154396532', '4:46'),
(64, 'Starred, Important, Sent Mail, etc', 'स्टार्ड, इम्पोर्टेन्ट, सेंट मेइल, चेट', 'સ્ટાર્ડ, ઈમ્પોર્ટન્ટ, સેન્ટ મેઈલ, ચેટ', '153755589', '154395117', '2:45'),
(65, 'Working With Attachments', 'अटेचमेन्ट के साथ काम', 'અટેચમેન્ટસ સાથે કામ', '153755553', '153669925', '2:38'),
(66, 'Quick Action', 'क्विक एक्शन', 'ક્વિક એક્શન', '153755600', '154395097', '1:43'),
(67, 'Muting Conversation', 'म्युटिंग कन्वर्ज़ेशन', 'મ્યુટીંગ કન્વર્ઝેશન', '153755606', '153669932', '1:38'),
(68, 'Multiple Messages', 'मल्टिपल मेसेजिस', 'મલ્ટીપલ મેસેજીસ', '153755632', '154395110', '2:08'),
(69, 'Creating Labels', 'करिएटिंग लेबल्स', 'ક્રિએટીંગ લેબલ્સ', '153755584', '154396675', '3:15'),
(70, 'Moving Messages', 'मूविंग मेसेजिस', 'મુવીંગ મેસેજીસ', '153755540', '153669910', '1:53'),
(71, 'Creating Filters', 'करिएटिंग फिल्टर्स', 'ક્રિએટીંગ ફિલ્ટર્સ', '153755609', '154396750', '3:40'),
(72, 'Managing Labels', 'मेनेजिंग लेबल्स', 'મેનેજીંગ લેબલ્સ', '153755539', '153669910', '2:53'),
(73, 'Advanced Searching', 'एडवान्स सर्चिंग', 'એડવાન્સ સર્ચીંગ', '153755591', '153669921', '3:53'),
(74, 'Managing Account', 'मेनेजिंग एकाउन्ट्स', 'મેનેજીંગ એકાઉન્ટસ', '153755554', '153669929', '2:23'),
(75, 'Gmail Settings', 'जिमेइल सेटिंग', 'જીમેઇલ સેટીંગ્સ', '153760435', '153669939', '1:33'),
(76, 'Creating Contacts', 'करिएटिंग कोंटेक्स', 'ક્રિએટીંગ કોન્ટેક્સ', '153755637', '154395111', '2:06'),
(77, 'Creating Groups', 'करिएटिंग ग्रुप्स', 'ક્રિએટીંગ ગ્રુપ્સ', '153755663', '154395115', '1:31'),
(78, 'Importing Contacts & Settings', 'इम्पोटिंग कोंटेक्स एन्ड सेटिंग', 'ઈમ્પોર્ટીંગ કોન્ટેક્સ એન્ડ સેટીંગ્સ', '154047340', '153669923', '3:14'),
(79, 'Introducing Chat, Chat Status & Settings', 'इंट्रोडयुसिंग चेट, चेट स्टेट्स एन्ड सेटिंग', 'ઇન્ટ્રોડયુસીંગ ચેટ, ચેટ સ્ટેટ્સ & સેટીંગ્સ', '154047348', '154396800', '3:39'),
(80, 'Initiating Video', 'इनिशिएटिंग विडिओ', 'ઈનીશીએટીંગ વિડીઓ', '154047335', '154395096', '1:01'),
(81, 'Creating Tasks', 'करिएटिंग टास्क', 'ક્રિએટીંગ ટાસ્ક', '154047351', '154396924', '3:02'),
(82, 'Vacation Responder', 'वेकेशन रिस्पोंडर', 'વેકેશન રીસ્પોંડર', '154047346', '154395108', '1:48'),
(83, 'Signature Files', 'सिग्नेचर फाइल्स', 'સિગ્નેચર ફાઈલ્સ', '154047367', '153669899', '1:53'),
(84, 'Shortcuts of gmail', 'शार्टकटस', 'શોર્ટકટસ', '154047354', '154396866', '3:15'),
(85, 'Quick Links', 'क्विक लिंक्स', 'ક્વિક લીન્ક્સ', '154047345', '153669907', '1:48'),
(86, 'Gmail for Mobile login', 'मोबाइल - जीमेइल लॉग इन', 'જીમેઇલનો - લૉગ ઇન વિથ મોબાઇલ', '154047359', '153669938', '2:46'),
(87, 'Google Calendar Interface', 'गूगल केलेन्डर का परिचय', 'ગુગલ કેલેન્ડરનો પરિચય', '154045144', '153873839', '1:35'),
(88, 'Create new event', 'नयी इवेन्ट', 'નવી ઇવેન્ટ', '154045147', '153873838', '4:10'),
(89, 'Create new Calendar', 'नया केलेन्डर', 'નવું કેલેન્ડર', '154045145', '153873841', '1:16'),
(90, 'Getting Started', 'एवरनोट गेटिंग स्टार्टेड', 'એવરનોટ ગેટીંગ સ્ટાર્ટેડ', '154007107', '154397992', '1:40'),
(91, 'Interface', 'एवरनोट इन्टरफेस', 'એવરનોટ ઇન્ટરફેસ', '154007108', '154397993', '2:40'),
(92, 'Create New Notebook & Tag', 'क्रिएट न्यू टेग और नोटबुक', 'ક્રિએટ ન્યુ ટેગ એન્ડ નોટબુક', '154007110', '155211167', '1:28'),
(93, 'Evernote - Mobile app', 'एवरनोट मोबाइल एप', 'એવરનોટ મોબાઈલ એપ', '154007109', '154839279', '1:38'),
(94, 'Introduction', 'वंडरलिस्ट का परिचय 1', 'વન્ડરલિસ્ટનો પરિચય 1', '154397391', '153876216', '3:52'),
(95, 'How to use wunderlist', 'वंडरलिस्ट का परिचय 2', 'વન્ડરલિસ્ટનો પરિચય 2', '154397392', '153876085', '4:34'),
(96, 'How to use wunderlist by mobile', 'वंडरलिस्ट का उपयोग मोबाइल में कैसे करे', 'વન્ડરલિસ્ટનો ઉપયોગ મોબાઈલમાં કેવી રીતે કરવો', '154397393', '153876084', '8:05'),
(97, 'Introduction to Google Keep', 'गूगल किप का परिचय', 'ગૂગલ કિપનો પરિચય', '154009341', '154044549', '1:17'),
(98, 'How To Use Google Keep', 'गूगल किप का उपयोग कैसे करे', 'ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો', '154009342', '153874774', '4:06'),
(99, 'How To Use Google Keep (Mobile Use)', 'गूगल किप का उपयोग कैसे करे 2 (मोबाइल उपयोग)', 'ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો 2 (મોબાઈલ ઉપયોગ)', '154009339', '154044548', '2:08'),
(100, 'Introduction to Google Forms', 'गूगल फॉर्म का परिचय', 'ગુગલ ફોર્મનો પરિચય', '153763570', '153874138', '9:11'),
(101, 'Theames & Other Features', 'थीम्स और दूसरी विशेषता', 'થીમ્સ & બીજી વિશેષતા', '153763571', '153874140', '6:26'),
(102, 'Introduction', 'माइक्रोसॉफ्ट वर्ड का परिचय', 'માઈક્રોસોફ્ટ વર્ડનો પરિચય', '153869214', '153604354', '1:04'),
(103, 'Word Interface', 'माइक्रोसॉफ्ट वर्ड के इन्टरफेस', 'માઈક્રોસોફ્ટ વર્ડની ઇન્ટરફેસ', '153869216', '153604349', '3:07'),
(104, 'Getting to Know Word', 'माईक्रोसॉफ्ट वर्ड के बारे में माहिती', 'માઈક્રોસોફ્ટ વર્ડ વિશેની માહિતી', '154693948', '153750213', '1:52'),
(105, 'Creating & Opening Documents', 'नये डोक्युमेंट बनाए और पुराने खोले', 'નવા ડોક્યુમેન્ટ બનાવવા અને જુના ખોલવા', '153869178', '153604351', '2:53'),
(106, 'Saving & Sharing', 'सेविंग और शेरिंग', 'સેવીંગ અને શેરીંગ', '154693945', '153750216', '2:34'),
(107, 'Text Basics', 'टेक्स्ट बेज़िक्स', 'ટેક્ષ્ટ બેઝીક્સ', '153869161', '153750215', '4:29'),
(108, 'Formatting Text', 'फोर्मेटिंग टेक्स्ट', 'ફોર્મેટિંગ ટેક્ષ્ટ', '154839517', '153661209', '4:35'),
(109, 'Page Layout', 'पेइज ले - आउट', 'પેઈજ લે-આઉટ', '153869212', '153750205', '2:28'),
(110, 'Printing Documents', 'प्रिंटिंग डोक्युमेंट', 'પ્રિન્ટીંગ ડોક્યુમેન્ટ', '153869191', '153750208', '3:31'),
(111, 'Indents & Tabs 1', 'इन्देंट्स और टेब्स 1', 'ઇન્ડેન્ટસ અને ટેબ્સ 1', '153869206', '153588656', '2:30'),
(112, 'Indents & Tabs 2', 'इन्देंट्स और टेब्स 2', 'ઇન્ડેન્ટસ અને ટેબ્સ 2', '153869215', '153750219', '5:39'),
(113, 'Line & Paragraph Spacing', 'लाइन और पेरेग्राफ स्पेसिंग', 'લાઈન અને પેરેગ્રાફ સ્પેસીંગ', '153869205', '153750222', '1:45'),
(114, 'bullet & numbering', 'बुलेट्स और नम्बरिंग', 'બુલેટ્સ અને નંબરીંગ', '153869210', '153588882', '5:33'),
(115, 'Hyperlinks', 'हायपरलिंक्स', 'હાઇપરલિંકસ', '153869195', '153659969', '2:28'),
(116, 'Breaks', 'ब्रेक्स', 'બ્રેક્સ', '153869223', '153750224', '3:57'),
(117, 'Columns', 'कोल्म्स', 'કોલમ્સ', '153869213', '153750212', '3:04'),
(118, 'Headers, Footers & page breaks', 'हेडर, फुटर और पेइज नंबर', 'હેડર, ફુટર અને પેઈજ નંબર', '153869185', '153752212', '7:42'),
(119, 'Pictures & Text Wrapping', 'पिक्चर्स और टेक्स्ट रेपिंग', 'પીકચર્સ અને ટેક્ષ્ટ રેપીંગ', '153869164', '153750207', '3:31'),
(120, 'Formatting Pictures', 'फोर्मेटिंग पिक्चर्स', 'ફોર્મેટિંગ પીકચર્સ', '153869181', '153750226', '5:28'),
(121, 'Shapes', 'शेइप्स', 'શેઈપ્સ', '153869211', '153659407', '5:25'),
(122, 'Text Boxes', 'टेक्स्ट बॉक्स', 'ટેક્ષ્ટ બોક્ષ', '153594938', '153750214', '3:04'),
(123, 'Wordart', 'वर्ड आर्ट', 'વર્ડ આર્ટ', '153594947', '153750218', '4:35'),
(124, 'Arranging Objects', 'एरेंजिंग ऑब्जेक्ट', 'એરેન્જિંગ ઓબ્જેક્ટ', '153594944', '153661211', '4:14'),
(125, 'Table 1', 'टेबल 1', 'ટેબલ 1', '153594943', '153750223', '3:00'),
(126, 'Table 2', 'टेबल 2', 'ટેબલ 2', '153594945', '153661208', '8:10'),
(127, 'Chart 1', 'चार्ट 1', 'ચાર્ટ 1', '153594950', '153588881', '4:18'),
(128, 'Chart 2', 'चार्ट 2', 'ચાર્ટ 2', '153594942', '153588876', '5:35'),
(129, 'Checking Spelling & Grammer', 'चेकिंग स्पेलिंग एन्ड ग्रामर', '28 ચેકીંગ સ્પેલિંગ એન્ડ ગ્રામર', '153594940', '153750211', '3:19'),
(130, 'Track Changes & Comments', 'ट्रेक चेंजिस एन्ड कोमेंट्स', 'ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ્સ', '153594948', '153588877', '4:54'),
(131, 'Finalizing & Protecting Documents', 'फ़ाइनलाइज़िन्ग एन्ड प्रोटेक्टिंग डोक्युमेंट', 'ફાઈનલાઈઝીંગ એન્ડ પ્રોટેક્ટીંગ ડોક્યુમેન્ટ', '153594952', '153588879', '2:36'),
(132, 'Smart Art Graphics', 'स्मार्ट आर्ट ग्राफिक', 'સ્માર્ટ આર્ટ ગ્રાફિક', '153594941', '153588880', '4:49'),
(133, 'styles', 'स्टाइल्स', 'સ્ટાઇલ્સ', '153594946', '153588878', '4:33'),
(134, 'Themes', 'थीम', 'થીમ', '153594949', '153750206', '2:08'),
(135, 'Mail Merge', 'मेइल मर्ज', 'મેઈલ મર્જ', '155211316', '153604353', '6:30'),
(136, 'INTRODECTION', 'माइक्रोसॉफ्ट एक्सेल का परिचय', 'માઈક્રોસોફ્ટ એક્સેલ નો પરિચય', '153766025', '153649589', '1:33'),
(137, 'GETTING STARTED', 'गेटिंग स्टार्टेड इन्टरफेस', 'ગેટીંગ સ્ટાર્ટેડ ઇન્ટરફેસ', '153770393', '153652601', '2:55'),
(138, 'CREATING & OPENING WORKBOOKS', 'क्रिएटिंग एन्ड ओपनिंग वर्कबुक', 'ક્રિએટીંગ એન્ડ ઓપનીંગ વર્કબુક', '153589889', '153649597', '2:31'),
(139, 'SAVING & SHARING WORKBOOKS', 'सेविंग एन्ड शेरिंग वर्कबुक', 'સેવીંગ એન્ડ શેરીંગ વર્કબુક', '153589888', '153652602', '2:25'),
(140, 'CELL BASICS', 'सेल बेज़िक्स', 'સેલ બેઝીક્સ', '153589883', '153649618', '5:05'),
(141, 'MODIFYING COLUMNS, ROWS & CELLS', 'मोडीफायिंग कोलम, रो, सेल्स', 'મોડીફાઈન્ગ કોલમ, રો, સેલ્સ', '153766027', '153649594', '5:08'),
(142, 'FORMATTING CELLS', 'फोर्मेटिंग सेल', 'ફોર્મેટિંગ સેલ', '153589878', '153649612', '3:16'),
(143, 'WORKSHEET BASICS', 'वर्कशीट बेजिक', 'વર્કશીટ બેઝીક', '153589890', '153649598', '1:54'),
(144, 'PAGE LAYOUT', 'पेइज ले - आउट', 'પેજ લે-આઉટ', '153589882', '153649615', '3:12'),
(145, 'PRINTING WORKBOOKS', 'प्रिंटिंग वर्कबुक', 'પ્રિન્ટીંગ વર્કબુક', '153766026', '153652603', '2:50'),
(146, 'SIMPLE FORMULAS', 'सिम्पल फोर्म्युला', 'સિમ્પલ ફોરમ્યુલા', '153589887', '153649617', '3:02'),
(147, 'COMPLEX FORMULAS', 'कोम्प्लेक्स फोर्म्युला', 'કોમ્લેક્ષ ફોરમ્યુલા', '153589885', '153649593', '2:08'),
(148, 'RELATIVE & ABSOLUTE CELL REFERENCES', 'रिलेटिव एन्ड एब्सोल्यूट सेल रेफ़रन्स', 'રીલેટીવ એન્ડ એબ્સોલ્યુટ સેલ રેફરન્સ', '153766064', '153649622', '5:44'),
(149, 'FUNCTIONS', 'फंक्शन', 'ફંકશન', '154572135', '153649595', '3:27'),
(150, 'FREEZING PANES WITH VIEW OPTION', 'फ्रीजिंग पेन्स', 'ફ્રીઝીંગ પેન્સ', '153766068', '153649605', '3:05'),
(151, 'SORTING DATA', 'शोर्टिंग डेटा', 'શોર્ટિંગ ડેટા', '153766031', '153649613', '2:40'),
(152, 'FILTERING DATA', 'फिल्टरिंग डेटा', 'ફિલ્ટરીંગ ડેટા', '153766029', '153649616', '4:35'),
(153, 'GROUPS & SUBTOTALS', 'ग्रुप एन्ड सबटोटल', 'ગ્રુપ એન્ડ સબટોટલ', '153766066', '153649591', '4:49'),
(154, 'TABLES', 'टेबल्स', 'ટેબલ્સ', '153589901', '153649590', '2:58'),
(155, 'CHARTS', 'चार्ट', 'ચાર્ટ', '153589884', '153649614', '2:47'),
(156, 'SPARKLINES', 'स्पार्कलाइन', 'સ્પાર્કલાઈન', '153589880', '153649603', '3:00'),
(157, 'TRACK CHANGES & COMMENTS', 'ट्रेक चेंजिस एन्ड कोमेन्ट', 'ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ', '153766065', '153649621', '6:33'),
(158, 'FINALIZING & PROTECTING WORKBOOKS', 'प्रोटेक्टिंग वर्कबुक', 'પ્રોટેક્ટીંગ વર્કબુક', '153589881', '153649608', '3:24'),
(159, 'CONDITIONAL FORMATTING', 'कंडीशनल फोर्मेटिंग', 'કન્ડીશનલ ફોર્મેટિંગ', '153589891', '153649588', '3:11'),
(160, 'PIVOT TABLES', 'प्रोटेक्टिंग वर्कबुक', 'પિવટ ટેબલ', '153589881', '153649610', '4:28'),
(161, 'WHAT-IF ANALYSIS', 'कंडीशनल फोर्मेटिंग', 'વોટ ઇફ અનૈલિસિસ', '153589891', '153649620', '7:15'),
(162, 'Google docs Introdection', 'गूगल डॉक्स का परिचय', 'ગુગલ ડોક્સનો પરિચય', '154150353', '153668000', '1:36'),
(163, 'Signi in and creating a doc', 'साइन इन एन्ड करिएटिंग डॉक्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ અ ડોક્સ', '154149508', '154148014', '1:39'),
(164, 'Google docs interface', 'गूगल डॉक्स इन्टरफेस', 'ગુગલ ડોક્સ ઇન્ટરફેસ', '154149512', '154148012', '2:23'),
(165, 'Text Formatting', 'टेक्स्ट फोर्मेटिंग', 'ટેક્ષ્ટ ફોર્મેટિંગ', '154149511', '154148013', '2:42'),
(166, 'creating styles & Paint Format tool', 'क्रिएटिंग स्टाइल एन्ड पेंट फोरमेट टूल्स', 'ક્રિએટીંગ સ્ટાઇલ એન્ડ પેઈન્ટ ફોરમેટ ટૂલ્સ', '154149510', '154148347', '1:53'),
(167, 'Inserting lines, footnotes, and page breaks', 'इन्सर्टिंग लाइंस, फुटनोट्स एन्ड पेइज ब्रेक्स', 'ઇન્સર્ટીંગ લાઈન્સ, ફૂટનોટસ એન્ડ પેઈજ બ્રેક્સ', '154149516', '154148015', '1:34'),
(168, 'Working with headers and footers', 'हेडर और फूटर्स के साथ काम', 'હેડર અને ફૂટર્સની સાથે કામ', '154149513', '154148017', '1:49'),
(169, 'Adding page numbering', 'एडिंग पेइज नम्बर्स', 'એડિંગ પેઈજ નંબર્સ', '154149509', '153595938', '1:38'),
(170, 'Creating a table of contents', 'क्रिएटिंग टेबल ऑफ़ कन्टेन्ट', 'ક્રિએટીંગ ટેબલ ઓફ કન્ટેન્ટ', '155378819', '153595943', '3:18'),
(171, 'Setting page margins, orientation, and color', 'सेटिंग पेइज, ओरिएंटेशन एन्ड कलर', 'સેટિંગ પેઈજ, ઓરિએન્ટેશન એન્ડ કલર', '154150961', '153595942', '3:09'),
(172, 'Inserting, resizing, and cropping an image', 'इन्सर्टिंग, रिसाइजिंग एन्ड क्रोपिंग इमेज', 'ઇન્સર્ટીંગ, રીસાઈજીંગ એન્ડ ક્રોપીંગ ઈમેજ', '154561304', '153595941', '3:35'),
(173, 'Inserting a image into a header', 'इन्सर्टिंग इमेज इन टू हेडर', 'ઇન્સર્ટીંગ ઈમેજ ઇન ટુ હેડર', '154150352', '153595937', '1:17'),
(174, 'Inserting a Google drawing', 'इन्सर्टिंग गूगल द्रोइंग', 'ઇન્સર્ટીંગ ગુગલ ડ્રોઈંગ', '154561039', '153595939', '2:14'),
(175, 'Inserting and removing a table', 'इन्सर्टिंग एन्ड रिमूविंग टेबल', 'ઇન્સર્ટીંગ એન્ડ રીમુવિંગ ટેબલ', '154561040', '153595934', '1:28'),
(176, 'Setting table options & Resizing a table', 'सेटिंग टेबल ऑप्शन एन्ड रिसाइजिंग टेबल', 'સેટિંગ ટેબલ ઓપ્શન એન્ડ રીસાઈજીંગ ટેબલ', '154561041', '153667999', '2:34'),
(177, 'Inserting and deleting rows and columns', 'इन्सर्टिंग एन्ड दिलिटिंग रो एन्ड कोलम', 'ઇન્સર્ટીંગ એન્ડ ડીલીટીંગ રો એન્ડ કોલમ', '154685276', '153595935', '1:37'),
(178, 'File menu options', 'फ़ाइल् मेनू ऑप्शन', 'ફાઈલ મેનુ ઓપ્શન', '154569733', '153668004', '3:53'),
(179, 'Publishing a doc to the web', 'पब्लिशिंग डोक टू ढ वेब', 'પબ્લીશીંગ ડોક ટુ ધ વેબ', '154569732', '153667995', '2:44'),
(180, 'Printing a doc', 'प्रिन्टिंग डॉक्', 'પ્રિન્ટીંગ ડોક', '154569730', '153667996', '7:30'),
(181, 'Emailing a doc', 'इ मेइलिंग डॉक्', 'ઈમેઇલિન્ગ ડોક', '154569731', '154149220', '1:30'),
(182, 'Sharing a doc with others', 'दुसरो के साथ डोक्युमेंट का बटवारा', 'અન્ય સાથે ડોક્યુમેન્ટ શેર', '154569736', '153668007', '3:14'),
(183, 'Editing a doc simultaneously with another user', 'भिन्न भिन्न लोगो के साथ डोक्युमेंट एडिटिंग', 'અલગ અલગ યુજર્સ સાથે વારાફરતી ડોક એડીટીંગ', '154008604', '153667998', '1:49'),
(184, 'Finding docs others have shared with you', 'फाइंडिंग डॉक्स अधर हेव शेर विथ यु', 'ફાઈન્ડીંગ ડોક્સ અધર હેવ શેર વિથ યુ', '154008600', '153668005', '1:25'),
(185, 'Adding comments to docs', 'एडिंग कोमेंट्स टू डॉक्स', 'એડિંગ કોમેન્ટ્સ ટુ ડોક્સ', '154008605', '153668003', '1:50'),
(186, 'Spellchecking and translating a doc', 'स्पेलिंग चेकिंग एन्ड ट्रांसलेटिंग डॉक्स', 'સ્પેલિંગ ચેકીંગ એન્ડ ટ્રાન્સલેટીંગ ડોક્સ', '154008610', '153668006', '1:56'),
(187, 'Including addons in a doc', 'डॉक्स में एड ओन्स शामिल', 'ડોક્સમાં એડ ઓન નો સમાવેશ', '154008608', '153668008', '2:59'),
(188, 'Downloading the Google Docs app and signing in', 'डाउनलोडिंग गूगल डॉक्स एप एन्ड साइन इन', 'ડાઉનલોડીંગ ધ ગુગલ ડોક્સ એપ એન્ડ સાઈન ઇન', '154009238', '153668819', '3:08'),
(189, 'Navigating the Google Docs app', 'नेविगेटिंग गूगल डॉक्स एप', 'નેવિગેટીંગ ધ ગુગલ ડોક્સ એપ', '154008602', '153667997', '2:17'),
(190, 'Working with docs in the app', 'एप्लीकेशन में डॉक्स के साथ काम', 'એપ્લીકેશન ડોક્સ સાથે કામ', '154008607', '153668002', '1:38'),
(191, 'Google Sheets Introduction', 'गूगल शीट्स का परिचय', 'ગુગલ શીટ્સનો પરિચય', '154405543', '154553975', '1:42'),
(192, 'Signi in and creating a Sheets', 'साइन इन एन्ड क्रिएटिंग शीट्स', 'સાઈન ઇન એન્ડ ક્રિએટીંગ શીટ્સ', '154405477', '154556866', '01;37'),
(193, 'Google Sheets interface', 'गूगल शीट्स इन्टरफेस', 'ગુગલ શીટ્સ ઇન્ટરફેસ', '154404205', '154556408', '2:52'),
(194, 'Creating Spreadsheets', 'क्रिएटिंग स्प्रेडशीट्स', 'ક્રિએટીંગ સ્પ્રેડશીટ્સ', '154405366', '154553969', '2:08'),
(195, 'Add, Copying, Moving & Deleting a spreadsheet', 'एड, कोपिंग, मूविंग एन्ड दिलिटिंग स्प्रेडशीट्स', 'એડ, કોપિંગ, મુવીંગ એન્ડ ડીલીટીંગ સ્પ્રેડશીટ', '154405363', '154553968', '4:49'),
(196, 'Editing a data', 'एडिटिंग डेटा', 'એડીટીંગ ડેટા', '154404206', '154553973', '2:35'),
(197, 'Inserting, deleting, and clearing rows and columns', 'इन्सर्टिंग, दिलिटिंग एन्ड क्लिअरिंग रो एन्ड कोलम', 'ઇન્સર્ટીંગ, ડીલીટીંગ એન્ડ કલીઅરીંગ રો એન્ડ કોલમ', '154404203', '154553976', '4:31'),
(198, 'Moving rows, columns, and cells', 'मूविंग रो, कोलम एन्ड सेल', 'મુવીંગ રો, કોલમ એન્ડ સેલ', '154404209', '153660229', '3:43'),
(199, 'Formatting cell, row, and column data', 'फोर्मेटिंग सेल, रो एन्ड कोलम डेटा', 'ફોર્મેટિંગ સેલ, રો એન્ડ કોલમ ડેટા', '154404198', '154553974', '5:13'),
(200, 'Sorting data on a spreadsheet', 'सोर्टिंग डेटा ओन स्प्रेडशीट्स', 'સોર્ટિંગ ડેટા ઓન સ્પ્રેડશીટ', '154404199', '154553972', '3:52'),
(201, 'Working with multiple sheets', 'ज्यादा स्प्रेडशीट्स के साथ काम', 'એક કરતા વધારે શીટ્સ સાથે કામ', '154405720', '154556988', '3:42'),
(202, 'Using keyboard shortcuts', 'किबोर्ड में से शोर्टकट की का उपयोग', 'કીબોર્ડ માંથી શોર્ટકટ કીનો ઉપયોગ', '154406612', '154556991', '3:06'),
(203, 'Creating a series of numbers', 'क्रिएटिंग सीरिज ऑफ़ नंबर', 'ક્રિએટીંગ સીરીજ ઓફ નંબર', '154405724', '154556989', '3:01'),
(204, 'Using Find and Replace', 'फाइंड और रिप्लेस का उपयोग', 'ફાઈન્ડ અને રિપ્લેસ નો ઉપયોગ', '154405723', '153660226', '3:07'),
(205, 'Inserting and clearing note', 'इन्सर्टिंग एन्ड क्लिअरिंग नोट', 'ઇન્સર્ટીંગ એન્ડ કલીઅરીંગ નોટ', '154405544', '154557154', '2:19'),
(206, 'Inserting links', 'इन्सर्टिंग लिंक्स', 'ઇન્સર્ટીંગ લિનક્સ', '154405545', '153660223', '2:02'),
(207, 'Inserting images into spreadsheets', 'इन्सर्टिंग इमेजिस इन टू स्प्रेडशीट्स', 'ઇન્સર્ટીંગ ઈમેજીસ ઇન ટુ સ્પ્રેડશીટ', '154405546', '153660222', '3:31'),
(208, 'Create drawing', 'क्रिएट द्रोइंग', 'ક્રિએટ ડ્રોઈંગ', '154407373', '153660221', '2:14'),
(209, 'Merge cells & Text wrapping', 'मर्ज सेल्स एन्ड टेक्स्ट व्रेपिंग', 'મર્જ સેલ્સ એન્ડ ટેક્ષ્ટ વ્રેપીંગ', '154407621', '154557366', '3:06'),
(210, 'Using conditional formatting', 'कंडीशनल फोर्मेटिंग का उपयोग', 'કન્ડીશનલ ફોર્મેટિંગ ઉપયોગ', '154407622', '154557365', '3:05'),
(211, 'Using Quick Sum', 'त्वरित राशी का उपयोग', 'ઝડપી સરવાળાનો ઉપયોગ', '154407375', '153660228', '2:20'),
(212, 'Using formulas and functions', 'फोर्म्युला और फंक्शन का उपयोग', 'ફોર્મ્યુલા અને ફંક્શનનો ઉપયોગ', '154407372', '153660231', '3:31'),
(213, 'Using IF functions and Nested IF functions', 'इफ फंक्शन और नेस्टेड इफ फंक्शन का उपयोग', 'ઇફ ફંક્શન અને નેસ્ટેડ ઇફ ફંક્શનનો ઉપયોગ', '154407378', '154559176', '5:19'),
(214, 'Referencing data from other sheets', 'रेफ्रेंशिंग डेटा फ्रॉम अधर शीट्स', 'રેફ્રેન્શિંગ ડેટા ફ્રોમ અધર શીટ્સ', '154407374', '154559177', '1:37'),
(215, 'Creating charts in Google Sheets', 'गूगल शीट्स के अंदर चार्ट बनाए', 'ગુગલ શીટ્સની અંદર ચાર્ટ બનાવવો', '154407623', '153660230', '3:04'),
(216, 'Using filters and creating filter views', 'फ़िल्टर बना के देखे और फिल्टर का उपयोग', 'ફિલ્ટર બનાવીને જોવા અને ફિલ્ટરનો ઉપયોગ', '154407626', '153660797', '3:01'),
(217, 'Using pivot tables', 'पिवोट टेबल का उपयोग', 'પિવોટ ટેબલનો ઉપયોગ', '154570415', '153660225', '3:07'),
(218, 'Explore Option', 'एक्सप्लोर ऑप्शन', 'એક્ષ્પ્લોર ઓપ્શન', '154407624', '153660224', '2:08'),
(219, 'Data validation in Google Sheets', 'डेटा वेलिडेशन इन गूगल शीट्स', 'ડેટા વેલિડેશન ઇન ગુગલ શીટ્સ', '154408395', '154559333', '3:53'),
(220, 'Form', 'फॉर्म', 'ફોર્મ', '154408398', '154559337', '1:33'),
(221, 'Protect Sheet & Personal dictionary', 'प्रोटेक्ट शीट एन्ड पर्शनल डिक्शनरी ऑप्शन', 'પ્રોટેક્ટ શીટ એન્ડ પર્શનલ ડીક્ષનરી ઓપ્શન', '154408399', '154559334', '3:55'),
(222, 'Sharing a spreadsheet file with other people', 'दुसरे लोगो के साथ स्प्रेडशीट फ़ाइल् शेरिंग', 'અન્ય લોકો સાથે સ્પ્રેડશીટ ફાઈલ શેરીંગ', '154410074', '154559342', '2:03'),
(223, 'Working with Google Sheets that are shared with you', 'वर्किंग विथ गूगल शीट्स धेट आर शेर विथ यु', 'વર્કીંગ વિથ ગુગલ શીટ્સ ધેટ આર શેર વિથ યુ', '154408397', '154559336', '3:10'),
(224, 'Commenting on a spreadsheet', 'कोमेंटिंग ओन स्प्रेडशीट', 'કોમેન્ટીંગ ઓન સ્પ્રેડશીટ', '154408396', '154559340', '2:25'),
(225, 'Working with spreadsheet revisions', 'स्प्रेडशीट आवृतियो के साथ काम', 'સ્પ્રેડશીટ આવૃતિઓ સાથે કામ', '154408394', '154559339', '2:01'),
(226, 'Spreadsheet settings', 'स्प्रेडशीट सेटिंग', 'સ્પ્રેડશીટ સેટિંગ', '154409302', '154559994', '2:20'),
(227, 'Importing and converting', 'इम्पोर्टिंग एन्ड कंवर्टिंग', 'ઈમ્પોર્ટીંગ એન્ડ કન્વર્ટીંગ', '154409305', '154559993', '2:40'),
(228, 'Download as', 'डाउनलोड एस', 'ડાઉનલોડ એસ', '154409304', '154559992', '1:30'),
(229, 'Publish to the web', 'पब्लिश टू ढ वेब', 'પબ્લીશ ટુ ધ વેબ', '154410090', '154559995', '4:00'),
(230, 'Email collaborators', 'इ मेइल सहयोगी', 'ઈ મેઈલ સહયોગી', '154409303', '154559990', '1:34'),
(231, 'Collaborating simultaneously and using Google Chat', 'बारीबारी सहयोग और गूगल चेट का उपयोग करके', 'વારાફરતી સહયોગ અને ગુગલ ચેટ નો ઉપયોગ કરીને', '154409467', '154560248', '1:47'),
(232, 'Email as Attachment', 'इ मेइल अटेचमेन्ट', 'ઈ મેઈલ એટેચમેન્ટ', '154409470', '154560736', '1:31'),
(233, 'Spelling check', 'स्पेलिंग चेक', 'સ્પેલિંગ ચેક', '154409472', '154560252', '1:23'),
(234, 'Print your Google sheet', 'आपकी गूगलशीट प्रिन्ट', 'તમારી ગુગલ શીટ પ્રિન્ટ', '154409468', '154560255', '2:09'),
(235, 'Including addons in a sheet', 'इन्क्लुडिंग एड ओन्स इन शीट्स', 'ઈન્ક્લુડીન્ગ એડ ઓન્સ ઇન શીટ', '154409469', '154560250', '2:39'),
(236, 'Downloading the Google sheet app and signing in', 'डाउनलोडिंग गूगल शीट एप एन्ड साइन इन', 'ડાઉનલોડીંગ ગુગલ શીટ એપ એન્ડ સાઈન ઇન', '154409903', '154560739', '1:07'),
(237, 'Navigating the Google sheet app', 'नेविगेटिंग गूगल शीट एप', 'નેવિગેટીંગ ગુગલ શીટ એપ', '154409900', '154560740', '2:24'),
(238, 'Working with sheet in the app', 'एप्लीकेशन शीट के साथ काम', 'એપ્લીકેશન શીટ સાથે કામ', '154409901', '154560735', '3:54'),
(239, 'what is google drive', 'गूगल ड्राइव क्या हें?', 'ગુગલ ડ્રાઈવ શું છે ?', '154693518', '154693403', '2:23'),
(240, 'google drive interface', 'गूगल ड्राइव इन्टरफेस', 'ગુગલ ડ્રાઈવ ઇન્ટરફેસ', '154693517', '154693404', '1:39'),
(241, 'Google IME', 'गूगल IME का परिचय', 'ગુગલ IMEનો પરિચય', '153764730', '153874453', '4:36'),
(242, 'Google Hangout Introduction', 'गूगल हेन्गआउट - परिचय', 'ગુગલ હેન્ગઆઉટ - પરિચય', '154009573', '153597521', '1:15'),
(243, 'Google Hangout Interface', 'गूगल हेन्गआउट - इन्टरफेस', 'ગુગલ હેન્ગઆઉટ - ઇન્ટરફેસ', '154009577', '153597526', '2:43'),
(244, 'Video Calling & Features', 'गूगल हेन्गआउट - विडिओ कोलिंग और दूसरी विशेषता', 'ગુગલ હેન્ગઆઉટ - વિડીઓ કોલિંગ અને બીજી વિશેષતા', '154009574', '154044894', '2:55'),
(245, 'Hangout on Air', 'गूगल हेन्ग आउट - हेन्गआउट ओन एइर', 'ગુગલ હેન્ગઆઉટ - હેન્ગઆઉટ ઓન એઈર', '154009570', '153597527', '3:01'),
(246, 'Introduction of youtube', 'यु टयूब परिचय', 'યુ ટ્યુબ પરિચય', '155210797', '155210796', '1:28'),
(247, 'How to create youtube account', 'यु टयूब का उपयोग कैसे करे', 'યુ ટ્યુબનો ઉપયોગ કેવી રીતે કરવો', '154573959', '155111378', '3:21'),
(248, 'How to verify youtube account', 'यु टयूब चेनल कैसे क्रिएट करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે ક્રિએટ કરવી', '154573960', '155109791', '4:07'),
(249, 'How to make youtube channel', 'यु टयूब चेनल कैसे वेरीफाय करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે વેરીફાય કરવી', '154573963', '155111370', '2:11'),
(250, 'How to make slide sHow in youtube', 'यु टयूब में स्लाइड शो कैसे करे', 'યુ ટ્યુબમાં સ્લાઈડ શો કેવી રીતે કરવો', '155210518', '155111373', '2:25'),
(251, 'How to upload video pc', 'मोबाइल द्वारा विडिओ अपलोड कैसे करे', 'મોબાઈલ દ્વારા વિડીઓ અપલોડ કઈ રીતે કરવો', '155210519', '155111372', '2:12'),
(252, 'How to upload mobile', 'विडिओ अपलोड कैसे करे', 'વિડીઓ અપલોડ કઈ રીતે કરવો', '155111369', '155111369', '4:57'),
(253, 'How to add subtitle & caption in video', 'यु टयूब में सबटाइटल और केप्शन कैसे जोड़े', 'યુ ટ્યુબમાં સબટાઇટલ અને કેપ્શન કેવી રીતે ઉમેરવા', '154582840', '155109789', '3:47'),
(254, 'How to make playlist', 'प्ले लिस्ट कैसे बनाए', 'પ્લેલિસ્ટ કેવી રીતે બનાવવું', '154582841', '155109790', '2:50'),
(255, 'How to enbed a youtube video', 'यु टयूब में विडिओ एम्बेड कैसे करे', 'યુ ટ્યુબમાં વિડીઓ એમ્બેડ કેવી રીતે કરવો', '154582844', '155107490', '2:13'),
(256, 'How to autoplay video', 'यु टयूब में एम्बेड किया हुआ विडिओ कैसे ओतोप्ले करे', 'યુ ટ્યુબમાં એમ્બેડ કરેલો વિડીઓ કેવી રીતે ઓટોપ્લે કરવો', '154583940', '155107495', '1:56'),
(257, 'How to subscribe channel', 'यु टयूब चेनल कैसे सबस्क्राइब करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે સબસ્ક્રાઇબ કરવી', '154580769', '155107492', '1:14'),
(258, 'How to take the back up of a youtube channel', 'यु टयूब चेनल का बेकअप कैसे ले', 'યુ ટ્યુબ ચેનલનું બેકઅપ કેવી રીતે લેવું', '154580768', '155107493', '2:28'),
(259, 'How to watch offline video', 'यु टयूब में ऑफलाइन विडिओ कैसे देखे', 'યુ ટ્યુબમાં ઓફલાઈન વિડીઓ કેવી રીતે જોવો', '154580772', '155111371', '2:01'),
(260, 'How to delete youtube history', 'यु टयूब हिस्टरी कैसे डिलीट करे', 'યુ ટ્યુબ હિસ્ટરી કેવી રીતે ડીલીટ કરવી', '154580767', '155109793', '2:17'),
(261, 'How to delete youtube channel', 'यु टयूब चेनल कैसे डिलीट करे', 'યુ ટ્યુબ ચેનલ કેવી રીતે ડીલીટ કરવી', '154580770', '155109794', '2:27');
INSERT INTO `video_temp` (`v_id`, `eng_name`, `hi_name`, `guj_name`, `hi_url`, `guj_url`, `duration`) VALUES
(262, 'Introduction to Google translate', 'गूगल ट्रान्सलेट का परिचय', 'ગુગલ ટ્રાન્સલેટનો પરિચય', '154690090', '153875042', '3:08'),
(263, 'Introduction to Google translate with mobile', 'गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 1', 'ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 1', '154690396', '153875045', '5:10'),
(264, 'Introduction to Google speech translate', 'गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 2', 'ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 2', '154690394', '153875044', '3:28'),
(265, 'Introduction', 'टेली परिचय', 'ટેલી પરિચય', '158806213', '155932199', '1:09'),
(266, 'Interface', 'टेली इन्टरफेस', 'ટેલી ઇન્ટરફેસ', '158806239', '155932202', '1:18'),
(267, 'Create company', 'क्रिएटिंग कंपनी', 'ક્રિએટીંગ કંપની', '158806244', '155932203', '4:05'),
(268, 'Various keys', 'विविध की', 'વિવિધ કી', '158806235', '155932200', '3:41'),
(269, 'Balance sheet', 'बेलेन्स शिट', 'બેલેન્સ શીટ', '158806225', '155932201', '5:54'),
(270, 'Rules for debit and credit', 'डेबिट और क्रेडिट के नियम', 'ડેબીટ અને ક્રેડીટ ના નિયમ', '158806237', '155934617', '1:36'),
(271, 'Payment voucher', 'भुगतान वाउचर', 'ચુકવણી વાઉચર', '158806249', '155939130', '2:29'),
(272, 'Receipt voucher', 'प्राप्ति वाउचर', 'રસીદ વાઉચર', '158806229', '155934620', '1:23'),
(273, 'Purchase voucher', 'खरीद वाउचर', 'ખરીદ વાઉચર', '158806234', '155934619', '2:09'),
(274, 'Sales voucher', 'बिक्री वाउचर', 'વેચાણ વાઉચર', '158806243', '155934621', '2:02'),
(275, 'Contra voucher', 'कोंट्रा वाउचर', 'કોન્ટ્રા વાઉચર', '158806247', '155934834', '1:22'),
(276, 'Journal voucher', 'पत्रिका का वाउचर', 'જર્નલ વાઉચર', '158806226', '155939129', '1:29'),
(277, 'Creditnote voucher', 'क्रेडिट नोट वाउचर', 'ક્રેડીટ નોટ વાઉચર', '158806236', '155934832', '1:21'),
(278, 'Debitnote voucher', 'डेबिट नोट वाउचर', 'ડેબીટ નોટ વાઉચર', '158806241', '155934836', '1:25'),
(279, 'Memorandum - optional', 'ज्ञापन और वैकल्पिक वाउचर', 'મેમોરેન્ડમ અને વૈકલ્પિક વાઉચર', '158806224', '155934833', '1:53'),
(280, 'Inventory', 'इन्वेंटरी', 'ઇન્વેન્ટરી', '158806217', '155935555', '4:56'),
(281, 'Purchase-sales with inventory', 'इन्वेंटरी ने साथ खरीदी बिक्री', 'ઇન્વેન્ટરીની સાથે ખરીદ વેચાણ', '158806252', '155935556', '1:33'),
(282, 'Physical stock voucher - stock journal voucher', 'शारीरिक शेयर वाउचर - शेयर पत्रिका वाउचर', 'શારીરિક સ્ટોક વાઉચર - સ્ટોક જર્નલ વાઉચર', '158806233', '155935554', '3:01'),
(283, 'Multi unit, stock with expiry date', 'मल्टी यूनिट, एक्सपायरी डेट ने साथ शेयर', 'મલ્ટી યુનિટ, એક્ષ્પાયરિ ડેટની સાથે સ્ટોક', '158806246', '155935552', '2:31'),
(284, 'Backup - restore - delete', 'बेकअप, रिस्टोर, डिलीट', 'બેકઅપ, રીસ્ટોર, ડીલીટ', '158806227', '155935553', '2:05'),
(285, 'Multi currency', 'बहू मुद्रा', 'મલ્ટી ચલણ', '158806253', '155939128', '1:47'),
(286, 'Cost category and cost centre', 'लागत श्रेणी और लागत केन्द्र', 'કિમત શ્રેણી અને કિમત કેન્દ્ર', '158806219', '155955946', '2:14'),
(287, 'Reports', 'रिपोर्ट्स', 'રીપોર્ટસ', '158806214', '155938815', '1:54'),
(288, 'Display', 'डिस्प्ले', 'ડિસ્પ્લે', '158806216', '155938812', '2:46'),
(289, 'Printing options', 'प्रिंटिंग ऑप्शन', 'પ્રિન્ટીંગ ઓપ્શન', '158806228', '155938813', '4:57'),
(290, 'Shortcut keys', 'शार्टकट की', 'શોર્ટકટ કી', '158806215', '155938816', '2:16');

-- --------------------------------------------------------

--
-- Table structure for table `video_view`
--

CREATE TABLE IF NOT EXISTS `video_view` (
  `vv_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `video_view`
--

INSERT INTO `video_view` (`vv_id`, `v_id`, `u_id`, `date`) VALUES
(1, 1, 1, '2016-07-07 12:47:06'),
(3, 11, 1, '2016-07-07 13:12:16'),
(11, 2, 1, '2016-07-22 10:06:20'),
(12, 36, 1, '2016-07-22 10:21:14'),
(13, 37, 1, '2016-07-22 10:29:10'),
(14, 50, 1, '2016-07-22 10:50:44'),
(15, 3, 1, '2016-07-25 10:51:04'),
(24, 4, 1, '2016-07-25 14:24:28'),
(25, 5, 1, '2016-07-25 14:25:27'),
(26, 6, 1, '2016-08-19 22:00:50'),
(27, 7, 1, '2016-08-19 22:02:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
