<?php 

    function chiper($string, $key){
        return implode('', array_map(function ($char) use ($key) {
            $ascii = ord($char);
            if($ascii != 32){
                $ascii += $key;

                if($ascii > 122){
                    $ascii = (96 + $ascii) - 122;
                }
                if($ascii < 96){
                    $ascii = 123 - (97 - $ascii);
                }
            }
            return chr($ascii);
        }, str_split($string)));
    }

    echo chiper('chiper', 2);
    echo "<br>";
    echo chiper('hello worldz', 3);

?>