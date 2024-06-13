<?php
class Controller 
{
    public function model($model)
    {
        require_once("".$model.".php");
        return new $model;
    }

    public function view($view, $data=[])
    {
        require_once("".$view.".php");
    }
}
?>