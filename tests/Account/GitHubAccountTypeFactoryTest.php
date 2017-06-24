<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountTypeFactory;
use Devboard\GitHub\Account\Type\Organization;
use Devboard\GitHub\Account\Type\User;

/**
 * @covers \Devboard\GitHub\Account\GitHubAccountTypeFactory
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

    /** @expectedException \Devboard\GitHub\Account\GitHubAccountTypeFactoryException */
    public function testItThrowsExceptionForUnexpectedStrings()
    {
        GitHubAccountTypeFactory::create('zz');
    }
}
