<?php

 namespace Helpers;

 use Intervention\Image\Facades\Image;

 class Auxcode
 {

     function encodePicture($input)
     {
         $resize = 400;
         return Image::make($input)->resize($resize, $resize, function ($constraint) {
             $constraint->aspectRatio();
         })->encode('jpeg');
     }

     public function assignImage($sector){
        if($sector == "Restaurante"){
            return 'restaurant-profile.svg';
        }else if($sector == "Bar"){
            return 'bar-profile.svg';
        }else if($sector == "Comercio"){
            return 'commerce-profile.svg';
        }else if($sector == "Tecnología"){
            return 'tech-profile.svg';
        }else if($sector == "Atención al cliente"){
            return 'client-profile.svg';
        }else if($sector == "Marketing"){
            return 'marketing-profile.svg';
        }else if($sector == "Entretenimiento"){
            return 'entertainment-profile.svg';
        }else if($sector == "Otro"){
            return 'default-employer-profile.svg';
        }
    }
 }