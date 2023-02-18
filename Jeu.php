<?php

class Jeu{
    public $random;
    public $tentative;

    public function small(){
        return 'est trop petit </p>';
    }
    public function big(){
        return 'est trop grand </p>';
    }
    public function win(){
        echo '<h2 class="text-success font-weight-bold">BRAVO!! </h2>';
        echo '<a href="index.php">Rejouer!!!</a>';
    }
}
?>