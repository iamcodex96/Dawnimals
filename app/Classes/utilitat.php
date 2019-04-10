<?php

namespace App\Classes;

class Utilitat
{
    public static function setFiltros($request, $query, &$data){
        $filtros = $request->input('filtros');
        $filtrosNumericos = $request->input('filtrosNumericos');
        $filtrosBooleanos = $request->input('filtrosBooleanos');

        $data["filtros"] = $filtros;
        $data["filtrosNumericos"] = $filtrosNumericos;
        $data["filtrosBooleanos"] = $filtrosBooleanos;

        if ($filtros != null){
            foreach ($filtros as $filtro => $valor){
                $query = self::setFiltroLike($query, $filtro, $valor);
            }
        }

        if ($filtrosNumericos != null){
            foreach ($filtrosNumericos as $filtro => $valor){
                $query = self::setFiltroNumerico($query, $filtro, $valor);
            }
        }

        if ($filtrosBooleanos != null){
            foreach ($filtrosBooleanos as $filtro => $valor){
                $query = self::setFiltroBooleano($query, $filtro, $valor);
            }
        }

        return $query;
    }

    public static function setFiltroLike($query, $filtro, $valor){
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

    public static function setFiltroNumerico($query, $filtro, $valor){
        if ($valor != null && $valor != ""){

            $pos = strpos($filtro, ".");
            if ($pos === false){
                $query = $query->where($filtro, $valor);
            } else{
                $parent = substr($filtro, 0, $pos);
                $campo = substr($filtro, $pos+1, strlen($filtro)-$pos);

                $query = $query->whereHas($parent, function($nQuery) use($campo, $nValor) {
                    $nQuery->where($campo, $valor);
                });
            }
        }
        return $query;
    }

    public static function setFiltroBooleano($query, $filtro, $valor){
        if ($valor != null && $valor != ""){

            $pos = strpos($filtro, ".");
            if ($pos === false){
                $query = $query->where($filtro, boolval($valor));
            } else{
                $parent = substr($filtro, 0, $pos);
                $campo = substr($filtro, $pos+1, strlen($filtro)-$pos);

                $query = $query->whereHas($parent, function($nQuery) use($campo, $nValor) {
                    $nQuery->where($campo, boolval($valor));
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
