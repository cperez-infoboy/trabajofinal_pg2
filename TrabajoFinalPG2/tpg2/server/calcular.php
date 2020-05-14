<?php
include "factorial.php";

try {
    $numero = $_GET["numero"];
    
    $fact = new factorial($numero);
    $total = $fact->get_factorial();
    
    echo($numero."! = ".$fact->get_detallecalculo()." = ".strval($total));
}
catch(Exception $e) {
    echo($e->getMessage());
}

?>