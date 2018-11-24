<?php
require("./conf/db.php");

$s_id = $_GET['s_id'];
if(isset($s_id)){
    $del = "delete from student where studentID='{$s_id}'";
    $db -> query($del);
}
else 
    echo "amjiltgui";

    header("Location:./list.php");
    exit();
?>