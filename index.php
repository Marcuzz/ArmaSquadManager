<?php
////////////////////////////////////////////////////////////////////////////////////
//                                                                                
// Code made by Marcuz,                             
// Feel free to modify, but remember to credit me as the original author!                                                                    
//                                                                                
////////////////////////////////////////////////////////////////////////////////////

// This file might be messy and unexplainable, pending cleanup but hey, it works?

	$_SESSION['loggedin'] = 'false';
	$_SESSION['loggedin_user'] = 'false';
	SESSION_START();
	include_once('inc/FlashMessages.class.php');
	require_once('config.php');
	require_once('inc/database.php');
	require_once('inc/rank_images.php');
	$message = new FlashMessages();
	$xml = simplexml_load_file("squad.xml");
	if (!$xml) {
		die('Couldn\'t find squad.xml!');
	}

	if(isset($_POST['squad_submit'])){
		if(count($xml)){
		   	$result = $xml->xpath("//squad");
		   	foreach($result as $squad_info){
		   		$dom=dom_import_simplexml($squad_info);	
		   		if($_POST['squad_tag'] != ''){
		   			$squad_info['nick'] = $_POST['squad_tag'];
		   		} elseif ($_POST['squad_tag'] == ''){
		   			$squad_info['nick'] = $squad_info['nick'];
		   		}
		   		if($_POST['squad_name'] != ''){
		   			$squad_info->name = $_POST['squad_name'];
					$squad_info->title = $_POST['squad_name'];
		   		} elseif ($_POST['squad_name'] == ''){
		   			$squad_info->name = $squad_info->name;
					$squad_info->title = $squad_info->name;
		   		}
		   		if($_POST['squad_email'] != ''){
		   			$squad_info->email = $_POST['squad_email'];
		   		} elseif ($_POST['squad_email'] == ''){
		   			$squad_info->email = $squad_info->email;
		   		}
		   		if($_POST['squad_web'] != ''){
		   			$squad_info->web = $_POST['squad_web'];
		   		} elseif ($_POST['squad_web'] == ''){
		   			$squad_info->web = $squad_info->web;
		   		}
		   		if($_POST['squad_picture'] != ''){
		   			$squad_info->picture = $_POST['squad_picture'];
		   		} elseif ($_POST['squad_picture'] == ''){
		   			$squad_info->picture = $squad_info->picture;
		   		}

		   		$dom = new DOMDocument("1.0");
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				//echo $dom->saveXML();
				$dom->save('squad.xml');
		   	}
		}
	} 

	if(isset($_POST['submit']) && $_POST['addInput_UID'] == NULL && $_POST['addInput_IGN'] != NULL) {
		$message->add('danger', "You need to enter your UID!");
	} elseif(isset($_POST['submit']) && $_POST['addInput_IGN'] == NULL && $_POST['addInput_UID'] != NULL) {
		$message->add('danger', "You need to enter your ingame name!");
	} elseif(isset($_POST['submit']) && $_POST['addInput_IGN'] == NULL && $_POST['addInput_UID'] == NULL){
		$message->add('danger', "You need to enter your UID and ingame name!");
	} elseif(isset($_POST['submit']) && strlen($_POST['addInput_UID']) > 20 or strlen($_POST['addInput_IGN']) > 20 or strlen($_POST['addInput_Name']) > 20 or strlen($_POST['addInput_IM']) > 20){
		$message->add('danger', "UID, IGN, Name or IM can't exceed 20 characters!");
	} elseif(isset($_POST['submit']) && strlen($_POST['addInput_Email']) > 30){
		$message->add('danger', "Email can't exceed 30 characters!");
	} elseif(isset($_POST['submit']) && $_POST['addInput_Password'] == NULL){
		$message->add('danger', "You need to enter a password!");
	}elseif (isset($_POST['submit'])){
		$UID = $_POST['addInput_UID'];
		$IGN = $_POST['addInput_IGN'];
		$PASS = md5($_POST['addInput_Password']);
		if(isset($_POST['addInput_Name'])){
			$Name = $_POST['addInput_Name'];
		} if($_POST['addInput_Name'] == NULL) {
			$Name = 'N/A';
		}
		if(isset($_POST['addInput_Email'])){
			$Email = $_POST['addInput_Email'];
		} if($_POST['addInput_Email'] == NULL) {
			$Email = 'N/A';
		}
		if(isset($_POST['addInput_ICQ'])){
			$ICQ = $_POST['addInput_ICQ'];
		} if($_POST['addInput_ICQ'] == NULL) {
			$ICQ = 'N/A';
		}
		if($_POST['addInput_Remark'] != '' && $enable_ranks == "true"){
			$Remark = str_replace("_", " ", $ranks[0]) . " - " . $_POST['addInput_Remark'];
		} elseif($_POST['addInput_Remark'] == '' && $enable_ranks == "true") {
			$Remark = str_replace("_", " ", $ranks[0]);
		} elseif($_POST['addInput_Remark'] != '' && $enable_ranks == "false") {
			$Remark = $_POST['addInput_Remark'];
		} elseif($_POST['addInput_Remark'] == '' && $enable_ranks == "true") {
			$Remark = "";
		}

		$member = $xml->addChild('member');
		$member->addAttribute('id', $UID);
		$member->addAttribute('nick', $IGN);
		$member->addChild('name', $Name);
		$member->addChild('email', $Email);
		$member->addChild('icq', $ICQ);
		if($enable_remark == 'true'){
			$member->addChild('remark', $Remark);
		} else {
			$member->addChild('remark', str_replace("_", " ", $ranks[0]));
		}
		//$xml->asXML('squad.xml');

		$dom = new DOMDocument("1.0");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		//echo $dom->saveXML();
		$dom->save('squad.xml');

		mysqli_query($db, "INSERT INTO squad (`PID`, `Password`, `Nick`) VALUES ('".$UID."','".$PASS."','".$IGN."')");

		$message->add('success', "Successfully added to the squad!");
	}

	if(isset($_POST['submit_admin']) && $_POST['password_admin'] == $admin_pass){
		$message->add('success', "Successfully signed in as admin!");
		$_SESSION['loggedin'] = 'true';
	} elseif(isset($_POST['submit_admin']) && $_POST['password_admin'] != $admin_pass) {
		$message->add('danger', "Wrong password!");
	}

	if(isset($_POST['logout_admin'])){
		header('location: logout.php');
	}

	if(isset($_POST['remove_submit'])){
		foreach($xml as $seg){
			if($seg['id'] == $_POST['remove_hidden'] && $seg['nick'] == $_POST['remove_hidden2']){
				$remove_UID = $_POST['remove_hidden'];
				$remove_NICK = $_POST['remove_hidden2'];

				$dom=dom_import_simplexml($seg);
      		    $dom->parentNode->removeChild($dom);

      		   	$dom = new DOMDocument("1.0");
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				//echo $dom->saveXML();
				$dom->save('squad.xml');

				mysqli_query($db, "DELETE FROM squad WHERE PID = '$remove_UID' AND Nick = '$remove_NICK'");
			}
		}
	}

	if(isset($_POST['rank_submit']) && isset($_POST['rank_select']) && isset($_POST['rank_speciality'])){
		foreach($xml as $seg){
			if($seg['id'] == $_POST['select_hidden']){
				$dom=dom_import_simplexml($seg);
				$newrank = str_replace("_", " ", $_POST['rank_select']);
				$speciality = " - " . $_POST['rank_speciality'];
				if($speciality != ' - '){
					$new_rank = $newrank . $speciality;
				} else {
					$new_rank = $newrank;
				}
				$seg->remark = $new_rank;

			 	$dom = new DOMDocument("1.0");
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				//echo $dom->saveXML();
				$dom->save('squad.xml');
			}
		}
	} elseif(isset($_POST['rank_submit']) && isset($_POST['rank_speciality'])){
		foreach($xml as $seg){
			if($seg['id'] == $_POST['select_hidden']){
				$dom=dom_import_simplexml($seg);
				$newrank = str_replace("_", " ", $_POST['rank_select']);
				$speciality =$_POST['rank_speciality'];
				$seg->remark = $speciality;

			 	$dom = new DOMDocument("1.0");
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				//echo $dom->saveXML();
				$dom->save('squad.xml');
			}
		}
	}


	if(isset($_POST['submit_user']) && $_POST['user_uid'] != '' && $_POST['user_password'] != ''){
		$user_password = md5($_POST['user_password']); ;
		$user_pid = $_POST['user_uid'];

		$query = mysqli_query($db,"SELECT * FROM squad WHERE PID = '$user_pid'");
		while($row = mysqli_fetch_array($query)){
			$db_pid = $row['PID'];
			$db_password = $row['Password'];
		} 

		if($user_pid == $db_pid && $user_password == $db_password){
			$message->add('success', 'Successfully signed in!');
			$_SESSION['loggedin_user'] = $db_pid;
		} else {
			$message->add('danger', 'There was an error signing in!');
		}
	}

	if(isset($_POST['save_user'])){
		foreach($xml as $seg){
			if($seg['id'] == $_SESSION['loggedin_user']){
				$dom=dom_import_simplexml($seg);
				$speciality = $_POST['rank_speciality'];
				if($_POST['user_name'] != ''){
					$user_name = $_POST['user_name'];
					$PID = $seg['id'];
					mysqli_query($db, "UPDATE squad SET Nick = '$user_name' WHERE PID = '$PID'");
				} else {
					$user_name = $seg['nick'];
				}
				if($_POST['user_im'] != ''){
					$user_im = $_POST['user_im'];
				} else {
					$user_im = $seg->icq;
				}
				if($_POST['user_remark'] != '' && $enable_ranks == 'true' && strpos($_POST['user_remark'], '-') === false){
					$str = $seg->remark;
					$str = substr($str,0,strrpos($str, '-'));
					$user_remark = $str . " - " . $_POST['user_remark'];
				} elseif($_POST['user_remark'] != '' && $enable_ranks == 'true' && strpos($_POST['user_remark'], '-') === true) {
					$message->add('danger', 'Your remark can not contain dashes!');
				} elseif($_POST['user_remark'] != '' && $enable_ranks != 'true') {
					$user_remark = $_POST['user_remark'];
				} else {
					$user_remark = $seg->remark;
				}
				$seg['nick'] = $user_name;
				$seg->icq = $user_im;
				$seg->remark = $user_remark;

			 	$dom = new DOMDocument("1.0");
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				//echo $dom->saveXML();
				$dom->save('squad.xml');
			}
		}
	}

	if(isset($_GET['pid'])){
		include('inc/password_generator.php');
		die();
	}

