<?php
/**
 * This file is part of the ProjectABC library.
 * The class makes you to get the prime numbers by user input
 *
 * @package     ProjectABC\Core
 * @since       ProjectABC v 1.0.0
 * @copyright   Copyright (c), ProjectABC.
 * @author      Venkatesh Ch
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE
 */
namespace ProjectABC\Core;

class PrimeGenerator
{
    /**
     * Check the given number is prime or not
     * 
     * @param  int  $num
     * @return bool
     */
    public static function isPrime($num)
    {
        if ($num == 1)
            return false;
    
        //2 is prime (the only even number that is prime)
        if ($num == 2)
            return true;
    
        /**
         * if the number is divisible by two, then it's not prime and it's no longer
         * needed to check other even numbers
         */
        if ($num % 2 == 0)
            return false;
    
        /**
         * Checks the odd numbers. If any of them is a factor, then it returns false.
         * The sqrt can be an aproximation, hence just for the sake of
         * security, one rounds it to the next highest integer value.
         */
        $ceil = ceil(sqrt($num));
        for ($i = 3; $i <= $ceil; $i = $i + 2)
        {
            if($num % $i == 0)
                return false;
        }
    
        return true;
    }

    /**
     * Generate prime numbers by the count
     * 
     * @param  int  $count
     * @return array|bool
     */
    public static function getPrimeNumbersByCount($count = 1)
    {
        if (!$count)
            return false;

        $primeNumbers       = array();
        $primeNumberInitial = 2;

        while (true) {
            if (count($primeNumbers) >= $count)
                break;

            if (self::isPrime($primeNumberInitial))
                $primeNumbers[] = $primeNumberInitial;

            $primeNumberInitial++;
        }

        return $primeNumbers;
    }
}
