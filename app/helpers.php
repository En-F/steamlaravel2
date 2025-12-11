<?php

use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\FuncCall;
use Vtiful\Kernel\Format;

//formateo de fecha

if(!function_exists('fecha_larga')){
    function fecha_larga(Carbon $valor){
        return $valor
            ->locale('es')
            ->timezone('Europe/Madrid')
            ->translatedFormat('d \d\e F \d\e Y ');
    }
}


function dinero_f($valor){
    $formatter = new \NumberFormatter('es_Es',\NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($valor,'EUR');
}