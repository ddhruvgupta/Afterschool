
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img  src="KarateGirlicon.png" width="50" height="50">
    After School Program
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active"> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users Management</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="new_user.php">New Users</a>
            <a class="dropdown-item" href="view_users.php">User Profiles</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Staff Management
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="view_faculty_info.php">View Faculty</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="new_faculty.php">New Faculty</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Student Management
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="view_student_info.php">View All Students</a>
            <a class="dropdown-item" href="view_school_info.php">View All Schools</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="new_student.php">New Student</a>
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            School Management
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="view_class_info.php">View Classes</a>
            <a class="dropdown-item" href="view_class_list.php">View Class List</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="new_class.php">New Class</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="logout.php">Logout</a>
      </form>
    </div>
  </nav>
</br></br>
