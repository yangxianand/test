<?php
class Person
{
    protected final function show()
    {
        // final方法不能被子类重写
    }
}
final class Student extends Person
{
    // final类不能被继承，只能被实例化
}