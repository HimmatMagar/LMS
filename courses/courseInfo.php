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
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Imgaes</th>
                        <th>Duraiton</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $conn = new mysqli('localhost', 'root', '', 'lms');
                        $sql = mysqli_query($conn, "SELECT * FROM courses");
                        $courses = mysqli_fetch_all($sql, MYSQLI_ASSOC);

                        $join = mysqli_query($conn, "SELECT c.id, c.title, c.description, c.img, c.duration, ct.ctg_name FROM courses c LEFT JOIN categories ct ON c.ctg_id = ct.id");
                        $courses = mysqli_fetch_all($join, MYSQLI_ASSOC);   
                        
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = mysqli_query($conn, "DELETE FROM courses WHERE id = '$id'");
                            if($sql) {
                                echo "<div class='alert alert-success'>Delete Course Success</div>";
                                echo "<meta http-equiv=\"refresh\" content=\"1;URL=courseInfo.php\">";    
                            } else {
                                echo "<div class='alert alert-danger'>Delete Course Failed</div>";
                            }
                        }
                        foreach ($courses as $course) {
                            echo "<tr>";
                            echo "<td>" . $course['id'] . "</td>";
                            echo "<td>" . $course['ctg_name'] . "</td>";
                            echo "<td>" . $course['title'] . "</td>";
                            echo "<td>" . $course['description'] . "</td>";
                            echo "<td><img src='upload/{$course['img']}' /></td>";
                            echo "<td>" . $course['duration'] . "</td>";
                            echo "<td>
                                <a href='editCourse.php?id={$course['id']}' class='btn btn-primary'>Edit</a>
                                <a href='courseInfo.php?id={$course['id']}' class='btn btn-danger'>Delete</a>
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