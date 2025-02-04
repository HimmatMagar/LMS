
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationCustom01" value="" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationCustom02" value="" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Sanitize and validate first name
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = "First name is required.";
    } else {
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    }

    // Sanitize and validate last name
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = "Last name is required.";
    } else {
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    }

    // Sanitize and validate username
    if (empty($_POST['username'])) {
        $errors['username'] = "Username is required.";
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }

    // Sanitize and validate city
    if (empty($_POST['city'])) {
        $errors['city'] = "City is required.";
    } else {
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    }

    // Validate state
    if (empty($_POST['state'])) {
        $errors['state'] = "State is required.";
    } else {
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    }

    // Validate zip
    if (empty($_POST['zip'])) {
        $errors['zip'] = "Zip code is required.";
    } elseif (!preg_match('/^[0-9]{5}$/', $_POST['zip'])) {
        $errors['zip'] = "Invalid zip code format.";
    } else {
        $zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
    }

    // Validate terms agreement
    if (empty($_POST['agree'])) {
        $errors['agree'] = "You must agree to the terms.";
    }

    if (empty($errors)) {
        echo "<p>Form submitted successfully!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>

      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Course</label>
        <select class="form-select" id="validationCustom03" required>
          <option selected disabled value="">Choose</option>
          <option>1.BCSIT
          </option>
          <option>2.BBA
          </option>
          <option>3.BHM
          </option>
          <option>4.BCOM</option>
          <option>5.BBA Finance
          </option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">District</label>
        <select class="form-select" id="validationCustom04" required>
          <option selected disabled value="">Choose</option>
          <option>  1.Dhangadhi
          </option>
          <option>  2.Pokhara
          </option>
          <option>  3.Kathamandu
          </option>
          <option>  4.Butwal
          </option>
          <option>  5.Arghakachi
          </option>
          <option>  6.Chitwan
          </option>
          <option>  7.Bhaktapur
          </option>
          <option> 8.Syangja
          </option>
        </select>
        <div class="invalid-feedback">
        </div>
      </div>
      <form class="row g-3 needs-validation" method="POST" action="index.php" enctype="multipart/form-data" novalidate>
    <div class="col-md-3">
        <label for="document" class="form-label">Upload Document</label>
        <input type="file" class="form-control" name="document" id="document" accept="image/*" required>
        <div class="invalid-feedback">Please upload a valid document photo.</div>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";  // Folder to store uploaded files
    $errors = [];

    // Check if file is uploaded
    if (!empty($_FILES["document"]["name"])) {
        $fileName = basename($_FILES["document"]["name"]);
        $targetFilePath = $uploadDir . time() . "_" . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allow only image formats
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
                echo "<p>File uploaded successfully: $targetFilePath</p>";
            } else {
                $errors[] = "Error uploading the file.";
            }
        } else {
            $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
        }
    } else {
        $errors[] = "Please upload a document photo.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>

</form>

      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
          </label>
          <div class="invalid-feedback">

          </div>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Add</button>
      </div>
    </form>
</body>
</html>