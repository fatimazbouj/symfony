<?php

namespace App\TwigExtentions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CustomTwigExtentions extends AbstractExtension{

    public function getFilters(){
        return [
            new TwigFilter('defaultImg', [$this ,'defaultImg' ])
        ];
    }

    function defaultImg(string $path):string{
        if(strlen(trim($path))==0){
            return 'women.jpg';
        }
        return $path;
    }
    
}