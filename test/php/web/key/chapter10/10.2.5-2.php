<?php
class Person
{
    public function __clone()
    {
        echo '__clone()方法被执行了';
    }
}