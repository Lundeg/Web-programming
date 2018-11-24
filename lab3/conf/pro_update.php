 <?php
  $connection = mysqli_connect('localhost', 'root', '', 'lab3');
  confirm_db_connect();
  return $connection;
        global $db;

        if (!empty($errors)) {
            return $errors;
        }

        $sql = 'UPDATE student SET ';
        $sql .= "studentID='" .mysqli_real_escape_string($db, $student['studentID']) . "', ";
        $sql .= "lastName='" . mysqli_real_escape_string($db, $student['lastName']) . "', ";
        $sql .= "firstName='" . mysqli_real_escape_string($db, $student['firstName']) . "', ";
        $sql .= "gender='" . mysqli_real_escape_string($db, $student['gender']) . "', ";
        $sql .= "dob='" . mysqli_real_escape_string($db, $student['dob']) . "', ";
        $sql .= "password='" . mysqli_real_escape_string($db, $student['password']) . "', ";
        $sql .= "programIndex='" . mysqli_real_escape_string($db, $student['programIndex']) . "' ";
        $sql .= "WHERE studentID='" . mysqli_real_escape_string($db, $student['studentID']) . "' ";
        $sql .= 'LIMIT 1';

        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
?>