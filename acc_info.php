<?php 
	session_start();
	require './php_script/connect.inc.php';
	if(!$_SESSION['acc_id'])
	{
		header("location: login.php");
	}
	else
	{
		$acc_id = $_SESSION['acc_id'];
		$mysqli_query = "SELECT `balance` from $mysqli_db.$mysqli_tb WHERE `acc_no`='$acc_id'";
		$result = mysqli_query($con,$mysqli_query);
		$count=mysqli_num_rows($result);
		if($count==1)
		{
			while($row = mysqli_fetch_assoc($result))
				$balance = $row['balance'];
		}
	}
?>

<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>iBank Inc:. Personal Banking</TITLE>
		<link rel="icon" type="image/png" href="./images/head-icon.png" />
		<link type="text/css" rel="stylesheet" href="style.css" />
		<link type="text/css" rel="stylesheet" href="style_about.css" />
	</HEAD>
	<BODY>
		<div class="header">
			<div class="headerlogo">
				<img src="./images/header-logo.png" alt="LOGO" style="height: 80px; width: 80px;" ></img>
			</div>
			<div class="headername">
				iBANK.
			</div>
			<div class="headerDesc">
				The Only Bank You Can Trust.
			</div>
			<a href="#" alt="Home Page">
				<div class="hometab" style=" background-color: #007fff;">
					HOME
				</div>
			</a>
			<a href="./account/settings.php" alt="login">
				<div class="logintab" style="width: 6em;">
					&nbsp;SETTINGS&nbsp;
				</div>
			</a>
			<a href="logout.php" alt="Register">
					<div class="registertab" style="left: 55em;">
						LOGOUT
					</div>
			</a>

			<div class="about_tab" style="left: 61.4em;">
				<ul id="menu-nav">
					<li> &nbsp;CONNECT
							<ul>
								<a href="./account/transfer.php"><li style="margin-left: -9px;">TRANSFER</li></a>
								<a href="./account/withdraw.php"><li style="margin-left: -9px;">WITHDRAW</li></a>
								<a href="./account/ministatement.php"><li style="margin-left: -9px;">MINI-STATEMENT</li></a>
							</ul>
					</li>
				</ul>
			</div>

			
		</div>

		<div class="about_comp_desc" style="height: 23em; padding-top: 40px; padding-left: 40px;">
		
			<div class="basic_info">
				Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['first_name']; ?>&nbsp;<?php echo $_SESSION['last_name']; ?>
				<br><br>
				Account Number : <?php echo $_SESSION['acc_id']; ?>
				<br><br>
				Email Address  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['email_id']; ?>
				<br><br>
				Date of Join   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['doj']; ?>
				<br><br>
				Contact Number   &nbsp;: <?php echo $_SESSION['mobile_no']; ?>
				<br><br>
				Balance   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. <?php echo $balance; ?> only.
			</div>
		</div>

		<div class="footer">	
			<div class="footer_elements">
				<ul>
					<li> 
						 &reg; All Rights Reserved.
					</li>
				<ul>
			</div>
		</div>
	</BODY>
</HTML>