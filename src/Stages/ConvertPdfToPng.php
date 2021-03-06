<?php

namespace Matthewbdaly\LetterClassifier\Stages;

use Imagick;

class ConvertPdfToPng
{
    public function __invoke($file)
    {
        $tmp = tmpfile();
        $uri = stream_get_meta_data($tmp)['uri'];
        $img = new Imagick();
        $img->setResolution(300, 300);
        $img->readImage($file);
        $img->setImageDepth(8);
        $img->setImageFormat('png');
        $img->writeImage($uri);
        return $tmp;
    }
}
