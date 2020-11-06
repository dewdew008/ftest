<?php

class RSA{

    public function Power($base,$degree){
        $amount = 1;

	for( $i=0 ;$i < $degree ;$i = $i +1 )
		$amount*=$base;
	return $amount;
    }

    public function myMod($n,$q){
        if( $n < 0){
            return $n + ($n % $q);
        }
        return $n % $q;
    }
    public function getGCDBetween($a , $b){
        while ($b != 0)
        {
            $m = $a % $b;
            $a = $b;
            $b = $m;
        }
        return $a;
    }
    public function Cryptosystem_En($str,$p,$q){
        $TABLE = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-*/=";
        $len = strlen($TABLE);
        $n = $p * $q;
        $a = ($p - 1) * ($q - 1);

        $e = 0 ; $max = 0;
        if ($p >= $q){
            $max = $p;
        }else{
            $max = $q;
        }

        // find $e that is gcd(e,(p-1)*(q-1)) == 1
        for ($i = 2; $i < $max ;$i = $i + 1){
            $gcd = self::getGCDBetween($i , $a);
            if($gcd == 1){
                $e = $i;
                break;
            }
        }


        $len = strlen($str);
        $output = "";
        for ($i = 0; $i < $len ;$i = $i + 1){

            for ($j = 0; $str[$i] != $TABLE[$j] ; $j++){
                continue;
            }
            $value = $j;
            $test = self::myMod(self::Power($value,$e),$n);
            if($test < 0){
                $test = $test+ ($test - ($len-1));
            }

            $output .= (string)$TABLE[(int)$test];

        }
        return $output;
    }

    public function convertToBinary($n){
        $str = "";
        $new = (int)$n;
        $i = 0;
        while ( $new > 0 ){

            if($new % 2 == 0){
                $str.="0";
            }else{
                $str .= "1";
            }
            $new = $new / 2;
            $new = (int)$new;

        }
        strrev ( $str );

        return $str;

    }

    public function Cryptosystem_De( $str,$p,$q){

        $TABLE = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-*/=";
        $len = strlen($TABLE);
        $n = $p * $q;
        $a = ($p - 1) * ($q - 1);
        $e = 0 ; $max = 0;
        if ($p >= $q){
            $max = $p;
        }else{
            $max = $q;
        }
        for ($i = 2; $i < $max ;$i = $i + 1){
            $gcd = self::getGCDBetween($i , $a);
            if($gcd == 1){
                $e = $i;
                break;
            }
        }
        for ($i = 0; (($e*$i)%$a) != 1 ;$i = $i + 1){
            continue;
        }

        $d = $i;

        $binary_d = self::convertToBinary($d);
        $len = strlen($str);
        $len_bi = strlen($binary_d);
        $binary = strrev ( $binary_d );
        $x = 1 ; $power = 1 ; $first = 1;
        $output = "";
        for ($i = 0; $i < $len ; $i = $i + 1){
            $x = 1;$power = 1;

            for ($f = 0; $str[$i] != $TABLE[$f] ; $f++){
                continue;
            }
            $value = $f;

//            if ($first < 0){
//                if ($first < -128){
//                    $first += 128;
//                }
//                $first = $first + 128;
//            }
            $power = self::myMod( $value , $n );


            for ($j = 0 ; $j < strlen($binary) ; $j = $j + 1){
                if ($binary_d[$j] == '1'){
                    $x = self::myMod($x*$power,$n);
                }else{
                    $x = $x;
                }

                $power = self::myMod(self::Power($power,2),$n);
            }
            $output .= (string)$TABLE[(int)$x];

        }
        return $output;

    }

    
}
?>