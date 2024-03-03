<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM students WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['update_students'])) {
    $id = $_GET['id_new'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE students SET firstName = ?, lastName = ?, age = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $fname, $lname, $age, $id);
    $result = mysqli_stmt_execute($stmt);

    if(!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?message=Record Updated Successfully");
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $row['firstName']; ?>">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $row['lastName']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="Update">
</form>

<?php include('footer.php'); ?>
