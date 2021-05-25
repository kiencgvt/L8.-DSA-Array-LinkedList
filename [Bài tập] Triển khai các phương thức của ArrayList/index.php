<?php
include_once "MyList.php";
$myList = new MyList([], 20);
echo $myList->size();
$myList->add(1);
echo "<br>";
print_r($myList->addAll([8, 3, 4, 5]));
$myList->insert(3, 6);
echo "<br>";
echo implode("-", $myList->addAll());
$myList->remove(4);
echo "<br>";
echo implode("-", $myList->addAll());
echo "<br>";
echo $myList->get(4);
echo "<br>";
echo $myList->indexOf(3);
echo "<br>";
$myList->sort();
echo implode("-", $myList->addAll());
echo "<br>";
$myList->clear();
var_dump($myList->isEmpty());
echo "<br>";
$myList->reset([], 30);
echo $myList->size();

