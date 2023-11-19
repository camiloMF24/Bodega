<?php
    class Pedidos extends Conectar{
        public function get_pedidos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pedidos ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
       

        public function insert_pedidos($codigo_producto, $cantidad, $fecha, $tipo) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "INSERT INTO pedidos(codigo_producto, cantidad, fecha, tipo) VALUES (?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $codigo_producto);
            $sql->bindParam(2, $cantidad);
            $sql->bindParam(3, $fecha);
            $sql->bindParam(4, $tipo);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        public function update_pedidos($codigo_producto, $cantidad, $fecha, $tipo){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE pedidos SET cantidad = ?, fecha = ?, tipo = ? WHERE codigo_producto = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1, $cantidad);
            $sql->bindParam(2, $fecha);
            $sql->bindParam(3, $tipo);
            $sql->bindValue(4, $codigo_producto);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        


            public function delete_pedidos($codigo)
            {
                $conectar = parent::conexion();
                parent::set_names();
            
                $sql = "UPDATE cantidad SET
                        
                            WHERE
                            codigo_producto = ?";
            
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $codigo_producto);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
            
        }
        
    
?>