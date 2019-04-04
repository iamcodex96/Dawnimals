<?php

namespace App\Classes;

class Utilitat
{
    public static function setFiltros($request, $query, &$data){
        $filtros = $request->input('filtros');

        $data["filtros"] = $filtros;

        if ($filtros != null){

            foreach ($filtros as $filtro => $valor){
                $query = self::setFiltro($query, $filtro, $valor);
            }
        }

        return $query;
    }

    public static function setFiltro($query, $filtro, $valor){
        if ($valor != null && $valor != ""){
            $nValor = "%".$valor."%";

            $pos = strpos($filtro, ".");
            if ($pos === false){
                $query = $query->where($filtro, "like", $nValor);
            } else{
                $parent = substr($filtro, 0, $pos);
                $campo = substr($filtro, $pos+1, strlen($filtro)-$pos);

                $query = $query->whereHas($parent, function($nQuery) use($campo, $nValor) {
                    $nQuery->where($campo, "like", $nValor);
                });
            }
        }
        return $query;
    }

    public static function controlError($ex)
    {
        $mensaje = "";
        if (!empty($ex->errorInfo[1]))
        {
            switch ($ex->errorInfo[1])
            {
                case 1062: case 1451: case 1366:
                $mensaje = __("errores." . $ex->errorInfo[1]);
                    break;
                default:
                    $mensaje = $ex->errorInfo[1] . " - " . $ex->errorInfo[2];
                    break;
            }
        } else
        {
            switch ($ex->getCode())
            {
                case 1044: case 1049: case 2002:
                    $mensaje = __("errores." . $ex->getCode());
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
