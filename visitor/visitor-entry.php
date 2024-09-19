<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['submit'])){

    $cvmsaid=$_SESSION['cvmsaid'];
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
        move_uploaded_file($image_tmp,"images/$image");

        $query=mysqli_query($con,"INSERT into tblvisitor(VisitorName, MobileNumber, Address, Gender, email, device, WhomtoMeet, Reason,Govt_ID,image) value('$visname','$contactnumber','$address','$Gender','$email', '$device', '$WhomtoMeet', '$Reason','$Govt_ID','$image')");
//$query->execute();
    if ($query){
        $msg="Visitor entry details has been added";
    } else {
	$msg="Something Went Wrong";}
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Visitor Registeration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="dist/css/custom.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
    function getBuilding(val) {
        $.ajax({
        type: "POST",
        url: "autofill.php",
        data:'apartmentid='+val,
        success: function(data){
        //alert(data);
        $('#buildingno').val(data);
        }
        });
    }
    </script>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='visitors'; include 'includes/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Visitor Entry
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Visitor Entry</li>
      </ol>
    </section>
    <hr class="mb-0">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php if($msg){ echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Alert!</h4>
                $msg
    </div>";}  ?>

         <!-- Forms -->
     
      
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Please fill up the details below</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form method="POST" class="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="visname" id="visname" required>
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

                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="50" required>
</div>

<script>
    document.getElementById('address').addEventListener('input', function() {
        if (this.value.length > 50) {
            this.value = this.value.substring(0, 50);
        }
    });
</script>


                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address">
  <div class="invalid-feedback">Please enter a valid email address.</div>
</div>
                    <div class="form-group">
                    <label>Whom to Visit</label>
                    <input type="text" class="form-control" name="WhomtoMeet" id="WhomtoMeet" required maxlength="20">
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
                      <label for="Govt_ID">Govnment ID</label>
                      <input type="text" class="form-control" name="Govt_ID" id="Govt_ID" maxlength="20" required oninput="checkInputLength(this)">
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
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>Contact Number</label>
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
                    <label>Gender</label>
                    <select class="form-control select2" name="gender" style="width: 100%;" required>
                      <option selected="">Choose</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Device</label>
                    <input type="text" class="form-control" name="device" id="device" maxlength="50" required>
</div>

<script>
    document.getElementById('device').addEventListener('input', function() {
        if (this.value.length > 50) {
            this.value = this.value.substring(0, 50);
        }
    });
</script>


                <div class="form-group">
                    <label>Reason of Visiting</label>
                    <input type="text" class="form-control" name="Reason" id="Reason" maxlength="50" required>
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
                  <!-- /.form-group -->
                  

              <!-- <div class="form-group">
                <label for="Govt_ID">Government ID</label>
                <input type="text" class="form-control" name="Govt_ID" id="Govt_ID" required> -->


                <!-- <lable align="right"><b><br>Upload Government ID:<br></b></lable>  <br>                          
                            <input type="file" name="image" id="profile-img" required/><br>
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
                                    </script><br> -->
              </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <center><button type="submit" class="btn btn-sm btn-primary rounded-0" name="submit">Save Entry</button></center>
            </div>
          </div>
          </form>
      
      <!-- /Form -->
        
    
	  
      <!-- Main row -->
      
      <!-- / Main row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->

      <div class="tab-pane" id="control-sidebar-home-tab">
       
      </div>
 
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } ?>
