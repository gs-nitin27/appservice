<?php 

use Auth0\SDK\JWTVerifier;
use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;

$verifier = new JWTVerifier([
    'valid_audiences' => ['http://appservice.getsporty.in'],
    'authorized_iss' => ['https://appservice.eu.auth0.com'],
    'cache' => new FileSystemCacheHandler() // This parameter is optional. By default no cache is used to fetch the JSON Web Keys.
]);

$decoded = $verifier->verifyAndDecode($token);

?>