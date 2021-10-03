<?php
    include_once("connection.php"); 
	
    if(isset($_POST['txtUname']) && isset($_POST['txtUmobile']) && isset($_POST['txtUpass']) && isset($_POST['txtUemail']) ) { 
		
        $uname = $_POST['txtUname'];
        $umobile=$_POST['txtUmobile'];
		$upassword = $_POST['txtUpass'];
		$uemail = $_POST['txtUemail'];
		$userID = uniqid();
				
		$sql="SELECT * from UserInfo WHERE Uname='$uname' OR MobileNo='$umobile'";
		
		$rs=mysqli_fetch_array(mysqli_query($conn,$sql));
		
		if(isset($rs))
		{
			echo "User already exist";
		}
		else
		{
        $query = "INSERT into UserInfo (user_id,Uname,MobileNo,Password,Email) values ('$userID','$uname','$umobile','$upassword','$uemail')"; 

        $result = mysqli_query($conn,$query);
		        
		if($result > 0){
			echo "success"; 
		}
		 else
		{ 
		   echo "Registration Failed"; 
        }
	  }
    } 
?>