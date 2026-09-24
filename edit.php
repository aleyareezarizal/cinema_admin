<?php include 'db.php';
// edit.php — UPDATE (the "U" in CRUD)
// Loads one student's current details into a form, then saves the changes.

// $_GET is a built-in PHP array that holds values coming from the URL.
// The list page links here as  edit.php?id=3 , so here $_GET['id'] would be 3.
$id = $_GET['id'];

// Fetch just that one student. "WHERE id=$id" limits the result to the matching row.
$result = $conn->query("SELECT * FROM users WHERE id=$id");

// fetch_assoc() reads the single row we found into $row (values read by column name).
$row = $result->fetch_assoc();
?>
<h2>Edit User</h2>

<!--
  The same kind of form as add.php, but each field is PRE-FILLED using
  value="<?php // echo $row['...']; ?>"  so the user sees the current data
  and can change it. <?php // echo ... ?> prints a PHP value into the HTML.
-->
<form method="post">
  Username: <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
  Password: <input type="password" name="userPass" value="<?php echo $row['userPass']; ?>"><br>
  Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
  Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
  Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
  <input type="submit" name="update" value="Update">
</form>

<?php
// IF the Update button was clicked (its name is "update")...
if(isset($_POST['update'])){
  // ...read the new values the user typed.
  $username   = $_POST['username'];
  $userPass = $_POST['userPass'];
  $name = $_POST['name'];
  $phone  = $_POST['phone'];
  $email = $_POST['email'];

  // UPDATE ... SET ... WHERE id=$id  changes the existing row — only the one with this id.
  // WARNING: without the WHERE, it would overwrite EVERY student, so the WHERE matters a lot!
  $conn->query("UPDATE users SET username='$username', name='$name', userPass='$userPass', email='$email', phone='$phone' WHERE id=$id");

  // Redirect back to the list to see the updated student.
  header("Location: index.php");
}
?>