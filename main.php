<?php

require_once 'vendor/autoload.php';

use Aws\S3\S3Client;

$s3Client = new S3Client([
    'version' => 'latest',
    'region' => '{region}',
    'credentials' => [
        'key' => '{AWS_ACCESS_KEY_ID}',
        'secret' => '{AWS_SECRET_ACCESS_KEY}',
    ]
]);

$result = $s3Client->putObject([
    'ACL' => 'public-read', // The File uploaded will be public.
    'Bucket' => '{bucket name}',
    'Key' => 'test.png',
    'Body' => file_get_contents("./test.png"),
    'ContentType' => 'image/png', // ContentType is application/octet-stream in default. Set image/png to display a image in a browser.
]);

echo $result['ObjectURL'] . "\n";
