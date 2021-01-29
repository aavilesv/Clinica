<?php

interface IntConsulta {

    public function crearConsulta(EntConsulta $registro);

    public function editarConsulta(\EntConsulta $registro);

    public function eliminarCompleto($id);

    public function consultarConsulta($id);

    public function consultarTodosConsulta();

    public function Activo($id);

    public function Inactivo($id);
}
