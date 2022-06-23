<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

class PhotoService
{

    public function __construct()
    {
    }

    
    public function validadePhoto(Photo $photo):string
    {

        if (empty($photo->getName())) {
            return 'Nenhum arquivo encontrado';
        }

        
        $ext = pathinfo($photo->getPath(), PATHINFO_EXTENSION);

        if (strtolower($ext) != 'jpeg' && strtolower($ext) != 'png') {
            return 'Extensão não permitida';
        }

        return '';
        
    }

}