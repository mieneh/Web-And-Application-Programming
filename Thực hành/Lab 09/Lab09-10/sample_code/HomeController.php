<?php
class HomeController extends Controller
{
    public function SayHi()
    {
        // GỌI Model
        $product_model = $this->model("ProductModel");

        // GỌI View
        $this->view("Home", [
            "Product" => $product_model->getProduct(),
            "Category" => $product_model->getCategory(),
        ]);
    }

    public function getProductGroupByName($name)
    {
        // GỌI Model
        $product_model = $this->model("ProductModel");

        // GỌI View
        $this->view("Home", [
            "Product" => $product_model->getProductGroupByName($name),
            "Category" => $product_model->getCategory()
        ]);
    }

}
?>