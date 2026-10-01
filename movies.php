<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cinema Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!--
  index.php — READ (the "R" in CRUD)
  Lists every student from the database in a table.
  The line above runs db.php first, so $conn (our database
  connection) already exists and is ready to use here.
-->
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

<div class="section-header">
  <div>
    <h1>Movies List</h1>
  <p>Manage movie list in database.</p>
  </div>

<!-- A link (the <a> "anchor" tag). Clicking it opens the add-user page. -->
<a href="add2.php" class="btn-add">+&nbsp;&nbsp;&nbsp;Add Movies</a>

</div>

<!-- Start an HTML table. border="1" draws the grid lines; cellpadding adds spacing inside each cell. -->
<div class="table-container">
<table class="user-table">
<tr>
  <!-- <tr> = table row.  <th> = a bold header cell (table heading). -->
  <th>ID</th>
  <th>Hall</th>
  <th>Movie Name</th>
  <th>Genre</th>
  <th>Runtime</th>
  <th>Director</th>
  <th width="200">Actions</th>
</tr>

<tbody>
<?php
// $conn->query(...) sends an SQL command to the database and returns the result.
// "SELECT * FROM users" means: fetch ALL columns (*) of every row in the "users" table.
$result = $conn->query("SELECT * FROM movies");

// A "while" loop repeats its block once for each row that comes back.
// $result->fetch_assoc() returns the NEXT row as an "associative array"
// (an array whose values are read by column name, e.g. $row['name']).
// When there are no rows left it returns null, which ends the loop.
while($row = $result->fetch_assoc()) {
  // echo prints HTML to the page. The dots ( . ) glue the text and the variables together.
  // <td> = a normal table cell (table data).
  echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['hall']."</td>
    <td>".$row['movieName']."</td>
    <td>".$row['genre']."</td>
    <td>".$row['runtime']."</td>
    <td>".$row['director']."</td>
    <td>
      <a href='edit2.php?id=".$row['id']."' class='btn-edit'>Edit</a> |
      <a href='delete2.php?id=".$row['id']."' class='btn-delete'>Delete</a>
    </td>
  </tr>";
  // Note: edit.php?id=...  and  delete.php?id=...  put the student's id into the
  // URL, so the next page knows exactly which student to edit or delete.
}
?>

</tbody>
</table>
</div>
</main>
</body>
</html>