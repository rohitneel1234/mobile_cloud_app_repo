<?php  
    include_once("connection.php"); 
	
    if( isset($_POST['txtUemail']) && isset($_POST['txtUpass']) ) {
		
        $useremail = $_POST['txtUemail'];
        $password = $_POST['txtUpass'];
       
	    $query = "SELECT Email,Password,MobileNo FROM UserInfo ". 
        " WHERE Email = '$useremail' AND Password = '$password'"; 

        $result = mysqli_query($conn, $query);
						
		$check=false;				
		while($row = mysqli_fetch_array($result))
		{
             $check=true;
			 break;
        }
		if($check == true){
			echo "success";
		}
		else
		{
            echo "Login Failed";  
		}
	}
?>
