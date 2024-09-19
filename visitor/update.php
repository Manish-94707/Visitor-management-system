<?php
include ('includes/dbconn.php');

// Check if form is submitted
if(isset($_POST['update_data'])) {
    // Retrieve data from the form
    $visname = $_POST['VisitorName'];
    $contactnumber = $_POST['MobileNumber'];
    $address = $_POST['Address'];
    $Gender = $_POST['Gender'];
    $email = $_POST['email'];
    $device = $_POST['device'];
    $WhomtoMeet = $_POST['WhomtoMeet'];
    $Reason = $_POST['Reason'];
    $Govt_ID = $_POST['Govt_ID'];
    
    // Handle image upload
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Move the uploaded image to the server
    move_uploaded_file($image_tmp, "images/$image");

    // Insert data into the database
    $query = "INSERT INTO tblvisitor (VisitorName, MobileNumber, Address, Gender, email, device, WhomtoMeet, Reason, Govt_ID, image) VALUES ('$visname', '$contactnumber', '$address', '$Gender', '$email', '$device', '$WhomtoMeet', '$Reason', '$Govt_ID', '$image')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $msg = "New visitor entry has been added successfully.";
    } else {
        $msg = "Failed to add new visitor entry. Please try again.";
    }
    
   
    session_destroy();
    session_start();
    header("Location: /welcome/index.php");
    /* header('Location: '. $_SERVER['HTTP_REFERER']); */ // redirect back to the original page
    exit;
    
    // Redirect the user to a thank you page or another appropriate page
    /* header('Location: /welcome/index.php'); */
    //exit;
}
?>
