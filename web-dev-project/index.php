<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head> 
<body>

<div class="container">

    <?php require_once 'process.php'; ?>

    <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die(mysqli_error($mysqli));


    ?>

        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Actions</th>
                </thead>

            <?php 
                while($row = $result->fetch_assoc()): ?>  
                
                    <tr>
                        <td> <?php echo $row['name']?> </td>
                        <td> <?php echo $row['location']?> </td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

            <?php endwhile ?> 
            </table>
        </div>       

    <?php 
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                }
    ?>    


    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
        </div>

        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" placeholder="Enter Your Location">
        </div>

        <div class="form-group">
        <button type="submit" name="save" class="btn btn-primary">Save</button> 
        </div>
    </form>
    </div>    

</div>
<body>
<html>