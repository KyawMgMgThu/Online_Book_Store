<?php

require_once "../admin/confs/config.php";

class BookController extends DB
{

    public function index()
    {
        $statement = $this->pdo->query("select books.*, categories.name from books left join
                                        categories on books.category_id = categories.id order 
                                        by books.created_date DESC");
        $categories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    public function store($request, $files)
    {
        try {
            $cover = $files['cover']['name'];
            $tmp = $files['cover']['tmp_name'];

            if ($cover) {
                move_uploaded_file($tmp, "cover/$cover");
            }

            $statement = $this->pdo->prepare("
                INSERT INTO books 
                    (title, author, summary, price, category_id, cover, created_date, modified_date)
                VALUES
                    (:title, :author, :summary, :price, :category_id, :cover, NOW(), NOW())
            ");

            $statement->bindParam(":title", $request["title"]);
            $statement->bindParam(":author", $request["author"]);
            $statement->bindParam(":summary", $request["summary"]);
            $statement->bindParam(":price", $request["price"]);
            $statement->bindParam(":category_id", $request["category_id"]);
            $statement->bindParam(":cover", $cover);

            if ($statement->execute()) {
                header("Location: http://localhost:8000/admin/book-list.php");
            } else {
                throw new Exception("Error while creating a new product!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $statement = $this->pdo->prepare("select*from books where id = :id");
            $statement->bindParam(":id", $id);
            if ($statement->execute()) {
                $books = $statement->fetch(PDO::FETCH_OBJ);
                $categories = $this->pdo->query("select * from categories")->fetchAll(PDO::FETCH_OBJ);
                $result = ["books" => $books, "categories" => $categories];
                return $result;
            } else {
                throw new Exception("Error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($id, $request, $files)
    {
        try {
            $cover = $files['cover']['name'];
            $tmp = $files['cover']['tmp_name'];

            if ($cover) {
                move_uploaded_file($tmp, "cover/$cover");
            }
            $statement = $this->pdo->prepare("
                update books
                set
                `title` = :title, `author` = :author, `summary` = :summary, `price` = :price, `category_id` = :category_id, `cover` = :cover
                where id=:id
            ");

            $statement->bindParam("id", $id);
            $statement->bindParam(":title", $request["title"]);
            $statement->bindParam(":author", $request["author"]);
            $statement->bindParam(":summary", $request["summary"]);
            $statement->bindParam(":price", $request["price"]);
            $statement->bindParam(":category_id", $request["category_id"]);
            $statement->bindParam(":cover", $cover);
            if ($statement->execute()) {
                header("Location: http://localhost:8000/admin/book-list.php");
            } else {
                throw new Exception("Error while updating a new product!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function destory($id)
    {
        try {
            $statement = $this->pdo->prepare("
                delete from books where id = :id;
            ");
            $statement->bindParam(":id", $id);
            if ($statement->execute()) {
                header("Location: http://localhost:8000/admin/book-list.php");
            } else {
                throw new Exception("Error while updating a new product!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
