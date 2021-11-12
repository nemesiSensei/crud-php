<?php
//front controller 
require_once "model/database.php";
//echo $_GET['controller'];

if(!isset($_GET['c']))
{
    require_once 'controller/home.controller.php';
    $controller= new HomeController();
    call_user_func(array($controller, "index")); 

}else{
    $controller=$_GET['c'];
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller)."Controller";
    $controller = new $controller;
    $action = isset($_GET['a']) ? $_GET['a'] : 'index'; //operador ternario
    call_user_func(array($controller,$action)); 
}