<?php



class CtrConsulta
{
    private $modelo;
    private $dao;

    public function __construct()
    {
        require_once("../Dao/DaoConsulta.php");
        require_once("../Modelo/EntConsulta.php");
        $this->dao = new DaoConsultaModel();
        $this->modelo = new Consulta();
    }

    public function getUsuario($usuario)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->buscar($usuario);
    }
    public function getUsu($usuario)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->buscarCab($usuario);
    }
    public function obtenerPaciente($nom,$tip)
    {
      switch ($tip) {
        case '1':
            $this->dao = new DaoConsultaModel();
            return $this->dao->consultarTodosPacHis($nom);
        break;
        case '2':
            $this->dao = new DaoConsultaModel();
            return $this->dao->consultarTodosPacCed($nom);
        break;
        case '3':
            $this->dao = new DaoConsultaModel();
            return $this->dao->consultarTodosPacNom($nom);
          break;

        default:
          # code...
          break;
      }

    }
    public function obtenerPacientes()
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->consultarTodosPacientes();
    }
    public function obtenerCitas($nom)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->consultarTodasCitas($nom);
    }
    public function obtenerCitasFecha($nom,$desde,$hasta)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->consultarCitasFechas($nom,$desde,$hasta);
    }
    public function obtenerCitaPaciente($nom)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->consultarCitaPaciente($nom);
    }
    public function obtenerFichaMedica($usuario)
    {
        $this->dao = new DaoConsultaModel();
        return $this->dao->buscarFicha($usuario);
    }

}
