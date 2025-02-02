<?php include '../layout/head.php'; ?>
<?php include '../layout/nav.php'; ?>
<?php include '../layout/sidebar.php'; ?>


<main id="main" class="main">
    <section>
        <div class="container w-50 p-3 shadow">
        <form method="POST">
            <?php
                $conn = new mysqli("localhost", "root", "", "lms");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $selectCategory = $_POST['category'];
                    $desctipion = $_POST['description'];
                    if(!empty($selectCategory) && !empty($desctipion)) {
                        $sql = mysqli_query($conn, "INSERT INTO categories(ctg_name, description) VALUES('$selectCategory', '$desctipion')");
                        if($sql) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Category added</div>';
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=addCourse.php\">";
                        }else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Category not added</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select a course and enter a description</div>';
                    } 
                }
                $conn -> close();
            ?>

          <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="category" aria-label="Floating label select example">
                <option value="Web Development">Web Development</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Java Program">Java Program</option>
            </select>
            <label for="floatingSelect">Category</label>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary mt-2">Add</button>
        </form>
        </div>
    </section>
</main>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>