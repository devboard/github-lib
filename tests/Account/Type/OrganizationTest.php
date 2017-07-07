<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account\Type;

use DevboardLib\GitHub\Account\Type\Organization;

/**
 * @covers \DevboardLib\GitHub\Account\Type\Organization
 * @group  unit
 */
class OrganizationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Organization */
    private $sut;

    public function setUp()
    {
        $this->sut = new Organization();
    }

    public function testItIsOrganization()
    {
        $this->assertTrue($this->sut->isOrganization());
    }

    public function testItIsNotUser()
    {
        $this->assertFalse($this->sut->isUser());
    }

    public function testItExposesValue()
    {
        $this->assertSame(Organization::NAME, $this->sut->getValue());
    }

    public function testItCanBeAutoConvertedToString()
    {
        $this->assertSame(Organization::NAME, $this->sut->__toString());
    }
}
