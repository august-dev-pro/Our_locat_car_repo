<?php
namespace August\Controllers;
class AbstractController
{
    protected $templatePath = "/templates/";
    public function renderView($viewPath, $data = []){

        $relativePath = dirname(__DIR__, 2) . $this->templatePath;
        $this->templatePath;
        if (file_exists($relativePath .$viewPath. ".php")) {

            ob_start();
            //on inclu l'enfant
            include $relativePath .$viewPath. ".php";
            $content = ob_get_clean();
            //on inclu le parent
            include $relativePath . "template.php";

        } else {
            $content = "<h1>la view: $viewPath n'existe pas dans le dossier templates</h1>";
            include $relativePath . "template.php";
        }
    }
}
