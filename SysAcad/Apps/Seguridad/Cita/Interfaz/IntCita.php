<?php

interface IntCita {

    public function crearCita(EntCita $registro);

    public function editarCita(\EntCita $registro);

    public function eliminarCompleto($id);

    public function consultarCita($Id);

    public function consultarTodosCitas();

    public function Activo($id);

    public function Inactivo($id);
}
