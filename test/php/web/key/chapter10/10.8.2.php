<?php
class Man implements Iterator
{
    private $info = ['name' => '', 'age' => 0];
    public function current()
    {
        return current($this->info);
    }
    public function key()
    {
        return key($this->info);
    }
    public function next()
    {
        next($this->info);
    }
    public function rewind()
    {
        reset($this->info);
    }
    public function valid()
    {
        return isset($this->info[key($this->info)]);
    }
}
$man = new Man();
// Êä³ö½á¹û:
// name:
// age:0
foreach ($man as $key => $val) {
    echo $key . ':' . $val . '<br/>';
}