<?php
class ProductModel extends Database
{
    public function getProductFromId($id)
    {
        $qr = "SELECT * FROM product where id = $id";
        $stmt = $this->con->prepare($qr);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return array(new Product($product["id"], $product["name"], 
                                                    $product["price"], $product["description"], 
                                                    $product["vote"], $product["image"], $product["type"]), 0);

    }

    public function getProduct()
    {
        $qr = "SELECT * FROM product";
        $stmt = $this->con->prepare($qr);
        $stmt->execute();
        $product_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $product_array = [];
        foreach($product_list as $product)
        {
            array_push($product_array, new Product($product["id"], $product["name"], 
                                                $product["price"], $product["description"], 
                                                $product["vote"], $product["image"], $product["type"]));
        }

       return json_encode($product_array);
    }

    public function getProductGroupByName($name)
    {
        $type = "";
        switch($name)
        {
            case "Apple":
                $type = 1;
                break;
            case "Samsung":
                $type = 2;
                break;
            case "Oppo":
                $type = 3;
                break;
            case "Google":
                $type = 4;
                break;
            case "Nokia":
                $type = 5;
                break;
        }
        $qr = "SELECT * FROM product where type = $type";
        $stmt = $this->con->prepare($qr);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        //return $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $product_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $product_array = [];
        foreach($product_list as $product)
        {
            array_push($product_array, new Product($product["id"], $product["name"], 
                                                $product["price"], $product["description"], 
                                                $product["vote"], $product["image"], $product["type"]));
        }

       return json_encode($product_array);
    }

    public function getCategory()
    {
        $qr = "SELECT * FROM category";
        $stmt = $this->con->prepare($qr);
        $stmt->execute();
        $product_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($product_list);
    }
}


class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $vote;
    public $image;
    public $type;

    public function __construct($id, $name, $price, $description, $vote, $image, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->vote = $vote;
        $this->image = $image;
        $this->type = $type;
    }

}
?>