<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\TestData;

use Devboard\Github\Repo\GithubRepoFullName;
use Symfony\Component\Finder\Finder;

class TestDataProvider
{
    private $repos = [
        'octocat/Hello-World',
        'octocat/Spoon-Knife',
        'octocat/linguist',
        'octocat/octocat.github.io',
        'octocat/git-consortium',
        'octocat/test-repo1',
        'symfony/symfony',
        'symfony/symfony-standard',
        'symfony/symfony-docs',
    ];

    public function getRepos(): array
    {
        return $this->repos;
    }

    public function getRandomGitHubRepoData(): array
    {
        $repo = $this->repos[0];

        return json_decode($this->loadRepoContent($repo), true);
    }

    public function getGitHubRepoData(): array
    {
        $results = [];

        foreach ($this->repos as $repo) {
            $results[] = [json_decode($this->loadRepoContent($repo), true)];
        }

        return $results;
    }

    public function getGitHubBranchesData(): array
    {
        $results = [];

        foreach ($this->repos as $repo) {
            $finder = new Finder();
            $finder->files()->in(__DIR__.'/'.$repo.'/branches/');

            foreach ($finder as $item) {
                $branchName = str_replace('.json', '', $item->getRelativePathname());
                $results[]  = [
                    json_decode($this->loadBranchContent($repo, $branchName), true),
                    GithubRepoFullName::createFromString($repo),
                ];
            }
        }

        return $results;
    }

    private function loadRepoContent(string $repo): string
    {
        return file_get_contents(__DIR__.'/'.$repo.'/repo.json');
    }

    private function loadBranchContent(string $repo, string $branchName): string
    {
        return file_get_contents(__DIR__.'/'.$repo.'/branches/'.$branchName.'.json');
    }
}
