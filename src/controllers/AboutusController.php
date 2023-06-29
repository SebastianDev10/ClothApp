<?php

require_once 'AppController.php';

class AboutusController extends AppController
{
    public function aboutus()
    {
        $this->render('aboutus'); 
    }
}