 <!--  -->
 <?php 

 if((!isset($_SESSION['studentEmail']))&&isset($_SESSION['adminEmail']))
 {
 ?>
 <div class="navbar1"  >
      <ul class="nav navbar-nav" >
    <br><br>
    
      <li><a href="add_company.php"><b>Register  Company</b></a></li>
      <li><a href="view_companies.php"><b>View  Companies List</b></a></li>
    
     
      <li ><a href="student_list.php"><b>Students List</b></a></li>
     


    </ul>
    </div>
 <?php
 }
 ?>
    <!-- {% endif %} -->