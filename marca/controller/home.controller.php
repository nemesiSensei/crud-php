<?php
//CONTROLLER
class HomeController
{
function index()
    {
        require "view/header.php";
       require "view/home/main.php";
       require "view/footer.php";
    }
    function test()
    {
        var_dump(Database::Connect());
    }
}

?>