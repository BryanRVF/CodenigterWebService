<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';              // Nombre de la tabla
    protected $primaryKey = 'id_producto';     // Clave primaria

    // Campos permitidos para inserción/actualización
    protected $allowedFields = [
        'nom_producto',
        'descripcion',
        'precio',
        'stock',
        'codigo_barras',
        'fecha_crea',
        'fecha_modifica',
    ];

    // Manejo automático de timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = 'fecha_modifica';

    // Tipos de datos
    protected $returnType    = 'array';        // Los datos retornados serán un array asociativo
}
