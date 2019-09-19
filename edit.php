<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM student WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$student = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['id']) && ($_POST['name'])  && isset ($_POST['surname']) && isset($_POST['email']) ) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $sql = 'UPDATE student SET id=:id, name=:name, surname=:surname, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id' => $id,':name' => $name, ':surname' => $surname, ':email' => $email])) {
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update student</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="id">ID</label>
          <input value="<?= $student->id; ?>" type="text" name="id" id="id" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $student->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="surname">Surname</label>
          <input value="<?= $student->surname; ?>" type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $student->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update student</button>
        </div>
      </form>
    </div>
  </div>
</div>

