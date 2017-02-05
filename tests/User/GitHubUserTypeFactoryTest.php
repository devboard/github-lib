<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserTypeFactory;
use Devboard\GitHub\User\Type\Organization;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\User\GitHubUserTypeFactory
 * @group  unit
 */
class GitHubUserTypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanCreateOrganization()
    {
        $this->assertInstanceOf(Organization::class, GitHubUserTypeFactory::create(Organization::NAME));
    }

    public function testItCanCreateUser()
    {
        $this->assertInstanceOf(User::class, GitHubUserTypeFactory::create(User::NAME));
    }

    /** @expectedException \Devboard\GitHub\User\GitHubUserTypeFactoryException */
    public function testItThrowsExceptionForUnexpectedStrings()
    {
        GitHubUserTypeFactory::create('zz');
    }
}
