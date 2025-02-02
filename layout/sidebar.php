<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="courses/addCategory.php">
        <i class="bi bi-cloud-plus-fill" style="font-size: 1rem;"></i><span>Add Category</span>
        </a>
      </li>
      <li>
        <a href="courses/addCourse.php">
        <i class="bi bi-folder-plus" style="font-size: 1rem;"></i><span>Add Course</span>
        </a>
      </li>
      <li>
        <a href="courses/editCourse.php">
          <i class="bi bi-pencil-square" style="font-size: 1rem;"></i><span>Edit Course</span>
        </a>
      </li>
      <li>
        <a href="courses/courseInfo.php">
        <i class="bi bi-eyeglasses" style="font-size: 1rem;"></i><span>Courses Info</span>
        </a>
      </li>
      <li>
        <a href="courses/deleteCourse.php">
        <i class="bi bi-trash" style="font-size: 1rem;"></i><span>Delete Course</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Manage Student</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="student/studentInfo.php">
        <i class="bi bi-eyeglasses" style="font-size: 1rem;"></i><span>Student Info</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.php">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.php">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li><!-- End Error 404 Page Nav -->


</ul>

</aside>