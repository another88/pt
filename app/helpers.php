<?php
/**
 * Created by PhpStorm.
 * User: another
 * Date: 05.01.2016
 * Time: 12:20
 */
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

if (! function_exists('theme')){
  function theme($path){
    $config = app('config')->get('cms.theme');

    return url($config['folder'].'/'.$config['active'].'/assets/'. $path);
  }
}

if (! function_exists('storeImageFile')){
  function storeImageFile($file, $obj, $pathMark){
    $path = public_path("files/{$pathMark}");
    $extension = $file->getClientOriginalExtension();
    Storage::disk($pathMark)->put(''.$obj->id.'/main_origin.'.$extension, File::get($file));
    $pageImage = $path.'/'.$obj->id.'/main_small.'.$extension;
    Image::make($file)->resize(600, 400)->save($pageImage);
    return "files/{$pathMark}"."/".$obj->id."/main_small.".$extension;;
  }
}