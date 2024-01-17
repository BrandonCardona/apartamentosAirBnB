<?php

class ApartamentoController{
    public function __construct(){
        require_once "models/Apartamento.php";
    }

    public function index(){
        $apartamento = new Apartamento();
        $data["titulo"] = "APARTAMENTOS";
        $data["apartamentos"] = $apartamento->listar();

        // Cargar la vista
        require_once "views/apartamentos/index.php";
    }

    // Mostrar la vista para crear el registro
    public function insert(){

        $data["titulo"] = "CREAR APARTAMENTO";
        require_once "views/apartamentos/insert.php";
    }

    public function store(){

        // Recibir los datos del formulario
        $alias = $_POST['alias'];
        $direccion = $_POST['direccion'];
        $cantidadCamas = $_POST['cantidadCamas'];
        $capacidad = $_POST['capacidad'];
        $precioDia = $_POST['precioDia'];

        // Guardar el registro
        $apartamento = new Apartamento();
        $apartamento->insert($alias, $direccion, $cantidadCamas, $capacidad, $precioDia);

        // Enviar a la vista index
        $this->index();
    }

    // Visualizar la informacion de un registro
    public function view($id){

        $apartamento = new Apartamento();
        $data['titulo'] = "DETALLE DE APARTAMENTO";
        $data['apartamento'] = $apartamento->getApartamento($id);

        require_once "views/apartamentos/view.php";
    }


    public function edit($id){

        $apartamento = new Apartamento();
        $data['titulo'] = "ACTUALIZAR APARTAMENTO";
        $data['apartamento'] = $apartamento->getApartamento($id);
        $data['id'] = $id;

        require_once "views/apartamentos/edit.php";
    }

    public function update(){

        // recibir los datos del formulario
        $id = $_POST['id'];
        $alias = $_POST['alias'];
        $direccion = $_POST['direccion'];
        $cantidadCamas = $_POST['cantidadCamas'];
        $capacidad = $_POST['capacidad'];
        $precioDia = $_POST['precioDia'];

        $apartamento = new Apartamento();
        $apartamento->update($id, $alias, $direccion, $cantidadCamas, $capacidad, $precioDia);
        $this->index();
    }

    public function delete($id){

        $apartamento = new Apartamento();
        $apartamento->delete($id);
        $this->index();
    }

    public function calcularTotalAptos(){

        $apartamento = new Apartamento();
        $data['titulo'] = "LISTADO DE APARTAMENTOS";
        $data['apartamentos'] = $apartamento->calcularTotalAptos();
        $precioApartamentos = [];
        $total = 0;
        $contador = 0;
        
        foreach($data['apartamentos'] as $item){
            $precioApartamentos[] = intval($item['cantDiasAlquilado']) * intval($item['precioDia']);
            $total += $precioApartamentos[$contador];
            $contador++;
        }
        $data['total'] = $total;
        $data['precioApartamentos'] = $precioApartamentos;

        require_once "views/apartamentos/listarApartamentos.php";
    }

}
?>