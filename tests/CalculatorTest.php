<?php

namespace App\Tests;

use App\Services\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testSomething(): void
    {
        $calc = new Calculator();
        
        $result = $calc->add(1,1);
        $this->assertEquals(2, $result);
    }
}
