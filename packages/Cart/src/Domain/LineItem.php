<?php

namespace Bartosz\Ecom\Cart\Domain;

class LineItem
{
    public function __construct(public readonly LineItemId $lineItemId)
    {
    }
}