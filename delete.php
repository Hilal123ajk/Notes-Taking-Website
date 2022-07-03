<?php

    $deleteTitle = $_POST["deleteTitle"];

    $conn = mysqli_connect("localhost","root","","crudoperation") or die("Failed");
    $query = "DELETE FROM notetable WHERE title = '$deleteTitle'";

    mysqli_query($conn,$query);

    mysqli_close($conn);
?>