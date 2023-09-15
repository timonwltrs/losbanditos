<?php
//
//namespace Losbanditos;
//
//use http\Exception\InvalidArgumentException;
//
//final class Discount
//{
//    public function __construct(public readonly float $percentage)
//    {
//     if ($this->percentage <= 0 || $this->percentage > 1.0) {
//         throw new InvalidArgumentException();
//     }
//    }
//
//    public static function percentOff(int $value): self
//    {
//        return new self($value / 100);
//    }
//}