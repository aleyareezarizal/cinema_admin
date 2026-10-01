<?php include 'db.php';
// delete.php — DELETE (the "D" in CRUD)
// This page has no HTML of its own. It just deletes one student
// and then immediately sends the user back to the list.

// Read which student to remove from the URL   (delete.php?id=5  ->  $id = 5).
$id = $_GET['id'];

//only delete when user click confirmation link
if (isset ($_GET['confirm'])){

// "DELETE FROM students WHERE id=$id" removes ONLY the row with this id.
// WARNING: leaving out the WHERE would delete every student in the table!
$conn->query("DELETE FROM movies WHERE id=$id");

// header("Location: ...") redirects the browser back to the list page.
header("Location: movies.php");
exit ();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Delete Page</title>
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
    <h1>Delete Movie</h1>
  </div>
</div>

<div class="form-container">

    <h1>Are you sure you want to delete movie data?</h1>
    <p>This action cannot be undone. Please double confirm before deleting.</p>

<div class="form-action">
    <a href="movies.php" class="btn-cancel">Cancel</a>
    <a href="delete2.php?id=<?php echo $id; ?>&confirm=1" class="btn-submit">Delete</a>
</div>
  </div>

</body>
</html>