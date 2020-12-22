<?php

function validate_input($input, $type = null, $regex = null) {
    $input = htmlspecialchars($input);
    if ($regex !== null) {
        if(preg_match_all($regex, $input) !== 1) {
            return "";
        }
    }
    switch ($type) {
        case "mail":
            $input = v_mail($input);
            break;
        case "int":
            $input = v_int($input);
            break;
        case "float":
            $input = v_float($input);
            break;
        case "bool":
            $input = v_bool($input);
            break;
        case "date":
            $input = v_date($input);
            break;
        default:
            break;
    }
    return $input;
}

function v_mail(string $mail) {
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return "";
    }
    return $mail;
}

function v_tel($tel) {
    if(preg_match_all("/^0\d{9}$/", $tel) !== 1){
        return "";
    }
    return $tel;
}

function v_date($date) {
    if(preg_match_all("/^\d{4}(-\d{2}){2}$/", $date) !== 1){
        return "";
    }
    return $date;
}

function v_int(int $val) {
    if(!filter_var($val, FILTER_VALIDATE_INT)) {
        return "";
    }
    return $val;
}

function v_float(float $val) {
    if(!filter_var($val, FILTER_VALIDATE_FLOAT)) {
        return "";
    }
}

function v_bool(float $val) {
    if(!filter_var($val, FILTER_VALIDATE_BOOLEAN)) {
        return "";
    }
    return $val;
}

