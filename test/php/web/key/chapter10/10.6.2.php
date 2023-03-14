<?php
trait t1
{
    public function eat()
    {
        echo 't1,eat';
    }
}
trait t2
{
    public function eat()
    {
        echo 't2,eat';
    }
}
class Person
{
    use t1,t2 {
        t1::eat insteadof t2;
        t2::eat as show;
    }
}
$person = new Person();
$person->eat();		// ��������t1,eat
$person->show();	// ��������t2,eat