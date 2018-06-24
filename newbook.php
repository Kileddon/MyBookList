<form method="post">
<label>Author:</label>
<input type="text" name="author">
<label>Book Name:</label>
<input type="text" name="name">
<br>
<button type="submit" name="create">Create</button>
</form>
<?php
  if (isset($_POST['create'])) {
    $author = $_POST['author'];
    $name = $_POST['name'];
    $result = $booksAdapter->newBook($author, $name);
  }
?>
