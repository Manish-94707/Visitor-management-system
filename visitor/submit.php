<?php
include ('includes/dbconn.php');
session_start();
$visname=$_POST['visname'];
    $contactnumber=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $Gender=$_POST['Gender'];
    $email=$_POST['email'];
    $device=$_POST['device'];
    $WhomtoMeet=$_POST['WhomtoMeet'];
    $Reason=$_POST['Reason'];
    $Govt_ID=$_POST['Govt_ID'];
    //$image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!file_exists("images")) {
        mkdir("images", 0777, true); // Create the "images" folder with recursive permissions
    }
    $info = getimagesize($_FILES['image']['tmp_name']);
    if (isset($info['mime'])) {
        if ($info['mime'] == "image/jpeg") {
            $img = imagecreatefromjpeg($_FILES['image']['tmp_name']);
        } elseif ($info['mime'] == "image/png") {
            $img = imagecreatefrompng($_FILES['image']['tmp_name']);
        } else {
            echo "Only select jpg or png image";
        }
        if (isset($img)) {
            $output_image = time() . '.jpg';
            $image_path = "images/" . $output_image; // Store the output image in the "images" folder
            imagejpeg($img, $image_path, 1);
           // echo "Processing done";
        }
    } else {
        echo "Only select jpg or png image";
    }



       /*  $image_name = $Govt_ID . '.jpg'; */
    //move_uploaded_file($image_tmp,"images/$image");
        
    $query=mysqli_query($con,"INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, email, device, WhomtoMeet, Reason,Govt_ID,image) value('$visname','$contactnumber','$address','$Gender','$email', '$device', '$WhomtoMeet', '$Reason','$Govt_ID','$output_image')");
 
    if ($query){
        $msg="Visitor entry details has been added";
    } else {
        $msg="Something Went Wrong";
    }
     
    session_destroy(); // destroy the current session
    session_start(); // start a new session
    header("Location: /welcome/index.php");
     
    /* header('Location: '. $_SERVER['HTTP_REFERER']); */
     // redirect back to the original page
    
    exit;

?>
