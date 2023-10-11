<?php
namespace August\Controllers;
use August\Controllers\AbstractController;


class CarsController extends AbstractController
{
    public function showAllCArs(){
        $this->renderView("allCcrs.php");
    }

    public function showCAr($id){
        $this->renderView("car.php");
    }
}