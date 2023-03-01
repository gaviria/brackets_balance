<?php

namespace Fgaviria;

/**
 * BracketsBalance
 */
class BracketsBalance
{
    const OPEN_ELEMENTS = ["{", "[", "("];
    const CLOSE_ELEMENTS = ["}", "]", ")"];
    const ELEMENTS = ["}" => "{", "]" => "[", ")" => "("];

    public array $items = [];
    public int $totalElements = 0;
    public array $balance = ["(" => 0, "{" => 0, "[" => 0];


    /**
     * push
     * Push a element
     * @param  string $item
     * @return void
     */
    public function push(string $item)
    {
        array_push($this->items, $item);
        $this->totalElements++;
    }

    /**
     * size
     * return total number of elements
     * @return int
     */
    public function size(): int
    {
        return $this->totalElements;
    }

    /**
     * pop
     * Pop a element
     * @return void
     */
    public function pop(): void
    {
        if ($this->totalElements > 0) {
            $this->totalElements--;
            array_pop($this->items);
        }
    }

    /**
     * doBracketsBalancePlus
     * Verify balance in order of elements
     * @param string $strings
     * @return bool
     */
    public function doBracketsBalancePlus(string $strings): bool
    {
        $arrayStrings = str_split($strings);

        foreach ($arrayStrings as $string) {
            if (in_array($string, self::OPEN_ELEMENTS)) {
                $this->push($string);
            }

            if (in_array($string, self::CLOSE_ELEMENTS)) {
                if ($this->size() === 0) {
                    return false;
                }

                if ($this->items[$this->size() - 1] === self::ELEMENTS[$string]) {
                    $this->pop($string);
                } else {
                    return false;
                }
            }
        }

        return $this->size() === 0 ? true : false;
    }

    /**
     * doBracketsBalance
     * Verify balance of elements
     * @param  string $strings
     * @return bool
     */
    public function doBracketsBalance(string $strings): bool
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

        return array_sum($this->balance) === 0 ? true : false;
    }
}

$bracketsBalance = new BracketsBalance();
echo "doBracketsBalance => " . ($bracketsBalance->doBracketsBalance("()[(])") ? "True" : "False"); //true
//echo "doBracketsBalance => " . ($bracketsBalance->doBracketsBalancePlus("()[(])") ? "True" : "False"); //false
