<?php
require "./pdo_db.php";
global $db;
global $connection;

if(isset($_COOKIE["sisiID"]))
{
    $studentID = $_COOKIE["sisiID"];
}
function checkCourseTaken($courseIndex){
    global $connection;
    global $studentID;
    $checkQR="select * from courseTakenHistory where 
        studentID ='{$studentID}' AND courseIndex='{$courseIndex}'";
    $result=$connection->prepare($checkQR);
    $result->execute();
    if(!$result){
        die("erro".mysqli_error($db));
    }
    if($result->rowCount()<=0){
        return false;      
    }
    return true;
}

function takeCourseByStudent($courses){
    global $db;
    global $studentID;
    foreach($courses as $course){
        $takeCourse = "insert into courseTakenHistory (studentID,courseIndex)
        values ('{$studentID}','{$course}')";
        mysqli_query($db,$takeCourse);
    }
}


function sanitizeString($var){
    global $db;
    $var = mysqli_real_escape_string($db, $var);
    $var =  filter_var($var, FILTER_SANITIZE_STRING,FILTER_SANITIZE_STRIP_HIGH);
    return $var;
}
?>