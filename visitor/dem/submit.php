<?php
include ('includes/dbconn.php');

// Prepare and bind the insert statement
//$stmt = $conn->prepare("INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, Apartment, BuildingNo, WhomtoMeet, Reason) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
//$stmt->bind_param("ssssssss",'$visname','$contactnumber','$address','$gender','$apartmentno', '$buildingno', '$whomtomeet', '$reason');
$query=mysqli_query($conn,"INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, Apartment, BuildingNo, WhomtoMeet, Reason) value('$visname','$contactnumber','$address','$gender','$apartmentno', '$buildingno', '$whomtomeet', '$reason')");


// Set parameters and execute
	$visname=$_POST['visname'];
	$contactnumber=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $apartmentno=$_POST['apartmentno'];
	$buildingno=$_POST['buildingno'];
    $whomtomeet=$_POST['whomtomeet'];
    $reason=$_POST['reason'];

$query->execute();
    if ($query){
        $msg="Visitor entry details has been added";
    } else {
        $msg="Something Went Wrong";
    }

//echo "New records inserted successfully";

//$stmt->close();
//$conn->close();
?>
