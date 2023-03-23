<?php 

namespace App\Models;

interface CalificacionFields { 
    const table_name = "calificaciones";
    
    const UsuarioCalifico_col = "UsuarioCalifico";
    const CursoCalificado_col = "CursoCalificado";
    const UtilidadCalificacion_col = "UtilidadCalificacion";
    const FechaCreacionCalificacion_col = "FechaCreacionCalificacion";
    const EstadoCalificacion_col = "EstadoCalificacion";
}