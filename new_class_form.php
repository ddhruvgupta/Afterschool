<form method="POST">

  <div class="form-group">
    <label for="class_name">Class Name:</label>
    <input type="text" name="class_name" id="class_name" ><br/>
  </div>

  <div class="form-group">
    <label for="faculty_id">Faculty:</label>
    <?php echo $select; ?>
  </div>

  <div class="form-group">
    <label for="start_time">Start Time:</label>
    <input type="time" name="start_time" id="start_time" ><br/>
  </div>

  <div class="form-group">
    <label for="end_time">End Time:</label>
    <input type="time" name="end_time" id="end_time"><br/>

  </div>


  <div class="form-group">
    <input type="submit" name="add" value="Submit">
    <input type="submit" name="cancel" value="Cancel">
  </div>
</form>
