
    <!-- Todo para la base de datos -->

<?php
    class DATABASE{
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "nuevo_ingreso";

        function __construct(){
            $this->conectar();
        }

        public function conectar(){
            $buscar = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if(mysqli_connect_error()){
                die("La conexión a la base de datos falló." . mysqli_connect_error() . mysqli_connect_error());
            }
        }

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }

        // Todo para la tabla alumnos
        
        public function mostrarAlumnos(){
            $sql = "SELECT * FROM alumnos_has_especialidad ae
            JOIN alumnos a
            ON ae.alumnos_id = a.id
            JOIN especialidad e
            ON ae.especialidad_id = e.id_especialidad";
            
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function insertarAlumnos($especialidad, $nombres, $apellidos, $edad, $fecha_nacimiento, $lugar_nacimiento, $dui, $telefono, $direccion, $correo_electronico, $institucion_cursado, $cuota_mensual, $nombres_encargado, $apellidos_encargado, $edad_encargado, $dui_encargado, $nit_encargado, $direccion_encargado, $telefono_encargado, $correo_electronico_encargado, $estado_civil_encargado, $ocupacion, $nombre_trabajo, $telefono_trabajo, $correo_electronico_trabajo, $direccion_trabajo){
            $sql = "INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `edad`, `fecha_nacimiento`, `lugar_nacimiento`, `dui`, `telefono`, `direccion`, `correo_electronico`, `institucion_cursado`, `cuota_mensual`, `nombres_encargado`, `apellidos_encargado`, `edad_encargado`, `dui_encargado`, `nit_encargado`, `direccion_encargado`, `telefono_encargado`, `correo_electronico_encargado`, `estado_civil_encargado`, `ocupacion`, `nombre_trabajo`, `telefono_trabajo`, `correo_electronico_trabajo`, `direccion_trabajo`) VALUES (NULL, '$nombres', '$apellidos', '$edad', '$fecha_nacimiento', '$lugar_nacimiento', '$dui', '$telefono', '$direccion', '$correo_electronico', '$institucion_cursado', '$cuota_mensual', '$nombres_encargado', '$apellidos_encargado', '$edad_encargado', '$dui_encargado', '$nit_encargado', '$direccion_encargado', '$telefono_encargado', '$correo_electronico_encargado', '$estado_civil_encargado', '$ocupacion', '$nombre_trabajo', '$telefono_trabajo', '$correo_electronico_trabajo', '$direccion_trabajo')";

            $res = mysqli_query($this->con, $sql);
            if($res){
                $last_id = $this->con->insert_id;
                $res3 =$this->insertarForanea($last_id, $especialidad);
                if($res3){
                    header("Location: descargar.php?id=$last_id");
                }else{
                    return false;
                }
                return true;
            }else{
                return false;
            }
        }

        public function insertarForanea($last_id, $especialidad){
            $sql = "INSERT INTO `alumnos_has_especialidad` (`alumnos_id`, `especialidad_id`, `especialidades_cursadas`) 
            VALUES ('$last_id', '$especialidad', CURRENT_DATE)";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarAlumno($id_alumno){
            $sql_F = "DELETE FROM `alumnos_has_especialidad` WHERE `alumnos_has_especialidad`.`alumnos_id` = '$id_alumno'";
            $res_F = mysqli_query($this->con, $sql_F);
            $sql = "DELETE FROM `alumnos` WHERE `alumnos`.`id` = '$id_alumno'";
            $res = mysqli_query($this->con, $sql);
            if($res && $res_F){
                return true;
            }else{
                return false;
            }
        }

        public function modificarAlumno($id_alumno, $especialidad, $nombres, $apellidos, $edad, $fecha_nacimiento, $lugar_nacimiento, $dui, $telefono, $direccion, $correo_electronico, $institucion_cursado, $cuota_mensual, $nombres_encargado, $apellidos_encargado, $edad_encargado, $dui_encargado, $nit_encargado, $direccion_encargado, $telefono_encargado, $correo_electronico_encargado, $estado_civil_encargado, $ocupacion, $nombre_trabajo, $telefono_trabajo, $correo_electronico_trabajo, $direccion_trabajo){
            $sql = "UPDATE `alumnos` SET `nombres` = '$nombres', `apellidos` = '$apellidos', `edad` = '$edad', `fecha_nacimiento` = '$fecha_nacimiento', `lugar_nacimiento` = '$lugar_nacimiento', `dui` = '$dui', `telefono` = '$telefono', `direccion` = '$direccion', `correo_electronico` = '$correo_electronico', `institucion_cursado` = '$institucion_cursado', `cuota_mensual` = '$cuota_mensual', `nombres_encargado` = '$nombres_encargado', `apellidos_encargado` = '$apellidos_encargado', `edad_encargado` = '$edad_encargado', `dui_encargado` = '$dui_encargado', `nit_encargado` = '$nit_encargado', `direccion_encargado` = '$direccion_encargado', `telefono_encargado` = '$telefono_encargado', `correo_electronico_encargado` = '$correo_electronico_encargado', `estado_civil_encargado` = '$estado_civil_encargado', `ocupacion` = '$ocupacion', `nombre_trabajo` = '$nombre_trabajo', `telefono_trabajo` = '$telefono_trabajo', `correo_electronico_trabajo` = '$correo_electronico_trabajo', `direccion_trabajo` = '$direccion_trabajo' WHERE `alumnos`.`id` = '$id_alumno'";
            $res = mysqli_query($this->con, $sql);
            $sql_F = "UPDATE `alumnos_has_especialidad` SET `especialidad_id` = '$especialidad' WHERE `alumnos_has_especialidad`.`alumnos_id` = '$id_alumno'";
            $res_F = mysqli_query($this->con, $sql_F);
            if($res && $res_F){
                return true;
            }else{
                return false;
            }
        }

        public function buscarEncargado($id){
            $sql = "SELECT * FROM alumnos WHERE id = '$id'";
            $res = mysqli_query($this->con, $sql);

            $return = ($res);
            return $return;
            }

        public function buscarAlumno($id){
            $sql = "SELECT * FROM alumnos WHERE id = '$id'";
            $res = mysqli_query($this->con, $sql);

            $return = mysqli_fetch_object($res);
            return $return;
            }
            
        public function searchAlumno($nombre_buscado){
            $sql = "SELECT * FROM alumnos_has_especialidad ae
            JOIN alumnos a
            ON ae.alumnos_id = a.id
            JOIN especialidad e
            ON ae.especialidad_id = e.id_especialidad where nombres like '%$nombre_buscado%'";
            $res = mysqli_query($this->con, $sql);
            $return = ($res);
            return $return;
        }

        // Todo para la tabla especialidades

        public function mostrarEspecialidades(){
            $sql = "SELECT * FROM especialidad";
            $res = mysqli_query($this->con, $sql);

            return $res;
            return $sql;
        }

        public function insertarEspecialidad($nombre, $descripcion){
        $sql = "INSERT INTO `especialidad` (`id_especialidad`, `nombre`, `descripcion`) VALUES (NULL, '$nombre', '$descripcion')";

            $res = mysqli_query($this->con, $sql);
            if($res){
            return true;
            }else{
            return false;
            }
        }

        public function searchEspecialidad($nombre_buscado){
            $sql = "SELECT * FROM especialidad where nombre like '%$nombre_buscado%'";
            $res = mysqli_query($this->con, $sql);
            $return = ($res);
            return $return;
        }

        public function modificarEspecialidad($id_esp, $nombre, $descripcion){
            $sql = "UPDATE `especialidad` SET `nombre` = '$nombre', `descripcion` = '$descripcion' WHERE `especialidad`.`id_especialidad` = '$id_esp'";

            $res = mysqli_query($this->con, $sql);

            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarEspecialidad($id){
            $sql = "DELETE FROM `especialidad` WHERE `especialidad`.`id_especialidad` = '$id'";

            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function buscarEspecialidad($id){
            $sql = "SELECT * FROM especialidad WHERE id_especialidad = '$id'";
            $res = mysqli_query($this->con, $sql);

            $return = mysqli_fetch_object($res);
            return $return;
            }
            

        // Todo para la tabla usuarios

        public function mostrarUsuarios(){
            $sql = "SELECT * FROM usuarios";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function insertarUsuarios($nombre, $contraseña){
            $sql = "INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuario`, `contraseña`) VALUES (NULL, '$nombre', '$contraseña')";
    
                $res = mysqli_query($this->con, $sql);
                if($res){
                return true;
                }else{
                return false;
                }
            }

            public function searchUsuario($nombre_buscado){
                $sql = "SELECT * FROM usuarios where nombre_usuario like '%$nombre_buscado%'";
                $res = mysqli_query($this->con, $sql);
                $return = ($res);
                return $return;
            }

            public function modificarUsuario($id_usu, $nombre, $contraseña){
                $sql = "UPDATE `usuarios` SET `nombre_usuario` = '$nombre', `contraseña` = '$contraseña' WHERE `usuarios`.`id_usuarios` = '$id_usu'";

                $res = mysqli_query($this->con, $sql);
                if($res){
                    return true;
                }else{
                    return false;
                }
            }

            public function eliminarUsuario($id){
                $sql = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuarios` = '$id'";

                $res = mysqli_query($this->con, $sql);
                if($res){
                    return true;
                }else{
                    return false;
                }
            }

            public function buscarUsuario($id){
                $sql = "SELECT * FROM usuarios WHERE id_usuarios = '$id'";
                $res = mysqli_query($this->con, $sql);

                $return = mysqli_fetch_object($res);
                return $return;
                }

            // fin

    }
?> 