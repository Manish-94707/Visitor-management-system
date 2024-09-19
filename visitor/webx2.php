<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-image: url("background-img11.png");
            background-size: cover;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn-submit {
            background-color: #f0965f;
            border: none;
            border-radius: 20px;
            padding: 10px 40px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #bba9a9;
        }
    </style>
</head>
<body>
















    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="logo11.jpg" alt="Trulli" class="img-fluid">
                        <p>V I S I T O R</p>
                        <p>R E G I S T R A T I O N</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="mobilenumber">Enter Mobile Number:</label>
                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required pattern="[0-9]{10}"  required maxlength="10" title="Please enter a 10-digit numeric contact number" oninput="restrictToNumeric(this)">
    <div class="invalid-feedback">Please enter a 10-digit numeric contact number.</div>
</div>

<script>
    function restrictToNumeric(input) {
        // Remove any non-numeric characters from the input
        input.value = input.value.replace(/\D/g, '');
    }
</script>

                            <div class="form-group">
                                <input type="submit" name="fetch_data" value="Fetch Data" class="btn btn-submit btn-block">
                            </div>
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
            echo "<form method='post' action='update.php' enctype='multipart/form-data'>"; // Update action and method with enctype for file upload

            foreach ($row as $key => $value) {
                // Exclude certain fields from being readonly
                if($key === 'EnterDate' || $key === 'remark' || $key === 'outtime' || $key === 'id') {
                    continue;
                }

                echo "<div class='form-group'>";
                echo "<label for='$key'>$key:</label>";
                // Check if the field is the image field
                if ($key === 'image') {
                    echo "<br><img src='images/$value' alt='Visitor Image' style='max-width: 100px;'><br>"; // Display image
                } else {
                    // Render input fields as readonly or editable based on the field type
                    $readonly = ($key === 'device' || $key === 'WhomtoMeet' || $key === 'Reason') ? '' : 'readonly'; // Make certain fields editable
                    echo "<input type='text' class='form-control' id='$key' name='$key' value='$value' $readonly>"; // Render input field
                }
                echo "</div>";
            }

            // Submit button
            echo "<div class='form-group'>";
            echo "<input type='submit' name='update_data' value='Update Data' class='btn btn-submit btn-block'>";
            echo "</div>";

            echo "</form>";
        } else {
            // Redirect user if mobile number not found
            header("Location: web.php");
            exit();
        }
    } else {
        echo "Mobile number not provided.";
    }
}
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
