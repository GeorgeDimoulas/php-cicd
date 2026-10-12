<?php

// Must match the "psr-4" mapping in composer.json: Bosh\PhpCicd\ => src/
namespace Bosh\PhpCicd;

use InvalidArgumentException;

class PriceCalculator
{
    public function withVat(float $net, float $vatRate = 0.24): float
    {
        // Fail loudly: a negative price is a bug in the caller, and returning 0 would hide it.
        if ($net < 0) {
            throw new InvalidArgumentException('Net price cannot be negative');
        }

        // round() to 2 decimals, because money must not have 100.00000001
        return round($net * (1 + $vatRate), 2);
    }
}
// New version commit #2
