<?php
session_start();
require_once __DIR__ . "/../admin/confs/config.php";

class ShoppingCartController extends DB
{
    public function Cart()
    {
        $cart = 0;

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $qty) {
                $cart += $qty;
            }
        }

        if (isset($_GET['cat'])) {
            $cat_id = $_GET['cat'];
            $statement = $this->pdo->query("select * from books where category_id = $cat_id ");
            $books = $statement->fetchAll(PDO::FETCH_OBJ);
            return $books;
        } else {
            $statement = $this->pdo->query("select * from books");
            $books = $statement->fetchAll(PDO::FETCH_OBJ);
            return $books;
        }
    }

    public function getCategories()
    {
        $cats = $this->pdo->query("select * from categories");
        return $cats->fetchAll(PDO::FETCH_OBJ);
    }

    public function book_detail($id)
    {
        $statement = $this->pdo->prepare("select * from books where id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $book = $statement->fetch(PDO::FETCH_OBJ);

        if ($book) {
            return $book;
        } else {
            throw new Exception("Error while fetching book details!");
        }
    }
}
