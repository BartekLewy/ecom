<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Tests;

use Bartosz\Ecom\Cart\Domain\Cart;
use Bartosz\Ecom\Cart\Domain\CartId;
use Ds\Map;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

abstract class CartTestCase extends TestCase
{
    protected function iHaveAnEmptyCart(): Cart
    {
        return new Cart(CartId::of(Uuid::NIL), new Map());
    }
}
