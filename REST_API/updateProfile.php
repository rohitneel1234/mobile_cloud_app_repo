<?php 
    include_once("connection.php"); 
	
    if(isset($_POST['txtName']) && isset($_POST['txtMobile']) && isset($_POST['txtEmail'])) { 
		      
		$name=$_POST['txtName'];
		$mobile = $_POST['txtMobile'];
        $email =$_POST['txtEmail'];
		
		$query = "UPDATE UserInfo SET Uname='$name',Email='$email',MobileNo='$mobile' WHERE MobileNo='$mobile'"; 
		$result = mysqli_query($conn,$query);
							
		$responseData = array(); 

		if($result > 0){
			$responseData['msg'] = "Updated Successfully";
		}
		else { 
			$responseData['msg'] = "Not Updated";
		}
	}
	echo json_encode($responseData); 
	mysqli_close($conn);
?>