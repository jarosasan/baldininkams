<?php


namespace App\Servises;


class ImageService
{
 private $image_dir = 'public/images';

    /**
     * @param $fileName
     *
     * @return string
     */
    private function getPath($fileName){
     $path = $this->image_dir.$fileName;
     return $path;
 }

 public function storeImages($advert, $image){

}



}
