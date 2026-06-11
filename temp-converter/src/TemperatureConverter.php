<?php

class TemperatureConverter
{
    public static function celsiusToFahrenheit(float $celsius): float
    {
        return ($celsius * 9 / 5) + 32;
    }
}
