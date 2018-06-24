<?php
include_once 'connect.php';
include_once 'Adapters/BooksAdapter.php';
include_once 'Adapters/ReviewsAdapter.php';
$booksAdapter = new BooksAdapter($link);
$reviewsAdapter = new ReviewsAdapter($link);
  if (isset($_GET['id'])) {
    $bookId = intval($_GET['id']);
    if ($bookId !== 0) {
      $result = $reviewsAdapter->getReviews($bookId);
      if ($result) {
        include_once 'newreviews.php';
        $res = $result->get_result();
        while ($row = $res->fetch_assoc()) {
          $comment = $row['comment'];
          $rate = $row['rate'];
          echo "<br>$comment $rate <br>";
        }
      }
    }
    else {
      include_once 'newbook.php';
    }
  }
  elseif (isset($_GET['rate']) && isset($_GET['comment'])) {
    $comment = $_GET['comment'];
    $rate = $_GET['rate'];
    $bookId = $_GET['bookId'];
    $result = $reviewsAdapter->newReview($bookId, $comment, $rate);
    echo $comment . ' ' . $rate;
  }
?>
