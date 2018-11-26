
<?php 

//retrieve list of faculty / possible advisors
$sql = "select * from tbl_school_info";
$statement = $pdo->prepare($sql);
$statement->execute();

$select ="<option value=''>--Please Select--</option>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC)){


  $select.="<option value=".$row['schoolID'].">".$row['Name']."</option>";
}

$form= "
<div class='form-group'>
<label for='schoolID'>School: </label>
<select name='schoolID' id='adv_select";
$form.= $select;
$form.="</select></div>";

?>

<h4>Please enter the contact details of the new student: </h4></br>
<form method="POST">

  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" value="<?php if(isset($first)) echo $first;?>"><br/>
  </div>

  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" value="<?php if(isset($last)) echo $last;?>"><br/>
  </div>

  <div class="form-group">
    <label for="father">Father's Name:</label>
    <input type="text" name="father" id="father" value="<?php if(isset($father)) {echo $father;}?>"><br/>
  </div>

  <div class="form-group">
    <label for="fnum">Father's Phone Number:</label>
    <input type="text" name="fnum" id="fnum" value="<?php if(isset($fnum)) {echo $fnum;}?>"><br/>
  </div>

  <div class="form-group">
    <label for="mother">Mother's Name:</label>
    <input type="text" name="mother" id="mother" value="<?php if(isset($mother)) {echo $mother;}?>"><br/>
  </div>

  <div class="form-group">
    <label for="mnum">Mother's Phone Number:</label>
    <input type="text" name="mnum" id="mnum" value="<?php if(isset($mnum)) {echo $mnum;}?>"><br/>
  </div>

  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" id="dob" "><br/>
  </div>

  <?php echo $form;?>

  <div class="form-group">
    <input type="submit" name="add" value="Submit">
    <input type="submit" name="cancel" value="Cancel">
  </div>
</form>
