<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Tests\Domain;

use Bartosz\Ecom\Cart\Domain\Cart;
use Bartosz\Ecom\Cart\Domain\LineItem;
use Bartosz\Ecom\Cart\Domain\LineItemId;
use Bartosz\Ecom\Cart\Domain\LineItemNotFound;
use Bartosz\Ecom\Cart\Tests\CartTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\assertCount;

#[CoversClass(Cart::class)]
class CartTest extends CartTestCase
{
    public function test_cart_is_empty_after_init(): void
    {
        // given
        $cart = $this->iHaveAnEmptyCart();

        // then
        assertCount(0, $cart->lineItems);
    }

    public function test_add_line_item_to_cart(): void
    {
        // given
        $cart = $this->iHaveAnEmptyCart();

        // when
        $cart->addLineItem(new LineItem(LineItemId::generate()));

        // then
        assertCount(1, $cart->lineItems);
    }

    public function test_delete_line_item_from_cart(): void
    {
        // given
        $cart = $this->iHaveAnEmptyCart();

        // and
        $cart->addLineItem(new LineItem(LineItemId::of(Uuid::NIL)));

        // when
        $cart->deleteLineItem(LineItemId::of(Uuid::NIL));

        // then
        assertCount(0, $cart->lineItems);
    }

    public function test_throw_exception_when_item_not_found(): void
    {
        // given
        $cart = $this->iHaveAnEmptyCart();

        // then
        $this->expectException(LineItemNotFound::class);
        $this->expectExceptionMessage('Cart: Line item not found');

        // when
        $cart->deleteLineItem(LineItemId::of(Uuid::NIL));
    }
}