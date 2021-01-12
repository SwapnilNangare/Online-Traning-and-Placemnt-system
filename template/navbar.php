<nav class="navbar navbar-inverse">
  <div class="container-fluid">
<h1 class="text-center"> 
<a class="pull-left" href="/tnp/"> 
<img class="img-responsive" src="static/corpo.jpg" width="100" height="100"/>
</a><span style="margin-left: -20%; color: rgb(222, 222, 222);">Training and Placement</span></h1>  


    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
     
 
    <div class="collapse navbar-collapse" id="myNavbar">
    
      <?php 

 if(!isset($_SESSION['adminEmail']))
 {
     ?>
        <ul class="nav navbar-nav" style="margin-left:15.5%;">
            <li><a href="index.php">Home</a></li>
            <li><a href="view_companies.php">Available Recruiters</a></li>
            <!-- {% if login == 2 %} -->
            <li><a href="profile.php">Basic Info</a></li>
            <!-- {% endif %} -->

            <li><a href="profile_sscmarks.php">SSC Marks</a></li>

            <li><a href="profile_BE.php">Educational Details</a></li>
               

      </ul>
      <?php
 }
      ?>
      <ul class="nav navbar-nav navbar-right">
      
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php if(isset($_SESSION["studentName"])){ echo $_SESSION["studentName"];}else{
        echo 'Welcome User';}?> <span class="caret"></span></a> 
          <ul class="dropdown-menu">

           
                <li><a href="profile.php">Update Profile</a></li>
                
                <li><a href="profile_sscmarks.php">Update Marks</a></li>
               
                <li><a href="logout.php">Logout</a></li>

          </ul>
        </li>
    
     </ul>
      <!-- {% else %} 
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/plogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
     {% endif %} -->
    </div>
  </div>
</nav>