<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\HTTP\Response;

class ProductoController extends BaseController
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    // Obtener todos los productos
    public function index()
    {
        $productos = $this->productoModel->findAll();
        return $this->response->setJSON($productos); // Devuelve los datos en formato JSON
    }

    // Crear un nuevo producto
    public function create()
    {
        $data = $this->request->getPost(); // Recibe los datos desde una solicitud POST

        if ($this->productoModel->insert($data)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Producto creado con éxito.',
                'id'      => $this->productoModel->insertID(),
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Error al crear el producto.',
        ])->setStatusCode(400);
    }

    // Leer un producto por ID
    public function show($id)
    {
        $producto = $this->productoModel->find($id);

        if ($producto) {
            return $this->response->setJSON($producto);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Producto no encontrado.',
        ])->setStatusCode(404);
    }

    // Actualizar un producto por ID
    public function update($id)
    {
        $data = $this->request->getRawInput(); // Recibe los datos desde una solicitud PUT/PATCH

        if ($this->productoModel->update($id, $data)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Producto actualizado con éxito.',
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Error al actualizar el producto.',
        ])->setStatusCode(400);
    }

    // Eliminar un producto por ID
    public function delete($id)
    {
        if ($this->productoModel->delete($id)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Producto eliminado con éxito.',
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Error al eliminar el producto.',
        ])->setStatusCode(400);
    }
}
