<?php

declare(strict_types=1);

namespace Bartosz\Ecom\Cart\Domain;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class LineItemId
{
    public function __construct(private readonly UuidInterface $id)
    {
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }

    public static function of(string $value): self
    {
        return new self(Uuid::fromString($value));
    }

    public function equals(self $identity): bool
    {
        return $this->id->equals($identity->id);
    }

    public function __toString(): string
    {
        return $this->id->toString();
    }
}
