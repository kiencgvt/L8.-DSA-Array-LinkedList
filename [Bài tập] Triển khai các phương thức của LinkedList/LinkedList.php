<?php

include_once "Node.php";
class LinkedList
{
    private $firstNode;
    private $lastNode;
    private $count;

    function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function add(int $index, $data)
    {
        $newNode = new Node($data);
        if ($index != 0) {
            $currentNode = $this->firstNode;
            for ($i = 0; $i < $index - 1; $i++) {
                $currentNode = $currentNode->next;
            }
            $newNode->next = $currentNode->next;
            $currentNode->next = $newNode;
        } else {
            $newNode->next = $this->firstNode;
            $this->firstNode = $newNode;
        }
        $this->count++;
    }

    public function addFirst($data): void
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;

        if (is_null($this->lastNode)) {
            $this->lastNode = $node;
        }

        $this->count++;
    }

    public function addLast($data): void
    {
        $lastNode = $this->lastNode;
        $node = new Node($data);
        $lastNode->next = $node;
        $node->next = null;
        $this->lastNode = $node;

        if (is_null($this->firstNode)) {
            $this->firstNode = $node;
        }

        $this->count++;
    }

    public function removeIndex(int $index)
    {
        if ($index != 0) {
            $currentNode = $this->firstNode;
            for ($i = 0; $i < $index - 1; $i++) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $currentNode->next->next;
        } else {
            $this->firstNode = $this->firstNode->next;
        }
        $this->count--;
    }

    public function removeObj(object $o)
    {
        $currentNode = $this->firstNode;
        for ($i = 0; $i < $this->count - 1; $i++) {
            if ($currentNode->next != $o) {
                $currentNode = $currentNode->next;
            } else break;
        }
        if ($currentNode->next != null) {
            $currentNode->next = $currentNode->next->next;
            $this->count--;
        } else {
            echo "Không có phần tử trong mảng!";
        }
    }

    public function get(int $index)
    {
        if ($index != 0) {
            $currentNode = $this->firstNode;
            for ($i = 0; $i < $index; $i++) {
                $currentNode = $currentNode->next;
            }
            return $currentNode;
        } else {
            return $this->firstNode;
        }
    }

    public function size(): int
    {
        return $this->count;
    }

    public function printList(): array
    {
        $listData = [];
        $current = $this->firstNode;

        while (!is_null($current)) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return print_r($listData);
    }

    public function clone()
    {
        return $this;
    }

    public function contains(object $o)
    {
        $currentNode = $this->firstNode;
        for ($i = 0; $i < $this->count - 1; $i++) {
            if ($currentNode->next != $o) {
                $currentNode = $currentNode->next;
            } else break;
        }
        if ($currentNode->next != null) {
            return true;
        }
        return false;
    }

    public function indexOf(object $o)
    {
        $currentNode = $this->firstNode;
        $i = 1;
        for (; $i < $this->count; $i++) {
            if ($currentNode->next != $o) {
                $currentNode = $currentNode->next;
            } else break;
        }
        if ($currentNode->next != null) {
            return $i;
        } else {
            return "Không có phần tử trong mảng!";
        }
    }
}