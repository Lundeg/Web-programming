<?php

if(!isset($_COOKIE['studentID'])){
    require_once __DIR__."/conf/init.php";
    include_once __DIR__."/conf/header.php";
    $getAllCourse = "select * from course";
    mysqli_set_charset($db,"utf8");    
    $result= mysqli_query($db,$getAllCourse);
        include "./style/navigation.php";
        $html = "<table id = 'student' class='mar'> 
        <tr><a href='list.php'>Оюутны мэдээлэл харах</td></a> 
        <form acion='#' method='post'>
        <tr>
        <th>Индекс</th>
        <th>Хичээлийн нэр</th>
        <th>Кредит</th>
        <th>Сонгох</th>
        </tr>
    ";
        if(isset($_POST['selectCourse'])){
            takeCourseByStudent($_POST['selectCourse']);
        }
    
        while($course = mysqli_fetch_assoc($result)){
            $html .= "<tr";
            if(checkCourseTaken($course['courseIndex'],$_COOKIE['sisiID'])){ 
                $html .= " class = 'green'";
            }
            $html .="><td>{$course['courseIndex']}</td>
                    <td>{$course['courseName']}</td>
                    <td>{$course['courseCredit']}</td>
                    <td><input type='checkbox' value='{$course['courseIndex']}' name='selectCourse[]' 
                    ";
                    
            if(checkCourseTaken($course['courseIndex'],$_COOKIE['sisiID'])){ 
                $html .= "checked disabled";
            }
            $html .="/></td>
                </tr>";
        }

        $html .="
            </table>
            <button class='mar'>Сонгох</button>
            </form>
            <a href ='log_out.php'><button>Гарах</button></a>
            </div>";
        echo $html;
    }else{
        header("location: ./index.php");
    }
    ?>    
