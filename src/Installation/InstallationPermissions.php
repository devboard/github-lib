<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see InstallationPermissionsSpec
 * @see InstallationPermissionsTest
 */
class InstallationPermissions
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

    public static function deserialize(array $data): InstallationPermissions
    {
        return new self($data);
    }
}
