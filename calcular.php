<?php
    $cadena = $_POST['cadena'];

    if($cadena>0){
        $operators = '/[+\/*\^%-]+/'; // Allowed math operators
        $regexp = '/^[0-9]+[+\/*\^%-][0-9]+$/';

        $valido = preg_match($regexp, $cadena);
        if($valido==1){
            $bloqnum = preg_split("/[+\/*\^%-]+/", $cadena);
            $bloqnum1=$bloqnum[0];
            $bloqnum2=$bloqnum[1];

            $operador = preg_match($operators, $cadena, $coincidencias);
            $op=$coincidencias[0];

            if(($op)=='+'){
            $resultado = $bloqnum1+$bloqnum2; 
            }elseif(($op)=='-'){
            $resultado = $bloqnum1-$bloqnum2; 
            }elseif(($op)=='*'){
            $resultado = $bloqnum1*$bloqnum2; 
            }elseif(($op)=='/'){
            $resultado = $bloqnum1/$bloqnum2; 
            }elseif(($op)=='%'){
            $resultado = (($bloqnum1*$bloqnum2)/100); 
            }elseif(($op)=='^'){
            $resultado = sqrt($bloqnum1);  
            }
        }else{
            $resultado = "Operacion no valida";
        }


        $data["status"]='ok';
        $data["respon"] = $resultado;
    }else{
        $data["status"]='err';
    }

    echo json_encode($data);
?>