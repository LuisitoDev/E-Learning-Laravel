<?php 

namespace App\Models;

interface ComentarioFields {
    const table_name = "comentarios";
    
    const Id_col = "IdComentario";
    const UsuarioComento_col = "UsuarioComento";
    const CursoComentado_col = "CursoComentado";
    const DescripcionComentario_col = "DescripcionComentario";
    const FechaCreacionComentario_col = "FechaCreacionComentario";
    const EstadoComentario_col = "EstadoComentario";
}