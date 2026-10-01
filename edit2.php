<?php include 'db.php';
// edit.php — UPDATE (the "U" in CRUD)
// Loads one student's current details into a form, then saves the changes.

// $_GET is a built-in PHP array that holds values coming from the URL.
// The list page links here as  edit.php?id=3 , so here $_GET['id'] would be 3.
$id = $_GET['id'];

// Fetch just that one student. "WHERE id=$id" limits the result to the matching row.
$result = $conn->query("SELECT * FROM movies WHERE id=$id");

// fetch_assoc() reads the single row we found into $row (values read by column name).
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cinema Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- header page for navigation -->
 <header class="topbar">

 <div class="title">CINEMA ADMIN</div>

 <nav class="topbar-nav">
  <a href="index.php">Users</a>
  <a href="movies.php">Movies</a>
  <a href="logout.php" class="link-logout">Log Out</a>
 </nav>

</header>

<main class="main-content">

<div class="section-header add-user">
  <div>
    <h1>Edit Movie</h1>
  </div>
</div>

<!--
  The same kind of form as add.php, but each field is PRE-FILLED using
  value="<?php // echo $row['...']; ?>"  so the user sees the current data
  and can change it. <?php // echo ... ?> prints a PHP value into the HTML.
-->

<div class="form-container">

<form method="post">

<div class="form-row">

  <div class="form-group">
    <label>Hall</label>
    <input type="text" name="hall" value="<?php echo $row['hall']; ?>">
  </div>

  <div class="form-group">
    <label>Movie Name</label>
    <input type="text" name="movieName" value="<?php echo $row['movieName']; ?>">
  </div>

</div>

  <div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" value="<?php echo $row['genre']; ?>">
  </div>

  <div class="form-group">
    <label>Runtime</label>
    <input type="text" name="runtime" value="<?php echo $row['runtime']; ?>">
  </div>

  <div class="form-group">
    <label>Director</label>
    <input type="text" name="director" value="<?php echo $row['director']; ?>">
  </div>

  <!-- The submit button. Clicking it sends the form. name="save" lets PHP tell that THIS button was pressed. -->

  <div class="form-action">
    <a href="movies.php" class="btn-cancel">Cancel</a>
      <input type="submit" name="update" value="Update" class="btn-submit">
  </div>
</form>
</div>

<?php
// IF the Update button was clicked (its name is "update")...
if(isset($_POST['update'])){
  // ...read the new values the user typed.
  $hall   = $_POST['hall'];
  $movieName = $_POST['movieName'];
  $genre = $_POST['genre'];
  $runtime  = $_POST['runtime'];
  $director = $_POST['director'];

  // UPDATE ... SET ... WHERE id=$id  changes the existing row — only the one with this id.
  // WARNING: without the WHERE, it would overwrite EVERY student, so the WHERE matters a lot!
  $conn->query("UPDATE movies SET hall='$hall', movieName='$movieName', genre='$genre', runtime='$runtime', director='$director' WHERE id=$id");

  // Redirect back to the list to see the updated student.
  header("Location: movies.php");
}
?>

</main>
</body>
</html>