<form method="POST">

  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" ><br/>
  </div>

  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" ><br/>
  </div>

  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" id="dob" ><br/>
  </div>

  <div class="form-group">
    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" id="phone" pattern="\d*" maxlength="10"><br/>
  </div>

  <div class="form-group">
    <label for="field">Field:</label>
    <select name="field" id="field">
      <option value="sports" selected>Sports</option>
      <option value="math">Math</option>
      <option value="art">Art</option>
    </select>
  </div>


  <div class="form-group">
    <input type="submit" name="add" value="Submit">
    <input type="submit" name="cancel" value="Cancel">
  </div>
</form>
