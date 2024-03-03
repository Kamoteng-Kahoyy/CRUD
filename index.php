<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
<h2>All Records</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Student </button>
</div>



<table class="table table-hover table-bordered table-str">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * from students";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed: " . mysqli_error());
        }
        else {
            
            while($row = mysqli_fetch_assoc($result)) {
               ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>  
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>   

        </tr>

                <?php
            }

        }
        ?>

    </tbody>
</table>

<?php

        if(isset($_GET['message'])){
            echo "<h6>" .$_GET['message']. "</h6>";
        }

?>

<?php

        if(isset($_GET['insert_msg'])){
            echo "<h6>" .$_GET['insert_msg']. "</h6>";
        }

?>



<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for = "fname">First Name</label>
                <input type="text" name="fname" class = "form-control">
            </div>
            <div class="form-group">
                <label for = "lname">Last Name</label>
                <input type="text" name="lname" class = "form-control">
            </div>
            <div class="form-group">
                <label for = "age">Age</label>
                <input type="text" name="age" class = "form-control">
            </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success"name= "add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include('footer.php'); ?>
