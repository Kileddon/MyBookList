<html>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <?php
    include_once 'connect.php';
    include_once 'Adapters/BooksAdapter.php';
    include_once 'Adapters/ReviewsAdapter.php';
    $booksAdapter = new BooksAdapter($link);
    $reviewsAdapter = new ReviewsAdapter($link);
  ?>
  <head>
    <title>MyBookList</title>
  </head>
  <body>
    <?php
      $sql = $booksAdapter->sortById();
    ?>
    <form method="post">
      <select size="10" id='selectBook' name="selectBook">
      <?php
        while ($row = $sql->fetch_assoc()) {
          $id = $row['id'];
          $author = $row['author'];
          $book = $row['name'];
          echo "<option value='$id'>$author $book</option>";
        }
      ?>
      <option value="newbook" name=newBook>New book</a></option>
      </select>
      <br>
    <script>
    $(document).ready(function(){
      $('#selectBook').change(function(){
  	  let bookId = 'id=' + $(this).find('option:selected').val();
      $.ajax({
        type: "GET",
        url: "ajax.php",
        data: bookId,
        success: function(result){
          $("#show").html(result);
        }
        }
      );
      })
    });
    </script>
    </form>
    <div width=90% height=90% id='show'></div>
  </body>
</html>
