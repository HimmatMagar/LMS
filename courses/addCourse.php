<?php include '../layout/head.php'; ?>
<?php include '../layout/nav.php'; ?>
<?php include '../layout/sidebar.php'; ?>


<main id="main" class="main">
    <section>
        <div class="container w-50 p-3 shadow rounded-lg">
        <form method="POST" enctype="multipart/form-data">

            <?php

                $conn = new mysqli("localhost", "root", "", "lms");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = mysqli_query($conn, "SELECT * FROM categories");
                $sql = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($sql as $id) {}

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $category = $id['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    $img = $_FILES['img']['name'];
                    $tmp = $_FILES['img']['tmp_name'];
                    $size = $_FILES['img']['size'];

                    $explode = explode('.', $img);
                    $firstName = strtolower($explode[0]);
                    $type = strtolower(end($explode));
                    $imgName = $firstName . '_' . time() . "." . $type;

                    $duration = $_POST['duration'];
                    
                    if(!empty($title) && !empty($description) && !empty($duration)) {
                        if($size <= 1024 * 1024 * 5) {
                            if(in_array($type, ['jpg', 'jpeg', 'png', 'gif'])) {
                                if(move_uploaded_file($tmp, 'upload/' . $imgName)) {
                                    $sql = mysqli_query($conn, "INSERT INTO courses(ctg_id, title, description, img, duration) VALUES ('$category', '$title', '$description', '$imgName', '$duration')");
                                    if($sql) {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Course Added Sucessfully</div>';
                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=courseInfo.php\">";
                                    } else {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error....</div>';
                                    }
                                } else {
                                    echo "<div class='alert alert-warning'>Failed to upload a file</div>";
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">File type is not supported!</div>';
                            }
                        } else {
                            echo "<div class='alert alert-warning'>Image size must be less than 5MB</div>";
                        }
                    }
                }

            ?>
            <div class="mb-3">
              <label for="input1" class="form-label">Title</label>
              <input type="text" class="form-control" id="input1" name="title" aria-describedby="textHelp" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label">Title Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea2" name="description" rows="5"  required></textarea>
            </div>

            <div class="mb-3">
              <label for="input1" class="form-label">Chooses a image for course</label>
              <input class="form-control" type="file" name="img" id="input1" multiple required>
            </div>

            <div class="form-floating">
                <select class="form-select" id="floatingSelect" name="duration" aria-label="Floating label select example"  required>
                    <option value="1 month">One Month</option>
                    <option value="2 month">Two Month</option>
                    <option value="3 month">Three Month</option>
                </select>
                <label for="floatingSelect">Duration</label>
            </div>
          <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
        </div>
    </section>
</main>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>