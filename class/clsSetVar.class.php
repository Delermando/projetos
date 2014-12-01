<?PHP

class setVar {

    private static function varIsArray($arrayAssocVarIn) {
        if (!is_array($arrayAssocVarIn)) {
            $retorno[] = $arrayAssocVarIn;
        } else {
            $retorno = $arrayAssocVarIn;
        }
        return $retorno;
    }

    public static function post($arrayAssocVarIn = false) {
        $arrayAssocVarIn = self::varIsArray($arrayAssocVarIn);
        $retorno['retorno'] = false;
        if ($arrayAssocVarIn !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($_POST[$arrayAssocVarIn[$a]])) {
                    $arrayAssocVarOut[$a] = "";
                } else {
                    $arrayAssocVarOut[$a] = mysql_real_escape_string(trim($_POST[$arrayAssocVarIn[$a]]));
                }
            }
            $retorno = array_combine($arrayAssocVarIn, $arrayAssocVarOut);
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public static function get($arrayAssocVarIn = false) {
        $arrayAssocVarIn = self::varIsArray($arrayAssocVarIn);
        $retorno['retorno'] = false;
        if ($arrayAssocVarIn !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($_GET[$arrayAssocVarIn[$a]])) {
                    $arrayAssocVarOut[$a] = "";
                } else {
                    $arrayAssocVarOut[$a] = trim($_GET[$arrayAssocVarIn[$a]]);
                }
            }
            $retorno = array_combine($arrayAssocVarIn, $arrayAssocVarOut);
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public static function varIsSet($arrayAssocVarIn = false) {
        $arrayAssocVarIn = self::varIsArray($arrayAssocVarIn);
        $retorno['retorno'] = false;
        if ($arrayAssocVarIn !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($GLOBALS[$arrayAssocVarIn[$a]])) {
                    $retorno[$arrayAssocVarIn[$a]] = "";
                }
            }
        }
        return $retorno;
    }

}
