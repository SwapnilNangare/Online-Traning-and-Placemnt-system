<!DOCTYPE html>

<!---  HEAD CODE STARTS -->
<?php
session_start();
if (!isset($_SESSION["adminEmail"])) {
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
                <?php
                include('../private/conn.php');
                if(isset($_POST["submit_company"]))
                {
                    $name=$_POST["name"];
                    $desc=$_POST["description"];
                    $start_date=$_POST["start_date"];
                    $deadline=$_POST["deadline"];
                    $salary=$_POST["salary"];
                    $reg_link=$_POST["reg_link"];
                    echo $start_date;
                    $result=$db->query("insert into `company_info`( `company_name`,`description`, `deadline`, `start_date`, `salary`, `reg_link`, `status`) VALUES ('$name','$desc','$deadline','$start_date',$salary,'$reg_link',1)");
                    if(isset($result))
                    {
                       ?> 
                <script>alert("Company details inserted.");</script>
                <?php
                    }
                    
                }
                ?>
            </div>

            <div class="col-sm-8 text-left" style="padding-left:40px;padding-right:40px;">
                <h1 class="text-center"><b>Add Company</b></h1>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading" id="load123">
                        <b>  Generate Event Report</b>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="add_company.php" method="POST" onsubmit="return validate()">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" placeholder="Company Name" class="form-control"
                                       required autofocus>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" id="description" name="description" placeholder="Details" class="form-control"
                                       required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Registration Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" id="start_date" name="start_date"   class="form-control"
                                       required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Registration Deadline</label>
                            <div class="col-sm-9">
                                <input type="date" id="deadline" name="deadline"  class="form-control"
                                       required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Salary</label>
                            <div class="col-sm-9">
                                <input type="number" id="salary" name="salary" placeholder="Salary" class="form-control"
                                       required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Registration Link</label>
                            <div class="col-sm-9">
                                <input type="text" id="reg_link" name="reg_link" placeholder="http://goo.gl/reglink" class="form-control"
                                       required>
                            </div>
                        </div>
                        <br><br>
<center><input type="submit" id="submit_company" name="submit_company" value="Register Company" class="btn btn-primary"
               ></center>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-sm-2 sidenav "></div>
        </div>
    </div>
    <h4>NOTE: The site is under development.</h4>

<script type="text/javascript">
    function validate()
    {
        var start_date=document.getElementById("start_date").value;
        var deadline=document.getElementById("deadline").value;
       // alert(start_date+"  yoo "+deadline  );
        if(new Date(start_date)>new Date(deadline))
        {
            alert("Start Date cannot greater than end date");
            return false;
        }
        if(new Date(start_date)< new Date())
        {
            alert("Registration start date cannot be less than today.");
            return false;
        }
        return true;
    }
    </script>
<?php
include("../template/footer.php");
?>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: "btn btn-primary",
                }, {
                    extend: 'csv',
                    text: 'CSV',
                    className: "btn btn-primary",
                }, {
                    extend: 'excel',
                    text: 'Excel',
                    className: "btn btn-primary",
                },
                {
                    extend: 'pdf',
                    text: 'Save AS PDF',
                    className: "btn btn-primary",
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: "btn btn-primary"
                }
            ]
        });
    });


</script>

<script src="static/datatables/js/jquery.dataTables.min.js"></script>
<script src="static/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="static/datatables-responsive/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
