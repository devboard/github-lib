<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountTypeFactoryException;

/**
 * @covers \DevboardLib\GitHub\Account\AccountTypeFactoryException
 * @group  unit
 */
class AccountTypeFactoryExceptionTest extends \PHPUnit_Framework_TestCase
{
    /** @var AccountTypeFactoryException */
    private $sut;

    public function setUp()
    {
        $this->sut = AccountTypeFactoryException::create('message');
    }

    public function testItHasCustomMessage()
    {
        $this->assertEquals('Unknown AccountType with name: message', $this->sut->getMessage());
    }

    public function testItExtendsException()
    {
        $this->assertInstanceOf(\Exception::class, $this->sut);
    }
}
