<?php

/**
 * Entidad USUARIO
 */
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntConsulta.php');
require_once('../Modelo/EntPaciente.php');
require_once('../Modelo/EntFichaMedica.php');
require_once('../Modelo/EntCita.php');
require_once('../Interfaz/IntConsulta.php');

class DaoConsultaModel extends DBAAbstractModel implements IntConsulta {

    public function __construct() {
        parent::__construct(); // 1ro Inicializa constructor padre
        $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
    }

        public function consultarUsuario($usuario) {

        try {
            $sql = "select c.Con_Id , p.PAC_Nombre, p.PAC_Apellido, d.Doc_Nombre, d.Doc_Apellido,
       c.Con_Altura,c.Con_Peso,c.Con_Respiracion,c.Con_Pulsaciones,c.Con_Temperatura,c.Con_Exploracion,c.Con_Diagnostico,c.Con_Receta
       ,c.Con_Observacion,c.Con_Fecha
      from consulta1 c, paciente p, doctor d where c.Pac_Id= p.PAC_Id and c.Doc_Id=d.Doc_Id and c.Con_Estado=1 and p.PAC_Nombre =?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuarios = null;
            if ($tmp = $rs->fetch_object()) {
                $usuarios = new Consulta($tmp->Con_Id, $tmp->PAC_Nombre, $tmp->PAC_Apellido, $tmp->Doc_Nombre, $tmp->Doc_Apellido, $tmp->Con_Altura, $tmp->Con_Peso, $tmp->Con_Respiracion, $tmp->Con_Pulsaciones, $tmp->Con_Temperatura, $tmp->Con_Exploracion, $tmp->Con_Diagnostico, $tmp->Con_Receta, $tmp->Con_Observacion, $tmp->Con_Fecha);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function buscar($id) {
        $dato = null;
        try {

            $sql = 'select c.CON_Id,c.PRO_Id,c.FIC_Id,c.CIT_Id,pr.PRO_Nombre,pr.PRO_Apellido,pr.PRO_Cedula,
            e.ENF_Descripcion,c.CON_Diagnostico,c.CON_Receta,c.CON_PArte,c.CON_Pulsa,c.CON_RRespi,c.CON_Temp as CON_Tem,
            c.CON_Altura,c.CON_Peso,c.CON_Imc,c.CON_Edad, c.CON_Estado ,ci.CIT_Fecha
            from consulta  c, enfermedades  e,
            profesional pr, cita  ci where c.CIT_Id=ci.CIT_Id and e.ENF_Id=c.ENF_Id and pr.PRO_Id=c.PRO_Id and c.CIT_Id= ?';
            $stmp = $this->getConexion()->prepare($sql);
            $stmp->bind_Param('i', $id);
            $stmp->execute();
            $pt = $stmp->get_result();
            if ($tmp = $pt->fetch_object()) {
                $dato = new Consulta($tmp->CON_Id, $tmp->PRO_Id, $tmp->FIC_Id, $tmp->CIT_Id,
                $tmp->PRO_Nombre, $tmp->PRO_Apellido,$tmp->PRO_Cedula, $tmp->ENF_Descripcion,
                $tmp->CON_Diagnostico, $tmp->CON_Receta, $tmp->CON_PArte, $tmp->CON_Pulsa,
                $tmp->CON_Tem, $tmp->CON_RRespi, $tmp->CON_Altura, $tmp->CON_Peso, $tmp->CON_Imc,
                $tmp->CON_Edad, $tmp->CON_Estado, $tmp->CIT_Fecha);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dato;
    }

    public function buscarCab($id) {
      $dato = null;
      try {

          $sql = 'select p.PAC_Id, p.PAC_Nombre,p.PAC_Apellido, PAC_Foto from paciente p where p.PAC_Estado=1 and p.PAC_Id =?';
          $stmp = $this->getConexion()->prepare($sql);
          $stmp->bind_Param('s', $id);
          $stmp->execute();
          $pt = $stmp->get_result();
          if ($tmp = $pt->fetch_object()) {
              $dato = new Paciente($tmp->PAC_Id, $tmp->PAC_Nombre, $tmp->PAC_Apellido, $tmp->PAC_Foto );
          }
      } catch (Exception $exc) {
          echo $exc->getTraceAsString();
      }
      return $dato;
    }

    //Pacientes busqueda
    public function consultarPacientes($usuario) {

        try {
            $sql = "select c.Con_Id , p.PAC_Nombre, p.PAC_Apellido, d.Doc_Nombre, d.Doc_Apellido,
       c.Con_Altura,c.Con_Peso,c.Con_Respiracion,c.Con_Pulsaciones,c.Con_Temperatura,c.Con_Exploracion,c.Con_Diagnostico,c.Con_Receta
       ,c.Con_Observacion,c.Con_Fecha
      from consulta1 c, paciente p, doctor d where c.Pac_Id= p.PAC_Id and c.Doc_Id=d.Doc_Id and c.Con_Estado=1 and p.PAC_Nombre =?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuarios = null;
            if ($tmp = $rs->fetch_object()) {
                $usuarios = new Consulta($tmp->Con_Id, $tmp->PAC_Nombre, $tmp->PAC_Apellido, $tmp->Doc_Nombre, $tmp->Doc_Apellido, $tmp->Con_Altura, $tmp->Con_Peso, $tmp->Con_Respiracion, $tmp->Con_Pulsaciones, $tmp->Con_Temperatura, $tmp->Con_Exploracion, $tmp->Con_Diagnostico, $tmp->Con_Receta, $tmp->Con_Observacion, $tmp->Con_Fecha);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function consultarTodosPacNom($nom) {
        $usuarios = array();
        try {
            $sql = "select p.PAC_Id, p.PAC_Nombre, p.PAC_Apellido,p.PAC_Foto, p.PAC_Cedula, p.PAC_Sexo,
            p.PAC_Telefono, p.PAC_FecNac, p.PAC_Edad, p.PAC_Ciudad, p.PAC_TipSangre,
            p.PAC_NumReg, p.PAC_Estado from paciente p where UPPER(p.PAC_Nombre) lIKE UPPER('$nom%') ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($paciente = $rs->fetch_object())) {
                $usuarios[] = new Paciente($paciente->PAC_Id, $paciente->PAC_Nombre, $paciente->PAC_Apellido,$tmp->PAC_Foto ,$paciente->PAC_Cedula, $paciente->PAC_Sexo, $paciente->PAC_Telefono, $paciente->PAC_FecNac, $paciente->PAC_Edad, $paciente->PAC_Ciudad, $paciente->PAC_TipSangre, $paciente->PAC_NumReg, $paciente->PAC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }
    public function consultarTodosPacCed($nom) {
        $usuarios = array();
        try {
            $sql = "select p.PAC_Id, p.PAC_Nombre, p.PAC_Apellido, p.PAC_Cedula, p.PAC_Sexo,
            p.PAC_Telefono, p.PAC_FecNac, p.PAC_Edad, p.PAC_Ciudad, p.PAC_TipSangre,
            p.PAC_NumReg, p.PAC_Estado from paciente p where UPPER(p.PAC_Cedula) lIKE UPPER('$nom%') ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($paciente = $rs->fetch_object())) {
                $usuarios[] = new Paciente($paciente->PAC_Id, $paciente->PAC_Nombre, $paciente->PAC_Apellido, $paciente->PAC_Cedula, $paciente->PAC_Sexo, $paciente->PAC_Telefono, $paciente->PAC_FecNac, $paciente->PAC_Edad, $paciente->PAC_Ciudad, $paciente->PAC_TipSangre, $paciente->PAC_NumReg, $paciente->PAC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }
    public function consultarTodosPacHis($nom) {
        $usuarios = array();
        try {
            $sql = "select p.PAC_Id, p.PAC_Nombre, p.PAC_Apellido, p.PAC_Cedula, p.PAC_Sexo,
            p.PAC_Telefono, p.PAC_FecNac, p.PAC_Edad, p.PAC_Ciudad, p.PAC_TipSangre,
            p.PAC_NumReg, p.PAC_Estado from paciente p where UPPER(p.PAC_Id) lIKE UPPER('$nom%') ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($paciente = $rs->fetch_object())) {
                $usuarios[] = new Paciente($paciente->PAC_Id, $paciente->PAC_Nombre, $paciente->PAC_Apellido, $paciente->PAC_Cedula, $paciente->PAC_Sexo, $paciente->PAC_Telefono, $paciente->PAC_FecNac, $paciente->PAC_Edad, $paciente->PAC_Ciudad, $paciente->PAC_TipSangre, $paciente->PAC_NumReg, $paciente->PAC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function consultarTodosPacientes() {
        $usuarios = array();
        try {
            $sql = "select p.PAC_Id, p.PAC_Nombre, p.PAC_Apellido, p.PAC_Cedula, p.PAC_Sexo,
            p.PAC_Telefono, p.PAC_FecNac, p.PAC_Edad, p.PAC_Ciudad, p.PAC_TipSangre,
            p.PAC_NumReg, p.PAC_Estado from paciente p where p.PAC_Estado=1 ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($paciente = $rs->fetch_object())) {
                $usuarios[] = new Paciente($paciente->PAC_Id, $paciente->PAC_Nombre, $paciente->PAC_Apellido, $paciente->PAC_Cedula, $paciente->PAC_Sexo, $paciente->PAC_Telefono, $paciente->PAC_FecNac, $paciente->PAC_Edad, $paciente->PAC_Ciudad, $paciente->PAC_TipSangre, $paciente->PAC_NumReg, $paciente->PAC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function consultarCitas($usuario) {

        try {
            $sql = "select c.Con_Id , p.PAC_Nombre, p.PAC_Apellido, d.Doc_Nombre, d.Doc_Apellido,
       c.Con_Altura,c.Con_Peso,c.Con_Respiracion,c.Con_Pulsaciones,c.Con_Temperatura,c.Con_Exploracion,c.Con_Diagnostico,c.Con_Receta
       ,c.Con_Observacion,c.Con_Fecha
      from consulta1 c, paciente p, doctor d where c.Pac_Id= p.PAC_Id and c.Doc_Id=d.Doc_Id and c.Con_Estado=1 and p.PAC_Nombre =?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuarios = null;
            if ($tmp = $rs->fetch_object()) {
                $usuarios = new Consulta($tmp->Con_Id, $tmp->PAC_Nombre, $tmp->PAC_Apellido, $tmp->Doc_Nombre, $tmp->Doc_Apellido, $tmp->Con_Altura, $tmp->Con_Peso, $tmp->Con_Respiracion, $tmp->Con_Pulsaciones, $tmp->Con_Temperatura, $tmp->Con_Exploracion, $tmp->Con_Diagnostico, $tmp->Con_Receta, $tmp->Con_Observacion, $tmp->Con_Fecha);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function consultarTodasCitas($nom) {
        $usuarios = array();
        try {
            $sql = "select c.CIT_Id, p.PAC_Nombre , p.PAC_Apellido,p.PAC_Sexo, pr.PRO_Nombre, pr.PRO_Apellido
       ,c.CIT_Fecha, c.CIT_Turno, c.CIT_Duracion, c.CIT_Estado  from cita c, paciente p , profesional pr where p.PAC_Id=c.PAC_Id and pr.PRO_Id= c.PRO_Id and c.PAC_Id =? ";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bind_Param('s', $nom);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($cita = $rs->fetch_object())) {
                $usuarios[] = new Cita($cita->CIT_Id, $cita->PAC_Nombre, $cita->PAC_Apellido, $cita->PAC_Sexo, $cita->PRO_Nombre, $cita->PRO_Apellido, $cita->CIT_Fecha, $cita->CIT_Turno, $cita->CIT_Duracion, $cita->CIT_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }
    public function consultarCitasFechas($nom,$desde,$hasta) {
        $usuarios = array();
        try {
            $sql = "select c.CIT_Id, p.PAC_Nombre , p.PAC_Apellido,p.PAC_Sexo, pr.PRO_Nombre, pr.PRO_Apellido
           ,c.CIT_Fecha, c.CIT_Turno, c.CIT_Duracion, c.CIT_Estado
           from cita c, paciente p , profesional pr
           where p.PAC_Id=c.PAC_Id and pr.PRO_Id= c.PRO_Id and c.PAC_Id =$nom and c.CIT_Fecha BETWEEN '$desde' and '$hasta' ";
            $stmt = $this->getConexion()->prepare($sql);
          //  $stmt->bind_Param('s', $nom);
            $stmt->execute();
            $rs = $stmt->get_result();
            while (($cita = $rs->fetch_object())) {
                $usuarios[] = new Cita($cita->CIT_Id, $cita->PAC_Nombre, $cita->PAC_Apellido, $cita->PAC_Sexo, $cita->PRO_Nombre, $cita->PRO_Apellido, $cita->CIT_Fecha, $cita->CIT_Turno, $cita->CIT_Duracion, $cita->CIT_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }

    public function consultarCitaPaciente($cita) {
        try {
            $sql = "select  p.PAC_Id,p.PAC_Nombre,p.PAC_Apellido,p.PAC_Cedula,p.PAC_Sexo,p.PAC_Estado from cita ci, paciente p where p.PAC_Id=ci.PAC_Id and ci.CIT_Id=?";
            $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
            $stmt->bind_param('s', $cita); //Agrega variables a una sentencia preparada como parámetros
            $stmt->execute();
            $rs = $stmt->get_result();
            $usuarios = null;
            if ($tmp = $rs->fetch_object()) {
                $usuarios = new Paciente($tmp->PAC_Id, $tmp->PAC_Nombre, $tmp->PAC_Apellido, $tmp->PAC_Cedula, $tmp->PAC_Sexo, $tmp->PAC_Estado);
            }
            $rs->close();
        } catch (Exception $ex) {
            throw $ex->getMessage();
        }
        return $usuarios;
    }
     public function buscarFicha($id) {
        $dato = null;
        try {

            $sql = 'select FIC_Id,FIC_Antecedentes,FIC_Alergias,FIC_Tratamiento,FIC_Familiares,FIC_Estado from fichamedica where FIC_Id=?';
            $stmp = $this->getConexion()->prepare($sql);
            $stmp->bind_Param('i', $id);
            $stmp->execute();
            $pt = $stmp->get_result();
            if ($tmp = $pt->fetch_object()) {
                $dato = new FichaMedica($tmp->FIC_Id, $tmp->FIC_Antecedentes, $tmp->FIC_Alergias, $tmp->FIC_Tratamiento, $tmp->FIC_Familiares ,  $tmp->FIC_Estado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dato;
    }

}

#Fin de la clase modelo Usuario
