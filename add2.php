<?php include 'db.php'; ?>
<!--
  add.php — CREATE (the "C" in CRUD)
  Shows a form to type a new user, then saves it into the database.
-->

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
    <h1>Add Movies</h1>
  </div>
</div>

<!--
  An HTML form. method="post" sends the typed data hidden in the request
  body (not shown in the URL) when the form is submitted.
  Each <input> has a name="..." — that name is how PHP reads the value later.
-->

<div class="form-container">

<form method="post">

<div class="form-row">

  <div class="form-group">
    <label>Hall</label>
    <input type="text" name="hall" placeholder="Enter hall number" required>
  </div>

  <div class="form-group">
    <label>Movie Name</label>
    <input type="text" name="movieName" placeholder="Enter movie name" required>
  </div>

</div>

<div class="form-row">

  <div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" placeholder="Enter genre" required>
  </div>

  <div class="form-group">
    <label>Runtime</label>
    <input type="text" name="runtime" placeholder="Enter Runtime" required>
  </div>

</div>

  <div class="form-group">
    <label>Director</label>
    <input type="text" name="director" placeholder="Enter director" required>
  </div>

  <!-- The submit button. Clicking it sends the form. name="save" lets PHP tell that THIS button was pressed. -->

  <div class="form-action">
    <a href="movies.php" class="btn-cancel">Cancel</a>
      <input type="submit" name="save" value="Save" class="btn-submit">
  </div>
</form>
</div>

<?php
// isset(...) checks whether a value exists / was set.
// $_POST is a built-in PHP array that holds the data sent by a form using method="post".
// So this line means: "IF the Save button was clicked, run the code inside { }."
if(isset($_POST['save'])){
  // Read each value the user typed. The key inside [ ] matches the input's name="...".
  $hall = $_POST['hall'];
  $movieName = $_POST['movieName'];
  $genre   = $_POST['genre'];
  $runtime  = $_POST['runtime'];
  $director  = $_POST['director'];

  // Send an INSERT command to add a new row to the users table.
  // "INSERT INTO table (columns) VALUES (...)" is the SQL for creating new data.
  $conn->query("INSERT INTO movies (hall, movieName, genre, runtime, director) VALUES ('$hall','$movieName','$genre','$runtime','$director')");

  // header("Location: ...") tells the browser to redirect to another page.
  // After saving, we send the user back to the list so they can see the new student.
  header("Location: movies.php");
}
?>

</main>
</body>
</html>