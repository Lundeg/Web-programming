<?php
    require_once __DIR__."/conf/init.php";
    include "./conf/header.php";
?>
    
<?php

$stu= "select * from student";
$result = $db->query($stu);
$html = "<table id = 'student'> 
    <tr>
    <th>studentID</th>
    <th>lastName</th>
    <th>firstName</th>
    <th>gender</th>
    <th>bDate</th>
    <th>Pindex</th>
    <th colspan=2>others</th>
    </tr>
";
while ($student = $result ->fetch_assoc()){
    $temp_stud =$student;
    $html .= "
    <tr>
    <td>{$temp_stud["studentID"]}</td>
    <td>{$temp_stud["lastName"]}</td>
    <td>{$temp_stud["firstName"]}</td>
    <td>{$temp_stud["gender"]}</td>
    <td>{$temp_stud["dob"]}</td>
    <td>{$temp_stud["programIndex"]}</td>
    <td><a  href='delete.php?s_id={$temp_stud['studentID']}'>del</a></td>
    <td><a href='update.php?s_id={$temp_stud['studentID']}'>edit</a></td>
    </tr>
    ";
}
$html .= "
</table>
<a href='insert.php'><button>Оюутан нэмэх</button></a>";

echo $html;
?>

</body>
</html>

