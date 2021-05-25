<?php


class LinkList
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

    public function insertFirst($data): void
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;

        if (is_null($this->lastNode)) {
            $this->lastNode = $node;
        }

        $this->count++;
    }

    public function insertLast($data): void
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

    public function delete($index)
    {
        if ($index != 1) {
            $currentNode = $this->firstNode;
            for ($i = 1; $i < $index - 1; $i++) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $currentNode->next->next;
        } else {
            $this->firstNode = $this->firstNode->next;
        }
        $this->count--;
    }

    public function add($index, $data)
    {
        $newNode = new Node($data);
        if ($index != 1) {
            $currentNode = $this->firstNode;
            for ($i = 1; $i < $index - 1; $i++) {
                $currentNode = $currentNode->next;
            }
            $newNode->next = $currentNode->next;
            $currentNode->next = $newNode;
        } else {
            $newNode->next = $this->firstNode;
            $this->firstNode = $newNode;
        }
        $this->count--;
    }

    public function totalNodes(): int
    {
        return $this->count;
    }

    public function readList(): array
    {
        $listData = [];
        $current = $this->firstNode;

        while (!is_null($current)) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }
}