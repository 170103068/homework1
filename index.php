
<!DOCTYPE html>
<html>
 <head>
     <title> Db Create</title>
     <link rel="stylesheet" type="text/css" href="style.css">
 </head>

<body>
<?php include('server.php');?>



<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($results)){ ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['surname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
        </td>
          <td>
                <a href="#">Delete</a>
            </td>

        </tr>
    <?php
    }
    ?>

    </tbody>
</table>
<form method="post" action="server.php" >
    <div class="input-group">
        <label>id</label>
        <input type="text" name="id" value="<?php echo $id; ?>">
    </div>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname" value="<?php echo $surname; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">

        <button class="btn" type="submit" name="save" >Save</button>



    </div>
</form>
</body>

</html>
