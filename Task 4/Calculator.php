<?php

/*
 * Description : Command Line Calculator - Sum of numerical and handle different delimiters
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
    if (method_exists($objCommonClass, $strFuncName) && $strFuncName == "add") { // to check method exists or not
        echo $objCommonClass->add($strParams, 4);
    } else {
        throw new Exception("Invalid method..!", 1);
    }
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
