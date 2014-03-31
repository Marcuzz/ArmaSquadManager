<?php
////////////////////////////////////////////////////////////////////////////////////
//                                                                                //
//						   		Code made by Marcuz                               //
//	   Feel free to modify, but remember to credit me as the original author!     //                                                                       
//                                                                                //
////////////////////////////////////////////////////////////////////////////////////

// This file contains an array of rank images gotten of Wikipedia as well as a system checking the players remark
// And if a rank is found it will put the rank image next to their name

	$rank_images = array('', 
	'img/ranks/Army-USA-OR-02-2014.svg.png', 
	'img/ranks/Army-USA-OR-03-2014.svg.png',
	'img/ranks/Army-USA-OR-04b.svg.png',
	'img/ranks/Army-USA-OR-04a.svg.png',
	'img/ranks/Army-USA-OR-05.svg',
	'img/ranks/Army-USA-OR-06.svg.png',
	'img/ranks/Army-USA-OR-07.svg.png',
	'img/ranks/Army-USA-OR-08b.svg.png',
	'img/ranks/Army-USA-OR-08a.svg',
	'img/ranks/Army-USA-OR-09c.svg.png',
	'img/ranks/Army-USA-OR-09b.svg.png',
	'img/ranks/Army-USA-OR-09a.svg.png',
	'img/ranks/US-Army-WO1.svg',
	'img/ranks/40px-US-Army-CW2.svg.png',
	'img/ranks/40px-US-Army-CW3.svg.png',
	'img/ranks/40px-US-Army-CW4.svg.png',
	'img/ranks/40px-US-Army-CW5.svg.png',
	'img/ranks/US-O1_insignia.svg.png',
	'img/ranks/First_Lieutenant_insignia.png',
	'img/ranks/534px-US-O3_insignia.svg.png',
	'img/ranks/Major_insignia.png',
	'img/ranks/Lieutenant_Colonel_insignia.png',
	'img/ranks/Colonel_insignia.png',
	'img/ranks/US-O7_insignia.svg.png',
	'img/ranks/US-O8_insignia.svg.png',
	'img/ranks/US-O9_insignia.svg.png',
	'img/ranks/US-O10_insignia.svg.png',
	'img/ranks/US-O11_insignia.svg');

	$ranks = array(
	'Private', 
	'Private_2', 
	'Private_First_Class', 
	'Specialist',  
	'Corporal', 
	'Sergeant', 
	'Staff_Sergeant',
	'Sergeant_First_Class',
	'Master_Sergeant', 
	'First_Sergeant', 
	'Sergeant_Major', 
	'Command_Sergeant_Major', 
	'Sergeant_Major_of_the_Squad', 
	'Warrant_Officer', 
	'Chief_Warrant_Officer_2',
	'Chief_Warrant_Officer_3', 
	'Chief_Warrant_Officer_4', 
	'Chief_Warrant_Officer_5', 
	'Second_Lieutenant', 
	'First_Lieutenant', 
	'Captain', 
	'Major', 
	'Lieutenant_Colonel', 
	'Colonel', 
	'Brigadier_General', 
	'Major_General', 
	'Lieutenant_General', 
	'General',
	'General_of_the_Squad');
	
	if (strpos($members_remark, str_replace("_", " ", $ranks[1])) === 0) {
		$img = '<img src="'.$rank_images[1].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[2])) === 0) {
		$img = '<img src="'.$rank_images[2].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[3])) === 0) {
		$img = '<img src="'.$rank_images[3].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[4])) === 0) {
		$img = '<img src="'.$rank_images[4].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[5])) === 0) {
		$img = '<img src="'.$rank_images[5].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[6])) === 0) {
		$img = '<img src="'.$rank_images[6].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[7])) === 0) {
		$img = '<img src="'.$rank_images[7].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[8])) === 0) {
		$img = '<img src="'.$rank_images[8].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[9])) === 0) {
		$img = '<img src="'.$rank_images[9].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[10])) === 0) {
		$img = '<img src="'.$rank_images[10].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[11])) === 0) {
		$img = '<img src="'.$rank_images[11].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[12])) === 0) {
		$img = '<img src="'.$rank_images[12].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[13])) === 0) {
		$img = '<img src="'.$rank_images[13].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[14])) === 0) {
		$img = '<img src="'.$rank_images[14].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[15])) === 0) {
		$img = '<img src="'.$rank_images[15].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[16])) === 0) {
		$img = '<img src="'.$rank_images[16].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[17])) === 0) {
		$img = '<img src="'.$rank_images[17].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[18])) === 0) {
		$img = '<img src="'.$rank_images[18].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[19])) === 0) {
		$img = '<img src="'.$rank_images[19].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[20])) === 0) {
		$img = '<img src="'.$rank_images[20].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[21])) === 0) {
		$img = '<img src="'.$rank_images[21].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[22])) === 0) {
		$img = '<img src="'.$rank_images[22].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[23])) === 0) {
		$img = '<img src="'.$rank_images[23].'" width="46px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[24])) === 0) {
		$img = '<img src="'.$rank_images[24].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark,str_replace("_", " ", $ranks[25])) === 0) {
		$img = '<img src="'.$rank_images[25].'" width="45px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[26])) === 0) {
		$img = '<img src="'.$rank_images[26].'" width="55px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[28])) === 0) {
		$img = '<img src="'.$rank_images[28].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, str_replace("_", " ", $ranks[27])) === 0) {
		$img = '<img src="'.$rank_images[27].'" width="70px" height="20px"></img>';
	} else {
		$img = '<img src="'.$rank_images[1].'" width="20px" height="20px"></img>';
	} 
?>