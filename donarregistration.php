<?php
	
    $DFName = $_POST['DFName']; 
	$DLName = $_POST['DLName'];
    $email= $_POST['email'];
    $phnumber = $_POST['phnumber'];
    $Gender = $_POST['Gender'];
    $address = $_POST['address'];
    $DBlood_group = $_POST['DBlood_group'];
	$D_password = $_POST['D_password'];
    $D_age = $_POST['D_age'];
    

	// Database connection
	$conn = new mysqli('localhost','root','20022003n','BLOODBANK');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into DONAR(DFName,DLName,email,phnumber,Gender,address,DBlood_group,D_password,D_age) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssi",$DFName,$DLName,$email,$phnumber,$Gender,$address, $DBlood_group, $D_password, $D_age);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>