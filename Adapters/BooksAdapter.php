<?php
  include_once 'Adapter.php';
  class BooksAdapter extends Adapter {
    const TABLE = 'books';

    public function __construct($link) {
      $this->_link = $link;
    }

    public function newBook($author, $name) {
      $sql = $this->_link->prepare('INSERT INTO `' . self::TABLE . '` (`id`, `author`, `name`) VALUES (NULL,?,?)');
      $sql->bind_param('ss', $author, $name);
      $result = $sql->execute();
    }

    public function sortByAuthor() {
      $sql = $this->_link->prepare('SELECT * FROM `' . self::TABLE . '` ORDER BY `author`');
      $sql->execute();
      $result = $sql->get_result();
      return $result;
    }

    public function sortByBookName() {
      $sql = $this->_link->prepare('SELECT * FROM `' . self::TABLE . '` ORDER BY `id` ');
      $sql->execute();
      $result = $sql->get_result();

      return $result;
    }
  }
?>
