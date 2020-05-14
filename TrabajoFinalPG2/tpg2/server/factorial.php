<?php
/*Para calcular el factorial tareas*/

class factorial{
    private $numero;
    private $detallecalculo;
    
    public function __construct($num){
        $this->numero = intval($num);
    }
    
    public function get_factorial(){
        $total = 1;
        $this->detallecalculo = "1 ";
        
        for($secuencia = 2; $secuencia <= $this->numero; $secuencia++) {
            $total = $total * $secuencia;
            $this->detallecalculo .= " x ".strval($secuencia);
        }

        if(is_infinite($total)) {
            throw new Exception('No es posible realizar cálculo');
        } 
        
        return $total;
    }
    
    public function get_detallecalculo() {
        return $this->detallecalculo;
    }
}

?>