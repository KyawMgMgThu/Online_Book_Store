<?php
require_once __DIR__ . "/../admin/confs/config.php";

class OrderController extends DB
{
    public function all()
    {
        $statement = $this->pdo->query("select * from orders");
        $orders =  $statement->fetchAll(PDO::FETCH_OBJ);
        return $orders;
    }
    public function order($request)
    {
        $statement = $this->pdo->prepare("
            INSERT INTO orders
            (name, email, phone, address, status, created_date, modified_date)
            VALUES
            (:name, :email, :phone, :address, 0, NOW(), NOW()) ");

        $statement->bindParam(":name", $request["name"]);
        $statement->bindParam(":email", $request["email"]);
        $statement->bindParam(":phone", $request["phone"]);
        $statement->bindParam(":address", $request["address"]);
        $statement->execute();
    }

    public function order_item($order_id)
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $statement = $this->pdo->prepare("
                INSERT INTO order_items
                (order_id, book_id, qty)
                VALUES
                (:order_id, :book_id, :qty)");

            foreach ($_SESSION['cart'] as $book_id => $qty) {
                $statement->bindParam(":order_id", $order_id);
                $statement->bindParam(":book_id", $book_id);
                $statement->bindParam(":qty", $qty);
                $statement->execute();
            }
        }
    }
    public function finishorder($id, $status)
    {
        $statement = $this->pdo->prepare("
        UPDATE orders SET 
        status= :status, modified_date = now() WHERE id = :id
        ");

        $statement->bindParam(":status", $status);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header("Location: http://localhost:8000/admin/orders.php");
        } else {
            throw new Exception("Error while updating a new product!");
        }
    }
}
