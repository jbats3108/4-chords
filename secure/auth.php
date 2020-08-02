<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__ . '/../');
$dotenv->load();

$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];

use GuzzleHttp\Client;

$basic = base64_encode("{$client_id}:{$client_secret}");

$client = new Client([
 'base_uri' => 'https://accounts.spotify.com/',
 'headers' => [
  "Authorization" => "Basic {$basic}",
  "Content-Type: application/x-www-form-urlencoded",
 ],
]);

$post_data = [
 'form_params' => [
  'grant_type' => 'client_credentials',
 ],
];

$response = $client->request('POST', 'api/token', $post_data);

$data = (string) $response->getBody();

file_put_contents('data.json', $data);

$tokens = json_decode($data, true);

$jwt = $tokens['access_token'];

putenv("SPOTIFY_JWT={$jwt}");