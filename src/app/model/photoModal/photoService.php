<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

class PhotoService
{

    public function __construct()
    {
    }

    
    public function validadePhoto(Photo $photo):string
    {

        $ext = pathinfo($photo->getPath(), PATHINFO_EXTENSION);
        
        if (empty($ext)) {
            return 'Nenhum arquivo encontrado';
        }

        if (strtolower($ext) != 'jpeg' && strtolower($ext) != 'png') {
            return 'Extensão não permitida';
        }

        return '';
        
    }

}