<?php
    include_once("connection.php"); 
	
    if(isset($_POST['txtTargetName']) && isset($_POST['txtTargetId']) && isset($_POST['txtUserId'])) { 
				
        $targetName = $_POST['txtTargetName'];
		$targetId = $_POST['txtTargetId'];
		$userId = $_POST['txtUserId'];
						
		$sql="SELECT * from User_TargetInfo WHERE target_name='$targetName'";
		
		$rs=mysqli_fetch_array(mysqli_query($conn,$sql));
		
		if(isset($rs))
		{
			echo "Target name already exist";
		}
		else
		{
        $query = "INSERT into User_TargetInfo (target_id, target_name, user_id) values ('$targetID','$targetName','$userId')"; 

        $result = mysqli_query($conn,$query);
		        
		if($result > 0){
			echo "success"; 
		}
		 else
		{ 
		   echo "Target id failed to add"; 
        }
	  }
    } 
?>