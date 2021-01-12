<!DOCTYPE html>
<?php
session_start();

include_once('private/conn.php');
if (!isset($_SESSION["studentEmail"])) {
    header("location:login.php");
} 

$email=$_SESSION["studentEmail"];
$result=$db->get_row("select * from student_ssc where studentEmail='$email'");



if(isset($_POST["formssc"]))
{
    $board=$_POST["board"];
    $institute=$_POST["institute"];
    $obtained=$_POST["marksObtained"];
    $outof=$_POST["marksOutOf"];
    $passingYear=$_POST["passingYear"];
    
    $updateRes=$db->query("UPDATE `student_ssc` SET `board`='$board',`institute`='$institute', `marksObtained`=$obtained,`marksOutof`=$outof,`passingYear`='$passingYear' WHERE studentEmail='$email'");

    if(isset($updateRes))
    {
        header("location:profile_BE.php");
        ?>
<script> alert('Updated Successfully.'); </script>
<?php
        
    }
 else {
     echo "<script> alert('ERROOR.'); </script>";   
    }
}
?>
<!---  HEAD CODE STARTS -->
<?php 
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
      <br>
     <form class="form-horizontal"  method="POST" id="signupform" name="signupform">
<fieldset>
<!-- Form Name -->
<!-- Text input-->

<div class="form-group">
  <label class="col-sm-4 control-label"><h3>SSC Marks</h3></label>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Board<label style="color:blue">*</label></label>
  <div class="col-sm-5">
 
      <input id="board" name="board" type="text"  placeholder="msbte"   class="form-control input-md"  value = "<?php if($result->board) echo $result->board; else echo ""; ?>">
  
  </div>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label">Institute<label style="color:blue">*</label></label>
  <div class="col-sm-5">
 
      <input id="institute" name="institute" type="text"  placeholder="institute"   class="form-control input-md"  value = "<?php if($result->institute) echo $result->institute; else echo ""; ?>">
  
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Passing Year<label style="color:blue">*</label></label>
  <div class="col-sm-5">
  
  <input id="passingYear" name="passingYear" type="text"  placeholder="2014"   class="form-control input-md"  value = "<?php if($result->passingYear) echo $result->passingYear; else echo ""; ?>">
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Marks obtained<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="marksObtained" name="marksObtained" class="form-control" placeholder="marks" type="number"  value="<?php if($result->marksObtained) echo $result->marksObtained; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Marks out of<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="marksOutOf" name="marksOutOf" class="form-control" placeholder="out of" type="text"  value="<?php if($result->marksOutOf) echo $result->marksOutOf; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="formssc"></label>
  
  <div class="col-sm-4 text-center" align="center" style="margin-left:-2%;margin-right:4%;">
      <button type="button" onclick="profile()" class="btn btn-info">Back</button>
  <button type="submit" id="formssc" name="formssc" class="btn btn-info">Next</button>
 
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
<?php
include("template/footer.php");
?>
<script>

function profile() {
    window.location.href = "/tnp/profile.php";
    // body...
}

</script>
</body>
</html>
Contact GitHub 