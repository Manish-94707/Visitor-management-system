<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Form</title>
</head>
<body>
    <h2>Visitor Form</h2>
    <form action="submit.php" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" class="form-control" name="visname" id="visname" required>

        <label for="address">Address:</label><br>
        <input type="text" class="form-control" name="address" id="address" required>

        <label for="apartment">Apartment Number:</label><br>
        <input type="text" id="apartment" name="apartment"><br>

        <label for="whomtovisit">Whom to Visit:</label><br>
        <input type="text" class="form-control" name="whomtomeet" id="whomtomeet" required>

        <label for="contact">Contact Number:</label><br>
        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required>

        <label for="gender">Gender:</label><br>
        <select class="form-control select2" name="gender" style="width: 100%;" required>
                      <option selected="">Choose</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select><br>

        <label for="building">Building Number:</label><br>
        <input type="text" class="form-control" name="buildingno" id="buildingno" readonly>

        <label for="reason">Reason for Visiting:</label><br>
        <input type="text" class="form-control" name="reason" id="reason" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
