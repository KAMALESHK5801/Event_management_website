<?php 

$name = "Kamalesh";
echo $name;



function Kamalesh() {
    global $Kamalesh;
    echo $Kamalesh;
}


function addition() {
    static $first = 1;
    echo $first;
    $first = $first + 1;
}
addition();
addition();
addition();
addition();

$first = 1;
$second = 1;
$sum = $first + $second;
echo "sum = " . $sum;


$first = 3;
$second = 2;
$sub = $first - $second;
echo "subtraction = " . $sub;

$first = 5;
$second = 2;
$mul = $first * $second;
echo "mul ="  . $mul;


$first = 10;
$second = 2;
$div = $first / $second;
echo "div = " . $div;



$name = "Kamalesh";
$age = 23;

if($name=="Kamalesh" && $age==2)
{
    echo "Welcome to Mypage";
}
else{
    echo "Incorrect input";
}



$name = "Kamalesh";
$age = 23;

if($name=="Kamales" || $age==23)
{
    echo "Welcome to Mypage";
}
else{
    echo "Incorrect input";
}



$a = 3;
$b = $a;
echo $b;


$a = 1;
$b =2;
$a = $a+$b;
echo $a;


$a = 5;
$b =2;
$a = $a-$b;
echo $a;

$a = 2;
$b =2;
$a = $a*$b;
echo $a;


$a = 10;
$b =2;
$a = $a/$b;
echo $a;


$a=5;
$b=5.0;
if($a==$b)
{
    echo "Equal";
}
else
{
    echo "Not equal";
}


$a=5;
$b=5.0;
if($a===$b)
{
    echo "Equal";
}
else
{
    echo "Not equal";
}


$a=5;
$b=2;
if($a!=$b)
{
    echo "Equal";
}
else
{
    echo "Not equal";
}


$a=5;
$b=5;
if($a!==$b)
{
    echo "Equal";
}
else
{
    echo "Not equal";
}


$a=5;
$b=6;
if($a>$b)
{
    echo "a is bigger than b";
}
elseif($a>=$b)
{
    echo "a is equal to b";
}
else
{
    echo "a is smaller than b";
}

$a=5;
$b=6;
if($a<$b)
{
    echo "a is smaller than b";
}
elseif($a<=$b)
{
    echo "a is equal to b";
}
else
{
    echo "a is bigger than b";
}
?>