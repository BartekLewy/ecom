<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Domain;

use Ds\Map;

class Cart
{
    /**
     * @param Map<LineItemId, LineItem> $lineItems
     */
    public function __construct(
        public readonly CartId $cartId,
        public readonly Map $lineItems,
    ) {
    }

    public static function create(): self
    {
        return new self(CartId::generate(), new Map());
    }

    public function addLineItem(LineItem $lineItem): void
    {
        $this->lineItems->put((string) $lineItem->lineItemId, $lineItem);
    }

    public function deleteLineItem(LineItemId $lineItemId): void
    {
        if (!$this->lineItems->hasKey((string) $lineItemId)) {
            throw LineItemNotFound::forCart($this->cartId, $lineItemId);
        }

        $this->lineItems->remove((string) $lineItemId);
    }
}