<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

/**
 * @see PermissionsSpec
 * @see PermissionsTest
 */
class Permissions
{
    /** @var array */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function serialize(): array
    {
        return $this->values;
    }

    public static function deserialize(array $data): Permissions
    {
        return new self($data);
    }
}
