<?php require '../include/head.php'; ?>
<?php require '../include/header.php'; ?>
<?php require 'sidebarForStudent.php'; ?>

<main id="main" class="main">
<section class="mt-5">
    <div class="container w-50 p-5 shadow rounded-2">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Some text</label>
                <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                <div id="textHelp" class="form-text">We'll never share your texts with anyone else.</div>
            </div>
          <div class="text-center">
          <button type="button" class="btn btn-info">Enroll</button>
          </div>
        </form>
    </div>
</section>
</main>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>