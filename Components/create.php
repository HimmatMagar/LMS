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
      method="POST"
      enctype="multipart/form-data">
      <h1 class="text-center">Add Course</h1>
      <?php 
            #Database connection
            $conn = new mysqli("localhost", "root", "", "lms");

            #Adding course
            if($_SERVER['REQUEST_METHOD'] == "POST") {
              $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              $desc =  filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

              #File uploading
              $fileName = $_FILES['dataFile']['name'];
              $tmpName = $_FILES['dataFile']['tmp_name'];
              $size = $_FILES['dataFile']['size'];

              $explode = explode('.', $fileName);
              $firstName = strtolower($explode[0]);
              $type = strtolower($explode[1]);
              $uniqueName = $firstName . "_" . time() . "." . $type;

              #Size 
              $maxSize = 100 * 1024 * 1024; // 100 MB

              #Type 
              $typeDir = ['pdf', 'txt'];

              #Move file into upload folder
              $uploadDir = "upload/" . $uniqueName;

              if(!empty($title) && !empty($desc) && !empty($duration)) {
                if($size <= $maxSize) {
                  if(in_array($type, $typeDir)) {
                    if(move_uploaded_file($tmpName, $uploadDir)) {
                      $insertQuery = "INSERT INTO courses(title, description, duration, file_link) values('$title', '$desc', '$duration', '$uniqueName')";
                      if(mysqli_query($conn, $insertQuery)) {
                        echo "<div class='alert alert-success' role='alert'>Course Added sucessfully</div>";
                      } else {
                        echo "<div class='alert alert-danger' role='alert'>Failed to add course.</div>";
                      }
                    } else {
                      echo "<div class='alert alert-danger' role='alert'>Erorr..</div>";
                    }
                  } else {
                    echo "<div class='alert alert-danger' role='alert'>File size must be PDG & Txt</div>";
                  }
                } else {
                  echo "<div class='alert alert-danger' role='alert'>File size must be 100MB</div>";
                }
              } else {
                echo "<div class='alert alert-danger' role='alert'>All fields are reqired..</div>";
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
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload file</label>
                  <input class="form-control" type="file" name="dataFile" id="formFile">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-journal-plus pe-3"></i>Add Course</button>
                </div>
              </form>
      </div>
    </section>
  </main><!-- End #main -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>