<?php

session_start();
//db connection
$db = mysqli_connect("localhost","root",'','user');
//init
$id = 0;
$name = '';
$surname = '';
$email = '';
$edit_state = false;

//when save button pressed do this staff
if(isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $query = "INSERT INTO tables (id,name,surname,email) VALUES ('$id','$name','$surname','$email')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Information saved";
    header('location: index.php');

}

//retrieve records
$results = mysqli_query($db,"SELECT * FROM tables");


?>
