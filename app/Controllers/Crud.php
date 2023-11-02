<?php

namespace App\Controllers;
use App\Models\CrudModel;


class Crud extends BaseController
{  
    public function index(): string
    {   
        $crud = new CrudModel();      
        $data = $crud->listarNombres();

        $mensaje = session('mensaje');

        $datos = [
            "datos" => $data,
            "mensaje" => $mensaje
        ];
        return view('listado', $datos);
    }

    public function crear() {
        
        $crud = new CrudModel(); 
        $data = [
            'id_nombre' => '',
            'nombre' =>$_POST['nombre'],
            'paterno' =>$_POST['paterno'],
            'materno' =>$_POST['materno']
        ];

        $respuesta = $crud->insertar($data);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje', '0');
        }
        
    }

    public function actualizar() {
        $crud = new CrudModel(); 
        $data = [
            'id_nombre' => '',
            'nombre' =>$_POST['nombre'],
            'paterno' =>$_POST['paterno'],
            'materno' =>$_POST['materno']
        ];

        $idNombre = $_POST['idNombre'];

        $respuesta = $crud->actualizar($data, $idNombre);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje', '3');
        }
    }

    public function obtenerNombre($idNombre) {
        
        $crud = new CrudModel(); 
        $data = ['id_nombre' => $idNombre];
        $respuesta = $crud->obtenerNombre($data);
        $datos = [
            "datos" => $respuesta
        ];

        return view('actualizar', $datos);
    }

    public function eliminar($idNombre)  {
        $crud = new CrudModel(); 
        $data = [
            'id_nombre' => $idNombre
        ];

        $respuesta = $crud->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje', '5');
        }
    }
}
