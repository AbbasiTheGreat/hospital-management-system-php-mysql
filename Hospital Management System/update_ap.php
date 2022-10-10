<?php
include "hp_connect.php";
  

  $apid = $_GET['apupdateid'];
  $sql = "SELECT * FROM APPOINTMENT WHERE APP_ID = $apid";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_assoc($result);

  $apid = $row['APP_ID'];
  $wardnum= $row['WARD_NUM'];    // data already to be showed in columns during updation in patient table;
  $pid =  $row['PATIENT_ID'];
  $did = $row['EMP_ID'];
  $apdate = $row['APP_DATE'];
  $aptime =  $row['APP_TIME'];



if(isset($_POST['SUBMITDATA'])){
 // $apid = $_POST['apid'];
  $wardnum= $_POST['wardnum'];
  $pid =  $_POST['pid'];
  $did = $_POST['did'];   // data already to be showed in columns during updation in patient table;
  $apdate = $_POST['apdate'];
  $aptime = $_POST['aptime'];

  echo $apid;

  $sql = "UPDATE APPOINTMENT SET APP_ID = '$apid' , WARD_NUM = '$wardnum' , EMP_ID = '$did' , APP_DATE = '$apdate' , APP_TIME = '$aptime'  WHERE APP_ID = '$apid' ";
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
   <option><?php echo $pid;?></option>
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
   <option><?php echo $did;?></option>
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
  <select class="form-select mb-3" name="wardnum">
   <option><?php echo $wardnum;?></option>
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
    <input type="date" class="form-control" placeholder="Enter Here" name="apdate" value=<?php echo $apdate;?>>
  </div>
   <div class="mb-3">
    <label  class="form-label">Appointment Time</label>
    <input type="time" class="form-control" placeholder="Enter Here" name="aptime" value=<?php echo $aptime;?>>
  </div>

  <button type="submit" name="SUBMITDATA" class="btn btn-primary">UPDATE</button>
</form>
    </div>
  </body>
</html>