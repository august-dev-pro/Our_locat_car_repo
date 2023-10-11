<?php
    namespace August\Controllers;
    use August\Controllers\AbstractController;

    class UserController extends AbstractController
    {
        public function index(){
            $this->renderView("user-view");
        }

        public function registerUser(){
            $this->renderView("register-user");
        }

        public function loginUser(){
            $this->renderView("login-user");
        }


    }
?>