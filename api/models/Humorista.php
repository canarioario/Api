<?php
    require_once "connection/Connection.php";

    class Humorista {

        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM humoristas";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'publico' => $row['publico'],
                        'trabajo' => $row['trabajo'],
                        'genero' => $row['genero']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_humorista) {
            $db = new Connection();
            $query = "SELECT *FROM humoristas WHERE id=$id_humorista";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'publico' => $row['publico'],
                        'trabajo' => $row['trabajo'],
                        'genero' => $row['genero']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($nombre, $apellido, $publico, $trabajo, $genero) {
            $db = new Connection();
            $query = "INSERT INTO humoristas (nombre, apellido, publico, trabajo, genero)
            VALUES('".$nombre."', '".$apellido."', '".$publico."', '".$trabajo."', '".$genero."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_humorista, $nombre, $apellido, $publico, $trabajo, $genero) {
            $db = new Connection();
            $query = "UPDATE humoristas SET
            nombre='".$nombre."', apellido='".$apellido."', publico='".$publico."', trabajo='".$trabajo."', genero='".$genero."' 
            WHERE id=$id_humorista";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_humorista) {
            $db = new Connection();
            $query = "DELETE FROM humoristas WHERE id=$id_humorista";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Humorista
