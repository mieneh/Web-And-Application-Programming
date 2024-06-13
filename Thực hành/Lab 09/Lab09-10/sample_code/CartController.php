<?php
class CartController extends Controller
{
    public function SayHi()
    {    
        $product_model = $this->model("ProductModel");

        if(isset($_SESSION['cart']))
        {
            $cart_id = $_SESSION['cart'];
            $cart_item = [];
            $number = array_count_values($_SESSION['cart']);
            foreach($cart_id as $id)
            {
                $arr = $product_model->getProductFromId($id);
                $arr[1] = $number[$id];
                array_push($cart_item, $arr);
                
            }
        }
        else
        {
            $cart_item = "";
        }
        
        $this->view("Cart", [
            "Product" => json_encode($cart_item)
        ]);
    }
    
    public function getProductInCart()
    {
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array($_POST['id']);
        }
        else {
            $_SESSION['cart'][] = $_POST['id'];
        }
    }

    public function deleteCart()
    {
        unset($_SESSION['cart']);
    }
}
?>