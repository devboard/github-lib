<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Account\Type;

use Devboard\GitHub\Account\Type\User;

/**
 * @covers \Devboard\GitHub\Account\Type\User
 * @group  unit
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @var User */
    private $sut;

    public function setUp()
    {
        $this->sut = new User();
    }

    public function testItIsUser()
    {
        $this->assertTrue($this->sut->isUser());
    }

    public function testItIsNotOrganization()
    {
        $this->assertFalse($this->sut->isOrganization());
    }

    public function testItExposesValue()
    {
        $this->assertSame(User::NAME, $this->sut->getValue());
    }

    public function testItCanBeAutoConvertedToString()
    {
        $this->assertSame(User::NAME, $this->sut->__toString());
    }
}
