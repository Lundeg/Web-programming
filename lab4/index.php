<?php
// Tuhain file baihgui bol shuud zogsdog
require "./conf/db.php";
$errorInfo = "";
if(isset($_POST['sisiID']))
{
    $StudentID = $_POST["sisiID"];
    $findStuID = "select * from student where studentID='{$StudentID}'";
    $result = mysqli_query($db,$findStuID);

    if(mysqli_fetch_assoc($result) !== NULL)
    {
        $StudentPass = $_POST["sisiPass"];

        $checkPass = "select * from student where studentId = '{$StudentID}' and password = '{$StudentPass}'";
        $result = mysqli_query($db,$checkPass);
        
        if(mysqli_fetch_assoc($result) !== NULL)
        {
            echo "Amjilttai nevterlee";
            setcookie("sisiID",$StudentID);
            header("location:index.php");
        }
        else
        {
            echo "Password buruu bn";
        }

    }
    else 
    {
        $errorInfo = "  <label class='text-info'><span>Оюутны ID эсвэл нууц үг буруу байна.</span></label><br>";
    }
}

if(isset($_COOKIE['sisiID']))
{
    require_once "subjects.php";
}
else 
{
    require_once "login.php";
}


mysqli_close($db);
?>