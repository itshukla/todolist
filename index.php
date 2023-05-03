 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    
 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"  >
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" ></script>
  </head>
  <body>
 


 
 <!-- navbar here -->
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <img src="https://png.pngitem.com/pimgs/s/174-1747814_php-logo-programmer-computer-software-elephant-php-logo.png " alt="php" height="70px" width="70px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              
            </ul>
             
          </div>
        </div>
      </nav>
      <!-- data inserted here -->
      <?php
   
 $severname = "localhost";
 $username = "root";
 $password = "";
 $database = "todolist";
  
 $conn = mysqli_connect($severname,$username,$password,$database );
  
 
 if(isset($_POST['submit'])){
   $id = $_POST['srno'];
   $title = $_POST['note'];
   $desc = $_POST['desc'];
 $sql = " INSERT INTO `notes` (`Sr.No.`, `Title`, `Description`) VALUES ('$id', '$title', '$desc'); ";
 $result = mysqli_query($conn,$sql);
 if($result){
   echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong>Your data has been submitted successfully.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
 }
 else{
   echo "not inserted";
 }
 }
 ?>
 <!-- data update here -->
 <?php

if(isset($_POST['onupdate'])){
  $id = $_POST['srno'];
  $title = $_POST['note'];
  $desc = $_POST['desc'];
 
$usql = "UPDATE `notes` SET `Title` = '$title', `Description` = '$desc' WHERE `notes`.`Sr.No.` = '$id' ";
$output = mysqli_query($conn, $usql);
if ($output) {
    echo   '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Update!</strong>Your data has been Update successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{echo "<br>Not Updated";}
}
?>
<!-- data delete here -->
<?php 
if(isset($_POST['ondelete'])){
  $id = $_POST['srno'];

$d_sql = "DELETE FROM `notes` WHERE `notes`.`Sr.No.` = '$id'";
$output = mysqli_query($conn, $d_sql);
if ($output) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success</strong>  your data has been deleted successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}else{echo "<br>Not Deleted";}
}
?>
<!-- form page structure -->
<div class="container my-5">
    <form action=" "  method="post">
        <h2>Add To-Do List</h2>
        <div class="mb-3 my-5">
          <label for="note"  ><h4>SR.NO.</h4></label>
          <input type="text" class="form-control" id=" note" name="srno" aria-describedby="emailHelp">
           </div>

        <div class="mb-3">
          <label for="note"  ><h4>Add Note Title</h4></label>
          <input type="text" class="form-control" id=" note" name="note" aria-describedby="emailHelp">
           
        </div>
        <div class="mb-3">
          <label for="desc "  ><h4>Add Note Description</h4></label>
          <textarea type="text" class="form-control" id=" desc" name="desc" rows="3"></textarea>
        </div>
         
        <button type="submit" name="submit" class="btn btn-primary m-3">Add Note</button>
        <button type="submit" name="onupdate" class="btn btn-primary m-3">Update Note</button>
        <button type="submit" name="ondelete" class="btn btn-primary m-3">  Delete Note</button>
      </form>
</div>
<!-- table structure -->
<div class="container">
 
<table class="table" id="myTable"  >
  <thead>
    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
     
    </tr>
  </thead>
  <tbody>
    <!-- data read here -->
  <?php
$sq = "SELECT * FROM `notes`";
$re = mysqli_query($conn,$sq);
while($row = mysqli_fetch_array($re)){
 echo "<tr>";
 echo '<td>'.$row['Sr.No.'].'</td>';
 echo '<td>'. $row['Title'].'</td>';
 echo '<td>'.$row['Description'].'</td>';
 echo "</tr>";
}
?> 
   
  </tbody>
</table>
</div> 
<hr>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"  ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"   ></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 
<script>
  $(document).ready(function(){
    $('#myTable').DataTable();
  })
  </script>
  
  </body>
</html>
