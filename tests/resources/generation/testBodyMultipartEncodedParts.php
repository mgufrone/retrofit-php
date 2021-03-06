<?php

$bodyArray = array('fooPart' => $fooPart);
$bodyParts = array();
foreach ($bodyArray as $key => $value) {
    $file = null;
    if (is_resource($value)) {
        $file = $value;
    }
    if (is_string($value)) {
        $file = fopen($value, 'r');
    }
    if (!is_resource($file)) {
        throw new \LogicException('Expected resource or file path');
    }
    $bodyParts[] = array('name' => $key, 'contents' => $file);
}
$body = new \GuzzleHttp\Psr7\MultipartStream($bodyParts, 'fooboundary');
