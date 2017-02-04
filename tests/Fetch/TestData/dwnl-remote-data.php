<?php

declare(strict_types=1);
use GuzzleHttp\Client;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

require __DIR__.'/../../../vendor/autoload.php';

$client = new Client();

$testDataProvider = new TestDataProvider();

$options = [
    'headers' => [
        'Authorization' => 'token XXX',
        'Accept'        => 'application/vnd.github.v3+json',
    ],
];

foreach ($testDataProvider->getRepos() as $repo) {
    echo $repo.PHP_EOL;

    if (!is_dir(__DIR__.'/'.$repo.'/branches/')) {
        mkdir(__DIR__.'/'.$repo.'/branches/', 0777, true);
    }
    if (!is_dir(__DIR__.'/'.$repo.'/tags/')) {
        mkdir(__DIR__.'/'.$repo.'/tags/', 0777, true);
    }

    //Handle repo.json
    $response = $client->request('GET', 'https://api.github.com/repos/'.$repo, $options);
    $repoData = $response->getBody()->getContents();

    file_put_contents(__DIR__.'/'.$repo.'/repo.json', $repoData);

    //Handle branches.json
    $response     = $client->request('GET', 'https://api.github.com/repos/'.$repo.'/branches', $options);
    $branchesData = $response->getBody()->getContents();

    file_put_contents(__DIR__.'/'.$repo.'/branches.json', $branchesData);

    $branches = json_decode($branchesData, true);

    foreach ($branches as $branchItem) {
        $branch   = urlencode($branchItem['name']);
        $response = $client->request('GET', 'https://api.github.com/repos/'.$repo.'/branches/'.$branch, $options);
        file_put_contents(__DIR__.'/'.$repo.'/branches/'.$branch.'.json', $response->getBody());
    }

    //Handle tags.json
    $response = $client->request('GET', 'https://api.github.com/repos/'.$repo.'/tags', $options);
    $tagsData = $response->getBody()->getContents();

    file_put_contents(__DIR__.'/'.$repo.'/tags.json', $tagsData);
}
