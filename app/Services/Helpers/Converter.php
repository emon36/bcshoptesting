<?php

namespace App\Services\Helpers;

trait Converter
{
    
    public function toPaisa(int $taka): int { 
        return (int) $taka*100;
    }

    public function toTaka(int $paisa): int {
        return (int) $paisa/100;
    }

    public function toGram(int $kg): int{
        return (int) $kg*100;
    }

    public function toKG(int $gram): int {
        return (int) $gram/100;
    }



 }
