<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../secure/auth.php';

$jwt = getenv('SPOTIFY_JWT');

use GuzzleHttp\Client;

$client = new Client([
 'base_uri' => 'https://api.spotify.com/v1/',
 'headers' => [
  "Authorization" => "Bearer {$jwt}",
 ],
]);

$response = $client->request('GET', 'playlists/3L1Ng30dIV4dL1qJmVHfqD/tracks');

$data = (string) $response->getBody();

$data = json_decode($data, true);

$tracks_data = $data['items'];

usort($tracks_data, function ($a, $b) {
 return $a['track']['artists'][0]['name'] > $b['track']['artists'][0]['name'];
});