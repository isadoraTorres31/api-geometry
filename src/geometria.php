<?php

namespace isadoratorres;

class geometria {
    public function calcularAreaRetangulo(float $base, float $altura): float {
        return $base * $altura;
    }
    public function calcularAreaTriangulo(float $base, float $altura): float {
        return ($base * $altura) / 2;
    }
}