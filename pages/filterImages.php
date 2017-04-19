<?php

include_once(__DIR__ . '/../vendor/rhubarbphp/rhubarb/platform/execute-cli.php');

foreach (\SuperCMS\Models\Product\Product::all() as $image) {
    $image->Name = $image->Name;
    $image->save(true);
}