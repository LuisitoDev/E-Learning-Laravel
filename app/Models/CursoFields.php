<?php 

namespace App\Models;

interface CursoFields {
    const table_name = "cursos";
    
    const Id_col = "IdCurso";
    const TituloCurso_col = "TituloCurso";
    const DescripcionCurso_col = "DescripcionCurso";
    const ImagenCurso_col = "ImagenCurso";
    const CostoCurso_col = "CostoCurso";
    const FechaCreacionCurso_col = "FechaCreacionCurso";
    const EstadoCurso_col = "EstadoCurso";
    const UsuarioCreador_col = "UsuarioCreador";
}