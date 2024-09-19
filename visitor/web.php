<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visitor Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script>
  function signUp() {

    alert("submitted  successfully!");
    //window.location.replace("/welcome/index.php");
    location.reload();

  // disable the button to prevent multiple submissions
  $('#submitButton').prop('disabled', true);
 
  // get form data
  var formData = new FormData($('#myForm')[0]);

  // submit form using AJAX
  $.ajax({
    url: 'submit.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    
    success: function(response) {
      // handle success response
      if (response === 'success') {
        // display success message
        // alert('Your registration was successful!');
        // Assuming you want to reload the page to reset the session
        alert('Your registration was successful!');
         
      } else {
        // display error message
        alert('Error: ' + response);
      }
    },
    error: function(xhr, status, error) {
      // handle error response
      alert('Error: ' + xhr.responseText);
    },
    complete: function() {
      // re-enable the button regardless of success or error
      $('#submitButton').prop('disabled', false);
    }
  });
}


  function limitContactNumber(input) {
    if (input.value.length > 10) {
      input.value = input.value.slice(0, 10);
    }
  }

  // Function to prevent integer input in the name field
  document.getElementById('visname').addEventListener('input', function() {
    var nameInput = this.value;
    if (/^\d+$/.test(nameInput)) {
      this.value = ''; // Clear the input if it's an integer
    }
  });
</script>

  <style>
    body {
      background-color: #f0f0f0;
      background-image: url("background-img11.png");
      background-size: auto;
      height: 100%;
      margin: 0;
    }
    .container {
      margin-top: 50px;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #ffede1;
      color: #000;
      border-radius: 20px 20px 0 0;
      text-align: center;
      font-size: 24px;
      padding: 20px;
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
<body onload="window.onunload = refreshParent;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8"> <!-- Adjusted column size for medium screens -->
        <div class="card">
          <div class="card-header">
            <img src="logo11.jpg" alt="Trulli" class="img-fluid">

            <p>V I S I T O R</p>
            <p>R E G I S T R A T I O N</p>
          </div>
          <div class="card-body">
            <form id="myForm" action="submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
    <label for="visname">Full Name</label>
    <input type="text" class="form-control" name="visname" id="visname" autocomplete="off" required>
    <div class="invalid-feedback">Please enter a valid name (alphabets and spaces only).</div>
</div>

<script>
    var inputField = document.getElementById('visname');
    var maxLength = 50;

    inputField.addEventListener('input', function(event) {
        if (this.value.length > maxLength) {
            this.value = this.value.substring(0, maxLength);
            this.setCustomValidity('Exceeded character limit');
            this.reportValidity();
        } else {
            this.setCustomValidity('');
        }
    });

    inputField.addEventListener('keypress', function(event) {
        var charCode = event.charCode || event.keyCode;
        // Check if the entered character is not an integer
        if (charCode >= 48 && charCode <= 57) {
            event.preventDefault();
        }
    });

    inputField.addEventListener('paste', function(event) {
        // Prevent pasting of integer values
        var pastedData = event.clipboardData.getData('text/plain');
        if (/^\d+$/.test(pastedData)) {
            event.preventDefault();
        }
    });
</script>



<div class="form-group">
    <label for="mobilenumber">Mobile Number</label>
    <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" autocomplete="off" required pattern="[0-9]{10}"  <?php if(isset($_GET['mobilenumber'])) echo "value='".$_GET['mobilenumber']."'"; ?> required maxlength="10" readonly title="Please enter a 10-digit numeric contact number" oninput="restrictToNumeric(this)">
    <div class="invalid-feedback">Please enter a 10-digit numeric mobile number.</div>
</div>

<script>
    function restrictToNumeric(input) {
        // Remove any non-numeric characters from the input
        input.value = input.value.replace(/\D/g, '');
    }
</script>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address" maxlength="50" autocomplete="off" required>
</div>

<script>
    document.getElementById('address').addEventListener('input', function() {
        if (this.value.length > 50) {
            this.value = this.value.substring(0, 50);
        }
    });
</script>

              <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="Gender" id="Gender" autocomplete="off" required>
                  <option selected disabled>Choose</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
             
              <div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" name="email" id="email" autocomplete="off" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address">
  <div class="invalid-feedback">Please enter a valid email address.</div>
</div>

<div class="form-group">
    <label for="device">Device name</label>
    <input type="text" class="form-control" name="device" id="device" maxlength="50" autocomplete="off" required>
</div>

<script>
    document.getElementById('device').addEventListener('input', function() {
        if (this.value.length > 50) {
            this.value = this.value.substring(0, 50);
        }
    });
</script>

<div class="form-group">
    <label for="WhomtoMeet">Whom to meet</label>
    <input type="text" class="form-control" name="WhomtoMeet" id="WhomtoMeet" autocomplete="off" required maxlength="20">
    <div class="invalid-feedback">Please enter a valid name (up to 20 characters).</div>
</div>

<script>
    document.getElementById('WhomtoMeet').addEventListener('keypress', function(event) {
        var charCode = event.charCode || event.keyCode;
        // Check if the entered character is a digit (0-9) and prevent its input
        if (charCode >= 48 && charCode <= 57) {
            event.preventDefault();
        }
    });
</script>

<div class="form-group">
    <label for="Reason">Reason for Visiting</label>
    <input type="text" class="form-control" name="Reason" id="Reason" maxlength="50" autocomplete="off" required>
    <div id="error-message" style="color: red; display: none;">Exceeded character limit!</div>
</div>

<script>
    document.getElementById('Reason').addEventListener('input', function() {
        var maxLength = 50;
        var reasonInput = this.value;
        if (reasonInput.length > maxLength) {
            document.getElementById('error-message').style.display = 'block';
            this.setCustomValidity('Exceeded character limit');
        } else {
            document.getElementById('error-message').style.display = 'none';
            this.setCustomValidity('');
        }
    });
</script>

              <div class="form-group">
    <label for="Govt_ID">Government ID</label>
    <input type="text" class="form-control" name="Govt_ID" id="Govt_ID" maxlength="20" autocomplete="off" required oninput="checkInputLength(this)">
    <div id="error-message" style="color: red; display: none;">Exceeded character limit!</div>
</div>

<script>
    function checkInputLength(input) {
        var maxLength = parseInt(input.getAttribute('maxlength'));
        if (input.value.length > maxLength) {
            document.getElementById('error-message').style.display = 'block';
            input.setCustomValidity('Exceeded character limit');
        } else {
            document.getElementById('error-message').style.display = 'none';
            input.setCustomValidity('');
        }
    }
</script>

<label align="right">Upload Government ID:</label>  <br>                          
                            <input type="file" name="image" id="profile-img" autocomplete="off" required/><br>
                                    <img src="" id="profile-img-tag" width="100px" />
                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            
                                            reader.onload = function (e) {
                                                $('#profile-img-tag').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#profile-img").change(function(){
                                        readURL(this);
                                    });
                                </script>   
          </div>
              
 <button type="submit" class="btn btn-submit btn-block" id="submitButton" onclick="signUp()">Submit</button>
 <br>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <script>
  window.onpageshow = function(event) {
    if (event.persisted) {
      /* alert("Submitted succesfully"); */
      /* location.reload(); */
      //window.location.replace("index.php");
      document.querySelector("form").reset();
    }
  };
</script>
</body>
</html>


