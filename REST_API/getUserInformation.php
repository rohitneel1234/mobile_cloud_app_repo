<?php 
	 include_once("connection.php"); 
	
	 if(isset($_POST['txtEmail'])){
		 
		$email = $_POST['txtEmail'];
		
		$sql="SELECT user_id,Uname,MobileNo,Password from UserInfo WHERE Email='$email'";
		
		//creating a query
		$stmt = $conn->prepare($sql);
	
		//executing the query 
		$stmt->execute();
	
		//binding results to the query 
		$stmt->bind_result($uid, $uname, $mobileno, $password);
	
		$responseData = array(); 
	
		//traversing through all the result 
		while($stmt->fetch()){
		$result = array();
		$result['id'] = $uid;
		$result['name'] = $uname; 
		$result['mobile'] = $mobileno; 
		$result['password'] = $password; 
		array_push($responseData, $result);
	}
}	
	//displaying the result in json format 
	echo json_encode($responseData);
?>