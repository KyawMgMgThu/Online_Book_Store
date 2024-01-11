<?php

require_once "../admin/confs/model.php";
require_once "../model/product.php";

class ProductController
{
    public function index()
    {
        try {
            $products = new Products();
            return $products->all();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return [];
        }
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
            $statement->blindParam(":name", $request["name"]);
            $statement->blindParam(":remark", $request["remark"]);
            if ($statement->execute()) {
                header("Location: cat-list.php");
            } else {
                throw new Exception("Error while creating a new product!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
