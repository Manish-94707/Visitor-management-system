<?php
// Get the image file name from the query string
$image_name = $_GET['image_name'];

// Set the appropriate content type
header('Content-Type: image/jpeg');

// Read the image file and send it to the browser
readfile("images/$image_name");
?>