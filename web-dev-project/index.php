<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous">

<head> 
<body>

<div class="container">


    <?php require_once 'process.php'; ?>

    <?php
    
        $mysqli = new mysqli('localhost', 'root', '', 'practice') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die(mysqli_error($mysqli));
    
        //pre_r($result);
        //pre_r($result->fetch_assoc());
    ?>    

    <div class="row justify-content-center">

        <table class="table table-striped">
            <thead class="table-dark">
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
            </thead>

        <?php 
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $row['name']?> </td>
                    <td> <?php echo $row['location']?> </td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']?>"class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']?>"class="btn btn-danger">Delete</a>
                    </td>
                </tr>

        <?php endwhile ?>
        </table>

    </div>

    <?php
        function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

    ?>

    <div class="row justify-content-center" 
        style=
        "margin-top:50px;
        padding-left:250px;
        padding-right:250px;">
        
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Your Name"><br/>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter Your Location"><br/>
            </div>

            <div class="form-group">
                <?php if ($update == true): ?>
                    <button type="submit" name="update" class="btn btn-info">Update</button> 
                <?php else : ?>
                    <button type="submit" name="save" class="btn btn-primary">Save</button> 
                <?php endif; ?>    
            </div>
        </form>
    </div>    


        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</div>
<body>
<html>