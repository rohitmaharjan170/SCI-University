<?php

function uploadSingleAssignmentFile($doc,$folderName){
    $docFile = $doc;
    $extension = $docFile->getClientOriginalExtension();
    $docName = uniqid() . uniqid() . '.' . $extension;
    $folder = '/uploads/'.$folderName.'/';
    $imagePath = public_path() . $folder;
    $docFile->move($imagePath, $docName);
    return $docName;
}

function removeSingleAssignmentFile($docName,$folderName){
    if (is_file(public_path() . '/uploads/'.$folderName.'/'.$docName)) {
        $document = public_path() . '/uploads/'.$folderName.'/'.$docName;
        unlink($document);
    }
}
