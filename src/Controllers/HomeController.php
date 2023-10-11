<?php
namespace August\Controllers;
use August\Controllers\AbstractController;


class HomeController extends AbstractController
{
    public function index(){
        $this->renderview("home-view");
    }
}