<?php

class ClienteController{

    public function __construct(){
        require_once "models/Cliente.php";
    }

    public function index(){
        $cliente = new Cliente();
        $data['titulo'] = "CLIENTES";
        $data['clientes'] = $cliente->listar();

        // Cargar la vista
        require_once "views/clientes/index.php";
    }

    // Mostrar la vista para crear el registro (Cliente)
    public function insert(){
        require_once "models/Apartamento.php";
        // Tomando la lista de clientes
        $apartamento = new Apartamento();
        $data['titulo'] = "REGISTRAR ALQUILER";
        $data['apartamentos'] = $apartamento->listar();
        require_once "views/clientes/insert.php";
    }

    public function seCruzan($fechaInicial1, $fechaFinal1, $fechaInicial2, $fechaFinal2){

        // Convertir las fechas a objetos DateTime para poder compararlas
        $fechaI1 = new DateTime($fechaInicial1);
        $fechaF1 = new DateTime($fechaFinal1);
        $fechaI2 = new DateTime($fechaInicial2);
        $fechaF2 = new DateTime($fechaFinal2);

        // Verificar si hay superposición de fechas
        if (($fechaI1 <= $fechaF2) && ($fechaF1 >= $fechaI2)) {
            // Las fechas se cruzan
            return true;
        } else {
            // Las fechas no se cruzan
            return false;
        }
    }

    public function validarFechas(){

        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $apartamento = $_POST['apartamento'];
        $vista = $_POST['valorVista'];

        // Guardar el registro
        $cliente = new Cliente();
        if($vista == 0){
            $fechasClientes = $cliente->getFechasInsert($apartamento);
        }else{
            $fechasClientes = $cliente->getFechasEdit($apartamento, $_POST['id']);
        }

        foreach($fechasClientes as $item){

            if($this->seCruzan($fechaInicial, $fechaFinal, $item['fechaInicial'], $item['fechaFinal'])){
                if($vista == 0){
                    require_once "models/Apartamento.php";
                    // Tomando la lista de clientes
                    $apartamento = new Apartamento();
                    $data['titulo'] = "REGISTRAR ALQUILER";
                    $data['apartamentos'] = $apartamento->listar();
                    // La fecha se cruza
                    $data['valor'] = true;
                    $data['valores'] = array($_POST['nombre'], $_POST['numeroDocumento'], $_POST['ciudadOrigen'], $_POST['numAcompaniantes'], $_POST['fechaInicial'], $_POST['fechaFinal'], $apartamento);
                    require_once "views/clientes/insert.php";
                    return;
                }else{
                    $cantDiasAlquilado = $cliente->getCliente($_POST['id'])['cantDiasAlquilado'];
                    $data['cliente'] = array('nombre' => $_POST['nombre'], 
                                'numeroDocumento' => $_POST['numeroDocumento'], 
                                'ciudadOrigen' => $_POST['ciudadOrigen'], 
                                'numAcompaniantes' => $_POST['numAcompaniantes'], 
                                'fechaInicial' => $_POST['fechaInicial'], 
                                'fechaFinal' => $_POST['fechaFinal'], 
                                'idApartamento' => $apartamento,
                            'cantDiasAlquilado' => $cantDiasAlquilado);
                            
                    $this->edit($_POST['id'], true, $data['cliente']);
                    return;
                }
            }
        }
        if($vista == 0){
            $this->store();
        }else{
            $this->update();
        }
    }


    // Guardar la informacion en la base de datos
    public function store(){

        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $ciudadOrigen = $_POST['ciudadOrigen'];
        $numAcompaniantes = $_POST['numAcompaniantes'];
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $apartamento = $_POST['apartamento'];
        $fecha1 = new DateTime($fechaInicial);
        $fecha2 = new DateTime($fechaFinal);
        $cantDiasAlquilado = ($fecha1->diff($fecha2))->days;


        // Guardar el registro
        $cliente = new Cliente();
        $cliente->insert($nombre, $numeroDocumento, $ciudadOrigen, $numAcompaniantes, $cantDiasAlquilado, $fechaInicial ,$fechaFinal, $apartamento);

        // Registrar los dias alquilados
        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();
        $apartamento->registrarAlquiler(intval($_POST['apartamento']), $cantDiasAlquilado);
        
        // Enviar a la vista index
        $this->index();
    }

