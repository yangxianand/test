<?php
header('Content-type:text/html;charset=utf-8');
//定义数组，存储订货单中商品信息
$goods = array(
    array('name'=>'主板','price'=>'379','producing'=>'广东','num'=>3),
    array('name'=>'显卡','price'=>'799','producing'=>'上海','num'=>2),
    array('name'=>'硬盘','price'=>'589','producing'=>'北京','num'=>5)
);
//商品价格总计
$total = 0;
//拼接订货单中信息
$str = "<title>商品订货单</title>";
$str .= "<table  border='1' cellpadding='1' cellspacing='0'>";
$str .= "<tr><td colspan='5'>商品订货单</td></tr>";
$str .= "<tr><td>商品名称</td><td>价格(元)</td><td>产地</td><td>数量(件)</td><td>总价(元)</td></tr>";	
//循环数组中商品信息
foreach($goods as $values){
    $str .= '<tr>';
    foreach($values as $v){
        $str .='<td>'.$v.'</td>';
    }
    //计算并拼接每件商品的总价格
    $sum = $values['price']*$values['num'];
    $str .= '<td>'.$sum.'</td>';
    $str .= '</tr>';
    //计算订货单中所有商品总价格
    $total += $sum;
}
$str .= "<tr><td colspan='5'>小计：".$total."元</td></tr></table>";
//显示订货单信息
echo $str;

