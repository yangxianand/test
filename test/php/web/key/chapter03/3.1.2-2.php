<?php
function extra(&$str)
{
    $str .= ' and some extra';
}
$var = 'food';
extra($var);
echo $var;			// ��������food and some extra