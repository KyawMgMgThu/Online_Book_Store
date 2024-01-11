<?php

require_once "../admin/confs/config.php";

class CategoriesController extends DB
{
    public function index()
    {
        $statement = $this->pdo->query("select * from categories");
        $categories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }
    public function store($request)
    {
        try {
            $statement = $this->pdo->prepare("
                insert into categories
                    (name,remark,created_date,modified_date)
                values
                    (:name,:remark,now(),now());
            ");
            $statement->bindParam(":name", $request["name"]);
            $statement->bindParam(":remark", $request["remark"]);


            if ($statement->execute()) {
                header("location: localhost:8000/admin/cat-list.php");
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
            $statement = $this->pdo->prepare("select * from categories where id = :id");
            $statement->bindParam(":id", $id);
            if ($statement->execute()) {
                $categories = $statement->fetch(PDO::FETCH_OBJ);
                return $categories;
            } else {
                throw new Exception("Error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $request)
    {
        try {
            $statement = $this->pdo->prepare("
               UPDATE categories
               SET 
               `name` = :name, `remark` = :remark
               WHERE id = :id
            ");

            $statement->bindParam("id", $id);
            $statement->bindParam("name", $request["remark"]);
            if ($statement->execute()) {
                header("Location: localhost:8000/admin/cat-list.php");
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
                delete from categories where id = :id;
            ");
            $statement->bindParam(":id", $id);
            if ($statement->execute()) {
                header("location: localhost:8000/admin/cat-list.php");
            } else {
                throw new Exception("Error while creating a new product!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
