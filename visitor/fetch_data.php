<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data</title>
</head>
<body>
    <form method="post" action="">
        <label for="mobilenumber">Enter Mobile Number:</label><br>
        <input type="text" id="mobilenumber" name="mobilenumber"><br><br>
        <input type="submit" name="fetch_data" value="Fetch Data">
    </form>

    <?php
    include('includes/dbconn.php');

    // Check if form is submitted
    if(isset($_POST['fetch_data'])) {
        // Check if mobile number is provided
        if(isset($_POST['mobilenumber'])) {
            $mobilenumber = $_POST['mobilenumber'];

            // Query to fetch data from server based on mobile number
            $query = "SELECT * FROM tblvisitor WHERE MobileNumber = '$mobilenumber'";
            $result = mysqli_query($con, $query);

            // Check if any rows are returned
            if(mysqli_num_rows($result) > 0) {
                // Fetch and display data
                $row = mysqli_fetch_assoc($result);

                echo "<h2>Visitor Details:</h2>";
                echo "<ul>";
                foreach ($row as $key => $value) {
                    // Skip displaying certain fields
                    if($key === 'id' || $key === 'EnterDate' || $key === 'remark' || $key === 'outtime') {
                        continue;
                    }
                    echo "<li><strong>$key:</strong> $value</li>";
                }
                echo "</ul>";

                // Display the image
                if(!empty($row['image'])) {
                    $imageURL = 'images/' . $row['image'];
                    echo "<img src='$imageURL' alt='Visitor Image'><br>";
                } else {
                    echo "No image available.";
                }
            } else {
                echo "No data found for this mobile number.";
            }
        } else {
            echo "Mobile number not provided.";
        }
    }
    ?>
</body>
</html>