?>

<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body class="custom-body">
<div class="squad_container">
	<div class="row">
		<div class="col-lg-4">
			<div class="left_box">
				<div class="header_logo">
					Squad Logo
				</div>
				<div class="logo_bg">
					<div class="logo">
						<img src="<?php echo $image_url; ?>" width="200px" height="200px"></img>
					</div>
				</div>
				<div class="header_left">
					Squad Information
				</div>
				<div class="box">
					<form name="squad_form" method="POST">
					<?php 	
					if($_SESSION['loggedin']) {
						if(count($xml)){
							$result = $xml->xpath("//squad");
							foreach($result as $squad_info){
								echo'
								<input class="addInput" name="squad_tag" type="text" placeholder="Tag: '.$squad_info['nick'].'">
								<input class="addInput" name="squad_name" type="text" placeholder="Name: '.$squad_info->name.'">
								<input class="addInput" name="squad_email" type="text" placeholder="Email: '. $squad_info->email.'">
								<input class="addInput" name="squad_web" type="text" placeholder="Web: '.$squad_info->web.'">
								<input class="addInput" name="squad_picture" type="text" placeholder="Picture: '.$squad_info->picture.'">
								<input class="addBtn" type="submit" value="Save" name="squad_submit">';
							}
						}
					} elseif(!$_SESSION['loggedin']){
						if(count($xml)){
							$result = $xml->xpath("//squad");
							foreach($result as $squad_info){
								echo '
								Clantag = [' .$squad_info["nick"]. ']<br>
								Name = ' . $squad_info->name .'<br>
								Email = ' . $squad_info->email .'<br>
								Website = <a href="'.$squad_info->web.'">' . $squad_info->web . '</a>';
							}
						}
					}
					?>
					</form>
				</div>
				<div class="header_left">
					Squad Registration form
				</div>
				<div class="box">
					<?php if(isset($_POST['submit'])){ $message->display(); } ?>
					<form name="regform" method="POST">
						<input class="addInput" type="text" name="addInput_UID" placeholder="* Player ID">
						<input class="addInput" type="text" name="addInput_IGN" placeholder="* Ingame name(Has to be 100% correct)">
						<input class="addInput" type="password" name="addInput_Password" placeholder="* Password">
						<input class="addInput" type="text" name="addInput_Name" placeholder="Name">
						<input class="addInput" type="text" name="addInput_Email" placeholder="Email Address">
						<input class="addInput" type="text" name="addInput_ICQ" placeholder="IM">
						<?php
							if($enable_remark == 'true'){
								echo '<input class="addInput" type="text" name="addInput_Remark" placeholder="Remark(Ex: I\'m a cool guy!)">';
							}
						?>
						<input class="addBtn" type="submit" name="submit">
					</form>
					<br>
					<font color="red">*</font> = Required
					<br> <font color="green"><b>Player ID</b></font> = <a href="http://community.bistudio.com/wiki/squad.xml#How_to_get_your_Player-UID">How to find it</a>
					<br> <font color="green"><b>IM</b></font> = Instant messager, aka on skype, steam, etc
					<br><br>
					<b>Squad URL - Put the link on your profile:</b><br> <?php echo $squad_url; ?>
				</div>
				<div class="header_left">
					<?php 
					if(!$_SESSION['loggedin_user']){ 
						echo 'User Login';
					} else {
						echo 'User Controlpanel';
					}
					?>
				</div>
				<div class="box">
					<?php if(isset($_POST['submit_user']) or $_POST['save_user']){ $message->display(); } ?>
					<form name="userform" method="POST"> 
					<?php if(!$_SESSION['loggedin_user']) { ?>
					<input class="addInput" type="text" name="user_uid" placeholder="Player ID">
					<input class="addInput" type="password" name="user_password" placeholder="Password">
					<input class="addBtn" type="submit" name="submit_user">
					<?php } elseif($_SESSION['loggedin_user']) {?>
					<input class="addInput" type="text" placeholder="Ingame name" name="user_name">
					<input class="addInput" type="text" placeholder="IM" name="user_im">
					<?php if($enable_remark != 'false'){?>
					<input class="addInput" type="text" placeholder="Remark" name="user_remark">
					<?php } ?>
					<input class="addBtn" type="submit" value="Save" name="save_user">
					<input class="addBtn" type="submit" value="Sign Out" name="logout_admin">
					<?php }?>
					</form>
				</div>
				<div class="header_left">
					Administrator Login
				</div>
				<div class="box">
					<?php if(isset($_POST['submit_admin'])){ $message->display(); } ?>
					<?php if(!$_SESSION['loggedin']){ ?>
					<form name="adminform" method="POST">
						<input class="addInput" type="password" name="password_admin" placeholder="Password">
						<input class="addBtn" type="submit" name="submit_admin">
					</form>
					<?php } elseif($_SESSION['loggedin']) { ?>
					<form name="adminform" method="POST">
					You are already signed in as admin!<br>
					<input class="addBtn" type="submit" value="Sign Out" name="logout_admin">
					</form>
					<?php } ?>
				</div>
				<div class="squad_footer">
					&copy; Marcuz
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="squad_box">
				<div class="header_squad">
					Squad Members
				</div>
				<div class="squad_content">
					<table class="table-custom table-striped-custom" width="100%">
						<thead>
							<th>
								User ID
							</th>
							<th>
								Nick
							</th>
							<th>
								IM
							</th>
							<?php
							if($_SESSION['loggedin']){
								echo "<th>Action</th>";
								echo "<th></th>";
								echo "<th></th>";
							}
							?>
						</thead>
						<tbody>
							<?php
								foreach($ranks as $rankslist) {
									$rank_list .= "<option value=".$rankslist.">".str_replace("_", " ", $rankslist)."</option>";
								}
								if(count($xml)){
									$result = $xml->xpath("//member");
									foreach($result as $member){
										$members_uid = $member["id"];
										$members_name = $member["nick"];
										$members_im = $member->icq;
										$members_remark = $member->remark;
										if($enable_ranks == 'true'){
											include('inc/rank_images.php');
										}

										if(!$_SESSION['loggedin']){
										echo "<tr>
										<td>". $members_uid ."</td>
										<td>". $members_name ."</td>
										<td>". $members_im ."</td>
										</tr>";
										} elseif ($_SESSION['loggedin'] && $enable_ranks == 'true'){
										echo "<tr>
										<td>". $members_uid ."</td>
										<td>". $members_name ."</td>
										<td>". $members_im ."</td>
										<form name='promoteform' method='POST'>
										<input type='hidden' name='select_hidden' value='". $members_uid ."'>
										<td style='margin-top: 10px;'><select class='adminSelect' name='rank_select'>".$rank_list."</td>
										<td style='margin-top: 10px;'><input class='adminInput' type='text' placeholder=' Remark' name='rank_speciality'></td>
										</tr>";		
										} elseif ($_SESSION['loggedin'] && $enable_ranks != 'true'){
										echo "<tr>
										<td>". $members_uid ."</td>
										<td>". $members_name ."</td>
										<td>". $members_im ."</td>
										<form name='promoteform' method='POST'>
										<input type='hidden' name='select_hidden' value='". $members_uid ."'>
										<td style='margin-top: 10px;'></td>
										<td style='margin-top: 10px;'><input class='adminInput' type='text' placeholder=' Remark' name='rank_speciality'></td>
										</tr>";		
										}

										if(!$_SESSION['loggedin']){
										echo '<tr class="remark">
										<td>'.$img.'</td>
										<td><i>-"' . str_replace("Banned", "<font color='red'><b>Banned</b></font>", $members_remark) . '"</i></td>
										<td></td>
										</tr>';
										} elseif($_SESSION['loggedin']) {
										echo '<tr class="remark">
										<td>'.$img.'</td>
										<td><i>-"' . str_replace("Banned", "<font color='red'><b>Banned</b></font>", $members_remark) . '"</i></td>
										<td></td>
										<input type="hidden" name="remove_hidden" value="'. $members_uid .'">
										<input type="hidden" name="remove_hidden2" value="'. $members_name .'">
										<td><input type="button" class="addBtn_danger" data-toggle="modal" href="#Remove" value="Remove"></td>
										<td style="margin-top: 10px;""><input class="addBtn_success" type="submit" value="Submit" name="rank_submit"></td>
										
										
										<div class="modal fade" id="Remove">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title">Are you sure?</h4>
												  </div>
												  <div class="modal-body">
													<p>Are you sure you want to remove this person from the squad?</p>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="addBtn_danger" data-dismiss="modal">No</button>
													<input class="addBtn_success" type="submit" value="Yes" name="remove_submit">
												  </div>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										</form>
										<td></td>
										</tr>';	
										}
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>


</html>