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
	'http://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Army-USA-OR-02-2014.svg/120px-Army-USA-OR-02-2014.svg.png', 
	'http://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Army-USA-OR-03-2014.svg/100px-Army-USA-OR-03-2014.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Army-USA-OR-04b.svg/100px-Army-USA-OR-04b.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Army-USA-OR-04a.svg/100px-Army-USA-OR-04a.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/2/27/Army-USA-OR-05.svg',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Army-USA-OR-06.svg/100px-Army-USA-OR-06.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Army-USA-OR-07.svg/100px-Army-USA-OR-07.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Army-USA-OR-08b.svg/100px-Army-USA-OR-08b.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/3/3c/Army-USA-OR-08a.svg',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Army-USA-OR-09c.svg/100px-Army-USA-OR-09c.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Army-USA-OR-09b.svg/100px-Army-USA-OR-09b.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Army-USA-OR-09a.svg/100px-Army-USA-OR-09a.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/e/e3/US-Army-WO1.svg',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/d/de/US-Army-CW2.svg/40px-US-Army-CW2.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/US-Army-CW3.svg/40px-US-Army-CW3.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/4/42/US-Army-CW4.svg/40px-US-Army-CW4.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/US-Army-CW5.svg/40px-US-Army-CW5.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/0/05/US-O1_insignia.svg/200px-US-O1_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/b/bc/First_Lieutenant_insignia.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/7/72/US-O3_insignia.svg/534px-US-O3_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/7/78/Major_insignia.png',
	'http://upload.wikimedia.org/wikipedia/commons/0/0d/Lieutenant_Colonel_insignia.png',
	'http://upload.wikimedia.org/wikipedia/commons/4/40/Colonel_insignia.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/2/23/US-O7_insignia.svg/622px-US-O7_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/9/91/US-O8_insignia.svg/800px-US-O8_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/d/da/US-O9_insignia.svg/800px-US-O9_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/thumb/4/40/US-O10_insignia.svg/800px-US-O10_insignia.svg.png',
	'http://upload.wikimedia.org/wikipedia/commons/f/f8/US-O11_insignia.svg');

	if (strpos($members_remark, 'Private 2') === 0) {
		$img = '<img src="'.$rank_images[1].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Private First Class') === 0) {
		$img = '<img src="'.$rank_images[2].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Specialist') === 0) {
		$img = '<img src="'.$rank_images[3].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Corporal') === 0) {
		$img = '<img src="'.$rank_images[4].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Sergeant') === 0) {
		$img = '<img src="'.$rank_images[5].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Staff Sergeant') === 0) {
		$img = '<img src="'.$rank_images[6].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Sergeant First Class') === 0) {
		$img = '<img src="'.$rank_images[7].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Master Sergeant') === 0) {
		$img = '<img src="'.$rank_images[8].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'First Sergeant') === 0) {
		$img = '<img src="'.$rank_images[9].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Sergeant Major') === 0) {
		$img = '<img src="'.$rank_images[10].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Command Sergeant Major') === 0) {
		$img = '<img src="'.$rank_images[11].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Sergeant Major of the Squad') === 0) {
		$img = '<img src="'.$rank_images[12].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Warrant Officer') === 0) {
		$img = '<img src="'.$rank_images[13].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Chief Warrant Officer 2') === 0) {
		$img = '<img src="'.$rank_images[14].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Chief Warrant Officer 3') === 0) {
		$img = '<img src="'.$rank_images[15].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Chief Warrant Officer 4') === 0) {
		$img = '<img src="'.$rank_images[16].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Chief Warrant Officer 5') === 0) {
		$img = '<img src="'.$rank_images[17].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Second Lieutenant') === 0) {
		$img = '<img src="'.$rank_images[18].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'First Lieutenant') === 0) {
		$img = '<img src="'.$rank_images[19].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Captain') === 0) {
		$img = '<img src="'.$rank_images[20].'" width="20px" height="40px"></img>';
	} elseif(strpos($members_remark, 'Major') === 0) {
		$img = '<img src="'.$rank_images[21].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Lieutenant Colonel') === 0) {
		$img = '<img src="'.$rank_images[22].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Colonel') === 0) {
		$img = '<img src="'.$rank_images[23].'" width="46px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Brigadier General') === 0) {
		$img = '<img src="'.$rank_images[24].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Major General') === 0) {
		$img = '<img src="'.$rank_images[25].'" width="45px" height="20px"></img>';
	} elseif(strpos($members_remark, 'Lieutenant General') === 0) {
		$img = '<img src="'.$rank_images[26].'" width="55px" height="20px"></img>';
	} elseif(strpos($members_remark, 'General of the Squad') === 0) {
		$img = '<img src="'.$rank_images[28].'" width="20px" height="20px"></img>';
	} elseif(strpos($members_remark, 'General') === 0) {
		$img = '<img src="'.$rank_images[27].'" width="70px" height="20px"></img>';
	} else {
		$img = '';
	} 
?>