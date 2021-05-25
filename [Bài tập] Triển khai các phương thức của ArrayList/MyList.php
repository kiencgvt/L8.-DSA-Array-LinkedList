<?php


class MyList
{
    private int $size;
    private array $elements;

    public function __construct(array $elements = [], int $size = 0)
    {
        $this->elements = $elements;
        $this->size = $size;
    }

    public function insert($index, $obj): void
    {
        if (!$this->isFull()) {
            array_splice($this->elements, $index, 0, $obj);
        } else {
            echo "Danh sach day!";
        }
    }

    public function add($obj): void
    {
        if (!$this->isFull()) {
            array_push($this->elements, $obj);
        } else {
            echo "Danh sach day!";
        }
    }

    public function isFull(): bool
    {
        return count($this->elements) >= $this->size;
    }

    public function remove($index): void
    {
        array_splice($this->elements, $index, 1);
    }

    public function get($index)
    {
        return $this->elements[$index];
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    public function addAll(array $arr = []): array
    {
        array_splice($this->elements, count($this->elements), count($arr), $arr);
        return $this->elements;
    }

    public function indexOf($obj): int
    {
        for ($i = 0; $i < count($this->elements); $i++) {
            if ($this->isItemInElements($i, $obj)) {
                return $i;
            }
        }
    }

    public function isItemInElements(int $i, $obj): bool
    {
        return $this->elements[$i] == $obj;
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function sort(): array
    {
        sort($this->elements);
        return $this->elements;
    }

    public function reset(array $elements = [], int $size = 0): void
    {
        $this->__construct($elements, $size);
    }

    public function size(): int
    {
        return $this->size;
    }
}