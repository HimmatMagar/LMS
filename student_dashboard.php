
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
        .course-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            text-align: center;
        }
        .course-card h3 {
            margin-bottom: 10px;
        }
    </style>
</head> 
<body>

  <!-- ======= Header ======= -->
<?php require 'include/header.php'; ?>

  <!-- ======= Sidebar ======= -->
<?php require 'layout/sidebarForStudent.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- All course -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h1 class="text-center">All Courses</h1>
                  <div class="row">
                  <?php 
                        $conn = new mysqli("localhost", "root", "", "lms");

                        $fetch = mysqli_query($conn, "SELECT * FROM courses");
                        $courseDir = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

                        foreach ($courseDir as $course) {
                            echo "<div class='col-md-4'>
                            <div class='course-card d-flex flex-column p-3 border' style='min-height: 250px;'>
                                <h3>" . $course['title'] . "</h3>
                                <p>" . $course['description'] . "</p>
                                <p>Duration: " . $course['duration'] . "</p>
                                <a href='enrollement.php?id={$course['id']}' class='btn btn-info'>Enroll Now</a>
                            </div>
                        </div>";
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div><!-- End All course -->

             <!-- Top Selling Courses -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h1 class="text-center">Top selling Courses</h1>
                  <div class="row">
                  <?php 
                        $conn = new mysqli("localhost", "root", "", "lms");

                        $fetch = mysqli_query($conn, "SELECT * FROM courses");
                        $courseDir = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

                        foreach ($courseDir as $course) {
                            if($course['duration'] >= 20) {
                              echo "<div class='col-md-4'>
                            <div class='course-card d-flex flex-column p-3 border' style='min-height: 250px;'>
                                <h3>" . $course['title'] . "</h3>
                                <p>" . $course['description'] . "</p>
                                <p>Duration: " . $course['duration'] . "</p>
                                <a href='enrollement.php?id={$course['id']}' class='btn btn-info'>Enroll Now</a>
                                </div>
                              </div>";
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
        <!-- End Top Selling Courses -->
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
<?php require 'include/footer.php'; ?>