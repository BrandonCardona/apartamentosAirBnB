<?php
class Cliente{

    // Atributos
    private $db;
    private $clientes;

    // Constructor
    public function __construct(){
        $this->db = Conexion::conectar();
        $this->clientes = [];
    }

    // Metodos
    
    public function listar(){

        $sql = "SELECT * FROM cliente";

        // Ejecucion de la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            // ¡Oh, no! La consulta falló :(
            echo "Lo sentimos, este sitio está experimentando problemas.";
        }

        // Leer cada fila del resultado
        while ($row = $resultado->fetch_assoc()){

            // Agregar la fila al final del arreglo proyectos
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }

    public function insert ($nombre, $numeroDocumento, $ciudadOrigen, $numAcompaniantes, $cantDiasAlquilado, $fechaInicial, $fechaFinal, $idApartamento){

        $sql = "INSERT INTO cliente(nombre, numeroDocumento, ciudadOrigen, numAcompaniantes, cantDiasAlquilado, fechaInicial, fechaFinal, idApartamento)
            VALUES('$nombre', '$numeroDocumento', '$ciudadOrigen', '$numAcompaniantes', $cantDiasAlquilado, '$fechaInicial', '$fechaFinal','$idApartamento')";
        $this->db->query($sql);
    }

    //Obtener la informacion de un cliente
    public function getCliente($id){
        $sql = "SELECT * FROM cliente
        WHERE id=$id";

        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    // Actualizar el cliente
    public function update($id, $nombre, $numeroDocumento, $ciudadOrigen, $numAcompaniantes, $cantDiasAlquilado,  $fechaInicial, $fechaFinal, $idApartamento){

        $sql = "UPDATE cliente SET nombre='$nombre', numeroDocumento='$numeroDocumento',
                ciudadOrigen='$ciudadOrigen', numAcompaniantes='$numAcompaniantes', cantDiasAlquilado=$cantDiasAlquilado, fechaInicial='$fechaInicial', fechaFinal='$fechaFinal', idApartamento='$idApartamento'
                WHERE id='$id'";
        
        $this->db->query($sql);
    }

    // Eliminar un registro
    public function delete($id){

        $sql = "DELETE FROM cliente 
            WHERE id=$id";

        $this->db->query($sql);
    }

    // Devuelve todos los clientes asociados a un proyecto
    public function listarClientes($idApartamento){
        $sql = "SELECT nombre, numeroDocumento, cantDiasAlquilado from cliente 
        WHERE idApartamento=$idApartamento";
        
        // Ejecucion de la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            // ¡Oh, no! La consulta falló :(
            echo "Lo sentimos, este sitio está experimentando problemas.";
            exit;
        }

        // Leer cada fila del resultado
        while ($row = $resultado->fetch_assoc()){

            // Agregar la fila al final del arreglo proyectos
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }

    public function getFechasInsert($idApartamento){
        $sql = "SELECT fechaInicial, fechaFinal from cliente 
        WHERE idApartamento=$idApartamento";
        
        // Ejecucion de la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            // ¡Oh, no! La consulta falló :(
            echo "Lo sentimos, este sitio está experimentando problemas.";
            exit;
        }

        // Leer cada fila del resultado
        while ($row = $resultado->fetch_assoc()){

            // Agregar la fila al final del arreglo proyectos
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }

    public function getFechasEdit($idApartamento, $id){
        $sql = "SELECT fechaInicial, fechaFinal from cliente 
        WHERE idApartamento=$idApartamento and id <> $id";
        
        // Ejecucion de la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            // ¡Oh, no! La consulta falló :(
            echo "Lo sentimos, este sitio está experimentando problemas.";
            exit;
        }

        // Leer cada fila del resultado
        while ($row = $resultado->fetch_assoc()){

            // Agregar la fila al final del arreglo proyectos
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }

}
?>