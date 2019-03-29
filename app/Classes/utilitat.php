<?php

namespace App\Clases;

class Utilitat
{
    public static function controlError($ex)
    {

        $mensaje = "";
        if (!empty($ex->errorInfo[1]))
        {
            switch ($ex->errorInfo[1])
            {
                case 1062:
                    $mensaje = "Registro duplicado.";
                    break;
                case 1451:
                    $mensaje = "Registro con elementos relacionados.";
                    break;
                case 1366:
                    $mensaje = "Valor incorrecto para un integer.";
                    break;
                default:
                    $mensaje = $ex->errorInfo[1] . " - " . $ex->errorInfo[2];
                    break;
            }
        } else
        {
            switch ($ex->getCode())
            {
                case 1044:
                    $mensaje = "Usuario y/o password incorrectos.";
                    break;
                case 1049:
                    $mensaje = "Base de datos desconocida.";
                    break;
                case 2002:
                    $mensaje = "No se encuentra el servidor.";
                    break;
                default:
                    $mensaje = $ex->getCode() . " - " . $ex->getMessage();
                    break;
            }
        }

        return $mensaje;
    }
}
?>
