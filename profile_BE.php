<!DOCTYPE html>
<?php
session_start();

include_once('private/conn.php');
if (!isset($_SESSION["studentEmail"])) {
    header("location:login.php");
} 

$email=$_SESSION["studentEmail"];

$result=$db->get_row("select * from student_be where studentEmail='$email'");



if(isset($_POST["formbe"]))
{
    $fdMarksOb=$_POST["fdMarksObtained"];
    $fdMarksOut=$_POST["fdMarksOutOf"];
    $seobtained=$_POST["seMarksObtained"];
    $seoutof=$_POST["seMarksOutOf"];
     $teobtained=$_POST["teMarksObtained"];
    $teoutof=$_POST["teMarksOutOf"];
    $beobtained=$_POST["beMarksObtained"];
    $beoutof=$_POST["beMarksOutOf"];
    $backlog=$_POST["backlogs"];
    
    $updateRes=$db->query("UPDATE `student_be` SET `feOrDiplomaMarksObtained`=$fdMarksOb,`feOrDiplomaMarksOutOf`=$fdMarksOut,`seMarksObtained`=$seobtained,`seMarksOutOf`=$seoutof,`teMarksObtained`=$teobtained,`teMarksOutOf`=$teoutof,`beMarksObtained`=$beobtained,`beMarksOutOf`=$beoutof,`backlog`=$backlog WHERE studentEmail='$email'");

    if(isset($updateRes))
    {
        
        ?>
<script> alert('Updated Successfully.'); </script>
<?php
        header("location:index.php");
    }
 else {
     echo "<script> alert('ERROOR.'); </script>";   
    }
}
?>

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
      <form class="form-horizontal"  method="POST" id="signupform" action="profile_BE.php" name="signupform">
<fieldset>
<!-- Form Name -->
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label"><h3>BE</h3></label>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >FE/Diploma Marks obtained<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="fdMarksObtained" name="fdMarksObtained" class="form-control" placeholder="marks" type="number"  value="<?php if($result->feOrDiplomaMarksObtained) echo $result->feOrDiplomaMarksObtained; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">FE/Diploma Marks out of<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="fdMarksOutOf" name="fdMarksOutOf" class="form-control" placeholder="out of" type="text"  value="<?php if($result->feOrDiplomaMarksOutOf) echo $result->feOrDiplomaMarksOutOf; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >SE Marks obtained<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="seMarksObtained" name="seMarksObtained" class="form-control" placeholder="marks" type="number"  value="<?php if($result->seMarksObtained) echo $result->seMarksObtained; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">SE Marks out of<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="seMarksOutOf" name="seMarksOutOf" class="form-control" placeholder="out of" type="text"  value="<?php if($result->seMarksOutOf) echo $result->seMarksOutOf; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
  
  <div class="form-group">
  <label class="col-md-4 control-label" >TE Marks obtained<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="teMarksObtained" name="teMarksObtained" class="form-control" placeholder="marks" type="number"  value="<?php if($result->teMarksObtained) echo $result->teMarksObtained; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">TE Marks out of<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="teMarksOutOf" name="teMarksOutOf" class="form-control" placeholder="out of" type="text"  value="<?php if($result->teMarksOutOf) echo $result->teMarksOutOf; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
  <div class="form-group">
  <label class="col-md-4 control-label" >BE Marks obtained<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="beMarksObtained" name="beMarksObtained" class="form-control" placeholder="marks" type="number"  value="<?php if($result->beMarksObtained) echo $result->beMarksObtained; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">BE Marks out of<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="beMarksOutOf" name="beMarksOutOf" class="form-control" placeholder="out of" type="text"  value="<?php if($result->beMarksOutOf) echo $result->beMarksOutOf; else echo ""; ?>" > 
      <span class="input-group-addon"></span>
    </div>
  </div>
</div>
  
  <div class="form-group">
  <label class="col-md-4 control-label">No. of Backlogs<label style="color:blue">*</label></label>
  <div class="col-sm-5">
    <div class="input-group">
      <input id="backlogs" name="backlogs" class="form-control" placeholder="Backlogs" type="text"  value="<?php if($result->backlog) echo $result->backlog; else echo ""; ?>" >
      <span class="input-group-addon"></span>
    </div>
  </div>
  </div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" ></label>

  <div class="col-sm-4 text-center" align="center" style="margin-left:-2%;margin-right:4%;">
  
      <button type="button" class="btn btn-info" onclick="editSSC()">Back</button>
     
        <button type="submit" class="btn btn-info" name="formbe" id="formbe">Submit</button>
 


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
 
    function editSSC() {
    window.location.href = "/tnp/profile_sscmarks.php";
    // body...
}



</script>
</body>
</html>