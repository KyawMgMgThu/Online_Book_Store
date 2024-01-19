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
        }
        $statement = $this->pdo->query("select * from categories");
        $cats = $statement->fetchAll(PDO::FETCH_OBJ);
        return $cats;
    }
}
