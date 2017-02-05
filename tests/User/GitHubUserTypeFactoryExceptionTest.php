<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserTypeFactoryException;

/**
 * @covers \Devboard\GitHub\User\GitHubUserTypeFactoryException
 * @group  unit
 */
class GitHubUserTypeFactoryExceptionTest extends \PHPUnit_Framework_TestCase
{
    /** @var GitHubUserTypeFactoryException */
    private $sut;

    public function setUp()
    {
        $this->sut = GitHubUserTypeFactoryException::create('message');
    }

    public function testItHasCustomMessage()
    {
        $this->assertEquals('Unknown GitHubUserType with name: message', $this->sut->getMessage());
    }

    public function testItExtendsException()
    {
        $this->assertInstanceOf(\Exception::class, $this->sut);
    }
}
