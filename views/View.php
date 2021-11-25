<?php

declare(strict_types = 1);

class View{

    public function render($page){
        //require_once('template/layout.php');
        include('template/navbar.php');
        include('actions/'.$page.'.php');
    }

}

?>
