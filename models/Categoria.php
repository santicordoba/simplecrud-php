<?php
    class Categoria extends Conectar{
        private $id;
        private $nombre;
        private $observacion;
        private $estado;
        
        public function get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * from categoria where estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_by_id($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * from categoria where estado=1 and id = $id";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function post_categoria($name,$obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO categoria (id, nombre, observacion, estado) VALUES (NULL, ?, ?, '1')";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->bindValue(2, $obs);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function put_categoria($id,$name,$obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE categoria SET nombre = ?, observacion = ? WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->bindValue(2, $obs);
            $sql->bindValue(3, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_categoria($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE categoria SET estado = 0 WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>