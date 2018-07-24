<?php

/*
 * Description : Command Line Calculator - Sum only for zero to two numbers
 * @author Vishal Bhoi <vishal.bhoi118@gmail.com>
 * Date : 24-07-2018
 */
include("../CommonClass.php");

//Exception handling
try {
    array_shift($argv);
    $strFuncName = array_shift($argv); // get action name
    $strParams = array_shift($argv); // get parameters

    $objCommonClass = new CommonClass();
    if (method_exists($objCommonClass, $strFuncName) && $strFuncName == "sum") { // to check method exists or not
        $arrParams = explode(",", $strParams);
        $intTotalParams = count($arrParams);
        if ($intTotalParams <= 2) { // check only for zero to two numbers
            echo $objCommonClass->sum($strParams, 1);
        } else {
            echo "Enter only zero to two numbers";
        }
    } else {
        throw new Exception("Invalid method..!", 1);
    }
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
