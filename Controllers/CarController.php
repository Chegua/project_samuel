<?php
    require_once '../Models/Car.php';

    switch ($_REQUEST['option']) {
        case 'registrar':
            $brand= $_REQUEST['brand'];
            $model= $_REQUEST['model'];
            $year= $_REQUEST['year'];
            $color= $_REQUEST['color'];
            $status= $_REQUEST['status'];
            $car = new Car($brand,$model,$year,$color,$status);
            $resultado = $departamento->create();

            return $resultado;

            
            break;

        
        default:
            # code...
            break;
    }