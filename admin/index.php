<!DOCTYPE html>

<!---  HEAD CODE STARTS -->
<?php 
session_start();
if(!isset($_SESSION["adminEmail"]))
{
    header("location:login.php");
}
include("../template/head.html")
?>
<!---  NHEAD CODE ENDS -->
<body>

<!---  NAVBAR CODE STARTS -->
<?php
include("../template/navbar.php");
?>
<!---  NAVBAR CODE ENDS-->

<div class="container-fluid ">    
  <div class="row content">
    <div class="col-sm-2 sidenav ">
   
    <?php
include("../template/leftnav_admin.php");
    ?>

    </div>

    <div class="col-sm-8 text-left" style="padding-left:40px;padding-right:40px;">
      <h1 class="text-center"><b>Welcome</b></h1>
      <br>
      <p class="intropara">The Training and Placement cell is headed by Mr. Satish  Narkhede (TPO)
    who is keen in encouraging students to prefer jobs that better suit their profile.
    The placement season commences in the first month of every academic year and continues
    till the end of the academic year.
    Pre-Placement Talks are conducted for the final year students prior to the placement session every year.</p>
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
      <!-- <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div> -->
    </div>
  </div>
</div>
<p><h4>NOTE: The site is under development and the data may be fictitious.</h4></p>


<?php
include("template/footer.php");
?>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

