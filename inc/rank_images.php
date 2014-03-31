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
	'img/ranks/Army-USA-OR-02-2014.svg.png', // 2
	'img/ranks/Army-USA-OR-03-2014.svg.png', // 3
	'img/ranks/Army-USA-OR-04b.svg.png', // 4
	'img/ranks/Army-USA-OR-04a.svg.png', // 5
	'img/ranks/Army-USA-OR-05.svg', // 6
	'img/ranks/Army-USA-OR-06.svg.png', // 7
	'img/ranks/Army-USA-OR-07.svg.png', // 8
	'img/ranks/Army-USA-OR-08b.svg.png', // 9
	'img/ranks/Army-USA-OR-08a.svg', // 10
	'img/ranks/Army-USA-OR-09c.svg.png', // 11
	'img/ranks/Army-USA-OR-09b.svg.png', // 12
	'img/ranks/Army-USA-OR-09a.svg.png', // 13
	'img/ranks/US-Army-WO1.svg', // 14
	'img/ranks/40px-US-Army-CW2.svg.png', // 15
	'img/ranks/40px-US-Army-CW3.svg.png', // 16
	'img/ranks/40px-US-Army-CW4.svg.png', // 17
	'img/ranks/40px-US-Army-CW5.svg.png', // 18
	'img/ranks/US-O1_insignia.svg.png', // 19
	'img/ranks/First_Lieutenant_insignia.png', // 20
	'img/ranks/534px-US-O3_insignia.svg.png', // 21
	'img/ranks/Major_insignia.png', // 22
	'img/ranks/Lieutenant_Colonel_insignia.png', // 23
	'img/ranks/Colonel_insignia.png', // 24
	'img/ranks/US-O7_insignia.svg.png', // 25
	'img/ranks/US-O8_insignia.svg.png', // 26
	'img/ranks/US-O9_insignia.svg.png', // 27
	'img/ranks/US-O10_insignia.svg.png', // 28
	'img/ranks/US-O11_insignia.svg'); // 29

	$ranks = array(
	'Private', // 1
	'Private_2', // 2
	'Private_First_Class', // 3
	'Specialist', // 4
	'Corporal', // 5
	'Sergeant', // 6
	'Staff_Sergeant', // 7
	'Sergeant_First_Class', // 8
	'Master_Sergeant', // 9
	'First_Sergeant', // 10
	'Sergeant_Major', // 11
	'Command_Sergeant_Major', // 12
	'Sergeant_Major_of_the_Squad', // 13 
	'Warrant_Officer', // 14
	'Chief_Warrant_Officer_2', // 15
	'Chief_Warrant_Officer_3', // 16 
	'Chief_Warrant_Officer_4', // 17
	'Chief_Warrant_Officer_5', // 18
	'Second_Lieutenant', // 19
	'First_Lieutenant', // 20
	'Captain', // 21
	'Major', // 22
	'Lieutenant_Colonel', // 23
	'Colonel', // 24
	'Brigadier_General', // 25
	'Major_General', // 26
	'Lieutenant_General', // 27
	'General', // 28
	'General_of_the_Squad');  // 29
	
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