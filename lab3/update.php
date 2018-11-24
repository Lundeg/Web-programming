<?php 
    require "conf/db.php";
    include "./conf/header.php";
?>

    <?php
if(isset($_POST['save'])){
    $update = "update student set 
    studentID='{$_POST['studentID']}',  
    lastName='{$_POST['lastName']}',
    firstName='{$_POST['firstName']}',
    gender = '{$_POST['gender']}',
    dob='{$_POST['dob']}',
    programIndex='{$_POST['programIndex']}'
    where studentID='{$_POST['studentID']}'
";
    mysqli_query($db,$update);
    header("Location:./list.php");
    exit();
}
    
$s_id = $_GET['s_id'];
if(isset($s_id)){
    $update = "select * from student where studentID ='{$s_id}'";
    $result = mysqli_query($db,$update); 
    $html = "<table id = 'student'> 
    <tr>
    <th>studentID</th>
    <th>lastName</th>
    <th>firstName</th>
    <th>gender</th>
    <th>bDate</th>
    <th>Pindex</th>
    <th>Send</th>
    </tr>
";
    while ($student = mysqli_fetch_assoc($result)){
        $temp_stud =$student;
        $html .= "
        <form method = 'post' action='#'>
    <td><input type='text' name='studentID' value='{$temp_stud['studentID']}'/></td>
    <td><input type='text' name='lastName' value='{$temp_stud['lastName']}'/></td>
    <td><input type='text' name='firstName' value='{$temp_stud['firstName']}'/></td>
    <td><input type='text' name='gender' value='{$temp_stud['gender']}'/></td>
    <td><input type='date' name='dob' value='{$temp_stud['dob']}'/></td>
    <td><input type='text' name='programIndex' value='{$temp_stud['programIndex']}'/></td>
    <td><button name='save'>Send</button></td>
    </form>
        ";
    }
    
    echo $html;
    echo "
    ";
}


?>
</body>
</html>


