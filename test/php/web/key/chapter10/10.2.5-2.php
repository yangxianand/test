<?php
class Person
{
    public function __clone()
    {
        echo '__clone()������ִ����';
    }
}