<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserTypeFactoryException;

/**
 * @covers \Devboard\Github\User\GithubUserTypeFactoryException
 * @group  unit
 */
class GithubUserTypeFactoryExceptionTest extends \PHPUnit_Framework_TestCase
{
    /** @var GithubUserTypeFactoryException */
    private $sut;

    public function setUp()
    {
        $this->sut = GithubUserTypeFactoryException::create('message');
    }

    public function testItHasCustomMessage()
    {
        $this->assertEquals('Unknown GithubUserType with name: message', $this->sut->getMessage());
    }

    public function testItExtendsException()
    {
        $this->assertInstanceOf(\Exception::class, $this->sut);
    }
}
