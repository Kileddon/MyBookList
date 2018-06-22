<html>
  <?php
    include_once 'connect.php';
    include_once 'Adapters/BooksAdapter.php';
  ?>
  <head>
    <title>MyBookList</title>
  </head>
  <body>
    <?php
      $booksAdapter = new BooksAdapter($link);
      include_once 'newbook.php';
      $sql = $booksAdapter->sortByBookName();
    ?>
    <form method="post">
      <select size="10" name="selectBook">
      <?php
        while ($row = $sql->fetch_assoc()) {
          $author = $row['author'];
          $book = $row['name'];
          echo "<option>$author $book</option>";

        }
      ?>
      </select>
    </form>
  </body>
</html>
