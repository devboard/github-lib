<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountTypeFactory;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;

/**
 * @covers \DevboardLib\GitHub\Account\GitHubAccountTypeFactory
 * @group  unit
 */
class GitHubAccountTypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanCreateOrganization()
    {
        $this->assertInstanceOf(Organization::class, GitHubAccountTypeFactory::create(Organization::NAME));
    }

    public function testItCanCreateUser()
    {
        $this->assertInstanceOf(User::class, GitHubAccountTypeFactory::create(User::NAME));
    }

    /** @expectedException \DevboardLib\GitHub\Account\GitHubAccountTypeFactoryException */
    public function testItThrowsExceptionForUnexpectedStrings()
    {
        GitHubAccountTypeFactory::create('zz');
    }
}
