<?php include('dbcon.php'); ?>

<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];


$query = "DELETE FROM students WHERE id = '$id'";   // Use prepared statement to prevent SQL injection

$result = mysqli_query($connection, $query);

if(!$result) {
    die("Query failed: " . mysqli_error($connection));
} else {
    header("Location: index.php?message=Record Deleted Successfully");

}
}
?>