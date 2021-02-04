<?php

$nameErr = $emailErr = $genderErr = $maritalErr = $addressErr = $countryErr = $ageErr = $dobErr = $gameErr = $phoneErr = $subjectErr = $passErr = $messageErr = "";

echo "hello";
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}

function emailValidate ($value) {
    $emailErr= "";
    if(empty($value)){
        $emailErr = "Please enter your email address.";
        $GLOBALS['flag'] = 0;     
    } else{
        $email = filterEmail($value);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
            $GLOBALS['flag'] = 0; 
        } else {
            $emailErr = "";
        }
    }
}

function passwordValidate ($value) {
    $passErr = "";
    if (empty($value)) {
        $passErr = "Please enter your password.";
        $GLOBALS['flag'] = 0;      
    } else if (strlen($value) < 8){
        $passErr = "Please enter your password.";
        $GLOBALS['flag'] = 0; 
    } else {
        $passErr = "";
    }

}

function confirmPasswordValidation($passwordValue ,$confirmPasswordValue) {
    $cpassErr = '';
    if ($passwordValue !== $confirmPasswordValue) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'Password & Confirm Password doesn\'t Match.';
    }
    return [$confirmPasswordValue,$msg];
}

function addressValide($value,$length){
    $msg = '';
    if (empty($value) && !$value) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    } else if (strlen($value) > $length) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'Please enter must be at least '.$length.' characters long.';
    }
    return [$value,$msg];
}

function dobValidation($dayValue,$monthValue,$yearValue){
    $msg = '';
    if (empty($dayValue) && !$dayValue && empty($monthValue) && !$monthValue && empty($yearValue) && !$yearValue) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    }
    return [$dayValue.'-'.$monthValue.'-'.$yearValue,$msg];
}

function genderValidation($value){
    $msg = '';
    if (empty($value) && !$value) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    }
    return [$value,$msg];
}

function countryValidation($value){
    $msg = '';
    if (empty($value) && !$value) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    }
    return [$value,$msg];
}

function maritalStatusValidation($value){
    $msg = '';
    if (empty($value) && !$value) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    }
    return [$value,$msg];
}

function ageValidation($value){
    $msg = '';
    if (empty($value) && !$value) {
        $GLOBALS['validationStatus'] = 0;
        $msg = 'This Field is required.';
    }
    return [$value,$msg];
}

function fileValidation($file)
{
    $fileErr = '';
    $file_extention = pathinfo($file['name'],PATHINFO_EXTENSION);
    $file_type = $file['type'];
    $file_size = $file['size'];
    if (empty($file) && $file['name']) {
        $fileErr = 'This field is required';
    } else if ( !(($file_extention == 'jpg' OR $file_extention == 'jpeg' OR $file_extention == 'png') && ($file_type == 'image/jpg' OR $file_type == 'image/jpeg' OR $file_type == 'image/png')) ) {
        $fileErr = 'Please use .jpg , .jpeg , .png File!';
    } else if ($file_size > 100000) {
        $fileErr = 'Please use Less than 1 MB File!';
    }
    return [$file['name'],$fileErr];
}

?>