<?php
    $conn = mysqli_connect("localhost","root","","crudoperation") or die("Connection To Database Failed");
    $query = "SELECT * FROM notetable";

    $result = mysqli_query($conn,$query);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>



<!-- Update Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success" id="model-title-heading">Make Some Changes!</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="">
            <input type="text" name="title" style=" background-color: #f8f9fa !important;
            padding: 7px 10px;
            margin-bottom: 1.3rem;
            border:1px solid black;
            border-radius:5px;" id="model-title">
            <br>
            <input type="text" name="description"
            style=" background-color: #f8f9fa !important;
            padding: 7px 10px;
            margin-bottom: 1.3rem;
            border:1px solid black;
            border-radius:5px;
            width:100%;"
            id="model-description">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save-changes">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- Container Starts Here -->
    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
                <h1 class="text-white" id="main-heading">Save Your Notes In Cloud</h1>
            </div>
        </div>
        <!-- Main Heading Ends Here  -->

        <div class="row my-3 px-5" id="notes-data">
            <div class="col-md-12 col-lg-5 d-flex justify-content-center align-items-center">
                <div class="add-section">
                   <a href="insert.php"> <img src="images/add button.svg" class="img-fluid" id="add-btn" alt=""></a>
                </div>
            </div>

           
            <!-- Card Column starts Here  -->
            <?php

            
            while($row = mysqli_fetch_assoc($result)){

            
            echo "
                <div class='col-md-12 col-lg-5 d-flex justify-content-center align-items-center'>  
                        <!-- Card Here   -->
                        <div class='card w-100 p-3 my-5'> 
                            <div class='card-body'>
                                <h3 class='card-title' >{$row['title']}</h3>
                                <hr>
                                <p class='card-text'>{$row['description']}.</p>
                                <button id='update-btn' data-desc='{$row['description']}' data-title='{$row['title']}' data-bs-toggle='modal' data-bs-target='#exampleModal'>Update Note</button>
                                <button id='delete-btn' data-title='{$row['title']}'>Delete</button> 

                            </div> 
                        </div> 
                        <!-- Card Ends Here   -->
                </div> 
                ";
            }    
              
             ?>
             <!-- Card Column Ends Here -->

           
     <!-- Container Div Ends Here   -->
    </div> 

    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jquery.min.js"></script>

    <!-- Javascript Starts Here  -->

    
    
    <script>

        

         $(document).ready(()=>{
                // Code For Deleting Note
                $("body").on("click","#delete-btn",function(){
                    var deleteTitle = $(this).attr("data-title");
                    $(this).parent().parent().fadeOut();

                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data: {"deleteTitle": deleteTitle},
                        success: function(data){
                            
                        }
                    })
                })

                // Code For Updating Code
                $("body").on("click","#update-btn",function(){
                    var updateTitle = $(this).attr("data-title");
                    var updateDesc = $(this).attr("data-desc");

                    var preTitle = updateTitle;

                    $("#model-title").val(updateTitle);
                    $("#model-description").val(updateDesc);

                    $("#save-changes").on("click",function(){
                        var newTitle = $("#model-title").val();
                        var newDesc = $("#model-description").val();
                        
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: {"previousTitle": preTitle,"updateTitle": newTitle,"updateDescription":newDesc},
                            success: function(data){
                                
                            }
                         })
                    })

                    
                })

                
        })

        
          
    </script>

</body>
</html>