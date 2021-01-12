<!DOCTYPE html>
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
<img class="img-responsive" style="vertical-align: bottom;" src="static/pict_logo.png" alt="pict logo"/>
</a><span style="margin-left: -20%; color: rgb(222, 222, 222);">Training and Placement</span></h1>  


    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
    </div>
    <br>
  </div>
</nav>
  
<div class="container-fluid ">    
  <div class="row content">
    <div class="col-sm-2 sidenav ">
    </div>
    <div class="col-sm-8 text-left"> 
        <div class="signin-form">
    <br>
       <h1 class="text-center"><b>Signup</b></h1>
      <br>
      <form class="form-horizontal"   method="POST" id="register-form" name="register-form">
<fieldset>
<!-- Form Name -->
<!-- Text input-->
<div class="col-sm-12" id="error">
   
            </div>
<div class="form-group">
  <label class="col-sm-4 control-label" >Name</label>
  <div class="col-sm-5">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Course</label>
  <div class="col-sm-5">
    <select id="course" name="course" class="form-control">
      <option value="BE">BE</option>
      <option value="ME">ME</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Branch</label>
  <div class="col-sm-5">
    <select id="branch" name="branch" class="form-control">
      <option value="Comp">COMP</option>
      <option value="EnTC">ENTC</option>
      <option value="IT">IT </option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Roll Number</label>
  <div class="col-sm-5">
  <input id="roll" name="roll" type="number" placeholder="4263" min="1000" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label">College ID</label>
  <div class="col-sm-5">
  <input id="college_id" name="college_id" type="text" placeholder="C2K13104366"  class="form-control input-md">
  </div>

</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Email </label>
  <div class="col-sm-5">
  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Password</label>
  <div class="col-sm-5">
    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label>
  <div class="col-sm-5">
    <input id="cpassword" name="cpassword" type="password" placeholder="C Password" class="form-control input-md">
  </div>
</div>
<!-- Text input
<div class="form-group">
  <label class="col-md-4 control-label" >Phone</label>
  <div class="col-sm-5">
  <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md">
</div>
</div>

-->



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  
  <div class="col-sm-4 text-center" align="center" style="margin-left:-2%;margin-right:4%;">
  <button type="submit" class="btn btn-info" id="btn-submit" name="btn-submit" >Submit</button>
  </div>
</div>
</fieldset>
</form>

 </div>
    </div>

 <div class="col-sm-2 sidenav">
<!--- Side navigation data paste here-->
<a href ="/"><button id="singlebutton" name="singlebutton" class="btn btn-primary btn-block"><b>Home</b></button></a>
</div>


</div>
</div>
<script>

  $('document').ready(function()
{
  
    
    /* validation */
    $("#register-form").validate({
        rules:
        {
            name: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 32
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
            email: {
                required: true,
                email: true
            },
            roll:{
                required:true,
                maxlength: 4,
            }
        },
        messages:
        {
            name: "Enter a Valid Name",
            password:{
                required: "Provide a Password",
                minlength: "Password Needs To Be Minimum of 6 Characters"
            },
            email: "Enter a Valid Email",
            cpassword:{
                required: "Retype Your Password",
                equalTo: "Password Mismatch! Retype"
            },
            
            roll:
                    {
                        maxlength: "Roll Number cannnot exceed 4 Characters"
                        
                    }
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already registered.Please login. !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("template/successReg.php"); }); ',5000);
                    alert("registered Successfully");
                    window.location.href="./index.php";
                    

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});
</script>

<?php
include("template/footer.php");
?>

</body>
</html>