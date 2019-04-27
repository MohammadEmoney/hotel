<?php

function uploadFile($files, $className){
    $filePublicPath = [];
    foreach($files as $file){
        $className = str_replace("\\", "/", $className);
        $fileName = time() . "-" . $file->getClientOriginalName();
        $path = public_path("/img/$className/");
        $file->move($path, $fileName);
        $filePublicPath[] = "/img/$className/" . $fileName;
    }
    return $filePublicPath;
}

function uploadVideo($file, $className){
    $className = str_replace("\\", "/", $className);
    $fileName = time() . "-" . $file->getClientOriginalName();
    $path = public_path("/video/$className/");
    $file->move($path, $fileName);
    return "/video/$className/" . $fileName;
}
