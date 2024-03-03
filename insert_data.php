<?php
include('dbcon.php'); // Make sure to include the file that establishes the database connection

if (isset($_POST['add_students'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('location:index.php?message=First Name is required');
    } else {

        // Use backticks (`) for table and column names, not single quotes (')
        $query = "INSERT INTO `students` (`firstName`, `lastName`, `age`) VALUES ('$fname', '$lname', '$age')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your data has been successfully added');
        }
    }
}
?>
