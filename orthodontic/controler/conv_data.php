<?php
class dt{
var $ano = "";
var $mes = "";
var $dia= "";
var $datnew="";
function converte($data)
{
 $dia = substr($data,0,2);
 $mes = substr($data,3,2);
 $ano = substr($data,6,4);
 $datnew = $ano."-".$mes."-".$dia;
 return $datnew;
 }
 function inverte($data2)
 {
 $ano = substr($data2,0,4);
 $mes = substr($data2,5,2);
 $dia = substr($data2,8,2);
 $datnew = $dia."/".$mes."/".$ano;
 return $datnew;
 }
}

?>
