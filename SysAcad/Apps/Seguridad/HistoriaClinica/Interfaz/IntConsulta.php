<?php
interface IntConsulta
{
    public function consultarUsuario($usuario);
    public function consultarPacientes($usuario);
    public function consultarTodosPacNom($usuario);
    public function consultarTodosPacCed($usuario);
    public function consultarTodosPacHis($usuario);
    public function consultarTodosPacientes();
    public function consultarCitas($usuario);
    public function consultarCitasFechas($usuario,$desde,$hasta);
    public function consultarTodasCitas($usuario);
    public function consultarCitaPaciente($cita);
}
