<?php
	
    $PFname = $_POST['PFname']; 
	$PLname = $_POST['PLname'];
    $PBlood_group = $_POST['PBlood_group'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
	$P_Password = $_POST['P_Password'];
    $P_age = $_POST['P_age'];
    $P_contact = $_POST['P_contact'];
    $P_email = $_POST['P_email'];
    $E_id = $_POST['E_id'];
    $D_id = $_POST['D_id'];

	// Database connection
	$conn = new mysqli('localhost','root','20022003n','BLOODBANK');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into PATIENT(PFname,PLname,PBlood_group,Gender,Address,P_Password,P_age,P_contact,P_email,E_id,D_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssissii",$PFname,$PLname,$PBlood_group,$Gender,$Address,$P_Password,$P_age,$P_contact,$P_email,$E_id,$D_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>