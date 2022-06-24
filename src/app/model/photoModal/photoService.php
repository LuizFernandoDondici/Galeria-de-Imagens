<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

class PhotoService
{

    public function __construct()
    {
    }

    
    public function validadePhoto(Photo $photo):string
    {

        // Identifica a extensão do arquivo.
        $ext = pathinfo($photo->getPath(), PATHINFO_EXTENSION);
        
        // Verifica se existe algum arquivo.
        if (empty($ext)) {
            return 'Nenhum arquivo encontrado';
        }

        // Verifica se a extensão do arquivo é valida.
        if (strtolower($ext) != 'jpeg' && strtolower($ext) != 'png') {
            return 'Extensão não permitida';
        }

        return '';
    }

}