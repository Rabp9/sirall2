<!-- File: /controllers/HomeController.php -->

<?php
    require_once '/controllers/AppController.php';
    
    class HomeController implements AppController {
        
        public static function HomeAction() {
            require_once '/views/Home/Index.php';
        }
        
    }
?>
