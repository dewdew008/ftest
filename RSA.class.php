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

    public function Cryptosystem_En($str,$p,$q){
        $n = $p * $q;
        $a = ($p - 1) * ($q - 1);
        $e = 0 ; $max = 0;
        if ($p >= $q){
            $max = $p;
        }else{
            $max = $q;
        }
        for ($i = 2; $i < $max ;$i = $i + 1){
            $gcd = gmp_gcd($i , $a);
            if($gcd == 1){
                $e = $i;
                break;
            }
        }
        $len = strlen($str);
        $output = $str;
        for ($i = 0; $i < $len ;$i = $i + 1){
            $output[$i] = self::myMod(self::Power($str[$i] - 'A' , $e),$n) + 'A';
        }
        return $output;
    }
    
}
?>