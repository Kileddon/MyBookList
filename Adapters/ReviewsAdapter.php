<?php
include_once 'Adapter.php';
class ReviewsAdapter extends Adapter {
  const TABLE = 'reviews';

  public function __construct($link) {
    $this->_link = $link;
  }

  public function newReview($bookId, $comment, $rate) {
    $sql = $this->_link->prepare('INSERT INTO `' . self::TABLE . '` (`id`, `book_id`, `comment`, `rate`) VALUES (NULL,?,?,?)');
    $sql->bind_param('iss', $bookId, $comment, $rate);
    $sql->execute();
  }

  public function getReviews($bookId) {
    $sql = $this->_link->prepare('SELECT * FROM `' . self::TABLE . '` WHERE book_id=?');
    $sql->bind_param('i', $bookId);
    $sql->execute();

    return $sql;
  }
}
?>
