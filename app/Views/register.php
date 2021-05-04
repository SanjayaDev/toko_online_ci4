<?= $this->extend("layouts/app"); ?>

<?= $this->section("content"); ?>
  <h1>Resgister Form</h1>
  <?php 
    $errors = session()->getFlashdata("errors");

    if (!empty($errors)) {
      echo "<div class='alert alert-danger' role='alert'>";
      echo "<h4 class='alert-heading'>Terjadi Kesalahan</h4><hr>";
      echo "<p class='mb-0'>";
        foreach ($errors as $item) {
          echo "$item <br>";
        }
      echo "</p>";
      echo "</div>";
    }
  ?>
  <?= form_open("auth/register"); ?>
    <div class="form-group">
      <?= form_label("Username", "username") ?>
      <?= form_input("username", "", ["class" => "form-control", "id" => "username"]) ?>
    </div>
    <div class="form-group">
      <?= form_label("Password", "password") ?>
      <?= form_password("password", "", ["class" => "form-control", "id" => "password"]) ?>
    </div>
    <div class="form-group">
      <?= form_label("Repeat Password", "repassword") ?>
      <?= form_password("repassword", "", ["class" => "form-control", "id" => "repassword"]) ?>
    </div>
    <div class="text-right">
      <?= form_submit("submit", "Submit", ["class" => "btn btn-primary"]) ?>
    </div>
  <?= form_close(); ?>
<?= $this->endSection(); ?>