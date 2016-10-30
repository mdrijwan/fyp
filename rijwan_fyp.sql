-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2016 at 09:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rijwan_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_group`
--

CREATE TABLE `category_group` (
  `cat_id` int(10) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `group_description` varchar(255) NOT NULL,
  `group_image` varchar(45) NOT NULL,
  `group_set` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_group`
--

INSERT INTO `category_group` (`cat_id`, `group_id`, `group_name`, `group_description`, `group_image`, `group_set`) VALUES
(0, 15, 'Keyboard', 'Digital and Analogue Keyboard', '', ''),
(0, 16, 'Guitar', 'Digital and Analogue Guitar', '', ''),
(0, 17, 'Recording', 'Digital Sound Recording', '', ''),
(0, 18, 'Computer Audio', 'Sterio and Bass ', '', ''),
(0, 19, 'DJ and Sound Machines', 'Power Amps and Speakers and DJ Equipments', '', ''),
(0, 20, 'Drums', 'Acoustic and Electronic Drum Kits', '', ''),
(0, 22, 'Orchestral', 'Woodwind Instruments and Music Stands and Cases', '', ''),
(0, 25, 'Clearance', 'All Clearance Items here', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `type_description` varchar(200) NOT NULL,
  `type_image` varchar(200) NOT NULL,
  `type_link` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`cat_id`, `type_id`, `type_name`, `type_description`, `type_image`, `type_link`) VALUES
