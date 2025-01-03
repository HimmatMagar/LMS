<?php require '../include/head.php'; ?>
<body>
<?php require '../include/header.php'; ?>

  <!-- ======= Sidebar ======= -->
<?php require '../include/sidebar.php'; ?>

  <main id="main" class="main">
    <section>
        <div class="container w-50 p-4 shadow rounded-2">
            <h1 class="text-center">Manage Student</h1>
            <form>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Enrollement Id</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Enrollement At</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $conn = new mysqli("localhost", "root", "", "lms");

                        $fetch = mysqli_query($conn, "SELECT * FROM enrollments");
                        $user = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

                        foreach ($user as $student) {
                            echo "
                                <tr>
                                    <td>{$student['enrollment_id']}</td>
                                    <td>{$student['user_id']}</td>
                                    <td>{$student['enrolled_at']}</td>
                                    <td>
                                        <a href='#' class='btn btn-primary'>Approved</a>
                                        <a href='#' class='btn btn-info'>Unapproved</a>
                                        <a href='#' class='btn btn-danger'>Pending</a>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                  </tbody>
                </table>
            </form>
        </div>
    </section>
  </main><!-- End #main -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>