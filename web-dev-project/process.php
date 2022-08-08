<?php

$mysqli = new mysqli('localhost', 'root', '', 'practice') or die(mysqli_error($mysqli));
$name = "";
$location = "";
$update = false;
$id = 0;



if (isset($_POST['save'])){

    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

    header("location: index.php");

}

if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    header("location: index.php");
}

if (isset($_GET['edit'])){

    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    $update = true;
    $row = $result->fetch_array();

    $name = $row['name'];
    $location = $row['location'];
}

if (isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);
    
    header("location: index.php");
}

?>