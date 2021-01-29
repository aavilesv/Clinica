<?php
interface IntClinica
{ 
    
    public function crearClinica(Clinicas $clinica);
    public function editarClinica(\Clinicas $clinica);    
    public function Activo($id);    
    public function Inactivo($id);    
    public function eliminarCompleto($id);
    public function consultarClinica($clinica);
    public function consultarTodosClinica();
            
}
