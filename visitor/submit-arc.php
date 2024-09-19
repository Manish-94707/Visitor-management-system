<?php
include ('includes/dbconn.php');

// Prepare and bind the insert statement
//$stmt = $conn->prepare("INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, Apartment, BuildingNo, WhomtoMeet, Reason) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
//$stmt->bind_param("ssssssss",'$visname','$contactnumber','$address','$gender','$apartmentno', '$buildingno', '$whomtomeet', '$reason');
//$cvmsaid=$_SESSION['cvmsaid'];
   

$visname=$_POST['visname'];
    $contactnumber=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $Gender=$_POST['Gender'];
    $email=$_POST['email'];
    $device=$_POST['device'];
    $WhomtoMeet=$_POST['WhomtoMeet'];
    $Reason=$_POST['Reason'];
    $Govt_ID=$_POST['Govt_ID'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
       /*  $image_name = $Govt_ID . '.jpg'; */
    move_uploaded_file($image_tmp,"images/$image");
        


    $query=mysqli_query($con,"INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, email, device, WhomtoMeet, Reason,Govt_ID,image) value('$visname','$contactnumber','$address','$Gender','$email', '$device', '$WhomtoMeet', '$Reason','$Govt_ID','$image')");
    /* $query2 = "UPDATE tblvisitor SET image = '$image_name' WHERE Govt_ID = '$Govt_ID'";
    mysqli_query($con, $query2); */


//$query->execute();
    if ($query){
        $msg="Visitor entry details has been added";
    } else {
        $msg="Something Went Wrong";
    }

//echo "New records inserted successfully";
header('Location: thank_you_page.html');
  exit;
//$stmt->close();
//$conn->close();
?>
