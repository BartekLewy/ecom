<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Tests\Domain;

use Bartosz\Ecom\Cart\Domain\CartId;
use Bartosz\Ecom\Cart\Tests\CartTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

#[CoversClass(CartId::class)]
class CartIdTest extends CartTestCase
{
    public function test_identities_are_equals(): void
    {
        // given
        $identity = CartId::generate();

        // when
        $fromStringIdentity = CartId::of((string)$identity);

        // then
        assertTrue($identity->equals($fromStringIdentity));
    }

    public function test_identities_are_not_equals(): void
    {
        assertFalse(CartId::of(Uuid::NIL)->equals(CartId::of(Uuid::MAX)));
    }
}
