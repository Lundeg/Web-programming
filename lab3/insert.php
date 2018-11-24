<?php 
    include "conf/header.php";
    require "conf/db.php";
?>

    <?php
if(isset($_POST['save'])){
    $insert = "insert into student (studentID, lastName, firstName, gender, dob, programIndex, password) values(
    '{$_POST['studentID']}',  
    '{$_POST['lastName']}',
    '{$_POST['firstName']}',
    '{$_POST['gender']}',
    '{$_POST['dob']}',
    '{$_POST['programIndex']}',
    '{$_POST['password']}'
    );
";
echo $insert;
    $db->query($insert);
    header("Location:./list.php");
    exit();
}
    
    $html = "<table id = 'student'> 
    <tr>
    <th>studentID</th>
    <th>lastName</th>
    <th>firstName</th>
    <th>gender</th>
    <th>bDate</th>
    <th>Pindex</th>
    <th>Pass</th>
    <th>Send</th>
    </tr>
";
        $html .= "
        <form method = 'post' action='insert.php'>
    <td><input type='text' name='studentID'  placeholder='Оюутны код'></td>
    <td><input type='text' name='lastName'  placeholder='Овог' ></td>
    <td><input type='text' name='firstName' placeholder='Нэр'></td>
    <td><input type='txt' name='gender' placeholder='Хүйс'></td>
    <td><input type='date' name='dob'></td>
    <td><input type='text' name='programIndex' placeholder='Хичээлийн дугаар'></td>
    <td><input type='password' name='password' placeholder='password'></td>
    <td><button name='save'>Send</button></td>
    </form>
        ";
    
    echo $html;


?>
</body>
</html>