<?php
    $conn = mysqli_connect("localhost","root","","crudoperation");
    $query = "SELECT * FROM notetable";

    $result = mysqli_query($conn,$query);
    $result_in_assoc = mysqli_fetch_all($result);

    if(mysqli_query($conn,$query)){
        echo json_encode($result_in_assoc);
    }else{
        echo "<h1>Not Working</h1>";
    }
?>