<?php
////////////////////////////////////////////////////////////////////////////////////
//                                                                                
// Code made by Marcuz,                             
// Feel free to modify, but remember to credit me as the original author!                                                                    
//                                                                                
////////////////////////////////////////////////////////////////////////////////////

// This file is included for existing users withing the squad.xml who did not use this panel when registering to the squad url
// To use this password generator link the user to your page like this: http://www.site.tld/index.php?pid=PLAYERID
// Replace PLAYERID with the players ID

// WHEN THIS FILE IS NOT NEEDED, PLEASE REMOVE FROM THE DIRECTORY TO CAUSE NO HARM TO THE PANEL

if(isset($_POST['pass_submit']) && isset($_GET['pid'])){
	foreach($xml as $seg){
		if($seg['id'] == $_GET['pid']){
			$dom=dom_import_simplexml($seg);
			$PID = $_GET['pid'];
			$PASS = md5($_POST['pass_gen']);
			$Nick = $seg['nick'];
		}
	}
	$exists = mysqli_query($db, "SELECT * FROM squad WHERE PID = '$PID'");
	if($exists->num_rows > 0){
		die("A user with this PID already exists!");
	} elseif($exists->num_rows == 0) {
		mysqli_query($db, "INSERT INTO squad (`PID`,`Password`,`Nick`) VALUES('".$PID."','".$PASS."','".$Nick."')");
	}
}

?>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Create Squad User</title>
</head>


<body class="custom-body">
	<?php if ($_GET['pid'] != '') { ?>
	<form name="passform" method="POST">
		<br><b style="margin-left: 15px;">Creating a user for PID: <?php echo $_GET['pid'];?><br></b>
		<input class="addInput" style="margin-left: 15px; margin-top: 5px; width: 200px;" type="password" name="pass_gen" placeholder="Password">
		<input class="addBtn" type="submit" name="pass_submit" value="Submit">
	</form>
	<?php } else { echo 'No PID specified'; }?>
</body>