<?php require '../include/head.php'; ?>
<body>
<?php require '../include/header.php'; ?>

  <!-- ======= Sidebar ======= -->
<?php require '../include/sidebar.php'; ?>

  <main id="main" class="main">

    <section>
      <div class="container w-50 p-5 rounded-3 shadow">
      <form
      class="row g-3"
      method="POST">
      <h1 class="text-center">Update Course</h1>
      <?php 
            #Database connection
            $conn = new mysqli("localhost", "root", "", "lms");

            #Getting Id in URL
            if(isset($_GET['id'])) {

                #Fetching data
                $info = mysqli_query($conn, "SELECT * FROM courses WHERE id = " . $_GET['id']);
                $course = mysqli_fetch_assoc($info);
                if(!$course) {
                    echo "Course not found";
                    exit;
                }
            }
            #Updating courses code
            if($_SERVER['REQUEST_METHOD'] == "POST") {
              $title = $_POST['title'] ?? '';
              $desc = $_POST['description'] ?? '';
              $duration = $_POST['duration'] ?? '';

              if(!empty($title) && !empty($desc) && !empty($duration)) {
                $updateQuery = "UPDATE courses SET title = '$title', description = '$desc', duration = '$duration' WHERE id = $id";
                if(mysqli_query($conn, $updateQuery)) {
                  echo "<div class='alert alert-success' role='alert'>Course detail Updated successfully!!</div>";
                } else {
                  echo "<div class='alert alert-warning' role='alert'>Failed to update course</div>";
                }
              } else {
                echo "<div class='alert alert-warning' role='alert'>All fields are required</div>";
              }
            }

            #Connection close
            $conn -> close();
          ?>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Course Name</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter your course title" id="inputNanme4" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" placeholder="Enter your course description" name="description" id="exampleFormControlTextarea1" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="duration" class="form-label">Course Duration</label>
                  <input type="text" class="form-control" name="duration" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary"></i>Update Course</button>
                </div>
              </form>
      </div>
    </section>
  </main><!-- End #main -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>