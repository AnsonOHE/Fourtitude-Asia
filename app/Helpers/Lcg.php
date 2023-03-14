<?php

namespace App\Helpers;

class Lcg
{
    protected $modulus;

    protected $multiplier;

    protected $increment;

    protected $seed;

    public function __construct($modulus, $multiplier, $increment, $seed)
    {
        $this->modulus = $modulus;
        $this->multiplier = $multiplier;
        $this->increment = $increment;
        $this->seed = $seed;
    }

    public function next()
    {
        // Y = (a.X + c) mod m
        $val = ($this->multiplier * $this->seed) + $this->increment;
        $this->seed = $val % $this->modulus;

        return $this->seed;
    }
}