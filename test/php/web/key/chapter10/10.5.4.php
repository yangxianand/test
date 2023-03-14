<?php
class People
{
    public static $name = 'People';
    public static function showName()
    {
        echo self::$name;		// ╬╡л╛╟С╤╗
        echo static::$name;		// ╬╡л╛ясЁы╟С╤╗
    }
}
class Man extends People
{
    public static $name = 'Man';
}
People::showName();				// People People
Man::showName();				// People Man