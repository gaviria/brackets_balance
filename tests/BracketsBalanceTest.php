<?php

use PHPUnit\Framework\TestCase;
use Fgaviria\BracketsBalance;

class BracketsBalanceTest extends TestCase
{

    /**
     * @dataProvider dataProviderForBalanceTrue
     */
    public function testDoBracketsBalanceTrue($item)
    {
        $bracketsBalance = new BracketsBalance();

        $this->assertTrue(
            $bracketsBalance->doBracketsBalance($item)
        );
    }

    /**
     * @dataProvider dataProviderForBalanceFalse
     */
    public function testDoBracketsBalanceFalse($item)
    {
        $bracketsBalance = new BracketsBalance();

        $this->assertFalse(
            $bracketsBalance->doBracketsBalance($item)
        );
    }

    /**
     * @dataProvider dataProviderForBalancePlusTrue
     */
    public function testDoBracketsBalancePlusTrue($item)
    {
        $bracketsBalance = new BracketsBalance();

        $this->assertTrue(
            $bracketsBalance->doBracketsBalance($item)
        );
    }

    /**
     * @dataProvider dataProviderForBalancePlusFalse
     */
    public function testDoBracketsBalancePlusFalse($item)
    {
        $bracketsBalance = new BracketsBalance();

        $this->assertFalse(
            $bracketsBalance->doBracketsBalancePlus($item)
        );
    }

    public function dataProviderForBalanceTrue()
    {
        return [
            ['()'],
            ['([)]']
        ];
    }

    public function dataProviderForBalanceFalse()
    {
        return [
            ['(]))'],
            ['([)(]']
        ];
    }

    public function dataProviderForBalancePlusTrue()
    {
        return [
            ['()'],
            ['[([])]']
        ];
    }

    public function dataProviderForBalancePlusFalse()
    {
        return [
            ['([(]))'],
            ['([)(])']
        ];
    }
}
