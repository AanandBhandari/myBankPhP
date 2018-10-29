<?php
	require 'connect.inc.php';

	session_start();
		if(!empty($_POST['acc_id'])&&!empty($_POST['user_name'])&&!empty($_POST['pass_key']))
		{
			if(isset($_POST['acc_id'])&&isset($_POST['user_name'])&&isset($_POST['pass_key']))
			{
				$acc_id = stripslashes($_POST['acc_id']);
				$email_id = mysqli_real_escape_string($con,stripslashes($_POST['user_name']));
				$password = md5(mysqli_real_escape_string($con,stripslashes($_POST['pass_key'])));

				$query = "SELECT * FROM $mysqli_db.$mysqli_tb WHERE `acc_no`='$acc_id' AND `email_id`='$email_id' AND `password`='$password'";
				$result = mysqli_query($con,$query);

				if (!$result){
					echo "<center> <p style='padding: 5px;background-color:red;'> Something went wrong.</p>	</center>";
					
				}
				while($row = mysqli_fetch_assoc($result))
				{
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$mobile_no = $row['mobile_no'];
					$doj = $row['doj'];
				}

				$count = mysqli_num_rows($result);
				if($count==1)
				{
					$_SESSION['acc_id']=$acc_id;
					$_SESSION['email_id']=$email_id;
					$_SESSION['password']=$password;
					$_SESSION['first_name']=$first_name;
					$_SESSION['last_name']=$last_name;
					$_SESSION['mobile_no']=$mobile_no;
					$_SESSION['doj']=$doj;
					header("location: ./acc_info.php");
				}
				else if($count==0)
				{
					echo "<center> <p style='padding: 5px;background-color:red;'> User or Password is wrong. Please try Again.</p>	</center>";
				}
				else
				{
					echo "<center> <p style='padding: 5px;background-color:red;'> Something went wrong.</p>	</center>";
				}
			}
		}
	
?>