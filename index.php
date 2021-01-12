<!DOCTYPE html>

<?php 
session_start();
if(!isset($_SESSION["studentEmail"]))
{
    header("location:login.php");
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
   
    <?php
include("template/leftnav_admin.php");
    ?>

    </div>

    <div class="col-sm-8 text-left" style="padding-left:40px;padding-right:40px;">
      <h1 class="text-center"><b>Welcome</b></h1>
      <br>
      <p class="intropara">
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



<?php
include("template/footer.php");
?>
</body>
</html>
