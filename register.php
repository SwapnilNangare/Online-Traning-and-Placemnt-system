<?php

include_once('private/conn.php');
session_start();
if($_POST)
{
    $name=$_POST["name"];
    $course=$_POST["course"];
    $branch=$_POST["branch"];
    $roll=$_POST["roll"];
    $pass=$_POST["password"];
    $email=$_POST["email"];
   
    $college_id=$_POST["college_id"];
    
    $results=$db->get_results("select * from student_info where studentEmail='$email'");
    if(count($results)==0)
    {
        $insertRes=$db->query("INSERT INTO `student_info` (`studentEmail`, `studentRegId`, `studentName`, `studentPassword`, `studentCourse`, `studentBranch`, `studentRollNo`) VALUES ('$email', '$college_id', '$name', '$pass', '$course', '$branch', '$roll')");
        $ins2=$db->query("insert into student_ssc (studentEmail) values ('$email')");
        $ins2=$db->query("insert into student_hsc (studentEmail) values ('$email')");
        $ins2=$db->query("insert into student_be (studentEmail) values ('$email')");
        if($insertRes)
        {
            echo "registered";
             $_SESSION["studentEmail"]=$email;
     $_SESSION["studentRegId"]=$college_id;
     $_SESSION["studentName"]=$name;
    
        }
          else
            {
                echo "Query could not execute !";
            }
    }
     else{

            echo "1"; //  not available
        }
}
