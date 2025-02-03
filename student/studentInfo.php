<?php include '../layout/head.php'; ?>
<?php include '../layout/nav.php'; ?>
<?php include '../layout/sidebar.php'; ?>


<main id='main' class="main">
<section class="py-5">
        <div class="container">
            <h4>Course List</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Enrolled Courese Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $conn = new mysqli('localhost', 'root', '', 'lms');
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE role = 'student'");
                        $students = mysqli_fetch_all($sql, MYSQLI_ASSOC);

                         
                        
                        // if(isset($_GET['id'])) {
                        //     $id = $_GET['id'];
                        //     $sql = mysqli_query($conn, "DELETE FROM courses WHERE id = '$id'");
                        //     if($sql) {
                        //         echo "<div class='alert alert-success'>Delete Course Success</div>";
                        //         echo "<meta http-equiv=\"refresh\" content=\"1;URL=courseInfo.php\">";    
                        //     } else {
                        //         echo "<div class='alert alert-danger'>Delete Course Failed</div>";
                        //     }
                        // }
                        foreach ($students as $student) {
                            echo "<tr>";
                            echo "<td>" . $student['Id'] . "</td>";
                            echo "<td>" . $student['name'] . "</td>";
                            echo "<td>" . $student['status'] . "</td>";
                            echo "<td>
                                <a href='editCourse.php?id={$student['id']}' class='btn btn-primary'>Edit</a>
                                <a href='studentInfo.php?id={$student['id']}' class='btn btn-danger'>Delete</a>
                            </td>";
                            }
                            $conn -> close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>


<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>