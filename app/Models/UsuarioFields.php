<?php 

namespace App\Models;

interface UsuarioFields {
    const table_name = "usuarios";
    
    const Id_col = "IdUsuario";
    const NombreUsuario_col = "NombreUsuario";
    const ApellidoPaternoUsuario_col = "ApellidoPaternoUsuario";
    const ApellidoMaternoUsuario_col = "ApellidoMaternoUsuario";
    const GeneroUsuario_col = "GeneroUsuario";
    const FechaNacimientoUsuario_col = "FechaNacimientoUsuario";
    const CorreoUsuario_col = "CorreoUsuario";
    const PasswordUsuario_col = "PasswordUsuario";
    const FechaCreacionUsuario_col = "FechaCreacionUsuario";
    const EstadoUsuario_col = "EstadoUsuario";
}