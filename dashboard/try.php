<?php
//ARRAY VALUES
$array = array();
$array[] = "201310656";
$array[] = "201310657";
$array[] = "201310658";
$array[] = "201310659";



function check ($array,$search){
    //IF FOUND
    if (in_array($search, $array)) {

        $search = intval($search);
                //+1 In Original Value If Found
        $search += 1;

        return check($array,$search);
    }
    //IF NOTFOUND RETURN ORIGINAL INPUT
    else{
        return $search;
    }

}


echo $unique_value = check($array,"201310657");


