<?php
function extra(&$str)
{
    $str .= ' and some extra';
}
$var = 'food';
extra($var);
echo $var;			// Êä³ö½á¹û£ºfood and some extra