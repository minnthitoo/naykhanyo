<?php

if(!function_exists('upload_image')){
    function upload_image($image, $path){
        $url = rtrim($path, '/');
        $filename = uniqid() . '.' . $image->extension();
        $image->move(public_path($url), $filename);
        return $url . '/' . $filename;
    }
}
