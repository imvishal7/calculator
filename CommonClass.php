<?php

/*
 * Description : Command Line Calculator - Sum of numerical
 * @author Vishal Bhoi <vishal.bhoi118@gmail.com>
 * Date : 24-07-2018
 */

class CommonClass {

    public $intResult = 0; //Initialize by default 0

    /* Action for sum - TASK 1
     * @param string $strParams - to get digit for addition
     * @param integer $intTask - task number
     * return sum of numerical
     */

    public function sum($strParams, $intTask) {
        if ($strParams != '') {
            $arrOutput = [];
            if (preg_match_all("/-[0-9]+/i", $strParams, $arrResult)) { // to check negative number & match numbers get in $arrResult variable
                if (is_array($arrResult) && isset($arrResult[0])) {// check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    $strParams = preg_replace('/[^0-9\,\;\-]/', '', $strParams); // remove special character and alphabets
                    $arrParams = explode(",", $strParams);
                    $this->intResult = array_sum($arrParams);
                } else {
                    $this->intResult = "Something went to wrong..!";
                }
            } else {
                preg_match_all("/[0-9]+/i", $strParams, $arrResult); // match numbers get in $arrResult variable
                if (is_array($arrResult) && isset($arrResult[0])) { // check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    $this->intResult = array_sum($arrOutput);
                } else {
                    $this->intResult = "Something went to wrong..!";
                }
            }
        }
        return $this->intResult;
    }

    /*
     * Add action is use for TASK 2 to 7
     * @param string $strParams - to get digit for addition
     * @param integer $intTask - task number
     * return sum of numerical
     */

    public function add($strParams, $intTask) {
        if ($strParams != '') {
            $arrOutput = [];
            if (preg_match_all("/-[0-9]+/i", $strParams, $arrResult)) { // to check negative number & match numbers get in $arrResult variable
                if (is_array($arrResult) && isset($arrResult[0])) {// check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    $strParams = preg_replace('/[^0-9\,\-]/', '', $strParams); // remove special character and alphabets
                    $arrParams = explode(",", $strParams);
                    $this->intResult = array_sum($arrParams);
                    if ($intTask == 5) { // for task 5
                        $this->intResult = "Error: Negative numbers not allowed";
                    }
                    if ($intTask == 6) { // for task 6
                        $this->intResult = "Error: Negative numbers (" . implode(',', $arrOutput) . ") not allowed";
                    }
                } else {
                    $this->intResult = "Something went to wrong..!";
                }
            } else {
                preg_match_all("/[0-9]+/i", $strParams, $arrResult); // match numbers get in $arrResult variable
                if (is_array($arrResult) && isset($arrResult[0])) { // check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    if ($intTask == 7) { // for task 7
                        foreach ($arrOutput as $key => $val) {
                            if ($val <= 1000) { // Ignore if number above 1000
                                $this->intResult = $this->intResult + $val;
                            }
                        }
                        return $this->intResult;
                    }
                    $this->intResult = array_sum($arrOutput);
                } else {
                    $this->intResult = "Something went to wrong..!";
                }
            }
        }
        return $this->intResult;
    }

    /*
     * Description : Multiplication of numerical TASK - 8
     * Allow method to use new line character \n as number separator & handle different delimiters
     * And also check negative values and show error message & ignore if number is above 1000
     * @param string $strParams - get parameters
     * return multiplication of numerical
     */

    public function multiply($strParams) {
        $this->intResult = 1;
        if ($strParams != '') {
            $arrOutput = [];
            if (preg_match_all("/-[0-9]+/i", $strParams, $arrResult)) {// to check negative number & get that numbers
                if (is_array($arrResult) && isset($arrResult[0])) { // check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    $this->intResult = "Error: Negative numbers (" . implode(',', $arrOutput) . ") not allowed";
                }
            } else {
                preg_match_all("/[0-9]+/i", $strParams, $arrResult); // match numbers get in $arrResult variable
                if (is_array($arrResult) && isset($arrResult[0])) { // check array numbers is set or not
                    $arrOutput = $arrResult[0];
                    foreach ($arrOutput as $key => $val) {
                        if ($val <= 1000) { // Ignore if number above 1000
                            $this->intResult = $this->intResult * $val;
                        }
                    }
                }
            }
        }
        return $this->intResult;
    }

}
