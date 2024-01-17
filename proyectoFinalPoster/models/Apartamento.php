<?php

class Apartamento{

    // Atributos
    private $db;
    private $apartamentos;

    // Constructor
    public function __construct(){
        
        $this->db = Conexion::conectar();
        $this->apartamentos = [];
    }

    // Metodos
    public function listar(){
        
        $sql = "SELECT * 
                FROM apartamento";
        
    // Ejecutando la consulta
    $resultado = $this->db->query($sql);

    // Si falla la consulta
    if(!$resultado){
        echo "Lo sentimos, este sitio esta experimentando problemas";
        exit;
    }   
        // Lee cada fila del resultado
        while($row = $resultado->fetch_assoc()){
            
            // Agrega las filas al apartamento 
            $this->apartamentos[] = $row;
        }

        return $this->apartamentos;
    }

    public function insert($alias, $direccion, $cantidadCamas, $capacidad, $precioDia){

        $sql = "INSERT INTO apartamento(alias, direccion, cantidadCamas, capacidad, precioDia, cantDiasAlquilado)
        VALUES('$alias', '$direccion', $cantidadCamas, $capacidad, $precioDia, 0)";

        $this->db->query($sql);
    }

    //Obtener la informacion de un apartamento
    public function getApartamento($id_apartamento){

        $sql = "SELECT * FROM apartamento
                WHERE id_apartamento=$id_apartamento";

        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    // Actualizar el apartamento
    public function update($id_apartamento, $alias, $direccion, $cantidadCamas, $capacidad, $precioDia){
        $sql = "UPDATE apartamento
            SET alias = '$alias', direccion = '$direccion', cantidadCamas = '$cantidadCamas', 
            capacidad = '$capacidad', precioDia = '$precioDia'
            WHERE id_apartamento=$id_apartamento";

        $this->db->query($sql);
    }

    // Eliminar un apartamento
    public function delete($id_apartamento){
        
        $sql = "DELETE FROM apartamento 
            WHERE id_apartamento=$id_apartamento";
        $this->db->query($sql);
    }

    // Registrar alquiler
    public function registrarAlquiler($id_apartamento, $cantDiasAlquilado){
        $sql = "UPDATE apartamento SET cantDiasAlquilado=cantDiasAlquilado + $cantDiasAlquilado
                WHERE id_apartamento=$id_apartamento";
        $this->db->query($sql);
    }

    public function eliminarAlquiler($id_apartamento, $cantDiasAlquilado){
        $sql = "UPDATE apartamento SET cantDiasAlquilado=cantDiasAlquilado - $cantDiasAlquilado
                WHERE id_apartamento=$id_apartamento";
        $this->db->query($sql);
    }

    public function getPrecioDia($idApartamento){
        
        $sql = "SELECT precioDia FROM apartamento 
        WHERE id_apartamento=$idApartamento";
        
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    public function calcularTotalAptos(){
        
        $sql = "SELECT alias, cantDiasAlquilado, precioDia 
                FROM apartamento";
        
    // Ejecutando la consulta
    $resultado = $this->db->query($sql);

    // Si falla la consulta
    if(!$resultado){
        echo "Lo sentimos, este sitio esta experimentando problemas";
        exit;
    }   
        // Lee cada fila del resultado
        while($row = $resultado->fetch_assoc()){
            
            // Agrega las filas al apartamento 
            $this->apartamentos[] = $row;
        }

        return $this->apartamentos;
    }
}

?>