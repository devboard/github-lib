<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserTypeFactory;
use Devboard\Github\User\Type\Organization;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\User\GithubUserTypeFactory
 * @group  unit
 */
class GithubUserTypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanCreateOrganization()
    {
        $this->assertInstanceOf(Organization::class, GithubUserTypeFactory::create(Organization::NAME));
    }

    public function testItCanCreateUser()
    {
        $this->assertInstanceOf(User::class, GithubUserTypeFactory::create(User::NAME));
    }

    /** @expectedException \Devboard\Github\User\GithubUserTypeFactoryException */
    public function testItThrowsExceptionForUnexpectedStrings()
    {
        GithubUserTypeFactory::create('zz');
    }
}
