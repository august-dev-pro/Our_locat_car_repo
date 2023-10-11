<?php
namespace August\Controllers;
use August\Controllers\AbstractController;


class ProfilController extends AbstractController
{
    public function index(){
        $this->renderview("profil.php");
    }
}