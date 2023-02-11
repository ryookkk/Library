<?php 

session_start();

include('includes/config.php');
error_reporting(0);
if (isset($_POST['signup'])) {
  
    /** 
     * Code for student ID
     */
    $status=$_POST['status'];
    $fullname=$_POST['fullname'];
    $mobile=$_POST['mobileno'];
    $lrns=$_POST['lrns']; 

    $sql="INSERT INTO  tblclients(Stats,fname,mobile,LRN) 
    VALUES('{$status}','{$fullname}', {$mobile}, {$lrns})";
    //print "<pre>$sql\n";
    //print_r($_POST);
    //exit;
    $query = $dbh->prepare($sql);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        echo '<script>alert("Your Registration is successful  "+"'.$fullname.'")</script>';
    } else {   
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>
<?php
if (isset($_POST['submit'])) {
    $qrcode_value = $_POST['name_display'];
    $qrcode_value = trim($qrcode_value);
   
    $qrcode->makeCode($qrcode_value);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Books Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="asset/css/strap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="asset/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="qrcodejs/jquery.min.js"></script>
    <script type="text/javascript" src="qrcodejs/qrcode.js"></script>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    

</head>
<style>
    .panels {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		  margin-left: -100px;
		  margin-right: 300px;
}
.panel-dangers{
    border-color: #f31337;
    position: relative;
    right: -630px;
    top: -460px;
    height: 352px;
}
.panel-danger{
    
    position: relative;
    right: -250px;
}
.modal-content{
    height: 500px;
    width: 680px;
}
.modal-footer{
    position: relative;
    top: -280px;
}

.picture{
    width: 644px;
    height: 349px;
}


@media print{
    #print{
        display: none;
    
    }
}
@media print{
    #prin{
        display:none;
    }
}
.name{
    font-size: 15px;
    position: relative;
    top: -300px;
    right: -300px;
}
.lr{
    font-size: 15px;
    position: relative;
    top: 230px;
    right: -50px;
}

.prin{
    position: relative;
    top: -770px;
    right: -1170px;
}
@page{
    size: auto;
    margin: 0;
}
.qrcode > img {
    position: relative;
    top: -70px;
    right: -50px;
}
    </style>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Student Registration</h4>                
            </div>
        </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    REGISTER FORM
                </div>
                <div class="panel-body">
                    <form method="post" action="signup.php">
                        <div class="form-group" >
                              <label>Status</label>
                              <input class="form-control" value="Student" type="text" name="status" readonly>
                        </div>
                        <div class="form-group">
                            <label>Enter Full Name</label>
                            <input class="form-control" type="text" id="fullname" name="fullname" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Mobile Number :</label>
                            <input class="form-control" type="text" name="mobileno" maxlength="11" autocomplete="off" required />
                        </div>
                                                
                        <div class="form-group">
                            <label>Enter LRN Number</label>
                            <input class="form-control" type="text" name="lrns"  autocomplete="off"  />
                        </div>

                        <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal"   >
                        Launch demo modal
                        </button>
                    </form>                            
                </div>                        
            </div>
            <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Student Borrow Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="panel-headings print-container">
                     <img  src="assets/img/schoolid.jpg" class="picture"/>
                    
                        <div class="name">
                            <div class="lr">
                              Name: 
                                <?php if (isset($_POST['fullname'])): ?>
                                 <?php echo $_POST['fullname'] ?>
                                  <?php endif; ?>
                                 <br>
                                 ID Number:
                                 <?php if (isset($_POST['lrns'])): ?>
                                 <?php echo $_POST['lrns'] ?>
                                 <?php endif; ?>
                                 </div>
                                 <div id="qrcode" class="qrcode" style="width:100%; height:100%;"></div>
                                 <input type="hidden" id="name_display" value="<?php if (isset($_POST['fullname'])): ?>
                            <?php echo $_POST['fullname'] ?>
                             <?php endif; ?>
                        " />
                        </div>
                </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Print</button>
                    </div>
                    </div>
                </div>
                </div>
<!-- End Modal -->
            <div class="panel-body">
                <button class="prin" onclick="window.print();">Print </button> 
            </div>
        </div> 
    </div>
</div>
</div>

    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 220,
            height : 220
        });

        function makeCode () {		
            var elText = document.getElementById("name_display");
            qrcode.makeCode(elText.value.trim());
            if(qrcode!=null && !qrcode.isEmpty()){
           qrcode = qrcode.trim();
}
        }

        makeCode();

        $("#name_display").
            on("blur", function () {
                makeCode();
            }).
            on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });
    </script>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="asset/js/custom.js"></script>
</body>
</html>
