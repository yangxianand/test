<?php
function say($p, $con = 'say "Hello"')
{
    return "$p $con";
}
echo say('Tom');		// ��������Tom say "Hello"