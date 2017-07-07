<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountTypeFactoryException;

/**
 * @covers \DevboardLib\GitHub\Account\GitHubAccountTypeFactoryException
 * @group  unit
 */
class GitHubAccountTypeFactoryExceptionTest extends \PHPUnit_Framework_TestCase
{
    /** @var GitHubAccountTypeFactoryException */
    private $sut;

    public function setUp()
    {
        $this->sut = GitHubAccountTypeFactoryException::create('message');
    }

    public function testItHasCustomMessage()
    {
        $this->assertEquals('Unknown GitHubAccountType with name: message', $this->sut->getMessage());
    }

    public function testItExtendsException()
    {
        $this->assertInstanceOf(\Exception::class, $this->sut);
    }
}
