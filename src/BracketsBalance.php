<?php

class BracketsBalance
{
    const OPEN_ELEMENTS = ["{", "[", "("];
    const CLOSE_ELEMENTS = ["}", "]", ")"];
    const ELEMENTS = ["}" => "{", "]" => "[", ")" => "("];

    public array $items = [];
    public int $totalElements = 0;
    public array $balance = ["(" => 0, "{" => 0, "[" => 0];


    public function push(string $item)
    {
        array_push($this->items, $item);
        $this->totalElements += $this->totalElements;
    }

    public function size()
    {
        return $this->totalElements;
    }

    public function doBracketsBalance(string $strings)
    {
        $arrayStrings = str_split($strings);

        foreach ($arrayStrings as $string) {
            $this->push($string);
        }

        foreach ($this->items as $item) {
            if (in_array($item, self::OPEN_ELEMENTS) && $this->balance[$item] != -1) {
                $this->balance[$item]++;
            }

            if (in_array($item, self::CLOSE_ELEMENTS)) {
                $this->balance[self::ELEMENTS[$item]]--;
            }
        }

        echo array_sum($this->balance) === 0 ? "true" : "false";
    }
}
