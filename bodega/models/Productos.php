<?php
    class Productos extends Conectar{
        public function get_productos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM productos ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
       

        public function insert_productos($nombre, $precio, $cantidad, $fecha_expedicion) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "INSERT INTO productos(codigo, nombre, precio, cantidad, fecha_expedicion) VALUES (NULL, ?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $nombre);
            $sql->bindParam(2, $precio);
            $sql->bindParam(3, $cantidad);
            $sql->bindParam(4, $fecha_expedicion);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        public function update_productos($codigo, $nombre, $precio, $cantidad, $fecha_expedicion){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET nombre = ?, precio = ?, cantidad = ?, fecha_expedicion = ? WHERE codigo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1, $nombre);
            $sql->bindParam(2, $precio);
            $sql->bindParam(3, $cantidad);
            $sql->bindParam(4, $fecha_expedicion);
            $sql->bindValue(5, $codigo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        


            public function delete_productos($codigo)
            {
                $conectar = parent::conexion();
                parent::set_names();
            
                $sql = "UPDATE nombre SET
                        
                            WHERE
                            codigo = ?";
            
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $codigo);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
            
        }
        
    
?>