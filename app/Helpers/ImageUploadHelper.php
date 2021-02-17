<?php

function uploadSingleImage($image,$folderName,$compress=0){
    $imageFile = $image;
    $extension = $imageFile->getClientOriginalExtension();
    $imageName = uniqid() . uniqid() . time() . '.' . $extension;
    $folder = '/uploads/images/'.$folderName.'/';
    $imagePath = public_path() . $folder;
    if($compress>0){
        $image=resizeImage($imageFile,550,550);
        imagejpeg($image,$imagePath.$imageName);
    }else{
    $imageFile->move($imagePath, $imageName);
    }
    return $imageName;
}

function removeSingleOldImage($imageName,$folderName){
    if (is_file(public_path() . '/uploads/images/'.$folderName.'/'.$imageName)) {
        $imageFile = public_path() . '/uploads/images/'.$folderName.'/'.$imageName;
        unlink($imageFile);
    }
}
function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0,
                                     $width, $height, $orig_width, $orig_height);

    return $image_p;
}