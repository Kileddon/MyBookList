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
      return $sql->insert_id;
    }

    public function sortByAuthor() {
      $sql = $this->_link->prepare('SELECT * FROM `' . self::TABLE . '` ORDER BY `author`');
      $sql->execute();
      $result = $sql->get_result();
      return $result;
    }

    public function sortById() {
      $sql = $this->_link->prepare('SELECT * FROM `' . self::TABLE . '` ORDER BY `id` DESC');
      $sql->execute();
      $result = $sql->get_result();

      return $result;
    }

    public function deleteBook($deleteId) {
      $sql = $this->_link->prepare('DELETE FROM `' . self::TABLE . '` where id=?');
      $sql->bind_param('i', $deleteId);
      $sql->execute();
    }
  }
?>
