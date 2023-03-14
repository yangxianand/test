<?php
abstract class Human
{
    protected abstract function eat();
}
abstract class Man extends Human {}
class Boy extends Man
{
    public function eat()
    {
        echo 'eat';
    }
}