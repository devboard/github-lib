<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountTypeFactory;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;

/**
 * @covers \DevboardLib\GitHub\Account\AccountTypeFactory
 * @group  unit
 */
class AccountTypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanCreateOrganization()
    {
        $this->assertInstanceOf(Organization::class, AccountTypeFactory::create(Organization::NAME));
    }

    public function testItCanCreateUser()
    {
        $this->assertInstanceOf(User::class, AccountTypeFactory::create(User::NAME));
    }

    /** @expectedException \DevboardLib\GitHub\Account\AccountTypeFactoryException */
    public function testItThrowsExceptionForUnexpectedStrings()
    {
        AccountTypeFactory::create('zz');
    }
}
