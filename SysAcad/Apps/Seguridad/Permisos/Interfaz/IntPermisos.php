<?php
interface IntPermisos
{
    public function crearPermisos(EntPermisos $Permisos);
    public function editarPermisos(\EntPermisos $Permisos);
    public function eliminarPermisos($id);
    public function consultarPermiso($Permisos);
    public function consultarRol();
    public function consultarModulosPadre();
}
