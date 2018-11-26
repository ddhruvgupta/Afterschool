<?php 

$student_id = $_GET['student_id'];

$sql = 'select * from tbl_emergency_contact where student_id = :student_id';
$statement = $pdo->prepare($sql);
$statement->execute(array(':student_id'=> $student_id));
$row = $statement->fetch(PDO::FETCH_ASSOC);

$contact1 = $row['emergency1'];
$phone1 = $row['phone1'];
$contact2 = $row['emergency2'];
$phone2 = $row['phone2'];
$contact3 = $row['emergency3'];
$phone3 = $row['phone3'];
?>

<form method="POST">

  <div class="form-group">
    <label for="student_id">Student ID: <?php if(isset($student_id)) echo $student_id;?></label>
   <br/>
  </div>

  <div class="form-group">
    <label for="contact1">Emergency Contact 1:</label>
    <input type="text" name="contact1" id="contact1" 
    <?php if(isset($contact1)) echo "value='".$contact1."'";?>
    ><br/>
  </div>

  <div class="form-group">
    <label for="phone1">Phone:</label>
    <input type="text" name="phone1" id="phone1" 
    <?php if(isset($phone1)) echo "value='".$phone1."'";?>
    <br/>
  </div>

  
 <div class="form-group">
    <label for="contact1">Emergency Contact 2:</label>
    <input type="text" name="contact2" id="contact2" 
    <?php if(isset($contact2)) echo "value='".$contact2."'";?>
    ><br/>
  </div>

  <div class="form-group">
    <label for="phone2">Phone:</label>
    <input type="text" name="phone2" id="phone2" 
    <?php if(isset($phone2)) echo "value='".$phone2."'";?>
    <br/>
  </div>

   <div class="form-group">
    <label for="contact3">Emergency Contact 3:</label>
    <input type="text" name="contact3" id="contact3" 
    <?php if(isset($contact3)) echo "value='".$contact3."'";?>
    ><br/>
  </div>

  <div class="form-group">
    <label for="phone3">Phone:</label>
    <input type="text" name="phone3" id="phone3" 
    <?php if(isset($phone3)) echo "value='".$phone3."'";?>
    <br/>
  </div>


  <div class="form-group">
    <input type="submit" name="add" value="Submit">
    <input type="submit" name="cancel" value="Cancel">
  </div>
</form>
