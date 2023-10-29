<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Domain;

class LineItemNotFound extends \DomainException
{
    public readonly CartId $cartId;
    public readonly LineItemId $lineItemId;

    public static function forCart(CartId $cartId, LineItemId $lineItemId): self
    {
        $exception = new self('Cart: Line item not found');
        $exception->cartId = $cartId;
        $exception->lineItemId = $lineItemId;

        return $exception;
    }
}