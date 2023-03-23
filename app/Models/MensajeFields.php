<?php

namespace App\Models;

interface MensajeFields {
    const table_name = "mensajes";
    
    const Id_col = "IdMensaje";
    const UsuarioEnvia_col = "UsuarioEnvia";
    const UsuarioRecibe_col = "UsuarioRecibe";
    const DescripcionMensaje_col = "DescripcionMensaje";
    const FechaCreacionMensaje_col = "FechaCreacionMensaje";
    const EstadoMensaje_col = "EstadoMensaje";
}