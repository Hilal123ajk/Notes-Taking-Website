<?php

    if(isset($_POST["submit"])){
        $note_title = $_POST["title"];
        $note_description = $_POST["description"];

        $conn = mysqli_connect("localhost","root","","crudoperation");
        $query = "INSERT INTO notetable(title,description) VALUES('$note_title','$note_description')";

        if(!empty($note_title) && !empty($note_description)){
            mysqli_query($conn,$query);
            header("Location: index.php");
        }

        
    }

   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/insert.css">
</head>
<body>
    <!-- This is a Main Container  -->
    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
                <h1 id="main-heading">Save Your Notes In Cloud</h1>
            </div>
        </div>
        <!-- Heading Ends Here  -->
        
            <div class="row justify-content-center">
                 <div class="col-md-5">
                     <div class="card">
                      <h2 class="card-title text-center">Place A Note</h2>
                         <div class="card-body py-md-4">
                             <form _lpchecked="1" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                               <div class="form-group">
                               
                                 <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                 
                              </div>
                                <div class="form-group">
                                
                                    <input type="text" class="form-control" id="descrition" name="description" placeholder="Describe Note" autocomplete="off">
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-between" autocomplete="off">
                                    
                                <button class="btn btn-primary" name="submit">Create Note</button>
                                </div>
                             </form>
                         </div>
                     </div>
                 </div>
            </div>
    </div>



    <script src="Bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>