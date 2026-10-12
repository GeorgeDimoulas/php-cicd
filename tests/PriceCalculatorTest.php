<?php

namespace Bosh\PhpCicd\Tests;

use Bosh\PhpCicd\PriceCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

// Like a Jest file: one class per file, one method per test case.
class PriceCalculatorTest extends TestCase
{
    // PHPUnit runs every method whose name starts with "test"
    public function testVatIsAdded(): void
    {
        $calculator = new PriceCalculator();

        // Like expect(result).toBe(124). assertSame also checks the type (float, not int)
        $this->assertSame(124.0, $calculator->withVat(100));
    }

     public function testVatIsAddedDecimal(): void
    {
        $calculator = new PriceCalculator();
        $this->assertSame(13.09, $calculator->withVat(10.555));
    }

      public function testVatIsAddedZero(): void
    {
        $calculator = new PriceCalculator();
        $this->assertSame(0.0, $calculator->withVat(0));
    }
      public function testVatIs020(): void
    {
        $calculator = new PriceCalculator();
        $this->assertSame(0.0, $calculator->withVat(0));
    }


    public function testNegativePriceIsRejected(): void
    {
        // Declare the expectation BEFORE the call that throws, like expect(() => ...).toThrow()
        $this->expectException(InvalidArgumentException::class);

        (new PriceCalculator())->withVat(-1);
    }
}
