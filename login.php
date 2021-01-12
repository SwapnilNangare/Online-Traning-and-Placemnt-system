<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['studentEmail']))
{
    header("location:index.php");
}
include_once('private/conn.php');

if(isset($_POST["login_student"]))
{
    $username=$_POST["email"];
    $pass=$_POST["password"];
    
    $result=$db->get_row("select * from student_info where studentEmail='$username' and studentPassword='$pass'");
    
    if($result)
    {
     
     $_SESSION["studentEmail"]=$username;
     $_SESSION["type_login"]="student";
     $_SESSION["studentRegId"]=$result->studentRegID;
     $_SESSION["studentName"]=$result->studentName;
     header("location:index.php");
    }
    else
		{
			$msg = "<div class='alert alert-danger'>Login failed/Incorrect Username or Password</div>";
		}
    
}
  else if(isset($_POST["login_admin"]))
{
    $username=$_POST["email"];
    $pass=$_POST["password"];
    
    $result=$db->get_row("select * from admin_info where adminEmail='$username' and adminPassword='$pass'");
    
    if($result)
    {
     
     $_SESSION["studentEmail"]=$username;
     #$_SESSION["studentRegId"]=$result->studentRegID;
     $_SESSION["studentName"]=$result->adminName;
     header("location:index.php");
    }
    else
		{
			$msg = "<div class='alert alert-danger'>Login failed/Incorrect Username or Password</div>";
		}
    
}

?>
<!---  HEAD CODE STARTS -->
<?php 
include("template/head.html")
?>
<!---  NHEAD CODE ENDS -->
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
<h1 class="text-center"> 
<a class="pull-left" href="/"> 
<img class="img-responsive" style="vertical-align: bottom;" src="static/corpo.jpg" width="100" height="100"/>
</a><span style="margin-left: -20%; color: rgb(222, 222, 222);">Training and Placement</span></h1>  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    </div>
  <br>
  </div>
</nav>



<div class="container-fluid ">    
  <div class="row content">
    <div class="col-sm-2 sidenav ">
 
    </div>
    <div class="col-sm-8 text-left"> 
    <br>
       <h1 class="text-center"><b>Login</b></h1>
      <br>
      <form  method="post" class="form-horizontal" id="loginform" role = "form">
         
<fieldset>

<!-- Form Name -->
<!-- <form   class="form-horizontal"> -->
<!-- <fieldset> -->
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
      <input id="textinput" name="email" type="email" class="form-control input-md" required>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label">Password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password" type="password" class="form-control input-md" required>
    <br>    
    <a href="signup.php">New User? Click to Register</a>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
 <div class="form-group">
         
          <div class="col-md-4" align="center">
              <button type="submit" name="login_student" id="login_student" style="padding-left:15%;padding-right:15%;font-style" class="btn btn-info" >Login</button>
          </div>
        </div>
</div>
</fieldset>
</form>

 </div>
 <div class="col-sm-2 sidenav">
<!--- Side navigation data paste here-->
<a href ="/"><button id="singlebutton" name="singlebutton" class="btn btn-primary btn-block"><b>Home</b></button></a> 
</div>
</div>
</div>


<?php
include("template/footer.php");
?>

</body>
</html>
