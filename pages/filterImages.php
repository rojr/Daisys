<?php

include_once(__DIR__ . '/../vendor/rhubarbphp/rhubarb/platform/execute-cli.php');

foreach (\SuperCMS\Models\Product\ProductImage::all() as $image) {
    if (strpos($image->ImagePath, 'http') !== false) {
        $imageFile = file_get_contents($image->ImagePath);
        if ($imageFile && strpos($imageFile, 'html') === false) {
            $uploadPath = APPLICATION_ROOT_DIR . '/static/images/products/' . $image->ProductVariation->ProductID . '/' . $image->ProductVariationID . '/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
                chmod($uploadPath, 0777);
            }

            $finalLocation = $uploadPath . sha1($image->ProductVariationID) . '-' . sha1(microtime());
            file_put_contents($finalLocation, $imageFile);

            $image->ImagePath = str_replace(APPLICATION_ROOT_DIR, '',realpath($finalLocation));
            $image->save();
            print "Saved\n";
        } else {
            $image->ImagePath = '';
            $image->save();
        }
    } else {

        print "Skipped\n";
    }
}