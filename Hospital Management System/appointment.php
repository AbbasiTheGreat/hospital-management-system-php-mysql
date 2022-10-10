<?php
include "hp_connect.php";
if(isset($_POST['add'])){
  //$apid = $_POST['apid'];
  $did = $_POST['did'];
  $pid   =   $_POST['pid'];
 // $medid = $_POST['medid'];
  $wardid =  $_POST['wardid'];
  $aptime =  $_POST['aptime'];
  $apdate =  $_POST['apdate'];

  $sql = "INSERT INTO APPOINTMENT(PATIENT_ID , EMP_ID , WARD_NUM , APP_DATE , APP_TIME) VALUES('$pid','$did', '$wardid','$apdate','$aptime')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("Location:./display_pinfo.php");
  }else{
    die(mysqli_error($conn));
  }
  


  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receptionist</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class = "container my-5">
      <form method="post">
<!-- <div class="mb-3">
    <label  class="form-label"> ID</label>
    <input type="number" class="form-control" placeholder="Enter Here" name="pid">
  </div> -->

  <div class="mb-3">
    <label  class="form-label">Patient ID</label>
          <?php 
    $sql ="SELECT PATIENT_ID FROM PATIENT";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
  <select class="form-select mb-3" name="pid">
   <option>Select Patient ID</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['PATIENT_ID']; ?> </option>
    <?php 
    }
   ?>
</select>


  </div>
   <div class="mb-3">
    <label  class="form-label">Doctor ID</label>
          <?php 
    $sql ="SELECT EMP_ID FROM DOCTOR";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
  <select class="form-select mb-3" name="did">
   <option>Select Doctor ID</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['EMP_ID']; ?> </option>
    <?php 
    }
   ?>
</select>


  </div>

<div class="mb-3">
    <label  class="form-label">Ward Number</label>
          <?php 
    $sql ="SELECT WARD_NUM FROM WARD";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
  <select class="form-select mb-3" name="wardid">
   <option value = "NULL">NULL</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['WARD_NUM']; ?> </option>
    <?php 
    }
   ?>
</select>


  </div>
  <div class="mb-3">
    <label  class="form-label">Appointment Date</label>
    <input type="date" class="form-control" placeholder="Enter Here" name="apdate">
  </div>
   <div class="mb-3">
    <label  class="form-label">Appointment Time</label>
    <input type="time" class="form-control" placeholder="Enter Here" name="aptime">
  </div>

  <button type="submit" name="add" class="btn btn-primary">ADD</button>
</form>
    </div>
  </body>
</html>