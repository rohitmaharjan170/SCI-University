<?php

function uploadSingleDoc($doc,$folderName){
    $docFile = $doc;
    $extension = $docFile->getClientOriginalExtension();
    $docName = uniqid() . uniqid() . '.' . $extension;
    $folder = '/uploads/documents/'.$folderName.'/';
    $imagePath = public_path() . $folder;
    $docFile->move($imagePath, $docName);
    return $docName;
}

function removeSingleOldDoc($docName,$folderName){
    if (is_file(public_path() . '/uploads/documents/'.$folderName.'/'.$docName)) {
        $document = public_path() . '/uploads/documents/'.$folderName.'/'.$docName;
        unlink($document);
    }
}