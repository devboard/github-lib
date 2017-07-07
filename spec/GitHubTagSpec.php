<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubCommit as Commit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\Repo\GitHubRepoFullName as RepoFullName;
use DevboardLib\GitHub\Tag\GitHubTagName as TagName;
use PhpSpec\ObjectBehavior;

class GitHubTagSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, TagName $tagName, Commit $commit)
    {
        $this->beConstructedWith($repoFullName, $tagName, $commit);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTag::class);
    }

    public function it_exposes_constructor_arguments(RepoFullName $repoFullName, TagName $tagName, Commit $commit)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
        $this->getTagName()->shouldReturn($tagName);
        $this->getCommit()->shouldReturn($commit);
    }
}
