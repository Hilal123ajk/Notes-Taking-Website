<?php

    $previous_title = $_POST["previousTitle"];
    $update_title = $_POST["updateTitle"];
    $update_desc = $_POST["updateDescription"];

    $conn = mysqli_connect("localhost","root","","crudoperation");
    $query = "UPDATE notetable SET title = '$update_title',description = '$update_desc' WHERE title = '$previous_title'";

    if(mysqli_query($conn,$query)){
        echo "<h2>Record Updated Successfully</h2>";
    }else{
        echo "<h2>Failed To Update</h2>";
    }
?>