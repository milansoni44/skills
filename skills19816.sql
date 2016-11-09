-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 07:54 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`co_id`, `v_id`, `u_id`, `comment`, `pco_id`, `date`) VALUES
(1, 1, 1, 'test comment', 1, '2016-08-18 21:28:31'),
(24, 11, 1, 'test', 1, '2016-08-18 21:28:36'),
(25, 6, 1, 'test', 1, '2016-08-18 21:28:39'),
(26, 1, 1, 'hello', 1, '2016-08-18 21:28:41'),
(27, 1, 1, 'sd', 1, '2016-08-18 21:28:43'),
(28, 1, 1, 'sddfcf', 1, '2016-08-18 21:28:45');

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
  `c_icon` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name_lan1`, `c_name_lan2`, `c_name_lan3`, `c_name_lan4`, `c_name_lan5`, `c_name_lan6`, `c_description_lan1`, `c_description_lan2`, `c_description_lan3`, `c_description_lan4`, `c_description_lan5`, `c_description_lan6`, `c_icon`, `p_id`, `status`, `date`) VALUES
(1, 'Business ', 'बिजनेस ', 'બિઝનેસ ', '', '', '', '', '', '', '', '', '', 'business.jpg', 0, '', '2016-07-01 13:46:41'),
(2, 'Web tools ', 'वेब टूल्स', 'વેબ ટૂલ્સ ', '', '', '', '', '', '', '', '', '', 'webtools.jpg', 0, '', '2016-07-01 13:47:05'),
(3, 'Cloud Storage', ' क्लाउड स्टोरेज ', 'કલાઉડ સ્ટોરેજ ', '', '', '', '', '', '', '', '', '', 'cloud_storage.jpg', 0, '', '2016-07-01 13:47:07'),
(4, 'E-Mail', 'ई मेल', 'ઈ મેઈલ ', '', '', '', '', '', '', '', '', '', 'email.jpg', 0, '', '2016-07-01 13:47:19'),
(5, 'Audio+Video', ' ऑडियो + वीडयो', 'ઓડીઓ + વિડ્યો ', '', '', '', '', '', '', '', '', '', 'audio-video.jpg', 0, '', '2016-07-01 13:48:10'),
(6, 'Computer Skills ', 'कम्प्यूटर स्किल्स ', 'કોમ્પ્યુટર સ્કિલ્સ ', '', '', '', '', '', '', '', '', '', 'comp_skills.jpg', 0, '', '2016-07-01 13:48:26'),
(7, 'Accounting', 'अकाउंटिंग', 'એકકોઉંટીંગ ', '', '', '', '', '', '', '', '', '', 'accounting.jpg', 0, '', '2016-07-01 13:48:47'),
(8, 'Office Tools', 'ऑफिस टूल्स', 'ઓફિસ ટૂલ્સ ', '', '', '', '', '', '', '', '', '', 'office_tools.jpg', 0, '', '2016-07-01 13:49:00'),
(9, 'Productivity Tools', ' प्रोडक्टिविटी टूल्स', 'પ્રોડક્ટિવિટી ટૂલ્સ ', '', '', '', '', '', '', '', '', '', 'prod_tools.jpg', 0, '', '2016-07-01 13:49:22'),
(10, 'VOIP', 'वि ओ ई पि', 'વીઓઆઈપી ', '', '', '', '', '', '', '', '', '', 'voip.jpg', 0, '', '2016-07-01 13:50:43'),
(11, 'Microsoft PowerPoint', 'माइक्रोसॉफ्ट पावर पॉइंट', 'માઈક્રોસોફ્ટ પાવર પોઈન્ટ ', '', '', '', '', 'Microsoft Power point slide presentation program है I ये software Microsoft company ने बनाया है I Company ने PowerPoint को officially 22 may, 1990 मे प्रस्तूत किया था I\nMicrosoft PowerPoint का इस्तमाल slide presentation के लिए होता है I आपके काम की slide बनाकर उसका presentation कर सकते है I इस slide मे text, images, shapes, video, theme, background और music add करके presentation को बेहतरीन और आकर्षक बना सकते है I\nMS Powerpoint की सबसे अच्छी बात यह है की slide मे animation add कर सकते है और उस animation द्वारा presentation कर सकते है I\n', 'Microsoft Powerpoint એ slide presentation program છે. આ software Microsoft company બનાવેલ છે. Company એ  Powerpointને officially ૨૨,મેં ૧૯૯૦ માં રજુ કર્યું.\nMicrosoft Powerpoint નો use slide presentation માટે થાય છે. તમારા work ની slide બનાવી તેનું presentation કરી શકાય છે. આ slide માં text, images, shapes, video, theme, background અને music add કરી presentation ને ખુબ સરસ અને આકર્ષિત બનાવી શકાય છે.\nMS Powerpoint માં સૌથી મજાની વાત એ છે, slide માં animation add કરી શકાય છે. અને તેનું animation દ્વારા presentation કરી શકાય છે.\n', '', '', '', 'powerpoint.jpg', 1, '', '2016-07-05 13:31:12'),
(12, 'Google Slides', ' गूगल स्लाइड', 'ગૂગલ સ્લાઈડ ', '', '', '', '', 'Google स्लाइड के साथ, आप कहीं भी प्रस्तुतिकरण बना सकते हैं, संपादित कर सकते हैं, उनमें सहयोग कर सकते हैं और उन्हें प्रस्तुत कर सकते हैं. Google स्लाइड आपके विचारों को, विभिन्न प्रस्तुतिकरण थीम, सैंकड़ों फ़ॉन्ट, एम्बेड किए गए वीडियो, एनिमेशन आदि के द्वारा सबसे अलग बनाता है. अपने प्रस्तुतिकरणों को कहीं से भी अपने फ़ोन, टैबलेट या कंप्यूटर से एक्सेस कर सकते है\n', 'તો સૌપ્રથમ જાણીએ કે Google Slides શું છે? \nGoogle Slides ની મદદથી આપણે online presentation, Text, Images, Video નું animation કરી શકીએ છીએ.\nGoogle Slides ની મદદથી slides માં text formation , Images and Video insert, Slides નું animation વગેરે feature નો ઉપયોગ કરીને તમને જોઈતું presentation online create કરી શકો છો. Animartion માટે આપેલા features ખુબ સરળ અને user friendly છે.\nખુબ જ સરળ રીતે Slides ને બીજા email id પર share કરી શકો છો.\nOnline Slides પર work કરતા હોવાથી એક કરતા વધારે લોકો એક સાથે slides પર work કરી શકે છે જે Google Slides નો ખુબ જ ઉપયોગી feature છે.\nGoogle Slides માં ready templates, themes, animation નો ઉપયોગ કરી ને ઝડપથી અને ખુબ સરસ slides બનાવી શકો છો.\nGoogle Slides નો ઉપયોગ અલગ અલગ ક્ષેત્રો માં કરી શકો છો જેમ કે education, business, laboratory વગેરે.\nમિત્રો, Google Slides એ ખૂબ જ ઉપયોગી તેમજ free મળી આવતી online facility છે, તેનો use કરવા કોઈ પણ software કે installation ની જરૂરીયાત હોતી નથી.\n', '', '', '', 'googleslide.jpg', 1, '', '2016-07-05 13:31:30'),
(13, 'Gmail', ' जीमेल ', 'જીમૈલ ', '', '', '', '', 'Gmail  एक गूगल का प्रोडक्ट हैजो आपको ईमेल की सेवा देता है जिसके द्वारा आप अपना email एड्रेस बना सकते है , जिस ईमेल एड्रेस में आप ईमेल प्राप्त भी कर सकते है और किसी को ईमेल सेंड भी कर सकते हैं |gmail एक गूगल कीफ्री ईमेल सर्विस है |\n', 'સૌ પ્રથમ આપણે જાણીએ Google શું છે. Google એ એક પ્રકારનું ખુબજ પ્રખ્યાત search Engine છે. જેની મદદથી તમે કોઈ પણ keyword type કરીને search દ્વારા તેને લગતી માહિતી મેળવી શકો છો. Google જેવા બીજા search Engine પણ છે જેમ કે Yahoo, MSN, Ask.me, Bing વગેરે. Google ઘણી ઝડપી અને બીજી ઘણી service provide કરે છે જેમાં Google Mail, Google+, Maps, News, Translator વગેરે જેવી apps પણ ઘણી ઉપયોગી નીવડે છે. આ ઉપરાંત google એ પોતાનું browser Google Chrome બનાવેલું છે જેથી વધારે ઝડપથી Google search Engine નો ઉપયોગ કરી શકાય છે.\nGoogle mail વિશે માહિતી મેળવીએ. Google Mail ની મદદથી કોઇપણ Documents ની લેવડ-દેવડ, Mails મોકલી તથા reply આપી શકાય છે. કોઇ પણ Mails updates ની જાણકારી મેળવી શકીએ છીએ, આપણી સાથે જોડાયેલા વ્યક્તિઓ સાથે વાતચીત પણ કરી શકીએ છીએ.\n', '', '', '', 'gmail.jpg', 1, '', '2016-07-05 13:30:51'),
(14, 'Google Calander', 'गूगल कैलेंडर', 'ગૂગલ કેલેન્ડર ', '', '', '', '', 'Google Calendar में दिखने वाला calendar आम calendar नहीं है | google calendar में काफी सारे advance features दीये गये है |  इस तरह के रूप में यहाँ palnning काम कर सकते हैं , तारीख के साथ-साथ work planning , साथ ही छुट्टी निर्धारित करने की घटना, जन्मदिन की Notification एक तारीख और समय निर्धारित reminder सर समय का उपयोग किया जा सकता है, तो आप अपने कंप्यूटर , फोन, या टेबलेट पर गूगल कैलेंडर का उपयोग कर सकते हैं।\n', 'Google Calendar માં જોવા મળતું calendar એ સમાન્ય calendar નથી Google calendar માં ઘણા advance fuchers આપવામાં આવીયા છે  જેમકે અહી તારીખ મુજબ work palning કરી શકો છો તેમજ જેતે તારીખ અને સમય set કરી remider set કરી શકો છો, તેમજ holiday, event, Birthday ના notificatio ની મદદથી સમય સર planing કરી શકાય છે, કમ્પ્યુટર, ફોન, અથવા ટેબ્લેટ પર Google Calendar નો ઉપયોગ કરી શકો છો. ', '', '', '', 'calander.jpg', 1, '', '2016-07-05 13:31:55'),
(15, 'Evernote', '', '', '', '', '', '', 'Evernote सभी जानकारी ओर जरुरी चिजो क्रो याद रखने कि app है। Evernote google keep जैसी app है। यहा नया account बनाना पडेगा। Evernote अनेक चीजो को समय अनुसार याद रखने कि app है । हम लोग हरेक चीज उसके निर्धारित समय पर याद रखने को सक्षम नहि है या तो कोइ चीज किसि निर्धारित समय पर तय किये जाने का निर्णय किया होता है लेकिन याद ना आने कि वजह से हम वो चीज नहि कर पाते । \nतो हम वो भुल ना जाय ओर समय अनुसार सब काम हो इसलिये Evernote नाम कि app बनाइ गइ है । जिसकि मदद से हम हरेक चिज लिख कर save कर सकते है ओर इच्छा अनूसार समय पर उसे देख सकते है । \nEvernote के द्वारा हमारी लिखि हुइ notes दुसरे व्यक्ति के साथ share कर सकते है, reminder रख सकतें है, coloring द्वारा अलग कर सकते है ओर note का importance सैट कर सकते है । \n', 'Evernote બધી જરૂરી માહિતી અને ચીજ-વસ્તુ ને યાદ રાખવા માટે ની application છે. Evernote google Keep જેવી જ એક Application છે. અહી નવું account બનાવવું પડશે Evernote ઘણી બધી ચીજ -વસ્તુ ને સમય પ્રમાણે યાદ રાખવાની app છે . આપણે લોકો બધી વસ્તુ ને તેના સમય પ્રમાણે યાદ રાખવા માટે સક્ષમ હોતા નથી કા તો કોઈ વસ્તુ કામ ના ધરેલા સમય પ્રમાણે કરવાનો નિર્ણય કર્યો હોઈ પણ કામ યાદ ના આવવાને કરને થઇ શકતું નથી. ત્યારે Evernote કાર્ય ને યાદ રાખવા માટે ની ખુબ જ જરૂરી app છે . ', '', '', '', 'evernote.jpg', 1, '', '2016-07-05 13:32:32'),
(16, 'Wunder List', '', '', '', '', '', '', 'Wunderlist ये online cloud द्यारा होनेवाली कार्य प्रणाली है| इस app का computer, tablet mobile मे  भी उपयोग कर सकते है जिससे कार्य करने मे आसानी हो| Wunderlist ये मुफ्त app है और अभी अप्रैल 2013 मे Wunderlist pro भी launch किया है इसमे free से भी ज्यादा features दिए गए है| Wunderlist ये 2011 मे बर्लिन स्तित 6wunderkinder नाम की company ने चालू किया था और 2015 microsoft  ने इस कंपनी को साथमे कर लिया|\n', 'Wunderlist  એ online cloud દ્વારા થતી કાર્ય પ્રણાલી છે. આ app થી computer ,tablate mobileમાં પણ ઉપયોગ કરી શકીએ છીએ, આ app ની મદદથી કાર્ય કરવામાં સરળતા રહે છે. Wunderlsit એ મફત app છે અપ્રિલ 2013 માં wunderlist pro પણ લૌંચ કર્યું જેમાં free કરતા વધારે લાક્ષ્નીકતા આપવા માં આવી છે. wunderlist એ 2011 માં બર્લિન સ્થિત 6wunderkinder નામની company એ ચાલુ કરી હતી જે 2015 માં microsoft એ આ કંપની ને પોતાની સાથે કરી લીધી.', '', '', '', 'wunderlist.jpg', 1, '', '2016-07-05 13:32:51'),
(17, 'Google Keep', '', '', '', '', '', '', 'Google कि एक app google keep के बारे मे जानकारी प्राप्त करेंगे। google keep को google note के द्वारा भी जाना जाता है ।\ngoogle keep अनेक चीजो को समय अनुसार याद रखने कि app है । हम लोग हरेक चीज उसके निर्धारित समय पर याद रखने को सक्षम नहि है या तो कोइ चीज किसि निर्धारित समय पर तय किये जाने का निर्णय किया होता है लेकिन याद ना आने कि वजह से हम वो चीज नहि कर पाते ।\nतो हम वो भुल ना जाय ओर समय अनुसार सब काम हो इसलिये googIe keep नाम कि app बनाइ गइ है । जिसकि मदद से हम हरेक चिज लिख कर save कर सकते है ओर इच्छा अनूसार समय पर उसे देख सकते है ।\ngoogle keep के द्वारा हमारी लिखि हुइ notes दुसरे व्यक्ति के साथ share कर सकते है, reminder रख सकतें है, coloring द्वारा अलग कर सकते है ओर note का importance सैट कर सकते है । \n', 'Google keep ને google Note તરીકે પણ ઓળખવામાં આવે છે. \nGoogle keep એ વસ્તુઓને સમયસર યાદ રાખવા માટેની એક app છે. આપણે બધી વસ્તુઓ યાદ રાખી શકતા નથી અથવા તો આપણે અમુક વસ્તુ કોઈક ચોક્કસ સમયે કરવાનું નક્કી કરેલું હોય પણ યાદ ન આવતા આપણે તે કરી શકતા નથી.\nતો આપણે તે ભૂલી ન જઈએ અને સમયસર આપણું કામ થાય તેના માટે google એ google keep app બનાવેલી છે. જેની મદદથી આપણે દરેક વસ્તુને લખીને save કરી શકીએ છીએ અને ઈચ્છિત સમયે આપણે તેને જોઈ શકીએ છીએ.\nGoogle keep દ્વારા આપણે લખેલી notes ને બીજા વ્યક્તિઓ સાથે share કરી શકાય, reminder રાખી શકાય, coloring વડે અલગ તારવી શકાય તથા note નું importance સેટ કરી શકાય.\n', '', '', '', 'google_keep.jpg', 1, '', '2016-07-05 13:36:30'),
(18, 'Google Forms', '', '', '', '', '', '', 'Google forms को किसतरह से use कर सकते है और उसका सबसे ज्यादा उपयोग कहा कर सकते है| सबसे पहले आपको gmail पर login होना जरुरी है तो ही आप features का उपयोग कर सकते हो| \nआपको पता ही होगा फॉर्म के बोहोत सारे प्रकार होते है जिसेकी entry forms, registration forms वैगरह| आप आपके web site के लिए भी forms बना सकते हो| Teacher के लिए ये बोहोतही उपयोगी है क्यू की student के पास से forms भरवाना फिर parents के पास से forms भरवाना और student को teacher द्यारा सवाल जवाब करने के लिए forms उपयोगी है| और business purpose के लिए भी बोहोत उपयोगी है| Google forms को create करना बोहोत easy है|\n', '', '', '', '', 'forms.jpg', 1, '', '2016-07-01 09:42:07'),
(19, 'Microsoft Word', '', '', '', '', '', '', 'Microsoft word ये Microsoft office package का एक महत्वपूर्ण tool है|  \nMicrosoft word की typing सुविधा से अलग अलग documents बनाकर save कर सकते है| जिसमे letters, labels, advertisement इत्यादी का समावेश होता है| \nMicrosoft word के मदद से documents को formatting, layout, tools से edit करके आकर्षक बनाया जा सकता है| \nMicrosoft word ये official तथा unofficial documents बनाने का और संभल के रखने का एक महत्वपूर्ण program है|  \n', '', '', '', '', 'word.jpg', 1, '', '2016-07-01 09:42:13'),
(20, 'Microsoft Excel', '', '', '', '', '', '', 'Microsoft Excel एक बहुत ही उपयोगी Office Software है, आज कल आप तो जानते ही हैं, कि Office में वर्कलोड कितना बढ गया है, हर माह बहुत सारा डाटा तैयार करना पडता है, जिसमें सबसे बडी समस्‍या आती है, Calculation करने की, और उसके लिये ज्‍यादातर लोग कैल्‍यूलेटर की मदद लेते हैं, कैल्‍यूलेटर छोटी मोटे हिसाब किताब के लिये तो सही है लेकिन अगर हिसाब किताब बडे स्‍तर का है और प्रोफेशनल हैं, तो Excel से अच्‍छा विकल्‍प और कोई नहीं है।\nयह बहुत ही सरल और तेज है, टेबल कार्य के लिये पहले से ही सैल बने होते हैं, और आप इसमें कितना भी लम्‍बा चौडा हिसाब किताब एक ही पेज पर बना सकते हो, इसलिये प्रोफेशनल काम के लिये ज्‍यादातर लोग एक्‍सल का प्रयोग करते हैं, साथ ही एक बार कोई भी फार्मूला भरने पर वह सेव हो जाता है, और बार बार आप उसका प्रयोग एक कैल्‍यूलेटर की तरह कर सकते हो, लेकिन यह कैल्‍यूलेटर आपके द्वारा बनाया गया होगा, यानी एक तरह से आप के दिये गये निर्देशन में काम करेगा, जिससे आपका काम और भी सरल हो जायेगा। \n', '', '', '', '', 'exeal.jpg', 1, '', '2016-07-01 09:42:19'),
(21, 'Google Docs', '', '', '', '', '', '', 'Google docs का उपयोग online documents create, edit, save और open करने के लिए होता है| online data save होने के कारण कोइभी जगह से या computer, mobile, tablet मे से document edit & save कर सकते है|\n\nGoogle docs के interface के मदद से documents मे text formation, table, graph ect. feature का उपयोग करके आपको चाहिए वो document online create कर सकते है|\nबोहोत ही आसान तरीकेसे document को दुसरे email id पर share कर सकते है|\nOnline document पर work करनेसे एक से ज्यादा लोक एकसाथ एक ही document पर work कर सकते है| ये Google docs का बोहोत ही उपयोगी feature है | \nGoogle docs के ready templates का उपयोग करके document जल्दी ready कर सकते है| \nGoogle docs का उपयोग अलग अलग क्षेत्रों मे कर सकते है जेसे education, business, book writing ect.\nदोस्तों, Google docs ये बोहोत ही उपयोगी और free मिलनेवाला online product है, उसका use करने के लिए कोइभी software setup या installation की जरुरत नहीं होती |\n', 'Google docs નો ઉપયોગ online documents create, edit, save અને open કરવા માટે થાય છે, online data save હોવાથી કોઈ પણ જગ્યાએથી તેમજ computer , mobile , tablet માંથી document edit & save કરી શકાઈ છે\ngoogle docs ના interface ની મદદથી documents માં text formation , table , graph વગેરે featureનો ઉપયોગ કરીને તમને જોઈતું document online create કરી શકો છો\nખુબજ સરળ રીતે document ને બીજા email id પર share કરી શકો છો.\nOnline document પર work કરતા હોવાથી  એક કરતા વધારે લોકો એક સાથે એક document પર work કરી શકે છે જે Google docs નો ખુબજ ઉપયોગી feature છે.\nGoogle docs ની ready templates નો ઉપયોગ કરી ને ઝડપથી document ready કરી શકો છો\nGoogle docs નો ઉપયોગ અલગ અલગ ક્ષેત્રો માં કરી શકો છો જેમ કે education, business , book writing વગેરે\nમિત્રો,  Google docs એ ખુબ જ ઉપયોગી તેમજ free મળી આવતી online product છે, તેનો use કરવા કોઈ પણ  software setup કે installation ની જરૂરીયાત હોતી નથી.\n', '', '', '', 'docs.jpg', 1, '', '2016-07-05 13:36:48'),
(22, 'Google Sheets', '', '', '', '', '', '', 'हम Google Sheets के बारे मे चर्चा करेगे I\nGoogle sheet, Google drive की सेवा मे Google द्वारा बनाई हुई बिना मुल्य की web पे आधारित office suit है I Google sheet मे जानकारी का संग्रह और गणितीय व्याख्या और जानकारी को आसान तरीके से रखने के लिए होता हे।\nGoogle Sheet मे user द्वारा दी गई कोई भी संग्रहित जानकारी की कीमत का मूल्यांकन का गणितिक संमलोलन और उसमे होते changes का अवलोकन कर देते है । Google sheet द्वारा paper accounting जैसे काम को computerized बनाने मे इस्तमाल होता है । जिससे इस प्रकार की जानकारी को संभालना आसान होता है ।\nGoogle sheet online application है जो बहुत ही आसान और friendly है । Google sheet मे आप माहिती को अच्छी तरह से रख सकते हो । इसके उपर माहिती को Table, Graph, Chart, Form etc के रूप मे भी प्रस्तुत कर सकते है । Google sheet मे मौजूद option और function की मदद से जानकारी का गणितिय विशलेषण तेजी से कर देते है।\nGoogle sheet मे दी गई इस जानकारी को आप दूसरे users के साथ मी share कर सकते है I\n', 'Google Sheet  એ Google Drive ની સેવામાં અપાતી Google દ્વારા બનાવાયેલ વિનામૂલ્યે વેબ આધારિત office suite છે.\nGoogle sheet માં માહિતીનો સંગ્રહ તથા ગાણિતિક અર્થઘટન અને માહિતીને સરળ સ્વરૂપમાં ગોઠવવા માટે થાય છે.\nGoogle Sheet  માં user દ્વારા આપેલ કોઈ પણ સંગ્રહિત માહિતી કિમતો નું મુલ્યાંકન નું ગાણિતિક સમતોલન અને તેમાં થતા ફેરફારો નું અવલોકન કરી આપે છે. \nGoogle sheet દ્વારા paper accounting પ્રકારના કામ ને કોમ્પ્યુટરાઈઝડ બનાવવા ઉપયોગમાં લેવા માટે વિકસાવવામાં આવેલ છે.\nજેથી આ પ્રકારની માહિતીની જાણવણી અને ગાણિતિક અર્થઘટન સરળ બને.\nGoogle sheet એ online application છે જે ખુબ સરળ અને મૈત્રીપૂર્ણ છે. \nGoogle sheet માં તમે માહિતીને સારી રીતે ગોઠવી શકો. આ ઉપરાંત માહિતીને Table, Graph, Chart , Form વગેરે ચિત્રાત્મક રૂપે રજુ કરી શકાય છે.\nGoogle sheet  માં આપવામાં આવેલા option અને functions વડે માહિતીનું ગાણિતિક વિશ્લેષણ ઝડપી કરી આપે છે. \nGoogle sheet માં આપવામાં આવેલી માહિતીને તમે બીજા Users સાથે share પણ કરી શકો છો.\n', '', '', '', 'sheet.jpg', 1, '', '2016-07-05 13:37:06'),
(23, 'Tally', '', '', '', '', '', '', '"Windows 8.1 कयांहे? Windows 8.1 वह एक Microsoft company कि operating system है। इस्से हम उसे Windows 8 OS तरह से जानते है। Windows 8.1 version वह Windows 8 series का part हि है।\nअगर आपकी window 8 कर रहे हो तो आप directly windows 8 मे सै windows 8.1 free मे update कर सकते है।\nपिछले कुछ सालो से technology मे बडे बडे बदलाव हुऐ है। इसके कारन लोग computer को अलग अलग जगह पे use करने लगे हे। बहुत लोग आज Desktop पर जेठ के Keyboard ओर mouse सै Access नहीँ करते लेकीन वेसा आजकल Mobile या Tablet से\nअपना सब काम कर सकते हे जो पहेले Desktop या Laptop पर करते थै I"\n', '', '', '', '', 'tally.jpg', 1, '', '2016-07-01 09:42:38'),
(28, 'Google Drive', '', '', '', '', '', 'Google Drive', '', '', '', '', '', 'Google Drive.png', 3, 'Enables', '2016-07-07 09:47:17'),
(29, 'Google Hangout', '', '', '', '', '', 'Google Hangout', '', '', '', '', '', 'Google Hangout.png', 10, 'Enables', '2016-07-07 09:48:03'),
(30, 'Google IME', '', '', '', '', '', 'Google IME', '', '', '', '', '', 'Google IME.png', 6, 'Enables', '2016-07-07 09:48:52'),
(31, 'Google Translate', '', '', '', '', '', 'Google Translate', '', '', '', '', '', 'Google Translate.png', 2, 'Enables', '2016-07-07 09:49:18'),
(32, 'Youtube', '', '', '', '', '', 'Youtube', '', '', '', '', '', 'Youtube.png', 0, 'Enables', '2016-07-07 09:49:33');

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
(1, 11, 1, '20', '2016-07-25 14:30:56'),
(2, 12, 1, '14', '2016-07-22 10:50:44'),
(3, 0, 1, '0', '2016-07-25 14:08:21');

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
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `full_name`, `email`, `mobile`, `u_name`, `password`, `profile_pic`, `language`, `u_type`, `user_limit`, `add_by`, `validity`, `status`, `date`) VALUES
(1, 'Snehal Trapsiya', 'snehal.trapsiya@gmail.com', '8866739817', 'test@gmail.com', 'test', 'ldlogo.gif', 'lan2', 'user', '', 3, '2016-09-29', 'active', '2016-08-17 19:55:37'),
(2, 'Aur Seekho', 'test@gmail.com', '8866739817', 'admin', 'admin', '', 'lan1', 'admin', '', 0, '2016-09-29', '', '2016-07-25 14:57:35'),
(3, 'test', 'test@test.com', '1234567890', 'test', 'test', 'Capture.JPG', 'lan1', 'vendor', '2', 2, '2016-09-29', 'active', '2016-07-25 15:27:43'),
(4, 'mehul', 'mehul@gmail.com', '2785687364', 'mehul', 'mehul', '', 'lan1', '', '', 3, '2016-08-31', 'deactive', '2016-07-08 12:23:29'),
(8, 'abhay jethva', 'abhay@gmail.com', '1234567890', 'abhay', 'abhay', 'YouTube-logo-play-icon.png', 'lan2', '', '', 3, '2016-08-31', 'active', '2016-07-08 12:16:33'),
(9, 'raju1', 'raju@gmail.com1', '123478902341', 'raju1', 'raju1', 'logo.png', 'lan3', 'vendor', '7', 2, '2016-09-29', 'deactive', '2016-07-08 13:15:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`uc_id`, `u_id`, `cat_id`, `status`) VALUES
(3, 1, 11, 'Active');

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
(1, '', '1 पावर पोइन्ट का परिचय\n', '1 પાવર પોઈન્ટનો પરિચય', '', '', '', '', '154007606', '154629750', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:24'),
(2, '', '2 पावर पोइन्ट के इन्टरफेस', '2 પાવર પોઈન્ટની ઇન્ટરફેસ	', '', '', '', '', '154007611', '153330044', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:24'),
(3, '', '3 क्रिएटिंग एन्ड ओपनिंग प्रेजेंटेशन', '3 ક્રિએટીંગ એન્ડ ઓપનીંગ પ્રેઝન્ટેશન	', '', '', '', '', '154007607', '153368112', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:24'),
(4, '', '4 सेविंग एन्ड शेरिंग', '4 સેવિંગ એન્ડ શેરિંગ', '', '', '', '', '153594014', '153483181', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:24'),
(5, '', '5 स्लाइड बेज़िक्स', '5 સ્લાઈડ બેઝિક', '', '', '', '', '154007605', '153472036', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:24'),
(6, '', '6 टेक्स्ट बेजिक', '6 ટેક્ષ્ટ બેઝિક', '', '', '', '', '154007621', '153472039', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(7, '', '7 फाइंड एन्ड रिप्लेस', '7 ફાઈન્ડ એન્ડ રિપ્લેસ', '', '', '', '', '154007622', '153472048', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(8, '', '8 एप्लायिंग थीम', '8 એપ્લાયિંગ થીમ', '', '', '', '', '154007618', '153472057', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(9, '', '9 एप्लायिंग ट्रांजिशन', '9 એપ્લાયિંગ ટ્રાન્ઝીશન', '', '', '', '', '153594013', '153483823', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(10, '', '10 मेनेजिंग स्लाइड', '10 મેનેજિંગ સ્લાઈડ', '', '', '', '', '153594017', '153484025', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(11, '', '11 प्रिंटिंग', '11 પ્રિન્ટીંગ', '', '', '', '', '153594019', '153472056', '', '', '', 'Beginner', '', '', '', '', 11, '2016-07-07 13:04:25'),
(12, '', '12 प्रेज़ेन्टिंग स्लाइड शो 1', '12 પ્રેઝેન્ટીંગ સ્લાઈડ શો 1', '', '', '', '', '153594022', '153472043', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(13, '', '13 प्रेज़ेन्टिंग स्लाइड शो 2', '13 પ્રેઝેન્ટીંગ સ્લાઈડ શો 2', '\r\n', '', '', '', '153594023', '153472047', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(14, '', '14 लिस्ट', '14 લિસ્ટ', '', '', '', '', '153594024', '153472055', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(15, '', '15 इंडेंट एन्ड लाइन स्पेसिंग', '15 ઇન્ડેન્ટ એન્ડ લાઈન સ્પેસીંગ	', '', '', '', '', '153594012', '153485161', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(16, '', '16 इन्सर्ट पिक्चर', '16 ઇન્સર્ટ પિક્ચર', '', '', '', '', '153594660', '153485360', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(17, '', '17 फोर्मेटिंग पिक्चर', '17 ફોર્મેટિંગ પિક્ચર', '', '', '', '', '153594015', '153472034', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(18, '', '18 शेइप', '18 શેઈપ', '', '', '', '', '153594021', '153472037', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(19, '', '19 टेक्स्ट बॉक्स', '19 ટેક્ષ્ટ બોક્ષ', '', '', '', '', '153594016', '153485621', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(20, '', '20 वर्ड आर्ट', '20 વર્ડઆર્ટ', '', '', '', '', '153594025', '153485831', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(21, '', '21 एरेन्ज ऑब्जेक्ट', '21 એરેન્જ ઓબ્જેક્ટ', '', '', '', '', '154007609', '153472038', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(22, '', '22 एनीमेशन टेक्स्ट', '22 એનિમેશન ટેક્ષ્ટ', '', '', '', '', '154007619', '153472042', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(23, '', '23 इन्सर्टिंग विडिओ', '23 ઇન્સર્ટિંગ વિડીઓ', '', '', '', '', '154007612', '153472054', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(24, '', '24 इन्सर्टिंग ऑडियो', '24 ઇન્સર્ટિંગ ઓડીઓ', '', '', '', '', '153594659', '153486734', '', '', '', 'Intermediate', '', '', '', '', 11, '2016-07-07 13:04:25'),
(25, '', '25 इन्सर्ट टेबल', '25 ઇન્સર્ટ ટેબલ', '', '', '', '', '153659546', '153472035', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(26, '', '26 चार्ट', '26 ચાર્ટ', '', '', '', '', '153659862', '153472050', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(27, '', '27 इन्सर्ट चार्ट', '27 ઇન્સર્ટ ચાર્ટ', '', '', '', '', '153659544', '153472046', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(28, '', '28 स्मार्ट आर्ट ग्राफिक', '28 સ્માર્ટ આર્ટ ગ્રાફિક', '', '', '', '', '153659548', '153487102', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(29, '', '29 चेक स्पेलिंग एन्ड ग्रामर', '29 ચેક સ્પેલિંગ એન્ડ ગ્રામર	', '', '', '', '', '153594661', '153487262', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(30, '', '30 रिव्यू प्रेज़न्टेशन', '30 રીવ્યુ પ્રેઝન્ટેશન', '', '', '', '', '153659545', '153487438', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(31, '', '31 प्रोटेक्ट डोक्युमेंट', '31 પ્રોટેક્ટ ડોક્યુમેન્ટ', '', '', '', '', '153659542', '153487603', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(32, '', '32 थीम्स', '32 થીમ્સ', '', '', '', '', '153594658', '153487589', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(33, '', '33 स्लाइड मास्टर', '33 સ્લાઈડ માસ્ટર', '', '', '', '', '153659543', '153487598', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(34, '', '34 हायपरलिंक एन्ड एक्शन बटन', '34 હાઇપરલિંક એન્ડ એક્શન બટન	', '', '', '', '', '154007616', '153472051', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(35, '', '35 एडवान्स प्रेज़न्टेशन', '35 એડવાન્સ પ્રેઝન્ટેશન', '', '', '', '', '153659541', '153487600', '', '', '', 'Advanced', '', '', '', '', 11, '2016-07-07 13:04:25'),
(36, '', '1 परिचय', '1 પરિચય', '', '', '', '', '153877812', '153877025', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(37, '', '2 साइन इन एन्ड क्रिएटिंग स्लाइड्स', '2 સાઈન ઇન એન્ડ ક્રિએટીંગ સ્લાઈડસ		', '', '', '', '', '153877876', '153663630', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(38, '', '3 गूगल स्लाइड्स इन्टरफेस', '3 ગુગલ સ્લાઈડસ ઇન્ટરફેસ	', '', '', '', '', '153877861', '153663638', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(39, '', '4 क्रिएट स्लाइड एन्ड प्रेज़न्टेशन', '4 ક્રિએટ સ્લાઈડ એન્ડ પ્રેઝન્ટેશન	', '', '', '', '', '153877836', '153663631', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(40, '', '5 स्लाइड्स बेज़िक्स', '5 સ્લાઈડસ બેઝીક્સ', '', '', '', '', '153877818', '153663639', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(41, '', '6 टेक्स्ट फोर्मेटिंग', '6 ટેક્ષ્ટ ફોર્મેટિંગ', '', '', '', '', '153879358', '153663634', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(42, '', '7 इन्सर्ट इमेज', '7 ઇન્સર્ટ ઈમેજ', '', '', '', '', '153879359', '153663635', '', '', '', 'Beginner', '', '', '', '', 12, '2016-07-07 13:04:25'),
(43, '', '8 इन्सर्ट शेइप्स एन्ड लाइंस', '8 ઇન્સર્ટ શેઈપ્સ એન્ડ લાઈન્સ	', '', '', '', '', '153879361', '153663636', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(44, '', '9 थीम एन्ड ब्रेक्ग्राउन्द', '9 થીમ એન્ડ બેકગ્રાઉન્ડ', '', '', '', '', '153877842', '153663633', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(45, '', '10 इन्सर्ट विडिओ एन्ड वर्डआर्ट', '10 ઇન્સર્ટ વિડીઓ એન્ડ વર્ડઆર્ટ	', '', '', '', '', '153877855', '153663632', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(46, '', '11 स्लाइड नम्बर्स एन्ड कोमेंट्स', '11 સ્લાઈડ નંબર્સ એન્ડ કોમેન્ટ્સ	', '', '', '', '', '153877821', '153771042', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(47, '', '12 एनीमेशन इन स्लाइड', '12 એનિમેશન ઇન સ્લાઈડ', '', '', '', '', '153877838', '153771025', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(48, '', '13 इन्सर्ट टेबल एन्ड फंक्शन', '13 ઇન્સર્ટ ટેબલ એન્ડ ફંક્શન	', '', '', '', '', '153877819', '153771035', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(49, '', '14 फ़ाइल मेनु पार्ट - 1', '14 ફાઈલ મેનુ પાર્ટ - 1', '', '', '', '', '153877875', '153771036', '', '', '', 'Intermediate', '', '', '', '', 12, '2016-07-07 13:04:25'),
(50, '', '15 फ़ाइल मेनु पार्ट - 2', '15 ફાઈલ મેનુ પાર્ટ - 2', '', '', '', '', '153877847', '153877015', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(51, '', '16 फाइंड एन्ड रिप्लेस', '16 ફાઈન્ડ એન્ડ રિપ્લેસ', '', '', '', '', '153879615', '153771037', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(52, '', '17 अरेंज मेनु', '17 અરેંજ મેનુ', '', '', '', '', '153877877', '153771038', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(53, '', '18 टूल्स मेनु', '18 ટૂલ્સ મેનુ', '', '', '', '', '153879621', '153771033', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(54, '', '19 मास्टर ऑप्शन', '19 માસ્ટર ઓપ્શન', '', '', '', '', '153879612', '153771031', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(55, '', '20 गूगल स्लाइड मोबाइल परिचय', '20 ગુગલ સ્લાઈડ મોબાઈલ પરિચય	', '', '', '', '', '153877814', '153771039', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(56, '', '21 एडवान्स फीचर्स परिचय', '21 એડવાન્સ ફીચર્સ પરિચય	', '', '', '', '', '', '153774267', '', '', '', 'Advanced', '', '', '', '', 12, '2016-07-07 13:04:26'),
(57, '', '1 परिचय', '1 પરિચય', '', '', '', '', '154569282', '154393044', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(58, '', '2 जिमेइल का उपयोग', '2 જીમેઇલનો ઉપયોગ', '', '', '', '', '153755547', '154396006', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(59, '', '3 नया अकाउंट बनाए', '3 નવું એકાઉન્ટ બનાવો', '', '', '', '', '154693815', '154396406', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(60, '', '4 इनबॉक्स', '4 ઇનબોક્ષ', '', '', '', '', '154569284', '153669926', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(61, '', '5 थीम्स एन्ड इनबॉक्स टाइप', '5 થીમ્સ એન્ડ ઇનબોક્ષ ટાઇપ	', '', '', '', '', '154046583', '154396471', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(62, '', '6 कम्पोज़ मेइल एन्ड फोर्मेटिंग मेइल', '6 કમ્પોઝ મેઈલ એન્ડ ફોર્મેટિંગ મેઈલ	', '', '', '', '', '153755626', '153669911', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(63, '', '7 रिप्लायिंग', '7 રીપ્લાયીંગ', '', '', '', '', '154046568', '154396532', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(64, '', '8 स्टार्ड, इम्पोर्टेन्ट, सेंट मेइल, चेट', '8 સ્ટાર્ડ, ઈમ્પોર્ટન્ટ, સેન્ટ મેઈલ, ચેટ	', '', '', '', '', '153755589', '154395117', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(65, '', '9 अटेचमेन्ट के साथ काम', '9 અટેચમેન્ટસ સાથે કામ', '', '', '', '', '153755553', '153669925', '', '', '', 'Beginner', '', '', '', '', 13, '2016-07-07 13:04:26'),
(66, '', '10 क्विक एक्शन', '10 ક્વિક એક્શન', '', '', '', '', '153755600', '154395097', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(67, '', '11 म्युटिंग कन्वर्ज़ेशन', '11 મ્યુટીંગ કન્વર્ઝેશન', '', '', '', '', '153755606', '153669932', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(68, '', '12 मल्टिपल मेसेजिस', '12 મલ્ટીપલ મેસેજીસ', '', '', '', '', '153755632', '154395110', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(69, '', '13 करिएटिंग लेबल्स', '13 ક્રિએટીંગ લેબલ્સ', '', '', '', '', '153755584', '154396675', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(70, '', '14 मूविंग मेसेजिस', '14 મુવીંગ મેસેજીસ', '', '', '', '', '153755540', '153669910', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(71, '', '15 करिएटिंग फिल्टर्स', '15 ક્રિએટીંગ ફિલ્ટર્સ', '', '', '', '', '153755609', '154396750', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(72, '', '16 मेनेजिंग लेबल्स', '16 મેનેજીંગ લેબલ્સ', '', '', '', '', '153755539', '153669910', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(73, '', '17 एडवान्स सर्चिंग', '17 એડવાન્સ સર્ચીંગ', '', '', '', '', '153755591', '153669921', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(74, '', '18 मेनेजिंग एकाउन्ट्स', '18 મેનેજીંગ એકાઉન્ટસ', '', '', '', '', '153755554', '153669929', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(75, '', '19 जिमेइल सेटिंग', '19 જીમેઇલ સેટીંગ્સ', '', '', '', '', '153760435', '153669939', '', '', '', 'Intermediate', '', '', '', '', 13, '2016-07-07 13:04:26'),
(76, '', '20 करिएटिंग कोंटेक्स', '20 ક્રિએટીંગ કોન્ટેક્સ', '', '', '', '', '153755637', '154395111', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(77, '', '21 करिएटिंग ग्रुप्स', '21 ક્રિએટીંગ ગ્રુપ્સ', '', '', '', '', '153755663', '154395115', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(78, '', '22 इम्पोटिंग कोंटेक्स एन्ड सेटिंग', '22 ઈમ્પોર્ટીંગ કોન્ટેક્સ એન્ડ સેટીંગ્સ	', '', '', '', '', '154047340', '153669923', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(79, '', '23 इंट्रोडयुसिंग चेट, चेट स्टेट्स एन्ड सेटिंग', '23 ઇન્ટ્રોડયુસીંગ ચેટ, ચેટ સ્ટેટ્સ & સેટીંગ્સ		', '', '', '', '', '154047348', '154396800', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(80, '', '24 इनिशिएटिंग विडिओ', '24 ઈનીશીએટીંગ વિડીઓ', '', '', '', '', '154047335', '154395096', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(81, '', '25 करिएटिंग टास्क', '25 ક્રિએટીંગ ટાસ્ક', '', '', '', '', '154047351', '154396924', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(82, '', '26 वेकेशन रिस्पोंडर', '26 વેકેશન રીસ્પોંડર', '', '', '', '', '154047346', '154395108', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(83, '', '27 सिग्नेचर फाइल्स', '27 સિગ્નેચર ફાઈલ્સ', '', '', '', '', '154047367', '153669899', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(84, '', '28 शार्टकटस', '28 શોર્ટકટસ', '', '', '', '', '154047354', '154396866', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(85, '', '29 क्विक लिंक्स', '29 ક્વિક લીન્ક્સ', '', '', '', '', '154047345', '153669907', '', '', '', 'Advanced', '', '', '', '', 13, '2016-07-07 13:04:26'),
(86, '', '', '30 જીમેઇલનો - લૉગ ઇન વિથ મોબાઇલ		', '', '', '', '', '', '153669938', '', '', '', '', '', '', '', '', 13, '2016-07-07 06:27:49'),
(87, '', 'गूगल केलेन्डर का परिचय', '1 ગુગલ કેલેન્ડરનો પરિચય	', '', '', '', '', '154045144', '153873839', '', '', '', 'Beginner', '', '', '', '', 14, '2016-07-07 13:04:26'),
(88, '', 'नयी इवेन्ट', '2 નવી ઇવેન્ટ', '', '', '', '', '154045147', '153873838', '', '', '', 'Beginner', '', '', '', '', 14, '2016-07-07 13:04:26'),
(89, '', 'नया केलेन्डर', '3 નવું કેલેન્ડર', '', '', '', '', '154045145', '153873841', '', '', '', 'Beginner', '', '', '', '', 14, '2016-07-07 13:04:26'),
(90, '', '1 एवरनोट गेटिंग स्टार्टेड', '1 એવરનોટ ગેટીંગ સ્ટાર્ટેડ', '', '', '', '', '154007107', '154397992', '', '', '', 'Beginner', '', '', '', '', 15, '2016-07-07 13:04:26'),
(91, '', '2 एवरनोट इन्टरफेस', '2 એવરનોટ ઇન્ટરફેસ', '', '', '', '', '154007108', '154397993', '', '', '', 'Beginner', '', '', '', '', 15, '2016-07-07 13:04:26'),
(92, '', '3 क्रिएट न्यू टेग और नोटबुक', '3 ક્રિએટ ન્યુ ટેગ એન્ડ નોટબુક	', '', '', '', '', '154007110', '', '', '', '', 'Beginner', '', '', '', '', 15, '2016-07-07 13:04:26'),
(93, '', '4 एवरनोट मोबाइल एप', '4 એવરનોટ મોબાઈલ એપ', '', '', '', '', '154007109', '154839279', '', '', '', 'Beginner', '', '', '', '', 15, '2016-07-07 13:04:26'),
(94, '', '1 वंडरलिस्ट का परिचय 1', '1 વન્ડરલિસ્ટનો પરિચય 1', '', '', '', '', '154397391', '153876216', '', '', '', 'Beginner', '', '', '', '', 16, '2016-07-07 13:04:26'),
(95, '', '2 वंडरलिस्ट का परिचय 2', '2 વન્ડરલિસ્ટનો પરિચય 2', '', '', '', '', '154397392', '153876085', '', '', '', 'Beginner', '', '', '', '', 16, '2016-07-07 13:04:26'),
(96, '', '3 वंडरलिस्ट का उपयोग मोबाइल में कैसे करे', '3 વન્ડરલિસ્ટનો ઉપયોગ મોબાઈલમાં કેવી રીતે કરવો			', '', '', '', '', '154397393', '153876084', '', '', '', 'Beginner', '', '', '', '', 16, '2016-07-07 13:04:26'),
(97, '', '1 गूगल किप का परिचय', '1 ગૂગલ કિપનો પરિચય', '', '', '', '', '154009341', '154044549', '', '', '', 'Beginner', '', '', '', '', 17, '2016-07-07 13:04:27'),
(98, '', '2 गूगल किप का उपयोग कैसे करे', '2 ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો		', '', '', '', '', '154009342', '153874774', '', '', '', 'Beginner', '', '', '', '', 17, '2016-07-07 13:04:27'),
(99, '', '3 गूगल किप का उपयोग कैसे करे 2 (मोबाइल उपयोग)', '3 ગુગલ કિપનો ઉપયોગ કેવી રીતે કરવો 2 (મોબાઈલ ઉપયોગ)				', '', '', '', '', '154009339', '154044548', '', '', '', 'Beginner', '', '', '', '', 17, '2016-07-07 13:04:27'),
(100, '', '1 गूगल फॉर्म का परिचय', '1 ગુગલ ફોર્મનો પરિચય', '', '', '', '', '153763570', '153874138', '', '', '', 'Beginner', '', '', '', '', 18, '2016-07-07 13:04:27'),
(101, '', '2 थीम्स और दूसरी विशेषता', '2 થીમ્સ & બીજી વિશેષતા', '', '', '', '', '153763571', '153874140', '', '', '', 'Beginner', '', '', '', '', 18, '2016-07-07 13:04:27'),
(102, '', '1 माइक्रोसॉफ्ट वर्ड का परिचय', '1 માઈક્રોસોફ્ટ વર્ડનો પરિચય	', '', '', '', '', '153869214', '153604354', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(103, '', '2 माइक्रोसॉफ्ट वर्ड के इन्टरफेस', '2 માઈક્રોસોફ્ટ વર્ડની ઇન્ટરફેસ	', '', '', '', '', '153869216', '153604349', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(104, '', '3 माईक्रोसॉफ्ट वर्ड के बारे में माहिती', '3 માઈક્રોસોફ્ટ વર્ડ વિશેની માહિતી	', '', '', '', '', '154693948', '153750213', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(105, '', '4 नये डोक्युमेंट बनाए और पुराने खोले', '4 નવા ડોક્યુમેન્ટ બનાવવા અને જુના ખોલવા		', '', '', '', '', '153869178', '153604351', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(106, '', '5 सेविंग और शेरिंग', '5 સેવીંગ અને શેરીંગ', '', '', '', '', '154693945', '153750216', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(107, '', '6 टेक्स्ट बेज़िक्स', '6 ટેક્ષ્ટ બેઝીક્સ', '', '', '', '', '153869161', '153750215', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(108, '', '7 फोर्मेटिंग टेक्स्ट', '7 ફોર્મેટિંગ ટેક્ષ્ટ', '', '', '', '', '154839517', '153661209', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(109, '', '8 पेइज ले - आउट', '8 પેઈજ લે-આઉટ', '', '', '', '', '153869212', '153750205', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(110, '', '9 प्रिंटिंग डोक्युमेंट', '9 પ્રિન્ટીંગ ડોક્યુમેન્ટ', '', '', '', '', '153869191', '153750208', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(111, '', '10 इन्देंट्स और टेब्स 1', '10 ઇન્ડેન્ટસ અને ટેબ્સ 1', '', '', '', '', '153869206', '153588656', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(112, '', '11 इन्देंट्स और टेब्स 2', '11 ઇન્ડેન્ટસ અને ટેબ્સ 2', '', '', '', '', '153869215', '153750219', '', '', '', 'Beginner', '', '', '', '', 19, '2016-07-07 13:04:27'),
(113, '', '12 लाइन और पेरेग्राफ स्पेसिंग', '12 લાઈન અને પેરેગ્રાફ સ્પેસીંગ	', '', '', '', '', '153869205', '153750222', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(114, '', '13 बुलेट्स और नम्बरिंग', '13 બુલેટ્સ અને નંબરીંગ', '', '', '', '', '153869210', '153588882', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(115, '', '14 हायपरलिंक्स', '14 હાઇપરલિંકસ', '', '', '', '', '153869195', '153659969', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(116, '', '15 ब्रेक्स', '15 બ્રેક્સ', '', '', '', '', '153869223', '153750224', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(117, '', '16 कोल्म्स', '16 કોલમ્સ', '', '', '', '', '153869213', '153750212', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(118, '', '17 हेडर, फुटर और पेइज नंबर', '17 હેડર, ફુટર અને પેઈજ નંબર	', '', '', '', '', '153869185', '153752212', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(119, '', '18 पिक्चर्स और टेक्स्ट रेपिंग', '18 પીકચર્સ અને ટેક્ષ્ટ રેપીંગ	', '', '', '', '', '153869164', '153750207', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(120, '', '19 फोर्मेटिंग पिक्चर्स', '19 ફોર્મેટિંગ પીકચર્સ', '', '', '', '', '153869181', '153750226', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(121, '', '20 शेइप्स', '20 શેઈપ્સ', '', '', '', '', '153869211', '153659407', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(122, '', '21 टेक्स्ट बॉक्स', '21 ટેક્ષ્ટ બોક્ષ', '', '', '', '', '153594938', '153750214', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(123, '', '22 वर्ड आर्ट', '22 વર્ડ આર્ટ', '', '', '', '', '153594947', '153750218', '', '', '', 'Intermediate', '', '', '', '', 19, '2016-07-07 13:04:27'),
(124, '', '23 एरेंजिंग ऑब्जेक्ट', '23 એરેન્જિંગ ઓબ્જેક્ટ', '', '', '', '', '153594944', '153661211', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(125, '', '24 टेबल 1', '24 ટેબલ 1', '', '', '', '', '153594943', '153750223', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(126, '', '25 टेबल 2', '25 ટેબલ 2', '', '', '', '', '153594945', '153661208', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(127, '', '26 चार्ट 1', '26 ચાર્ટ 1', '', '', '', '', '153594950', '153588881', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(128, '', '27 चार्ट 2', '27 ચાર્ટ 2', '', '', '', '', '153594942', '153588876', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(129, '', '28 चेकिंग स्पेलिंग एन्ड ग्रामर', '28 ચેકીંગ સ્પેલિંગ એન્ડ ગ્રામર	', '', '', '', '', '153594940', '153750211', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(130, '', '29 ट्रेक चेंजिस एन्ड कोमेंट्स', '29 ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ્સ	', '', '', '', '', '153594948', '153588877', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(131, '', '30 फ़ाइनलाइज़िन्ग एन्ड प्रोटेक्टिंग डोक्युमेंट', '30 ફાઈનલાઈઝીંગ એન્ડ પ્રોટેક્ટીંગ ડોક્યુમેન્ટ		', '', '', '', '', '153594952', '153588879', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(132, '', '31 स्मार्ट आर्ट ग्राफिक', '31 સ્માર્ટ આર્ટ ગ્રાફિક', '', '', '', '', '153594941', '153588880', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(133, '', '32 स्टाइल्स', '32 સ્ટાઇલ્સ', '', '', '', '', '153594946', '153588878', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(134, '', '33 थीम', '33 થીમ', '', '', '', '', '153594949', '153750206', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(135, '', '34 मेइल मर्ज', '34 મેઈલ મર્જ', '', '', '', '', '', '153604353', '', '', '', 'Advanced', '', '', '', '', 19, '2016-07-07 13:04:27'),
(136, '', '1 माइक्रोसॉफ्ट एक्सेल का परिचय', '1 માઈક્રોસોફ્ટ એક્સેલ નો પરિચય	', '', '', '', '', '153766025', '153649589', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(137, '', '2 गेटिंग स्टार्टेड इन्टरफेस', '2 ગેટીંગ સ્ટાર્ટેડ ઇન્ટરફેસ', '', '', '', '', '153770393', '153652601', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(138, '', '3 क्रिएटिंग एन्ड ओपनिंग वर्कबुक', '3 ક્રિએટીંગ એન્ડ ઓપનીંગ વર્કબુક	', '', '', '', '', '153589889', '153649597', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(139, '', '4 सेविंग एन्ड शेरिंग वर्कबुक', '4 સેવીંગ એન્ડ શેરીંગ વર્કબુક	', '', '', '', '', '153589888', '153652602', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(140, '', '5 सेल बेज़िक्स', '5 સેલ બેઝીક્સ', '', '', '', '', '153589883', '153649618', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(141, '', '6 मोडीफायिंग कोलम, रो, सेल्स', '6 મોડીફાઈન્ગ કોલમ, રો, સેલ્સ	', '', '', '', '', '153766027', '153649594', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(142, '', '7 फोर्मेटिंग सेल', '7 ફોર્મેટિંગ સેલ', '', '', '', '', '153589878', '153649612', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(143, '', '8 वर्कशीट बेजिक', '8 વર્કશીટ બેઝીક', '', '', '', '', '153589890', '153649598', '', '', '', 'Beginner', '', '', '', '', 20, '2016-07-07 13:04:27'),
(144, '', '9 पेइज ले - आउट', '9 પેજ લે-આઉટ', '', '', '', '', '153589882', '153649615', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(145, '', '10 प्रिंटिंग वर्कबुक', '10 પ્રિન્ટીંગ વર્કબુક', '', '', '', '', '153766026', '153652603', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(146, '', '11 सिम्पल फोर्म्युला', '11 સિમ્પલ ફોરમ્યુલા', '', '', '', '', '153589887', '153649617', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(147, '', '12 कोम्प्लेक्स फोर्म्युला', '12 કોમ્લેક્ષ ફોરમ્યુલા', '', '', '', '', '153589885', '153649593', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(148, '', '13 रिलेटिव एन्ड एब्सोल्यूट सेल रेफ़रन्स', '13 રીલેટીવ એન્ડ એબ્સોલ્યુટ સેલ રેફરન્સ		', '', '', '', '', '153766064', '153649622', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(149, '', '14 फंक्शन', '14 ફંકશન', '', '', '', '', '154572135', '153649595', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(150, '', '15 फ्रीजिंग पेन्स', '15 ફ્રીઝીંગ પેન્સ', '', '', '', '', '153766068', '153649605', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(151, '', '16 शोर्टिंग डेटा', '16 શોર્ટિંગ ડેટા', '', '', '', '', '153766031', '153649613', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(152, '', '17 फिल्टरिंग डेटा', '17 ફિલ્ટરીંગ ડેટા', '', '', '', '', '153766029', '153649616', '', '', '', 'Intermediate', '', '', '', '', 20, '2016-07-07 13:04:28'),
(153, '', '18 ग्रुप एन्ड सबटोटल', '18 ગ્રુપ એન્ડ સબટોટલ', '', '', '', '', '153766066', '153649591', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(154, '', '19 टेबल्स', '19 ટેબલ્સ', '', '', '', '', '153589901', '153649590', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(155, '', '20 चार्ट', '20 ચાર્ટ', '', '', '', '', '153589884', '153649614', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(156, '', '21 स्पार्कलाइन', '21 સ્પાર્કલાઈન', '', '', '', '', '153589880', '153649603', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(157, '', '22 ट्रेक चेंजिस एन्ड कोमेन्ट', '22 ટ્રેક ચેન્જીસ એન્ડ કોમેન્ટ	', '', '', '', '', '153766065', '153649621', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(158, '', '23 प्रोटेक्टिंग वर्कबुक', '23 પ્રોટેક્ટીંગ વર્કબુક', '', '', '', '', '153589881', '153649608', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(159, '', '24 कंडीशनल फोर्मेटिंग', '24 કન્ડીશનલ ફોર્મેટિંગ', '', '', '', '', '153589891', '153649588', '', '', '', 'Advanced', '', '', '', '', 20, '2016-07-07 13:04:28'),
(160, '', '', '25 પિવટ ટેબલ', '', '', '', '', '', '153649610', '', '', '', '', '', '', '', '', 20, '2016-07-07 06:54:48'),
(161, '', '', '26 વોટ ઇફ અનૈલિસિસ', '', '', '', '', '', '153649620', '', '', '', '', '', '', '', '', 20, '2016-07-07 06:54:59'),
(162, '', '1 गूगल डॉक्स का परिचय', '1 ગુગલ ડોક્સનો પરિચય', '', '', '', '', '154150353', '153668000', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(163, '', '2 साइन इन एन्ड करिएटिंग डॉक्स', '2 સાઈન ઇન એન્ડ ક્રિએટીંગ અ ડોક્સ	', '', '', '', '', '154149508', '154148014', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(164, '', '3 गूगल डॉक्स इन्टरफेस', '3 ગુગલ ડોક્સ ઇન્ટરફેસ', '', '', '', '', '154149512', '154148012', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(165, '', '4 टेक्स्ट फोर्मेटिंग', '4 ટેક્ષ્ટ ફોર્મેટિંગ', '', '', '', '', '154149511', '154148013', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(166, '', '5 क्रिएटिंग स्टाइल एन्ड पेंट फोरमेट टूल्स', '5 ક્રિએટીંગ સ્ટાઇલ એન્ડ પેઈન્ટ ફોરમેટ ટૂલ્સ		', '', '', '', '', '154149510', '154148347', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(167, '', '6 इन्सर्टिंग लाइंस, फुटनोट्स एन्ड पेइज ब्रेक्स', '6 ઇન્સર્ટીંગ લાઈન્સ, ફૂટનોટસ એન્ડ પેઈજ બ્રેક્સ		', '', '', '', '', '154149516', '154148015', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(168, '', '7 हेडर और फूटर्स के साथ काम', '7 હેડર અને ફૂટર્સની સાથે કામ	', '', '', '', '', '154149513', '154148017', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(169, '', '8 एडिंग पेइज नम्बर्स', '8 એડિંગ પેઈજ નંબર્સ', '', '', '', '', '154149509', '153595938', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(170, '', '9 क्रिएटिंग टेबल ऑफ़ कन्टेन्ट', '9 ક્રિએટીંગ ટેબલ ઓફ કન્ટેન્ટ	', '', '', '', '', '', '153595943', '', '', '', 'Beginner', '', '', '', '', 21, '2016-07-07 13:04:28'),
(171, '', '10 सेटिंग पेइज, ओरिएंटेशन एन्ड कलर', '10 સેટિંગ પેઈજ, ઓરિએન્ટેશન એન્ડ કલર		', '', '', '', '', '154150961', '153595942', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(172, '', '11 इन्सर्टिंग, रिसाइजिंग एन्ड क्रोपिंग इमेज', '11 ઇન્સર્ટીંગ, રીસાઈજીંગ એન્ડ ક્રોપીંગ ઈમેજ		', '', '', '', '', '154561304', '153595941', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(173, '', '12 इन्सर्टिंग इमेज इन टू हेडर', '12 ઇન્સર્ટીંગ ઈમેજ ઇન ટુ હેડર	', '', '', '', '', '154150352', '153595937', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(174, '', '13 इन्सर्टिंग गूगल द्रोइंग', '13 ઇન્સર્ટીંગ ગુગલ ડ્રોઈંગ', '', '', '', '', '154561039', '153595939', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(175, '', '14 इन्सर्टिंग एन्ड रिमूविंग टेबल', '14 ઇન્સર્ટીંગ એન્ડ રીમુવિંગ ટેબલ	', '', '', '', '', '154561040', '153595934', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(176, '', '15 सेटिंग टेबल ऑप्शन एन्ड रिसाइजिंग टेबल', '15 સેટિંગ ટેબલ ઓપ્શન એન્ડ રીસાઈજીંગ ટેબલ			', '', '', '', '', '154561041', '153667999', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(177, '', '16 इन्सर्टिंग एन्ड दिलिटिंग रो एन्ड कोलम', '16 ઇન્સર્ટીંગ એન્ડ ડીલીટીંગ રો એન્ડ કોલમ		', '', '', '', '', '154685276', '153595935', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(178, '', '17 फ़ाइल् मेनू ऑप्शन', '17 ફાઈલ મેનુ ઓપ્શન', '', '', '', '', '154569733', '153668004', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(179, '', '18 पब्लिशिंग डोक टू ढ वेब', '18 પબ્લીશીંગ ડોક ટુ ધ વેબ	', '', '', '', '', '154569732', '153667995', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(180, '', '19 प्रिन्टिंग डॉक्', '19 પ્રિન્ટીંગ ડોક', '', '', '', '', '154569730', '153667996', '', '', '', 'Intermediate', '', '', '', '', 21, '2016-07-07 13:04:28'),
(181, '', '20 इ मेइलिंग डॉक्', '20 ઈમેઇલિન્ગ ડોક', '', '', '', '', '154569731', '154149220', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(182, '', '21 दुसरो के साथ डोक्युमेंट का बटवारा', '21 અન્ય સાથે ડોક્યુમેન્ટ શેર	', '', '', '', '', '154569736', '153668007', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(183, '', '22 भिन्न भिन्न लोगो के साथ डोक्युमेंट एडिटिंग', '22 અલગ અલગ યુજર્સ સાથે વારાફરતી ડોક એડીટીંગ			', '', '', '', '', '154008604', '153667998', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(184, '', '23 फाइंडिंग डॉक्स अधर हेव शेर विथ यु', '23 ફાઈન્ડીંગ ડોક્સ અધર હેવ શેર વિથ યુ		', '', '', '', '', '154008600', '153668005', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(185, '', '24 एडिंग कोमेंट्स टू डॉक्स', '24 એડિંગ કોમેન્ટ્સ ટુ ડોક્સ	', '', '', '', '', '154008605', '153668003', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(186, '', '25 स्पेलिंग चेकिंग एन्ड ट्रांसलेटिंग डॉक्स', '25 સ્પેલિંગ ચેકીંગ એન્ડ ટ્રાન્સલેટીંગ ડોક્સ		', '', '', '', '', '154008610', '153668006', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(187, '', '26 डॉक्स में एड ओन्स शामिल', '26 ડોક્સમાં એડ ઓન નો સમાવેશ	', '', '', '', '', '154008608', '153668008', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(188, '', '27 डाउनलोडिंग गूगल डॉक्स एप एन्ड साइन इन', '27 ડાઉનલોડીંગ ધ ગુગલ ડોક્સ એપ એન્ડ સાઈન ઇન			', '', '', '', '', '154009238', '153668819', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(189, '', '28 नेविगेटिंग गूगल डॉक्स एप', '28 નેવિગેટીંગ ધ ગુગલ ડોક્સ એપ	', '', '', '', '', '154008602', '153667997', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(190, '', '29 एप्लीकेशन में डॉक्स के साथ काम', '29 એપ્લીકેશન ડોક્સ સાથે કામ	', '', '', '', '', '154008607', '153668002', '', '', '', 'Advanced', '', '', '', '', 21, '2016-07-07 13:04:28'),
(191, '', '1 गूगल शीट्स का परिचय', '1 ગુગલ શીટ્સનો પરિચય', '', '', '', '', '154405543', '154553975', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:28'),
(192, '', '2 साइन इन एन्ड क्रिएटिंग शीट्स', '2 સાઈન ઇન એન્ડ ક્રિએટીંગ શીટ્સ	', '', '', '', '', '154405477', '154556866', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:28'),
(193, '', '3 गूगल शीट्स इन्टरफेस', '3 ગુગલ શીટ્સ ઇન્ટરફેસ', '', '', '', '', '154404205', '154556408', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:28'),
(194, '', '4 क्रिएटिंग स्प्रेडशीट्स', '4 ક્રિએટીંગ સ્પ્રેડશીટ્સ', '', '', '', '', '154405366', '154553969', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:28'),
(195, '', '5 एड, कोपिंग, मूविंग एन्ड दिलिटिंग स्प्रेडशीट्स', '5 એડ, કોપિંગ, મુવીંગ એન્ડ ડીલીટીંગ સ્પ્રેડશીટ		', '', '', '', '', '154405363', '154553968', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:28'),
(196, '', '6 एडिटिंग डेटा', '6 એડીટીંગ ડેટા', '', '', '', '', '154404206', '154553973', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(197, '', '7 इन्सर्टिंग, दिलिटिंग एन्ड क्लिअरिंग रो एन्ड कोलम', '7 ઇન્સર્ટીંગ, ડીલીટીંગ એન્ડ કલીઅરીંગ રો એન્ડ કોલમ			', '', '', '', '', '154404203', '154553976', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(198, '', '8 मूविंग रो, कोलम एन्ड सेल', '8 મુવીંગ રો, કોલમ એન્ડ સેલ	', '', '', '', '', '154404209', '153660229', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(199, '', '9 फोर्मेटिंग सेल, रो एन्ड कोलम डेटा', '9 ફોર્મેટિંગ સેલ, રો એન્ડ કોલમ ડેટા	', '', '', '', '', '154404198', '154553974', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(200, '', '10 सोर्टिंग डेटा ओन स्प्रेडशीट्स', '10 સોર્ટિંગ ડેટા ઓન સ્પ્રેડશીટ	', '', '', '', '', '154404199', '154553972', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(201, '', '11 ज्यादा स्प्रेडशीट्स के साथ काम', '11 એક કરતા વધારે શીટ્સ સાથે કામ	', '', '', '', '', '154405720', '154556988', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(202, '', '12 किबोर्ड में से शोर्टकट की का उपयोग', '12 કીબોર્ડ માંથી શોર્ટકટ કીનો ઉપયોગ		', '', '', '', '', '154406612', '154556991', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(203, '', '13 क्रिएटिंग सीरिज ऑफ़ नंबर', '13 ક્રિએટીંગ સીરીજ ઓફ નંબર	', '', '', '', '', '154405724', '154556989', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(204, '', '14 फाइंड और रिप्लेस का उपयोग', '14 ફાઈન્ડ અને રિપ્લેસ નો ઉપયોગ	', '', '', '', '', '154405723', '153660226', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(205, '', '15 इन्सर्टिंग एन्ड क्लिअरिंग नोट', '15 ઇન્સર્ટીંગ એન્ડ કલીઅરીંગ નોટ	', '', '', '', '', '154405544', '154557154', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29');
INSERT INTO `video` (`v_id`, `v_name_lan1`, `v_name_lan2`, `v_name_lan3`, `v_name_lan4`, `v_name_lan5`, `v_name_lan6`, `v_url_lan1`, `v_url_lan2`, `v_url_lan3`, `v_url_lan4`, `v_url_lan5`, `v_url_lan6`, `v_level`, `v_duration`, `v_rating`, `v_view_count`, `v_order`, `cat_id`, `date`) VALUES
(206, '', '16 इन्सर्टिंग लिंक्स', '16 ઇન્સર્ટીંગ લિનક્સ', '', '', '', '', '154405545', '153660223', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(207, '', '17 इन्सर्टिंग इमेजिस इन टू स्प्रेडशीट्स', '17 ઇન્સર્ટીંગ ઈમેજીસ ઇન ટુ સ્પ્રેડશીટ	', '', '', '', '', '154405546', '153660222', '', '', '', 'Beginner', '', '', '', '', 22, '2016-07-07 13:04:29'),
(208, '', '18 क्रिएट द्रोइंग', '18 ક્રિએટ ડ્રોઈંગ', '', '', '', '', '154407373', '153660221', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(209, '', '19 मर्ज सेल्स एन्ड टेक्स्ट व्रेपिंग', '19 મર્જ સેલ્સ એન્ડ ટેક્ષ્ટ વ્રેપીંગ	', '', '', '', '', '154407621', '154557366', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(210, '', '20 कंडीशनल फोर्मेटिंग का उपयोग', '20 કન્ડીશનલ ફોર્મેટિંગ ઉપયોગ	', '', '', '', '', '154407622', '154557365', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(211, '', '21 त्वरित राशी का उपयोग', '21 ઝડપી સરવાળાનો ઉપયોગ	', '', '', '', '', '154407375', '153660228', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(212, '', '22 फोर्म्युला और फंक्शन का उपयोग', '22 ફોર્મ્યુલા અને ફંક્શનનો ઉપયોગ	', '', '', '', '', '154407372', '153660231', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(213, '', '23 इफ फंक्शन और नेस्टेड इफ फंक्शन का उपयोग', '23 ઇફ ફંક્શન અને નેસ્ટેડ ઇફ ફંક્શનનો ઉપયોગ			', '', '', '', '', '154407378', '154559176', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(214, '', '24 रेफ्रेंशिंग डेटा फ्रॉम अधर शीट्स', '24 રેફ્રેન્શિંગ ડેટા ફ્રોમ અધર શીટ્સ	', '', '', '', '', '154407374', '154559177', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(215, '', '25 गूगल शीट्स के अंदर चार्ट बनाए', '25 ગુગલ શીટ્સની અંદર ચાર્ટ બનાવવો		', '', '', '', '', '154407623', '153660230', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(216, '', '26 फ़िल्टर बना के देखे और फिल्टर का उपयोग', '26 ફિલ્ટર બનાવીને જોવા અને ફિલ્ટરનો ઉપયોગ			', '', '', '', '', '154407626', '153660797', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(217, '', '27 पिवोट टेबल का उपयोग', '27 પિવોટ ટેબલનો ઉપયોગ	', '', '', '', '', '154570415', '153660225', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(218, '', '28 एक्सप्लोर ऑप्शन', '28 એક્ષ્પ્લોર ઓપ્શન', '', '', '', '', '154407624', '153660224', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(219, '', '29 डेटा वेलिडेशन इन गूगल शीट्स', '29 ડેટા વેલિડેશન ઇન ગુગલ શીટ્સ	', '', '', '', '', '154408395', '154559333', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(220, '', '30 फॉर्म', '30 ફોર્મ', '', '', '', '', '154408398', '154559337', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(221, '', '31 प्रोटेक्ट शीट एन्ड पर्शनल डिक्शनरी ऑप्शन', '31 પ્રોટેક્ટ શીટ એન્ડ પર્શનલ ડીક્ષનરી ઓપ્શન		', '', '', '', '', '154408399', '154559334', '', '', '', 'Intermediate', '', '', '', '', 22, '2016-07-07 13:04:29'),
(222, '', '32 दुसरे लोगो के साथ स्प्रेडशीट फ़ाइल् शेरिंग', '32 અન્ય લોકો સાથે સ્પ્રેડશીટ ફાઈલ શેરીંગ		', '', '', '', '', '154410074', '154559342', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(223, '', '33 वर्किंग विथ गूगल शीट्स धेट आर शेर विथ यु', '33 વર્કીંગ વિથ ગુગલ શીટ્સ ધેટ આર શેર વિથ યુ			', '', '', '', '', '154408397', '154559336', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(224, '', '34 कोमेंटिंग ओन स्प्रेडशीट', '34 કોમેન્ટીંગ ઓન સ્પ્રેડશીટ	', '', '', '', '', '154408396', '154559340', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(225, '', '35 स्प्रेडशीट आवृतियो के साथ काम', '35 સ્પ્રેડશીટ આવૃતિઓ સાથે કામ	', '', '', '', '', '154408394', '154559339', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(226, '', '36 स्प्रेडशीट सेटिंग', '36 સ્પ્રેડશીટ સેટિંગ', '', '', '', '', '154409302', '154559994', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(227, '', '37 इम्पोर्टिंग एन्ड कंवर्टिंग', '37 ઈમ્પોર્ટીંગ એન્ડ કન્વર્ટીંગ	', '', '', '', '', '154409305', '154559993', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(228, '', '38 डाउनलोड एस', '38 ડાઉનલોડ એસ', '', '', '', '', '154409304', '154559992', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(229, '', '39 पब्लिश टू ढ वेब', '39 પબ્લીશ ટુ ધ વેબ', '', '', '', '', '154410090', '154559995', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(230, '', '40 इ मेइल सहयोगी', '40 ઈ મેઈલ સહયોગી', '', '', '', '', '154409303', '154559990', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(231, '', '41 बारीबारी सहयोग और गूगल चेट का उपयोग करके', '41 વારાફરતી સહયોગ અને ગુગલ ચેટ નો ઉપયોગ કરીને			', '', '', '', '', '154409467', '154560248', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(232, '', '42 इ मेइल अटेचमेन्ट', '42 ઈ મેઈલ એટેચમેન્ટ', '', '', '', '', '154409470', '154560736', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(233, '', '43 स्पेलिंग चेक', '43 સ્પેલિંગ ચેક', '', '', '', '', '154409472', '154560252', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(234, '', '44 आपकी गूगलशीट प्रिन्ट', '44 તમારી ગુગલ શીટ પ્રિન્ટ	', '', '', '', '', '154409468', '154560255', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(235, '', '45 इन्क्लुडिंग एड ओन्स इन शीट्स', '45 ઈન્ક્લુડીન્ગ એડ ઓન્સ ઇન શીટ	', '', '', '', '', '154409469', '154560250', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(236, '', '46 डाउनलोडिंग गूगल शीट एप एन्ड साइन इन', '46 ડાઉનલોડીંગ ગુગલ શીટ એપ એન્ડ સાઈન ઇન			', '', '', '', '', '154409903', '154560739', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(237, '', '47 नेविगेटिंग गूगल शीट एप', '47 નેવિગેટીંગ ગુગલ શીટ એપ	', '', '', '', '', '154409900', '154560740', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(238, '', '48 एप्लीकेशन शीट के साथ काम', '48 એપ્લીકેશન શીટ સાથે કામ	', '', '', '', '', '154409901', '154560735', '', '', '', 'Advanced', '', '', '', '', 22, '2016-07-07 13:04:29'),
(239, '', '1 गूगल ड्राइव क्या हें?', '1 ગુગલ ડ્રાઈવ શું છે ?', '', '', '', '', '154693518', '154693403', '', '', '', 'Beginner', '', '', '', '', 28, '2016-07-07 13:04:29'),
(240, '', '2 गूगल ड्राइव इन्टरफेस', '2 ગુગલ ડ્રાઈવ ઇન્ટરફેસ', '', '', '', '', '154693517', '154693404', '', '', '', 'Beginner', '', '', '', '', 28, '2016-07-07 13:04:29'),
(241, '', '1 गूगल IME का परिचय', '1 ગુગલ IMEનો પરિચય', '', '', '', '', '153764730', '153874453', '', '', '', 'Beginner', '', '', '', '', 30, '2016-07-07 13:04:29'),
(242, '', '1 गूगल हेन्गआउट - परिचय', '1 ગુગલ હેન્ગઆઉટ - પરિચય	', '', '', '', '', '154009573', '153597521', '', '', '', 'Beginner', '', '', '', '', 29, '2016-07-07 13:04:29'),
(243, '', '2 गूगल हेन्गआउट - इन्टरफेस', '2 ગુગલ હેન્ગઆઉટ - ઇન્ટરફેસ	', '', '', '', '', '154009577', '153597526', '', '', '', 'Beginner', '', '', '', '', 29, '2016-07-07 13:04:30'),
(244, '', '3 गूगल हेन्गआउट - विडिओ कोलिंग और दूसरी विशेषता', '3 ગુગલ હેન્ગઆઉટ - વિડીઓ કોલિંગ અને બીજી વિશેષતા			', '', '', '', '', '154009574', '154044894', '', '', '', 'Beginner', '', '', '', '', 29, '2016-07-07 13:04:30'),
(245, '', '4 गूगल हेन्ग आउट - हेन्गआउट ओन एइर', '4 ગુગલ હેન્ગઆઉટ - હેન્ગઆઉટ ઓન એઈર		', '', '', '', '', '154009570', '153597527', '', '', '', 'Beginner', '', '', '', '', 29, '2016-07-07 13:04:30'),
(246, '', '1 यु टयूब परिचय', '1 યુ ટ્યુબ પરિચય', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 32, '2016-07-07 13:04:30'),
(247, '', '2 यु टयूब का उपयोग कैसे करे', '2 યુ ટ્યુબનો ઉપયોગ કેવી રીતે કરવો		', '', '', '', '', '154573959', '', '', '', '', 'Beginner', '', '', '', '', 32, '2016-07-07 13:04:30'),
(248, '', '3 यु टयूब चेनल कैसे क्रिएट करे', '3 યુ ટ્યુબ ચેનલ કેવી રીતે ક્રિએટ કરવી		', '', '', '', '', '154573960', '', '', '', '', 'Beginner', '', '', '', '', 32, '2016-07-07 13:04:30'),
(249, '', '4 यु टयूब चेनल कैसे वेरीफाय करे', '4 યુ ટ્યુબ ચેનલ કેવી રીતે વેરીફાય કરવી		', '', '', '', '', '154573963', '', '', '', '', 'Beginner', '', '', '', '', 32, '2016-07-07 13:04:30'),
(250, '', '5 यु टयूब में स्लाइड शो कैसे करे', '5 યુ ટ્યુબમાં સ્લાઈડ શો કેવી રીતે કરવો		', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 32, '2016-07-07 13:04:30'),
(251, '', '6 मोबाइल द्वारा विडिओ अपलोड कैसे करे', '6 મોબાઈલ દ્વારા વિડીઓ અપલોડ કઈ રીતે કરવો			', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(252, '', '7 विडिओ अपलोड कैसे करे', '7 વિડીઓ અપલોડ કઈ રીતે કરવો	', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(253, '', '8 यु टयूब में सबटाइटल और केप्शन कैसे जोड़े', '8 યુ ટ્યુબમાં સબટાઇટલ અને કેપ્શન કેવી રીતે ઉમેરવા			', '', '', '', '', '154582840', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(254, '', '9 प्ले लिस्ट कैसे बनाए', '9 પ્લેલિસ્ટ કેવી રીતે બનાવવું	', '', '', '', '', '154582841', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(255, '', '10 यु टयूब में विडिओ एम्बेड कैसे करे', '10 યુ ટ્યુબમાં વિડીઓ એમ્બેડ કેવી રીતે કરવો		', '', '', '', '', '154582844', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(256, '', '11 यु टयूब में एम्बेड किया हुआ विडिओ कैसे ओतोप्ले करे', '11 યુ ટ્યુબમાં એમ્બેડ કરેલો વિડીઓ કેવી રીતે ઓટોપ્લે કરવો				', '', '', '', '', '154583940', '', '', '', '', 'Intermediate', '', '', '', '', 32, '2016-07-07 13:04:30'),
(257, '', '12 यु टयूब चेनल कैसे सबस्क्राइब करे', '12 યુ ટ્યુબ ચેનલ કેવી રીતે સબસ્ક્રાઇબ કરવી		', '', '', '', '', '154580769', '', '', '', '', 'Advanced', '', '', '', '', 32, '2016-07-07 13:04:30'),
(258, '', '13 यु टयूब चेनल का बेकअप कैसे ले', '13 યુ ટ્યુબ ચેનલનું બેકઅપ કેવી રીતે લેવું		', '', '', '', '', '154580768', '', '', '', '', 'Advanced', '', '', '', '', 32, '2016-07-07 13:04:30'),
(259, '', '14 यु टयूब में ऑफलाइन विडिओ कैसे देखे', '14 યુ ટ્યુબમાં ઓફલાઈન વિડીઓ કેવી રીતે જોવો			', '', '', '', '', '154580772', '', '', '', '', 'Advanced', '', '', '', '', 32, '2016-07-07 13:04:30'),
(260, '', '15 यु टयूब हिस्टरी कैसे डिलीट करे', '15 યુ ટ્યુબ હિસ્ટરી કેવી રીતે ડીલીટ કરવી		', '', '', '', '', '154580767', '', '', '', '', 'Advanced', '', '', '', '', 32, '2016-07-07 13:04:30'),
(261, '', '16 यु टयूब चेनल कैसे डिलीट करे', '16 યુ ટ્યુબ ચેનલ કેવી રીતે ડીલીટ કરવી		', '', '', '', '', '154580770', '', '', '', '', 'Advanced', '', '', '', '', 32, '2016-07-07 13:04:30'),
(262, '', '1 गूगल ट्रान्सलेट का परिचय', '1 ગુગલ ટ્રાન્સલેટનો પરિચય	', '', '', '', '', '154690090', '153875042', '', '', '', 'Beginner', '', '', '', '', 31, '2016-07-07 13:04:30'),
(263, '', '2 गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 1', '2 ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 1		', '', '', '', '', '154690396', '153875045', '', '', '', 'Beginner', '', '', '', '', 31, '2016-07-07 13:04:30'),
(264, '', '3 गूगल ट्रान्सलेट का परिचय मोबाइल के साथ 2', '3 ગુગલ ટ્રાન્સલેટનો પરિચય મોબાઇલ સાથે 2		', '', '', '', '', '154690394', '153875044', '', '', '', 'Beginner', '', '', '', '', 31, '2016-07-07 13:04:30'),
(265, '', 'टेली परिचय', '1 ટેલી પરિચય', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(266, '', 'टेली इन्टरफेस', '2 ટેલી ઇન્ટરફેસ', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(267, '', 'क्रिएटिंग कंपनी', '3 ક્રિએટીંગ કંપની', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(268, '', 'विविध की', '4 વિવિધ કી', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(269, '', 'बेलेन्स शिट', '5 બેલેન્સ શીટ', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(270, '', 'डेबिट और क्रेडिट के नियम', '6 ડેબીટ અને ક્રેડીટ ના નિયમ	', '', '', '', '', '', '', '', '', '', 'Beginner', '', '', '', '', 23, '2016-07-07 13:04:30'),
(271, '', 'भुगतान वाउचर', '7 ચુકવણી વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(272, '', 'प्राप्ति वाउचर', '8 રસીદ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(273, '', 'खरीद वाउचर', '9 ખરીદ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(274, '', 'बिक्री वाउचर', '10 વેચાણ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(275, '', 'कोंट्रा वाउचर', '11 કોન્ટ્રા વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(276, '', 'पत्रिका का वाउचर', '12 જર્નલ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(277, '', 'क्रेडिट नोट वाउचर', '13 ક્રેડીટ નોટ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(278, '', 'डेबिट नोट वाउचर', '14 ડેબીટ નોટ વાઉચર', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(279, '', 'ज्ञापन और वैकल्पिक वाउचर', '15 મેમોરેન્ડમ અને વૈકલ્પિક વાઉચર	', '', '', '', '', '', '', '', '', '', 'Intermediate', '', '', '', '', 23, '2016-07-07 13:04:30'),
(280, '', 'इन्वेंटरी', '15 ઇન્વેન્ટરી', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(281, '', 'इन्वेंटरी ने साथ खरीदी बिक्री', '16 ઇન્વેન્ટરીની સાથે ખરીદ વેચાણ	', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(282, '', 'शारीरिक शेयर वाउचर - शेयर पत्रिका वाउचर', '17 શારીરિક સ્ટોક વાઉચર - સ્ટોક જર્નલ વાઉચર		', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(283, '', 'मल्टी यूनिट, एक्सपायरी डेट ने साथ शेयर', '18 મલ્ટી યુનિટ, એક્ષ્પાયરિ ડેટની સાથે સ્ટોક		', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(284, '', 'बेकअप, रिस्टोर, डिलीट', '19 બેકઅપ, રીસ્ટોર, ડીલીટ', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(285, '', 'बहू मुद्रा', '20 મલ્ટી ચલણ', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(286, '', 'लागत श्रेणी और लागत केन्द्र', '21 કિમત શ્રેણી અને કિમત કેન્દ્ર	', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(287, '', 'रिपोर्ट्स', '22 રીપોર્ટસ', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(288, '', 'डिस्प्ले', '23 ડિસ્પ્લે', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(289, '', 'प्रिंटिंग ऑप्शन', '24 પ્રિન્ટીંગ ઓપ્શન', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30'),
(290, '', 'शार्टकट की', '25 શોર્ટકટ કી', '', '', '', '', '', '', '', '', '', 'Advanced', '', '', '', '', 23, '2016-07-07 13:04:30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(25, 5, 1, '2016-07-25 14:25:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