    // Visualizar la informacion de un registro
    public function view($id){

        $data['titulo'] = "DETALLE DEL CLIENTE";

        $cliente = new cliente();
        $data['cliente'] = $cliente->getCliente($id);
        $data['id'] = $id;

        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();
        $data['apartamento'] = $apartamento->getApartamento($data['cliente']['idApartamento']);

        require_once "views/clientes/view.php";
    }

    public function edit($id, $dato = null, $datosCliente = null){

        $data['titulo'] = "ACTUALIZAR CLIENTE";
        $cliente = new Cliente();
        if(isset($dato)){
            $data['cliente'] = $datosCliente;
            $data['valor'] = $dato;
        }else{
            $data['cliente'] = $cliente->getCliente($id);
        }
        $data['id'] = $id;
        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();
        $data['nombreApartamento'] = $apartamento->getApartamento($data['cliente']['idApartamento'])['alias'];
        $data['cantDiasAlquiladoCliente'] = $data['cliente']['cantDiasAlquilado'];
        $data['idApartamentoCliente'] = $data['cliente']['idApartamento'];
        $data['apartamentos'] = $apartamento->listar();
        require_once "views/clientes/edit.php";
    }

    public function update(){
        
        // Recibir los datos del formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $ciudadOrigen = $_POST['ciudadOrigen'];
        $numAcompaniantes = $_POST['numAcompaniantes'];
        $cantDiasAlquiladoCliente = $_POST['cantDiasAlquiladoCliente'];
        $idApartamentoCliente = $_POST['idApartamentoCliente'];
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $apartamento = $_POST['apartamento'];

        $fecha1 = new DateTime($fechaInicial);
        $fecha2 = new DateTime($fechaFinal);
        $cantDiasAlquilado = ($fecha1->diff($fecha2))->days;

        $cliente = new Cliente();
        $cliente->update($id, $nombre, $numeroDocumento, $ciudadOrigen, $numAcompaniantes, $cantDiasAlquilado, $fechaInicial ,$fechaFinal, $apartamento);

        // Registrar los dias alquilados
        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();

        $apartamento->eliminarAlquiler($idApartamentoCliente, $cantDiasAlquiladoCliente);
        $apartamento->registrarAlquiler(intval($_POST['apartamento']), $cantDiasAlquilado);

        $this->index();
    }

    public function delete($id){
    
        $clientes = new Cliente();

        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();

        $cliente = $clientes->getCliente($id);
        $apartamento->eliminarAlquiler($cliente['idApartamento'], $cliente['cantDiasAlquilado']);

        $clientes->delete($id);
        $this->index();
    }

    // Lista los desarrolladores de un proyecto
    public function listarClientes($idApartamento){

        require_once "models/Apartamento.php";
        $apartamento = new Apartamento();   
        $data['titulo'] = "HUESPEDES DEL APARTAMENTO: ".strtoupper($apartamento->getApartamento($idApartamento)['alias']);
        
        $cliente = new Cliente();
        $data['clientes'] = $cliente->listarClientes($idApartamento);
        $valorPrecioDia = $apartamento->getPrecioDia($idApartamento);
        $data['precioDia'] = $valorPrecioDia['precioDia'];
        $preciosClientes = [];
        $total = 0;
        $totalDias = 0;
        $contador = 0;
        foreach($data['clientes'] as $item){
            $preciosClientes[] = intval($item['cantDiasAlquilado']) * intval($valorPrecioDia['precioDia']);
            $total += $preciosClientes[$contador];
            $totalDias += intval($item['cantDiasAlquilado']);
            $contador++;
        }
        $data['total'] = $total;
        $data['totalDias'] = $totalDias;
        $data['preciosClientes'] = $preciosClientes;
        
        // Cargar la vista
        require_once "views/clientes/listarClientes.php";
    }
}
?>