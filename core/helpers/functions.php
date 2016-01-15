<?php


/**
 * @param $library
 * @param bool|false $isNotBuiltIn
 *
 * imports built-in packages and helper libraries available in Stewie framework
 * use second parameter if library you are importing is not a built-in but is introduced.
 */
function import($library,$isNotBuiltIn = false){

}

/**
 * @param array $array
 * Prints Array in good format and dies
 */
function pad(Array $array){
    echo "<div><pre>";
    print_r($array);
    echo "</pre></div>";
}
