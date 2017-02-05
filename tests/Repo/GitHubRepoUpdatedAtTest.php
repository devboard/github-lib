<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use DateTime;
use Devboard\GitHub\Repo\GitHubRepoUpdatedAt;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoUpdatedAt
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
