<?php
require 'db.php';
$sql = 'SELECT * FROM student';
$statement = $connection->prepare($sql);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


 <?php
 //code for the create student
require 'db.php';
$message = '';
if (isset ($_POST['id']) && ($_POST['name']) && isset ($_POST['surname'])  && isset($_POST['email']) ) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO student(id, name, surname, email) VALUES(:id, :name, :surname, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id' => $id, ':name' => $name, ':surname' => $surname, ':email' => $email])) {
     header("Location: index.php");
  }
}
 ?>
 <?php require 'header.php'; ?>
<div class="container-fluid" >
	<div class="row">
		<div class="col-sm-4"  >
		  <div class="card" style="width:300px; position: fixed; margin-top: 4%;margin-left: 3%">
		    <div class="card-header">
		      <h2>Create a student</h2>
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
	          <input type="text" name="id" id="id" class="form-control">
	        </div>
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" name="name" id="name" class="form-control">
	        </div>
	        <div class="form-group">
	          <label for="surname">Surname</label>
	          <input type="text" name="surname" id="surname" class="form-control">
	        </div>
	        <div class="form-group">
	          <label for="email">Email</label>
	          <input type="email" name="email" id="email" class="form-control">
	        </div>
	        <div class="form-group">
	          <button type="submit" class="btn btn-info">Create a student</button>
	        </div>
      </form>
    </div>
    </div>
  </div>
  <div class="col-sm-8" >
  <div class="card" style="width:800px">
    <div class="card-header">
      <h2>All students</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Surname</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php foreach($student as $student): ?>
          <tr>
            <td><?= $student->id; ?></td>
            <td><?= $student->name; ?></td>
            <td><?= $student->surname; ?></td>
            <td><?= $student->email; ?></td>
            <td>
              <a href="edit.php?id=<?= $student->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $student->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    </div>
</div>
  </div>
</div>

