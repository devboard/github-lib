<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DateTime;
use DevboardLib\GitHub\Repo\GitHubRepoUpdatedAt;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoUpdatedAt
 * @group  unit
 */
class GitHubRepoUpdatedAtTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new GitHubRepoUpdatedAt($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromGitHubDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = GitHubRepoUpdatedAt::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
