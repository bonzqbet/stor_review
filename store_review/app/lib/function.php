<?php
use Illuminate\Support\Facades\DB;


function print_pre($expression, $return = false, $wrap = false)
{
    $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative';
    if ($wrap) {
        $str = '<p style="' . $css . '"><tt>' . str_replace(
        array('  ', "\n"),
        array('&nbsp; ', '<br />'),
        htmlspecialchars(print_r($expression, true))
        ) . '</tt></p>';
    } else {
        $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
    }
    if ($return) {
        if (is_string($return) && $fh = fopen($return, 'a')) {
        fwrite($fh, $str);
        fclose($fh);
        }
        return $str;
    } else
        echo $str;
}


## encodeStr ##

function encodeStr($variable) {
    ############################################
        $key = "xitgmLwmp";
        $index = 0;
        $temp = "";
        $variable = str_replace("=", "?O", $variable);
        for ($i = 0; $i < strlen($variable); $i++) {
            $temp .= $variable[$i] . $key[$index];
            $index++;
            if ($index >= strlen($key))
                $index = 0;
        }
        $variable = strrev($temp);
        $variable = base64_encode($variable);
        $variable = utf8_encode($variable);
        $variable = urlencode($variable);
        $variable = str_rot13($variable);
        $variable = str_replace("%", "WewEb", $variable);
        return $variable;
    }
    
    ## decodeStr ##
    
    function decodeStr($enVariable) {
        $enVariable = str_replace("WewEb", "%", $enVariable);
        $enVariable = str_rot13($enVariable);
        $enVariable = urldecode($enVariable);
        $enVariable = utf8_decode($enVariable);
        $enVariable = base64_decode($enVariable);
        $enVariable = strrev($enVariable);
        $current = 0;
        $temp = "";
        for ($i = 0; $i < strlen($enVariable); $i++) {
            if ($current % 2 == 0) {
                $temp .= $enVariable[$i];
            }
            $current++;
        }
        $temp = str_replace("?O", "=", $temp);
        parse_str($temp, $variable);
        return $temp;
    }

    function randomNameUpdate($valType=null) {
        if($valType==1){
            $valRandomName =date('Ydm')."-".time()."-". rand(111, 999);
        }else{
            $valRandomName =date('Ydm')."-".time()."-". rand(111, 999);
        }
        return $valRandomName;
}

 function GenKey(){
    $db = new DB;
    $MaxOrder = $db::table('product_tbl')->max('product_order');
    if($MaxOrder == null){
        $MaxOrder = 1;
    }else{
        $MaxOrder +=1;
    }

    $maxID = $MaxOrder;
    $defCode = "0000000".$maxID;
    $valNumberRe = substr($defCode,-7);
    $valNumberRegis =  "P".$valNumberRe;
    return $valNumberRegis;
}

function DateFormat($DateTime) {
    //#################################################
        global $core_session_language;
        $DateTime = date("Y-m-d H:i", strtotime($DateTime));
    
        $DateTimeArr = explode(" ", $DateTime);
        $Date = $DateTimeArr[0];
        $Time = $DateTimeArr[1];
    
        $DateArr = explode("-", $Date);
    
        if ($core_session_language == "Thai")
            $DateArr[0] = ($DateArr[0] + 543);
    
        return $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0] . " " . $Time;
    }

?>