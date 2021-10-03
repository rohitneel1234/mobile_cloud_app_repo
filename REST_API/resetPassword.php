<?php 
    include_once("connection.php"); 
	
    if(isset($_POST['txtMobile']) && isset($_POST['txtPass'])) { 
		      
        $mobile=$_POST['txtMobile'];
		
		$password = $_POST['txtPass'];
		
		$query = "UPDATE UserInfo SET Password='$password' WHERE MobileNo='$mobile'"; 

		$result = mysqli_query($conn,$query);
					        
		if($result > 0){
			echo "success"; 
		}
		else { 
			echo "Updation Failed" . $result; 
		}
    } 
	mysqli_close($conn);
?>