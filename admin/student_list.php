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
                ?>
            </div>

            <div class="col-sm-10 text-left" style="padding-left:40px;padding-right:40px;">
                <h1 class="text-center"><b>Search Students</b></h1>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading" id="load123">
                        <b>  Generate Event Report</b>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Roll No.</th>
                                    <th>Student Name</th>
                                    <th>Branch</th>
                                    <th>Student Course</th>
                                    <th>SSC %</th>
                                    <th>BE %</th>
                                    <th>Backlog</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                //query to execute
                                //SELECT *, ((s2.marksObtained/s2.marksOutOf)*100) as ssc_perc, (sum(feOrDiplomaMarksObtained,seMarksObtained,teMarksObtained,teMarksObtained)) as sum  FROM `student_info` s1, student_ssc s2,student_be s3 where s1.studentEmail=s2.studentEmail=s3.studentEmail
                                if (isset($_POST["searchCriteria"])) {
                                    $startDate = $_POST["startDate"];
                                    $endDate = $_POST["endDate"];
                                    $result = $db->get_results("SELECT * FROM `student_info`;");// where date >= '$startDate' and date<='$endDate'
                                } else {
                                    $result = $db->get_results("SELECT studentName,studentRollNo,studentCourse,studentBranch,backlog,"
                                            . " ((s2.marksObtained/s2.marksOutOf)*100) as ssc_perc, (feOrDiplomaMarksObtained+seMarksObtained+teMarksObtained+beMarksObtained)/(feOrDiplomaMarksOutOf+seMarksOutOf+teMarksOutOf+beMarksOutOf)*100 as be_perc  FROM `student_info` s1, student_ssc s2,student_be s3 where s1.studentEmail=s2.studentEmail"
                                            . " and s2.studentEmail=s3.studentEmail and s2.studentEmail=s1.studentEmail;");
                                }

#
                                $count = 1;
                                if (isset($result)) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                           
                                            <td><?php echo $row->studentRollNo; ?></td>

                                            <td><?php echo $row->studentName; ?></td>
                                            <td class="center"><?php echo $row->studentBranch; ?></td>
                                            <td class="center"><?php echo $row->studentCourse; ?></td>
                                            <td class="center"><?php echo $row->ssc_perc; ?></td>
                                            <td class="center"><?php echo $row->be_perc; ?></td>
                                             <td><?php echo $row->backlog; ?></td>
                                        </tr>
                                        <?php
                                        $count = $count + 1;
                                    }
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

        </div>
    </div>
    <p><h4>NOTE: The site is under development and the data may be fictitious.</h4></p>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

