<?php
include "hp_connect.php";
  

  $pid = $_GET['updateid'];
  $sql = "SELECT * FROM PATIENT WHERE PATIENT_ID = $pid";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_assoc($result);

  $fname= $row['P_FNAME'];
  $lname= $row['P_LNAME'];    // data already to be showed in columns during updation in patient table;
  $pid =  $row['PATIENT_ID'];
  $gender=$row['P_GENDER'];
  $dob =  $row['DOB'];



if(isset($_POST['submit'])){
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  //$pid =  $_POST['pid'];   // IF YOU WANT A NEW ID , JUST UNCOMMENT IT
  $gender=$_POST['gender'];
  $dob =  $_POST['dob'];

  $sql = "UPDATE PATIENT SET P_FNAME = '$fname' , P_LNAME = '$lname' , P_GENDER = '$gender' , DOB = '$dob' WHERE PATIENT_ID = '$pid' ";
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
    <label  class="form-label">Patient ID</label>
    <input type="number" class="form-control" placeholder="Enter Here" name="pid">
  </div> -->

  <div class="mb-3">
    <label  class="form-label">First Name</label>
    <input type="text" class="form-control" placeholder="Enter Here" name="fname" value=<?php 
    echo $fname;
  ?>>
  </div>
   <div class="mb-3">
    <label  class="form-label">Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Here" name="lname" value=<?php 
    echo $lname ?>>
  </div>
  <div>
<label  class="form-label">Gender</label>
<select class="form-select mb-3"
              name= "gender" 
              aria-label="Default select example">
        <option selected value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
  </div>
  <div class="mb-3">
    <label  class="form-label">Date of Birth</label>
    <input type="date" class="form-control" placeholder="Enter Here" name="dob" value=<?php
    echo $dob;
  ?>>
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>
    </div>
  </body>
</html>
