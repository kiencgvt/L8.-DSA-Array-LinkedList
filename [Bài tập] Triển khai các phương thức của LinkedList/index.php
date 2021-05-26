<?php
include_once "Node.php";
include_once "LinkedList.php";

$myList = new LinkedList();
$myList->addFirst("Sau tat ca");
$myList->addFirst("Minh lai tro ve voi nhau");
$myList->addLast("Tháng Năm");
$myList->addLast("Tháng năm trôi qua nhanh quá!");
$myList->add(2, "Chợt nhận ra anh đã đánh mất");
$myList->removeIndex(1);
$myList->printList();
