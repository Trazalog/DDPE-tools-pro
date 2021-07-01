<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tests extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function imagenesCodificadas(){
        $json = '{
            "form_id": "40",
            "nombre": "Test MOSAICO Imagenes",
            "id": "361",
            "items": [
                {
                    "name": "nombre",
                    "label": "Imagen 1",
                    "orden": "1",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "pinguLinux-640x350.jpg"
                },
                {
                    "name": "dni",
                    "label": "Imagen 2",
                    "orden": "2",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "imagen_1.jpg"
                },
                {
                    "name": "imagen",
                    "label": "Imagen 3",
                    "orden": "3",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "imagen_2.jpg"
                },
                {
                    "name": "dni",
                    "label": "Imagen 2",
                    "orden": "2",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "imagen_3.jpg"
                },
                {
                    "name": "dni",
                    "label": "Imagen 2",
                    "orden": "2",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "imagen_4.jpg"
                },
                {
                    "name": "dni",
                    "label": "Imagen 2",
                    "orden": "2",
                    "form_id": "40",
                    "tipo_dato": "jpg",
                    "imgCodif": "imagen_5.jpg"
                }]
        }';
        $resp = json_decode($json);
        // $resp = json_decode($resp);
        // log_message("ERROR","TEST".json_encode($resp));
        return $resp;
    }
}
