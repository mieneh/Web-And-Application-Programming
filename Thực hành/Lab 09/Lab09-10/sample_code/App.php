<?php
class App 
{
    // http://localhost:8080/simple_mvc/Home/SayHi/1/2/3
    protected $controller = "HomeController";
    protected $action = "SayHi";
    protected $params = [];

    function __construct()
    {
        // Array ( [0] => Home [1] => SayHi [2] => 1 [3] => 2 [4] => 3 )
        $arr = $this -> UrlProcess();
        
        // Xử lý Controller
        if(!empty($arr))
        {
            if( file_exists("".$arr[0].".php"))
            {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once("". $this->controller .".php");
        $this->controller = new $this->controller;

        // Xử lý Action
        if(isset($arr[1]))
        {
            if( method_exists($this->controller, $arr[1]) )
            {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Xử lý Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }   

    // Xử lý URL
    function UrlProcess(){
        // Home/SayHi/1/2/3
        if( isset($_GET['url']) )
        {
            // Làm sạch dữ liệu (Xóa khoảng trắng,..)
            $url = filter_var(trim($_GET["url"], "/"));
            // Cắt chuỗi theo dấu /
            return explode("/", $url);
        }
    }
}
?>