(54, 15, 'Keyboard Stands', 'Support your instrument with the perfect keyboard stand. zZounds has X-stands, Z-stands, tabletop stands, and cabinet-style stands to fit your keyboard.', '', ''),
(55, 16, 'Acoustic Guitars', 'We stock a wide range of acoustic, electro-acoustic and classical guitars, from leading brands.', '', ''),
(56, 16, 'Electric Guitars', 'From beginner to pro, shop for your next electric guitar at Dawsons Music. We stock a huge range online and in-store, including ever-popular solid-body guitars, to hollow-body guitars and archtops.', '', ''),
(57, 16, 'Bass Guitars', 'RMS has a wide variety of Bass Guitars. Fretless and Acoustic basses are also stocked, as are left-handed basses.', '', ''),
(58, 15, 'Digital Pianos', 'Digital Pianos are electronic musical instruments played using a keyboard. Modern digital pianos faithfully replicate the feel and sound of traditional acoustic pianos.', '', ''),
(59, 19, 'Power Amps', 'Various types of PAs', '', ''),
(60, 18, 'MIDI Interfaces', 'A dedicated MIDI interface is essential in today''s digital world for making vintage and new gear speak to each other.', '', ''),
(61, 18, 'Audio Interfaces', 'Audio Interfaces are an integral part of today''s modern studios, where the computer is often the engine powering the entire process. ', '', ''),
(62, 19, 'Speakers', 'Various types of Speakers', '', ''),
(63, 17, 'Microphones', 'Whether you need a small-diaphragm condenser microphone, a cardioid dynamic microphone, or dual diaphragm valve microphone, RMS has the microphone for you.', '', ''),
(64, 17, 'Digital Recorders', 'The rapid advances in digital technology have ensured that recorders of all types are commonplace in all manner of musical situations.', '', ''),
(65, 19, 'Turntables and CDJ', 'The DJ world was built upon the twin bedrocks of vinyl DJ turntables and CD decks, and the two are still commonly found at the beating heart of club DJ installs.', '', ''),
(66, 19, 'Mixers', 'Though DJ technology has transformed in recent years, at the heart of most DJ set-ups you will still find a mixer. ', '', ''),
(67, 22, 'Saxophones', 'Woodwind Instruments provide an integral role in everything from Jazz Bands, to Orchestras. ', '', ''),
(68, 22, 'Music Stands and Cases', 'A Music Stand and Case are, perhaps, the only items common to every player in an orchestra. Essential for holding the music to be played.', '', ''),
(69, 20, 'Acoustic Drum Kits', 'We have kits suitable from the professional through to the beginner, with more beginner kits from Essentials, Mirage and Stagg. ', '', ''),
(70, 20, 'Electronic Drum Kits', 'Electronic Drum Kits are electric versions of the traditional acoustic drum kits. These digital kits offer practical means of learning how to play the drums and are popular with beginners.', '', ''),
(71, 25, 'Clearance Items', 'Checkout our year end Clearance Sale. Until stock lasts.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `current_group`
--

CREATE TABLE `current_group` (
  `set_id` int(11) NOT NULL DEFAULT '1',
  `set_group` varchar(45) NOT NULL,
  `set_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_group`
--

INSERT INTO `current_group` (`set_id`, `set_group`, `set_date`) VALUES
(1, '15', '2015-04-06 23:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `pd_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_price` decimal(9,2) NOT NULL,
  `pd_weight` decimal(9,6) NOT NULL,
  `pd_qty` smallint(5) NOT NULL,
  `pd_image` varchar(200) NOT NULL,
  `pd_thumbnail` varchar(200) NOT NULL,
  `pd_thumbnail_L` varchar(200) NOT NULL,
  `pd_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pd_last_update` datetime NOT NULL,
  `pd_code` varchar(30) NOT NULL,
  `pd_dimension` varchar(200) NOT NULL,
  `pd_boardtype` varchar(200) NOT NULL,
  `pd_controllertype` varchar(200) NOT NULL,
  `pd_pcbtype` varchar(200) NOT NULL,
  `pd_support1` varchar(200) NOT NULL,
  `pd_support2` varchar(200) NOT NULL,
  `pd_support3` varchar(200) NOT NULL,
  `pd_spec1` varchar(200) NOT NULL,
  `pd_spec2` varchar(200) NOT NULL,
  `pd_spec3` varchar(200) NOT NULL,
  `pd_spec4` varchar(200) NOT NULL,
  `pd_spec5` varchar(200) NOT NULL,
  `pd_spec6` varchar(200) NOT NULL,
  `pd_spec7` varchar(200) NOT NULL,
  `pd_spec8` varchar(200) NOT NULL,
  `pd_spec9` varchar(200) NOT NULL,
  `pd_spec10` varchar(200) NOT NULL,
  `pd_bulletsymbol` varchar(45) NOT NULL DEFAULT '&#8226;',
  `pd_detaildownload` varchar(200) NOT NULL,
  `pd_detaildescription` varchar(200) NOT NULL,
  `pd_detaildescription1` varchar(200) NOT NULL,
  `pd_detaildescription2` varchar(200) NOT NULL,
  `pd_detaildescription3` varchar(300) NOT NULL,
  `pd_detaildescription4` varchar(300) NOT NULL,
  `pd_detaildescription5` varchar(300) NOT NULL,
  `pd_usermanual` varchar(200) NOT NULL,
  `pd_usmanual1` varchar(200) NOT NULL,
  `pd_usmanual2` varchar(200) NOT NULL,
  `pd_usmanual3` varchar(200) NOT NULL,
  `pd_usmanual4` varchar(300) NOT NULL,
  `pd_usmanual5` varchar(300) NOT NULL,
  `pd_relatedweblink` varchar(200) NOT NULL,
  `pd_rweblink1` varchar(200) NOT NULL,
  `pd_rweblink2` varchar(200) NOT NULL,
  `pd_rweblink3` varchar(200) NOT NULL,
  `pd_sourcecode` varchar(200) NOT NULL,
  `pd_scode1` varchar(200) NOT NULL,
  `pd_scode2` varchar(200) NOT NULL,
  `pd_scode3` varchar(200) NOT NULL,
  `pd_scode4` varchar(200) NOT NULL,
  `pd_scode5` varchar(200) NOT NULL,
  `pd_companyname` varchar(45) NOT NULL,
  `pd_seller` varchar(45) NOT NULL DEFAULT 'Sold by RMS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`pd_id`, `cat_id`, `pd_name`, `pd_description`, `pd_price`, `pd_weight`, `pd_qty`, `pd_image`, `pd_thumbnail`, `pd_thumbnail_L`, `pd_date`, `pd_last_update`, `pd_code`, `pd_dimension`, `pd_boardtype`, `pd_controllertype`, `pd_pcbtype`, `pd_support1`, `pd_support2`, `pd_support3`, `pd_spec1`, `pd_spec2`, `pd_spec3`, `pd_spec4`, `pd_spec5`, `pd_spec6`, `pd_spec7`, `pd_spec8`, `pd_spec9`, `pd_spec10`, `pd_bulletsymbol`, `pd_detaildownload`, `pd_detaildescription`, `pd_detaildescription1`, `pd_detaildescription2`, `pd_detaildescription3`, `pd_detaildescription4`, `pd_detaildescription5`, `pd_usermanual`, `pd_usmanual1`, `pd_usmanual2`, `pd_usmanual3`, `pd_usmanual4`, `pd_usmanual5`, `pd_relatedweblink`, `pd_rweblink1`, `pd_rweblink2`, `pd_rweblink3`, `pd_sourcecode`, `pd_scode1`, `pd_scode2`, `pd_scode3`, `pd_scode4`, `pd_scode5`, `pd_companyname`, `pd_seller`) VALUES
(11, 71, 'Epiphone EB-3 SG Bass Guitar', 'Following in the footsteps of the legendary SG, the EB-3 Bass Guitar uses the same body that made guitarists all over the world go weak at the knees in the late 1960â€™s. Built from mahogany the EB-3 provides rich, full tones in a lightweight, yet extremely resilient body.\r\n\r\nA mahogany neck using the popular SlimTaper neck profile, gives an amazing, comfortable feel; a much needed quality in any bass guitar. The EB-3 uses a serene rosewood fingerboard sporting 22 frets with stylish trapezoid inlays, for smooth transitioning all across the 34 inch scale length.', '1000.00', '0.000000', 3, 'epiphone-eb-3-ch.jpg', 'batch_epiphone-eb-3-ch.jpg', '', '2016-10-30 03:48:07', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Epiphone EB-3 SG Bass Guitar brings forth a modern reinvention of a classic guitar. This bass is jam packed with sustain, tone, and super-cool.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(12, 71, 'HK Audio Elements EA 600 Power Amp', 'The power amp module is ventilated from the front. A rotary selector lets you choose a special EQ setting to match the number of connected E 435s and optimize the frequency response for a column of that height. The HK Audio Elements PA system is comprised of 6 elements, which can be combined in hundreds of different configurations to cater for every situation, no matter how much or how little sound reinforcement is needed.', '1250.00', '0.000000', 10, 'hk_audio_elements_ea_600_power_amp.jpg', 'batch_hk_audio_elements_ea_600_power_amp.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'Housed in an enclosure that shares the same design as the mid/ high unit, the HK Audio EA 600 amp module delivers 600 watts at 4 ohms. I', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(13, 71, 'Mirage MS5 Conductor Style Music Stand', 'Whether you are playing in a standing or seated position, the height adjustment dimensions range from 900 to 1500 mm. Wherever you set your desired height, the central support feels reassuringly sturdy, whilst the large clasps are very comfortable to adjust. As previously noted, the desk angle can be set into a flat position, right up to a fully vertical position.', '70.00', '0.000000', 20, 'am-108412.jpg', 'batch_am-108412.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Mirage MS5 Conductor Style Music Stand in Black is an incredibly strong and reliable music stand that is designed to hold sheet music, books, tablets, and even some laptops.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(14, 71, 'Boss BR800 8-Track Digital Recorder', 'Recording need not be a complex chore, the Boss EZ record function quickly guides you through the essential steps so you can record with incredible speed. Song Sketch provides rapid stereo recording of your ideas, when you just want to get going and lay down a simple track without having to worry about the rest. A built-in drum machine lets solo artists record full tracks, lets bands record quick demos and lets performers build up quality backing tracks.', '1200.00', '0.000000', 15, 'boss_digital_recorder.jpg', 'batch_boss_digital_recorder.jpg', '', '2016-10-30 04:35:44', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Boss BR800 8-Track Digital Recorder is a powerful production studio, interface, control surface and location recorder all rolled into one simple to use device.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(82, 54, 'SXKS Single X Keyboard Stand', 'Unless you want to drill strap buttons onto your synth and rock out Revenge of the Nerds-style, you''re gonna need something to put that keyboard on. Short of stealing a bunch of milk crates and lashing them together to form a teetering plastic totem, this World Tour SXKS Single X keyboard stand is the most cost-effective way to get your instrument off the ground -- and it''s way more legal!', '500.00', '1.000000', 5, '4ef102e9b6ccdd1e42041c926e127821.jpg', 'e0dd186d42934a55d2a7f0b2a138c362.jpg', '', '2015-04-06 23:25:06', '0000-00-00 00:00:00', '	A0000023', '10', '', '', '', '', '', '', 'Got a keyboard? Support it with this super-affordable X-stand. The World Tour SXKs stand''s latching clutch locks in place to adjust to the right height.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(83, 55, 'The Fender Sonoran mini acoustic guitar', 'The reverberant agathis top complements the back and sides beautifully by projecting the sound with incredible clarity and force. Fitted to the body is a sturdy mahogany neck, married to a lush rosewood fingerboard. The neck provides the perfect surface to allow the strings to resonate along for maximum sustain. The fingerboard is a delight to play, yielding notes with articulation and precision.', '550.00', '0.000000', 6, '909de3d219494f238c24b2753d3f6868.jpg', 'batch_909de3d219494f238c24b2753d3f6868.jpg', '', '2016-10-30 03:08:49', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Fender Sonoran mini acoustic guitar is an excellent travel companion; as well as being a great guitar for beginners, children or people who prefer to play along a shorter scale length.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(84, 56, 'Epiphone SG Special Electric Guitar', 'This guitar, with its devilish double-cutaway design, reigns supreme in access to all of its 22 frets. The bolt-on hard maple neck provides rigidity and durability to create a delightfully playable feel, while the SlimTaper neck profile is fast and comfortable. The sumptuous rosewood fingerboard carries 22-frets that are adorned with stylish dot position inlays. A pair of hot open-coil, noise-free Humbucking pickups voiced specifically for the bridge position (700T) and neck position (650R) give you authentic rock tone with just the right amount of grit and growl.', '700.00', '0.000000', 5, 'epiphone-sg-special.jpg', 'batch_epiphone-sg-special.jpg', '', '2016-10-30 03:33:35', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Epiphone SG Special Electric Guitar in a sumptuous, vintage cherry employs a range of features that show off just why Epiphone are so popular amongst guitarists all over the world.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(85, 57, 'Epiphone EB-3 SG Bass Guitar', 'Following in the footsteps of the legendary SG, the EB-3 Bass Guitar uses the same body that made guitarists all over the world go weak at the knees in the late 1960â€™s. Built from mahogany the EB-3 provides rich, full tones in a lightweight, yet extremely resilient body.\r\n\r\nA mahogany neck using the popular SlimTaper neck profile, gives an amazing, comfortable feel; a much needed quality in any bass guitar. The EB-3 uses a serene rosewood fingerboard sporting 22 frets with stylish trapezoid inlays, for smooth transitioning all across the 34 inch scale length.', '1200.00', '0.000000', 3, 'epiphone-eb-3-ch.jpg', 'batch_epiphone-eb-3-ch.jpg', '', '2016-10-30 03:48:07', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Epiphone EB-3 SG Bass Guitar brings forth a modern reinvention of a classic guitar. This bass is jam packed with sustain, tone, and super-cool.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(86, 58, 'Kawai KDP90 Digital Piano', 'To compliment the painstaking effort that has gone into the feel of the keyboard system, the KDP90 captures the beautiful sound of Kawai’s highly acclaimed EX concert grand piano, with all 88 keys of this exceptional instrument meticulously recorded, analysed and faithfully reproduced using proprietary harmonic imaging technology. Further to this, the KDP90 contains other high quality instruments including electronic pianos, organs, chorale and synth.', '3200.00', '0.000000', 2, 'kawai-kdp902.jpg', 'batch_kawai-kdp902.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Kawai KDP-90 delivers a completely authentic playing experience thanks to its 88 note, advanced hammer action IV-F keyboard system.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(88, 60, 'Alesis IO Dock II Recording Interface', 'The interface provides two input, two output connectivity. The two inputs are via XLR combo jacks. These can be either mic inputs (with phantom power) or line inputs, with input 1 able to be switched to a high impedance guitar input. The guitar preamp has been subject to some fine-tuning since the original device, with improved accuracy and sonic performance. Each input has its own level control.', '750.00', '0.000000', 10, 'alesis_MIDI.jpg', 'batch_alesis_MIDI.jpg', '', '2016-10-30 04:17:42', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Alesis IO Dock II picks up the baton from its highly innovative predecessor, and delivers a unit that is even more flexible and convenient. ', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(89, 61, 'M-Audio Vocal Studio Pro 2 Complete Recording Package', 'The M-Audio Vocal Studio Pro 2 has everything you need to record your vocals in one place, be it for capturing vocals and guitar for a track, podcasting or creating voiceovers for multimedia projects. High performance hardware and easy-to-use software come together in this pack to make your life easy and your transition into recording a simple one.', '600.00', '0.000000', 10, 'm-audio_vocal_studio_pro_2.jpg', 'batch_m-audio_vocal_studio_pro_2.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'Aside from a computer and your talent everything you need is in the box.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(90, 64, 'Boss BR800 8-Track Digital Recorder', 'Recording need not be a complex chore, the Boss EZ record function quickly guides you through the essential steps so you can record with incredible speed. Song Sketch provides rapid stereo recording of your ideas, when you just want to get going and lay down a simple track without having to worry about the rest. A built-in drum machine lets solo artists record full tracks, lets bands record quick demos and lets performers build up quality backing tracks.', '1500.00', '0.000000', 15, 'boss_digital_recorder.jpg', 'batch_boss_digital_recorder.jpg', '', '2016-10-30 04:35:44', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Boss BR800 8-Track Digital Recorder is a powerful production studio, interface, control surface and location recorder all rolled into one simple to use device.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(91, 63, 'Sennheiser E935 Cardioid Vocal Microphone', 'The Sennheiser E935 Vocal Mic is designed to deliver excellent sound quality for all performances be it presentations, solo performances or with a full band. You can rest assured that you will be using a rugged microphone that will last gig after gig whilst all the while cutting through mix with true clarity. The Sennheiser E935 is built so well, it is often the first choice for PA rental companies. Whether it''s for live performances such as presentations, or more studio orientated work like podcasters or voice overs, the Sennheiser E935 Vocal Microphone is sure to deliver.', '400.00', '0.000000', 20, 'sennheiser_e935_microphone.jpg', 'batch_sennheiser_e935_microphone.jpg', '', '2016-10-30 04:37:04', '0000-00-00 00:00:00', '	', '', '', '', '', '', '', '', 'The Sennheiser E935 Vocal Mic contains a shock-mounted capsule so handling noise will be kept at an absolute minimum and the cardioid pickup pattern ensures insulation from other on-stage signals.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(92, 62, 'Alto Truesonic TS112 Passive PA Speaker', 'The Truesonic TS112 speaker cabinet has been designed with versatility and longevity at the forefront. They feature a durable, lightweight polypropylene enclosure that is both mountable and flyable depending on the needed application. In addition, the trapezoid design keeps resonance at an absolute minimum to keep the sound as pure as possible.', '800.00', '0.000000', 5, 'alto_truesonic_ts112_passive_pa_speaker.jpg', 'batch_alto_truesonic_ts112_passive_pa_speaker.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Alto Truesonic TS112 passive PA speaker is loaded with premium features and built to with stand a life on the road.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(93, 59, 'HK Audio Elements EA 600 Power Amp', 'The power amp module is ventilated from the front. A rotary selector lets you choose a special EQ setting to match the number of connected E 435s and optimize the frequency response for a column of that height. The HK Audio Elements PA system is comprised of 6 elements, which can be combined in hundreds of different configurations to cater for every situation, no matter how much or how little sound reinforcement is needed.', '1500.00', '0.000000', 10, 'hk_audio_elements_ea_600_power_amp.jpg', 'batch_hk_audio_elements_ea_600_power_amp.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'Housed in an enclosure that shares the same design as the mid/ high unit, the HK Audio EA 600 amp module delivers 600 watts at 4 ohms. I', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(94, 68, 'Mirage MS5 Conductor Style Music Stand', 'Whether you are playing in a standing or seated position, the height adjustment dimensions range from 900 to 1500 mm. Wherever you set your desired height, the central support feels reassuringly sturdy, whilst the large clasps are very comfortable to adjust. As previously noted, the desk angle can be set into a flat position, right up to a fully vertical position.', '100.00', '0.000000', 20, 'am-108412.jpg', 'batch_am-108412.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Mirage MS5 Conductor Style Music Stand in Black is an incredibly strong and reliable music stand that is designed to hold sheet music, books, tablets, and even some laptops.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(95, 67, 'Yamaha YAS-280 Alto Saxophone', 'Building on the success of the YAS-275 the Yamaha YAS-280 Alto Sax has an even more stable neck receiver, with a quicker response. Also, enhancements to the low B-C# connection has made response at the low range clearer and the closing of the low C# key consistent. Along with its low weight, the Yamaha YAS280 Alto Saxophone is also more comfortable to play thanks to an adjustable thumb-rest.', '3500.00', '0.000000', 7, 'yamaha-yas-280-alto-saxophone-lacquered.jpg', 'batch_yamaha-yas-280-alto-saxophone-lacquered.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'A superb beginners saxophone the Yamaha YAS 280 has been crafted to suit young learners; with its ease of play, low weight and ergonomic design.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(96, 69, 'Tama Rhythm Mate Acoustic Drum Kit - Galaxy Silver', 'The Tama Rhythm Mate gives you a 22 inch kick drum, 2 mounted toms, a floor tom and a snare drum to begin rocking out on. Unlike a lot of entry level kits, the Rhythm mate has an exceptionally wide tuning range so that you can achieve everything from the dead heavy thud of 70''s rock kits through to vibrant pop kit sounds of today.', '2000.00', '0.000000', 4, 'galaxy_silver_5.jpg', 'batch_galaxy_silver_5.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'Tama, a highly respected name amongst drummers all over the world, never fail to produce consistently good kits for players of all levels.', '', '', '', '', '', '', '', '', '', '&amp;#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(97, 70, 'Roland TD-11KV V-Drums Electronic Drum Kit', 'Bringing a more natural drumming experience to Roland’s entry-level electronic drum kits the Roland TD-11KV’s compact TD-11 Sound Module is powered by the SuperNATURAL sound engine. Along with being easy to operate this module also features Behaviour Modelling Technology. This technology gives you even better response than was previously available at this price and, by modelling distinct instrument behaviours, gives more natural, expressive sounds.', '5000.00', '0.000000', 3, 'roland-td-11kv-v-drums-electronic-drum-kit.jpg', 'batch_roland-td-11kv-v-drums-electronic-drum-kit.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'A fantastic addition to the entry-level range, the Roland TD-11KV V-Drums Electronic Drum Kit gives you an improvement in playability and performance.', '', '', '', '', '', '', '', '', '', '&amp;#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(98, 65, 'Pioneer DDJ-RZX 4-Channel Professional Rekordbox DJ Controller', 'The 4-channel controller is composed of two deck controllers that sandwich a central mixing console. There are three 7-inch touch screen displays that provide direct access to track information such as: titles, BPM and key using deck display mode, and enlarged waveforms for each track, including loops and Hot Cues in mixer display mode. The large aluminium jog wheels are optimised to ensure the subtle nuances of your scratch technique is translated with the utmost accuracy. With a selection of buttons, knobs, faders, a pair of large jog wheels, and a club-quality magnetic crossfader at your disposal, you have everything on-hand to ensure smooth and seamless performances.', '10000.00', '0.000000', 2, 'pioneer_ddj-rzx_4-channel_professional_rekordbox_dj_controller_-_top.jpg', 'batch_pioneer_ddj-rzx_4-channel_professional_rekordbox_dj_controller_-_top.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Pioneer DDJ-RZX 4-Channel Professional Rekordbox DJ and Video Controller offers is a complete system that offers unparalleled control over your audio/visual performance.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS'),
(99, 66, 'Pioneer DJM-2000 Nexus', 'The ProDJ LAN connection allows you to connect seamlessly to 4 CDJ players or turntables and two laptops so you will never be short of audio sources and thanks to the new sync master you can control the bpm of your CDJ''s right from the DJM 2000 for ultimate control. Add to this, beat slice for slicing and arranging tracks in real time, quantized beat effects, live sampler and studio grade FX and you have the ultimate pro DJ mixer. It retains the 5.8-inch LCD multi-touch display from its predecessor and offers a multitude of ways to manipulate and mixup the music.. As the nerve centre for your mix, the display can also be used to control the 3 innovative performance modes – frequency mix, enhanced side chaining remix mode and MIDI mode for ultimate originality.', '8000.00', '0.000000', 2, 'pioneer_djm-2000_nexus.jpg', 'batch_pioneer_djm-2000_nexus.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 'The Pioneer DJM-2000 Nexus is the professional DJs choice for ultimate high-end performance and quality in clubs all over the world.', '', '', '', '', '', '', '', '', '', '&#8226;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sold by RMS');

-- --------------------------------------------------------

--
-- Table structure for table `symbol_table`
--

CREATE TABLE `symbol_table` (
  `sym_id` int(10) UNSIGNED NOT NULL,
  `sym_bullet` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symbol_table`
--

INSERT INTO `symbol_table` (`sym_id`, `sym_bullet`) VALUES
(1, '&#8226;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `ct_id` int(10) UNSIGNED NOT NULL,
  `pd_id` int(10) UNSIGNED NOT NULL,
  `ct_qty` mediumint(8) UNSIGNED NOT NULL DEFAULT '1',
  `ct_session_id` varchar(45) NOT NULL,
  `ct_date` datetime NOT NULL,
  `ct_weight` decimal(5,2) NOT NULL,
  `cart_qty` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ct_id`, `pd_id`, `ct_qty`, `ct_session_id`, `ct_date`, `ct_weight`, `cart_qty`) VALUES
(119, 82, 1, 'kuvfgbmqq56njqlkl2t3m5j9g7', '2015-04-06 23:36:31', '2.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `cy_id` int(10) UNSIGNED NOT NULL,
  `cy_code` varchar(3) NOT NULL,
  `cy_symbol` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`cy_id`, `cy_code`, `cy_symbol`) VALUES
(1, 'EUR', '&#8364;'),
(2, 'GBP', '&pound;'),
(3, 'JPY', '&yen;'),
(4, 'USD', '$'),
(5, 'MYR', 'RM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `od_date` datetime NOT NULL,
  `od_last_update` datetime NOT NULL,
  `od_status` enum('New','Paid','Shipped','Completed','Cancelled') NOT NULL,
  `od_memo` varchar(300) NOT NULL,
  `od_email` varchar(100) NOT NULL,
  `od_shipping_first_name` varchar(45) NOT NULL,
  `od_shipping_last_name` varchar(45) NOT NULL,
  `od_shipping_address1` varchar(200) NOT NULL,
  `od_shipping_address2` varchar(200) NOT NULL,
  `od_shipping_phone` varchar(45) NOT NULL,
  `od_shipping_city` varchar(45) NOT NULL,
  `od_shipping_state` varchar(45) NOT NULL,
  `od_shipping_postal_code` varchar(45) NOT NULL,
  `od_shipping_country` varchar(45) NOT NULL,
  `od_shipping_cost` decimal(5,2) NOT NULL,
  `od_payment_first_name` varchar(45) NOT NULL,
  `od_payment_last_name` varchar(45) NOT NULL,
  `od_payment_address1` varchar(100) NOT NULL,
  `od_payment_address2` varchar(100) NOT NULL,
  `od_payment_phone` varchar(45) NOT NULL,
  `od_payment_city` varchar(45) NOT NULL,
  `od_payment_state` varchar(45) NOT NULL,
  `od_payment_postal_code` varchar(45) NOT NULL,
  `od_payment_country` varchar(45) NOT NULL,
  `od_servicecharge` decimal(5,2) NOT NULL,
  `od_shippingtoshop` decimal(5,2) NOT NULL,
  `od_totalamount` decimal(5,2) NOT NULL,
  `od_subtotal` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `pd_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `od_qty` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipmentcost`
--

CREATE TABLE `tbl_shipmentcost` (
  `ship_id` int(11) NOT NULL,
  `sc_name_country` varchar(45) NOT NULL,
  `sc_country` varchar(45) NOT NULL,
  `sc_fwp` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sc_adp` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sc_realweight` decimal(5,2) NOT NULL DEFAULT '0.50',
  `sc_set` varchar(3) NOT NULL DEFAULT 'NO',
  `sc_comment` varchar(1000) NOT NULL DEFAULT '0.5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipmentcost`
--

INSERT INTO `tbl_shipmentcost` (`ship_id`, `sc_name_country`, `sc_country`, `sc_fwp`, `sc_adp`, `sc_realweight`, `sc_set`, `sc_comment`) VALUES
(1, 'Afghanistan', 'AF', '10.00', '5.00', '0.50', 'NO', ''),
(2, 'Albania', 'AL', '100.00', '30.00', '0.50', 'NO', ''),
(3, 'Algeria', 'DZ', '100.00', '50.00', '0.50', 'NO', ''),
(4, 'American Samoa', 'AS', '500.00', '0.00', '0.50', 'NO', ''),
(5, 'Andorra', 'AD', '0.00', '0.00', '0.50', 'NO', ''),
(6, 'Angola', 'AO', '0.00', '0.00', '0.50', 'NO', ''),
(7, 'Anguilla', 'AI', '0.00', '0.00', '0.50', 'NO', ''),
(8, 'Antarctica', 'AQ', '0.00', '0.00', '0.50', 'NO', ''),
(9, 'Antigua and Barbuda', 'AG', '0.00', '0.00', '0.50', 'NO', ''),
(10, 'Argentina', 'AR', '0.00', '0.00', '0.50', 'NO', ''),
(11, 'Armenia', 'AM', '0.00', '0.00', '0.50', 'NO', ''),
(12, 'Aruba', 'AW', '0.00', '0.00', '0.50', 'NO', ''),
(13, 'Australia', 'AU', '156.00', '34.00', '0.50', 'NO', ''),
(14, 'Austria', 'AT', '0.00', '0.00', '0.50', 'NO', ''),
(15, 'Azerbaijan', 'AZ', '0.00', '0.00', '0.50', 'NO', ''),
(16, 'Bahamas', 'BS', '0.00', '0.00', '0.50', 'NO', ''),
(17, 'Bahrain', 'BH', '0.00', '0.00', '0.50', 'NO', ''),
(18, 'Bangladesh', 'BD', '75.00', '30.00', '0.50', 'NO', ''),
(19, 'Barbados', 'BB', '0.00', '0.00', '0.50', 'NO', ''),
(20, 'Belarus', 'BY', '0.00', '0.00', '0.50', 'NO', ''),
(21, 'Belgium', 'BE', '168.00', '19.00', '0.50', 'NO', ''),
(22, 'Belize', 'BZ', '0.00', '0.00', '0.50', 'NO', ''),
(23, 'Benin', 'BJ', '0.00', '0.00', '0.50', 'NO', ''),
(24, 'Bermuda', 'BM', '0.00', '0.00', '0.50', 'NO', ''),
(25, 'Bhutan', 'BT', '156.00', '34.00', '0.50', 'NO', ''),
(26, 'Bolivia', 'BO', '0.00', '0.00', '0.50', 'NO', ''),
(27, 'Bosnia and Herzegowina', 'BA', '0.00', '0.00', '0.50', 'NO', ''),
(28, 'Botswana', 'BW', '0.00', '0.00', '0.50', 'NO', ''),
(29, 'Bouvet Island', 'BV', '0.00', '0.00', '0.50', 'NO', ''),
(30, 'Brazil', 'BR', '0.00', '0.00', '0.50', 'NO', ''),
(31, 'British Indian Ocean Territory', 'IO', '0.00', '0.00', '0.50', 'NO', ''),
(32, 'Brunei Darussalam', 'BN', '0.00', '0.00', '0.50', 'NO', ''),
(33, 'Bulgaria', 'BG', '0.00', '0.00', '0.50', 'NO', ''),
(34, 'Burkina Faso', 'BF', '0.00', '0.00', '0.50', 'NO', ''),
(35, 'Burundi', 'BI', '0.00', '0.00', '0.50', 'NO', ''),
(36, 'Cambodia', 'KH', '75.00', '33.00', '0.50', 'NO', ''),
(37, 'Cameroon', 'CM', '0.00', '0.00', '0.50', 'NO', ''),
(38, 'Canada', 'CA', '156.00', '41.00', '0.50', 'NO', ''),
(39, 'Cape Verde', 'CV', '0.00', '0.00', '0.50', 'NO', ''),
(40, 'Cayman Islands', 'KY', '0.00', '0.00', '0.50', 'NO', ''),
(41, 'Central African Republic', 'CF', '0.00', '0.00', '0.50', 'NO', ''),
(42, 'Chad', 'TD', '0.00', '0.00', '0.50', 'NO', ''),
(43, 'Chile', 'CL', '0.00', '0.00', '0.50', 'NO', ''),
(44, 'China', 'CN', '75.00', '33.00', '0.50', 'NO', ''),
(45, 'Christmas Island', 'CX', '0.00', '0.00', '0.50', 'NO', ''),
(46, 'Cocos (Keeling) Islands', 'CC', '0.00', '0.00', '0.50', 'NO', ''),
(47, 'Colombia', 'CO', '0.00', '0.00', '0.50', 'NO', ''),
(48, 'Comoros', 'KM', '0.00', '0.00', '0.50', 'NO', ''),
(49, 'Congo', 'CG', '0.00', '0.00', '0.50', 'NO', ''),
(50, 'Congo, the Democratic Republic of the', 'CD', '0.00', '0.00', '0.50', 'NO', ''),
(51, 'Cook Islands', 'CK', '0.00', '0.00', '0.50', 'NO', ''),
(52, 'Costa Rica', 'CR', '0.00', '0.00', '0.50', 'NO', ''),
(53, 'Cote d''Ivoire', 'CI', '0.00', '0.00', '0.50', 'NO', ''),
(54, 'Croatia (Hrvatska', 'HR', '0.00', '0.00', '0.50', 'NO', ''),
(55, 'Cuba', 'CU', '0.00', '0.00', '0.50', 'NO', ''),
(56, 'Cyprus', 'CY', '0.00', '0.00', '0.50', 'NO', ''),
(57, 'Czech Republic', 'CZ', '0.00', '0.00', '0.50', 'NO', ''),
(58, 'Denmark', 'DK', '0.00', '0.00', '0.50', 'NO', ''),
(59, 'Djibouti', 'DJ', '0.00', '0.00', '0.50', 'NO', ''),
(60, 'Dominica', 'DM', '0.00', '0.00', '0.50', 'NO', ''),
(61, 'Dominican Republic', 'DO', '0.00', '0.00', '0.50', 'NO', ''),
(62, 'East Timor', 'TP', '0.00', '0.00', '0.50', 'NO', ''),
(63, 'Ecuador', 'EC', '0.00', '0.00', '0.50', 'NO', ''),
(64, 'Egypt', 'EG', '0.00', '0.00', '0.50', 'NO', ''),
(65, 'El Salvador', 'SV', '0.00', '0.00', '0.50', 'NO', ''),
(66, 'Equatorial Guinea', 'GQ', '0.00', '0.00', '0.50', 'NO', ''),
(67, 'Eritrea', 'ER', '0.00', '0.00', '0.50', 'NO', ''),
(68, 'Estonia', 'EE', '0.00', '0.00', '0.50', 'NO', ''),
(69, 'Ethiopia', 'ET', '0.00', '0.00', '0.50', 'NO', ''),
(70, 'Falkland Islands (Malvinas)', 'FK', '0.00', '0.00', '0.50', 'NO', ''),
(71, 'Faroe Islands', 'FO', '0.00', '0.00', '0.50', 'NO', ''),
(72, 'Fiji', 'FJ', '0.00', '0.00', '0.50', 'NO', ''),
(73, 'Finland', 'FI', '0.00', '0.00', '0.50', 'NO', ''),
(74, 'France', 'FR', '228.00', '48.00', '0.50', 'NO', ''),
(75, 'France, Metropolitan', 'FX', '228.00', '48.00', '0.50', 'NO', ''),
(76, 'French Guiana', 'GF', '228.00', '48.00', '0.50', 'NO', ''),
(77, 'French Polynesia', 'PF', '228.00', '48.00', '0.50', 'NO', ''),
(78, 'French Southern Territories', 'TF', '228.00', '48.00', '0.50', 'NO', ''),
(79, 'Gabon', 'GA', '0.00', '0.00', '0.50', 'NO', ''),
(80, 'Gambia', 'GM', '0.00', '0.00', '0.50', 'NO', ''),
(81, 'Georgia', 'GE', '0.00', '0.00', '0.50', 'NO', ''),
(82, 'Germany', 'DE', '228.00', '48.00', '0.50', 'NO', ''),
(83, 'Ghana', 'GH', '0.00', '0.00', '0.50', 'NO', ''),
(84, 'Gibraltar', 'GI', '0.00', '0.00', '0.50', 'NO', ''),
(85, 'Greece', 'GR', '0.00', '0.00', '0.50', 'NO', ''),
(86, 'Greenland', 'GL', '0.00', '0.00', '0.50', 'NO', ''),
(87, 'Grenada', 'GD', '0.00', '0.00', '0.50', 'NO', ''),
(88, 'Guadeloupe', 'GP', '0.00', '0.00', '0.50', 'NO', ''),
(89, 'Guam', 'GU', '0.00', '0.00', '0.50', 'NO', ''),
(90, 'Guatemala', 'GT', '0.00', '0.00', '0.50', 'NO', ''),
(91, 'Guinea', 'GN', '0.00', '0.00', '0.50', 'NO', ''),
(92, 'Guinea-Bissau', 'GW', '0.00', '0.00', '0.50', 'NO', ''),
(93, 'Guyana', 'GY', '0.00', '0.00', '0.50', 'NO', ''),
(94, 'Haiti', 'HT', '0.00', '0.00', '0.50', 'NO', ''),
(95, 'Heard and Mc Donald Islands', 'HM', '0.00', '0.00', '0.50', 'NO', ''),
(96, 'Holy See (Vatican City State)', 'VA', '0.00', '0.00', '0.50', 'NO', ''),
(97, 'Honduras', 'HM', '0.00', '0.00', '0.50', 'NO', ''),
(98, 'Hong Kong', 'HK', '63.00', '26.00', '0.50', 'NO', ''),
(99, 'Hungary', 'HU', '0.00', '0.00', '0.50', 'NO', ''),
(100, 'Iceland', 'IS', '0.00', '0.00', '0.50', 'NO', ''),
(101, 'India', 'IN', '94.00', '47.00', '0.50', 'NO', ''),
(102, 'Indonesia', 'ID', '63.00', '26.00', '0.50', 'NO', ''),
(103, 'Iran (Islamic Republic of)', 'IR', '0.00', '0.00', '0.50', 'NO', ''),
(104, 'Iraq', 'IQ', '0.00', '0.00', '0.50', 'NO', ''),
(105, 'Ireland', 'IE', '0.00', '0.00', '0.50', 'NO', ''),
(106, 'Israel', 'IL', '0.00', '0.00', '0.50', 'NO', ''),
(107, 'Italy', 'IT', '0.00', '0.00', '0.50', 'NO', ''),
(108, 'Jamaica', 'JM', '0.00', '0.00', '0.50', 'NO', ''),
(109, 'Japan', 'JP', '164.00', '41.00', '0.50', 'NO', ''),
(110, 'Jordan', 'JO', '0.00', '0.00', '0.50', 'NO', ''),
(111, 'Kazakhstan', 'KZ', '0.00', '0.00', '0.50', 'NO', ''),
(112, 'Kenya', 'KE', '0.00', '0.00', '0.50', 'NO', ''),
(113, 'Kiribati', 'KI', '0.00', '0.00', '0.50', 'NO', ''),
(114, 'Korea, Democratic People''s Republic of', 'KP', '0.00', '0.00', '0.50', 'NO', ''),
(115, 'Korea, Republic of', 'KR', '156.00', '34.00', '0.50', 'NO', ''),
(116, 'Kuwait', 'KW', '0.00', '0.00', '0.50', 'NO', ''),
(117, 'Kyrgyzstan', 'KG', '0.00', '0.00', '0.50', 'NO', ''),
(118, 'Lao People''s Democratic Republic', 'LA', '0.00', '0.00', '0.50', 'NO', ''),
(119, 'Latvia', 'LV', '0.00', '0.00', '0.50', 'NO', ''),
(120, 'Lebanon', 'LB', '0.00', '0.00', '0.50', 'NO', ''),
(121, 'Lesotho', 'LS', '0.00', '0.00', '0.50', 'NO', ''),
(122, 'Liberia', 'LR', '0.00', '0.00', '0.50', 'NO', ''),
(123, 'Libyan Arab Jamahiriya', 'LY', '0.00', '0.00', '0.50', 'NO', ''),
(124, 'Liechtenstein', 'LI', '0.00', '0.00', '0.50', 'NO', ''),
(125, 'Lithuania', 'LT', '0.00', '0.00', '0.50', 'NO', ''),
(126, 'Luxembourg', 'LU', '0.00', '0.00', '0.50', 'NO', ''),
(127, 'Macau', 'MO', '0.00', '0.00', '0.50', 'NO', ''),
(128, 'Macedonia, The Former Yugoslav Republic of', 'MK', '0.00', '0.00', '0.50', 'NO', ''),
(129, 'Madagascar', 'MG', '0.00', '0.00', '0.50', 'NO', ''),
(130, 'Malawi', 'MW', '0.00', '0.00', '0.50', 'NO', ''),
(131, 'Malaysia', 'MY(ZONE1)', '12.00', '4.00', '0.50', 'YES', ''),
(132, 'Maldives', 'MV', '63.00', '26.00', '0.50', 'NO', ''),
(133, 'Mali', 'ML', '0.00', '0.00', '0.50', 'NO', ''),
(134, 'Malta', 'MT', '0.00', '0.00', '0.50', 'NO', ''),
(135, 'Marshall Islands', 'MH', '0.00', '0.00', '0.50', 'NO', ''),
(136, 'Martinique', 'MQ', '0.00', '0.00', '0.50', 'NO', ''),
(137, 'Mauritania', 'MR', '0.00', '0.00', '0.50', 'NO', ''),
(138, 'Mauritius', 'MR', '0.00', '0.00', '0.50', 'NO', ''),
(139, 'Mayotte', 'YT', '0.00', '0.00', '0.50', 'NO', ''),
(140, 'Mexico', 'MX', '0.00', '0.00', '0.50', 'NO', ''),
(141, 'Micronesia, Federated States of', 'FM', '0.00', '0.00', '0.50', 'NO', ''),
(142, 'Moldova, Republic of', 'MD', '0.00', '0.00', '0.50', 'NO', ''),
(143, 'Monaco', 'MC', '0.00', '0.00', '0.50', 'NO', ''),
(144, 'Mongolia', 'MN', '0.00', '0.00', '0.50', 'NO', ''),
(145, 'Montserrat', 'MS', '0.00', '0.00', '0.50', 'NO', ''),
(146, 'Morocco', 'MA', '0.00', '0.00', '0.50', 'NO', ''),
(147, 'Mozambique', 'MZ', '0.00', '0.00', '0.50', 'NO', ''),
(148, 'Myanmar', 'MM', '0.00', '0.00', '0.50', 'NO', ''),
(149, 'Namibia', 'NA', '0.00', '0.00', '0.50', 'NO', ''),
(150, 'Nauru', 'NR', '0.00', '0.00', '0.50', 'NO', ''),
(151, 'Nepal', 'NP', '0.00', '0.00', '0.50', 'NO', ''),
(152, 'Netherlands', 'NL', '0.00', '0.00', '0.50', 'NO', ''),
(153, 'Netherlands Antilles', 'AN', '0.00', '0.00', '0.50', 'NO', ''),
(154, 'New Caledonia', 'NC', '0.00', '0.00', '0.50', 'NO', ''),
(155, 'New Zealand', 'NZ', '156.00', '34.00', '0.50', 'NO', ''),
(156, 'Nicaragua', 'NI', '0.00', '0.00', '0.50', 'NO', ''),
(157, 'Niger', 'NE', '0.00', '0.00', '0.50', 'NO', ''),
(158, 'Nigeria', 'NG', '305.00', '105.00', '0.50', 'NO', ''),
(159, 'Niue', 'NU', '0.00', '0.00', '0.50', 'NO', ''),
(160, 'Norfolk Island', 'NF', '0.00', '0.00', '0.50', 'NO', ''),
(161, 'Northern Mariana Islands', 'MP', '0.00', '0.00', '0.50', 'NO', ''),
(162, 'Norway', 'NO', '0.00', '0.00', '0.50', 'NO', ''),
(163, 'Oman', 'OM', '0.00', '0.00', '0.50', 'NO', ''),
(164, 'Pakistan', 'PK', '0.00', '0.00', '0.50', 'NO', ''),
(165, 'Palau', 'PW', '0.00', '0.00', '0.50', 'NO', ''),
(166, 'Panama', 'PA', '0.00', '0.00', '0.50', 'NO', ''),
(167, 'Papua New Guinea', 'PG', '0.00', '0.00', '0.50', 'NO', ''),
(168, 'Paraguay', 'PY', '0.00', '0.00', '0.50', 'NO', ''),
(169, 'Peru', 'PE', '0.00', '0.00', '0.50', 'NO', ''),
(170, 'Philippines', 'PH', '0.00', '0.00', '0.50', 'NO', ''),
(171, 'Pitcairn', 'PN', '0.00', '0.00', '0.50', 'NO', ''),
(172, 'Poland', 'PL', '0.00', '0.00', '0.50', 'NO', ''),
(173, 'Portugal', 'PT', '0.00', '0.00', '0.50', 'NO', ''),
(174, 'Puerto Rico', 'PR', '0.00', '0.00', '0.50', 'NO', ''),
(175, 'Qatar', 'QA', '0.00', '0.00', '0.50', 'NO', ''),
(176, 'Reunion', 'RE', '0.00', '0.00', '0.50', 'NO', ''),
(177, 'Romania', 'RO', '228.00', '48.00', '0.50', 'NO', ''),
(178, 'Russian Federation', 'RU', '228.00', '48.00', '0.50', 'YES', ''),
(179, 'Rwanda', 'RW', '0.00', '0.00', '0.50', 'NO', ''),
(180, 'Saint Kitts and Nevis', 'KN', '0.00', '0.00', '0.50', 'NO', ''),
(181, 'Saint LUCIA', 'LC', '0.00', '0.00', '0.50', 'NO', ''),
(182, 'Saint Vincent and the Grenadines', 'VC', '0.00', '0.00', '0.50', 'NO', ''),
(183, 'Samoa', 'WS', '0.00', '0.00', '0.50', 'NO', ''),
(184, 'San Marino', 'SM', '0.00', '0.00', '0.50', 'NO', ''),
(185, 'Sao Tome and Principe', 'ST', '0.00', '0.00', '0.50', 'NO', ''),
(186, 'Saudi Arabia', 'SA', '0.00', '0.00', '0.50', 'NO', ''),
(187, 'Senegal', 'SN', '0.00', '0.00', '0.50', 'NO', ''),
(188, 'Seychelles', 'SY', '0.00', '0.00', '0.50', 'NO', ''),
(189, 'Sierra Leone', 'SL', '0.00', '0.00', '0.50', 'NO', ''),
(190, 'Singapore', 'SG', '63.00', '12.00', '1.00', 'YES', ''),
(191, 'Slovakia (Slovak Republic)', 'SK', '0.00', '0.00', '0.50', 'NO', ''),
(192, 'Slovenia', 'SI', '0.00', '0.00', '0.50', 'NO', ''),
(193, 'Solomon Islands', 'SB', '0.00', '0.00', '0.50', 'NO', ''),
(194, 'Somalia', 'SO', '0.00', '0.00', '0.50', 'NO', ''),
(195, 'South Africa', 'ZA', '0.00', '0.00', '0.50', 'NO', ''),
(196, 'South Georgia and the South Sandwich Islands', 'GS', '0.00', '0.00', '0.50', 'NO', ''),
(197, 'Spain', 'ES', '0.00', '0.00', '0.50', 'NO', ''),
(198, 'Sri Lanka', 'LK', '75.00', '28.00', '0.50', 'NO', ''),
(199, 'St. Helena', 'SH', '0.00', '0.00', '0.50', 'NO', ''),
(200, 'St. Pierre and Miquelon', 'PM', '0.00', '0.00', '0.50', 'NO', ''),
(201, 'Sudan', 'SD', '0.00', '0.00', '0.50', 'NO', ''),
(202, 'Suriname', 'SR', '0.00', '0.00', '0.50', 'NO', ''),
(203, 'Svalbard and Jan Mayen Islands', 'SJ', '0.00', '0.00', '0.50', 'NO', ''),
(204, 'Swaziland', 'SZ', '0.00', '0.00', '0.50', 'NO', ''),
(205, 'Sweden', 'SE', '0.00', '0.00', '0.50', 'NO', ''),
(206, 'Switzerland', 'CH', '0.00', '0.00', '0.50', 'NO', ''),
(207, 'Syrian Arab Republic', 'SY', '0.00', '0.00', '0.50', 'NO', ''),
(208, 'Taiwan, Province of China', 'TW', '65.00', '30.00', '0.50', 'NO', ''),
(209, 'Tajikistan', 'TZ', '0.00', '0.00', '0.50', 'NO', ''),
(210, 'Thailand', 'TH', '65.00', '30.00', '0.50', 'NO', ''),
(211, 'Togo', 'TG', '0.00', '0.00', '0.50', 'NO', ''),
(212, 'Tokelau', 'TK', '0.00', '0.00', '0.50', 'NO', ''),
(213, 'Tonga', 'TO', '0.00', '0.00', '0.50', 'NO', ''),
(214, 'Trinidad and Tobago', 'TT', '0.00', '0.00', '0.50', 'NO', ''),
(215, 'Tunisia', 'TN', '0.00', '0.00', '0.50', 'NO', ''),
(216, 'Turkey', 'TR', '0.00', '0.00', '0.50', 'NO', ''),
(217, 'Turkmenistan', 'TM', '0.00', '0.00', '0.50', 'NO', ''),
(218, 'Turks and Caicos Islands', 'TC', '0.00', '0.00', '0.50', 'NO', ''),
(219, 'Tuvalu', 'UG', '0.00', '0.00', '0.50', 'NO', ''),
(220, 'Ukraine', 'UA', '228.00', '48.00', '0.50', 'NO', ''),
(221, 'United Arab Emirates', 'AE', '128.00', '54.00', '0.50', 'NO', ''),
(222, 'United Kingdom', 'GB', '0.00', '0.00', '0.50', 'NO', ''),
(223, 'United States', 'US', '156.00', '41.00', '0.50', 'NO', ''),
(224, 'United States Minor Outlying Islands', 'UM', '0.00', '0.00', '0.50', 'NO', ''),
(225, 'Uruguay', 'UY', '0.00', '0.00', '0.50', 'NO', ''),
(226, 'Uzbekistan', 'UZ', '0.00', '0.00', '0.50', 'NO', ''),
(227, 'Vanuatu', 'VU', '0.00', '0.00', '0.50', 'NO', ''),
(228, 'Venezuela', 'VE', '0.00', '0.00', '0.50', 'NO', ''),
(229, 'Viet Nam', 'VN', '75.00', '28.00', '0.50', 'NO', ''),
(230, 'Virgin Islands (British)', 'VG', '0.00', '0.00', '0.50', 'NO', ''),
(231, 'Virgin Islands (U.S.)', 'VI', '0.00', '0.00', '0.50', 'NO', ''),
(232, 'Wallis and Futuna Islands', 'WF', '0.00', '0.00', '0.50', 'NO', ''),
(233, 'Western Sahara', 'EH', '0.00', '0.00', '0.50', 'NO', ''),
(234, 'Yemen', 'YE', '0.00', '0.00', '0.50', 'NO', ''),
(235, 'Yugoslavia', 'YU', '0.00', '0.00', '0.50', 'NO', ''),
(236, 'Zambia', 'ZM', '0.00', '0.00', '0.50', 'NO', ''),
(237, 'Zimbabwe', 'ZW', '0.00', '0.00', '0.50', 'NO', ''),
(238, 'Malaysia', 'MY(ZONE2)', '23.00', '4.00', '1.00', 'YES', ''),
(239, 'Malaysia', 'MY(ZONE3)', '35.00', '18.00', '1.00', 'YES', ''),
(240, 'Malaysia', 'MY(ZONE4)', '30.00', '15.00', '1.00', 'YES', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_config`
--

CREATE TABLE `tbl_shop_config` (
  `sc_name` varchar(50) NOT NULL,
  `sc_address` varchar(200) NOT NULL,
  `sc_phone` varchar(45) NOT NULL,
  `sc_email` varchar(100) NOT NULL,
  `sc_shipping_cost` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sc_currency` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `sc_order_email` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop_config`
--

INSERT INTO `tbl_shop_config` (`sc_name`, `sc_address`, `sc_phone`, `sc_email`, `sc_shipping_cost`, `sc_currency`, `sc_order_email`) VALUES
('Everblazing Creation', 'www.everblazingcreation.com', '', 'sales@everblazingcreation.com', '0.00', 5, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_regdate` datetime DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_regdate`, `user_last_login`) VALUES
(0, 'admin', 'password', NULL, '2016-10-30 19:52:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_group`
--
ALTER TABLE `category_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `current_group`
--
ALTER TABLE `current_group`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `symbol_table`
--
ALTER TABLE `symbol_table`
  ADD PRIMARY KEY (`sym_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`cy_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`od_id`,`pd_id`);

--
-- Indexes for table `tbl_shipmentcost`
--
ALTER TABLE `tbl_shipmentcost`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `tbl_shop_config`
--
ALTER TABLE `tbl_shop_config`
  ADD PRIMARY KEY (`sc_email`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_group`
--
ALTER TABLE `category_group`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `category_type`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `pd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `symbol_table`
--
ALTER TABLE `symbol_table`
  MODIFY `sym_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `ct_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `cy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `od_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_shipmentcost`
--
ALTER TABLE `tbl_shipmentcost`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
