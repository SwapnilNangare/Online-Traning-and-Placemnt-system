<!DOCTYPE html>
<!---  HEAD CODE STARTS -->
<?php
session_start();

include_once('private/conn.php');
if (!isset($_SESSION["studentEmail"])) {
    header("location:login.php");
} 

$email=$_SESSION["studentEmail"];
$result=$db->get_row("select * from student_info where studentEmail='$email'");



if(isset($_POST["profileSubmit"]))
{
    $name=$_POST["name"];
    $course=$_POST["course"];
    $branch=$_POST["branch"];
    $roll=$_POST["roll"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $mobile=$_POST["phone"];
    $college_id=$_POST["college_id"];
    $updateRes=$db->query("UPDATE `student_info` SET `studentRegId`='$college_id',`studentName`='$name', `studentCourse`='$course',`studentBranch`='$branch',`studentRollNo`=$roll,`studentGender`='$gender',`studentMobile`='$mobile' WHERE studentEmail='$email'");

    if(isset($updateRes))
    {
        header("location:profile_sscmarks.php");
        ?>
<script> alert('Updated Successfully.'); </script>
<?php
        
    }
 else {
     echo "<script> alert('ERROOR.'); </script>";   
    }
}



include("template/head.html")
?>
<!---  NHEAD CODE ENDS -->
<body>

    <!---  NAVBAR CODE STARTS -->
<?php
include("template/navbar.php");
?>
    <!---  NAVBAR CODE ENDS-->



    <div class="container-fluid ">    
        <div class="row content">
            <div class="col-sm-2 sidenav ">

            </div>

            <div class="col-sm-8 text-left"> 
                <br>
                <h1 class="text-center"><b>Profile</b></h1>
                <br>
                <form class="form-horizontal"  method="POST" id="signupform" name="signupform">
                    <fieldset>
                        <!-- Form Name -->
                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-sm-4 control-label" >Name</label>
                            <div class="col-sm-5">
                                <input id="name" name="name" type="text" value = "<?php echo $result->studentName; ?>" placeholder="Name" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Course</label>
                            <div class="col-sm-5">
                                <select id="course" name="course" class="form-control">
                                    <?php if($result->studentName=="BE") { ?>
                                    <option value="BE" selected="selected">BE</option>
                                    <?php } else { ?>
                                    <option value="BE">BE</option>
                                   <?php ;}  ?>
                                    <?php if($result->studentName=="ME") { ?>
                                    <option value="ME" selected="selected">ME</option>
                                    <?php } else { ?>
                                    <option value="ME">ME</option>
                                   <?php }  ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Branch</label>
                            <div class="col-sm-5">
                                <select id="selectbasic" name="branch" class="form-control">

                                   <?php if($result->studentBranch=="COMP") { ?>
                                    <option value="Comp" selected="=selected">COMP</option>
                                    <?php } else { ?>
                                    <option value="Comp">COMP</option>
                                    <?php ;}  ?>

                                     <?php if($result->studentBranch=="EnTC") { ?>
                                    <option value="EnTC" selected="=selected">EnTC</option>
                                    {% else %} <?php } else { ?>
                                    <option value="EnTC">EnTC</option>
                                    <?php ;}  ?>

                                    <?php if($result->studentBranch=="IT") { ?>
                                    <option value="IT" selected="=selected">IT</option>
                                    {% else %} <?php } else { ?>
                                    <option value="IT">IT</option>
                                    <?php ;}  ?>

                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Roll Number</label>
                            <div class="col-sm-5">
                                <input id="roll" name="roll" type="text" value = "<?php echo $result->studentRollNo; ?>" placeholder="4263" min="1000" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">College ID</label>
                            <div class="col-sm-5">
                                <input id="college_id" name="college_id" type="text" value = <?php echo $result->studentRegId; ?> placeholder="C2K13104366"  class="form-control input-md">
                            </div>

                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Email </label>
                            <div class="col-sm-5">
                                <input id="email" name="email" type="text"  value = <?php echo $result->studentEmail; ?> placeholder="Email" class="form-control input-md">  
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Gender</label>
                            <div class="col-sm-5">
                                <select id="selectbasic" name="gender" class="form-control">
                                     <?php if($result->studentGender=="FEMALE") { ?>
                                    <option value="FEMALE" selected="selected">FEMALE</option>
                                    <option value="MALE">MALE</option>
                                     <?php } else { ?>
                                    <option value="FEMALE" >FEMALE</option>
                                    <option value="MALE" selected="selected">MALE</option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Phone</label>
                            <div class="col-sm-5">
                                <input id="phone" name="phone" type="text"  value = "<?php echo $result->studentMobile; ?>" placeholder="Phone" class="form-control input-md">
                            </div>
                        </div>
               <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>

                            <div class="col-sm-4 text-center" align="center" style="margin-left:-2%;margin-right:4%;">
                                <button type="submit" name="profileSubmit" class="btn btn-info" onsubmit="editProfile()">Next</button>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>

            <div class="col-sm-2 sidenav">
                <!--- Side navigation data paste here-->
            </div>


        </div>
    </div>


    <footer class="container-fluid text-center">
        <div>© 2016-2017 <a href="http://pict.edu">PICT.EDU</a>, All rights reserved.<br/>
            <p><a href="#">Developers</a></p></div>
    </footer>
</body>
</html>
