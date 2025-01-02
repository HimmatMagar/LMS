
<?php require '../include/head.php'; ?>
<body>
<?php require '../include/header.php'; ?>

  <!-- ======= Sidebar ======= -->
<?php require '../include/sidebar.php'; ?>

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center">Manage Course</h1>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  #Database Connection
                  $conn = new mysqli("localhost", "root", "", "lms");

                  #Deleting user through checking id in URL
                  if(isset($_GET['id'])) {
                    $delete = "DELETE FROM courses WHERE id = ". $_GET['id'];
                    if(mysqli_query($conn, $delete)) {
                      echo "<div class='alert alert-success' role='alert'>Courses Delete Sucessfully!!</div>";
                    } else {
                      echo "<div class='alert alert-warning' role='alert'>Failed to delete course</div>";
                    }
                  }

                  #Fetch data from database
                  $users = mysqli_query($conn, "SELECT * FROM courses");
                  $result = mysqli_fetch_all($users, MYSQLI_ASSOC);

                  foreach ($result as $user) {
                      echo "
                        <tr>
                          <td>{$user['id']}</td>
                          <td>{$user['title']}</td>
                          <td>{$user['description']}</td>
                          <td>{$user['duration']}</td>
                          <td>
                            <a href='edit.php?id={$user['id']}' class='btn btn-success'>Update Course</a>
                            <a href='index.php?id={$user['id']}' class='btn btn-danger'>Delete Course</a>
                          </td>
                        </tr>
                      ";
                  }
                  #connection close 
                  $conn -> close();
                  ?> 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>