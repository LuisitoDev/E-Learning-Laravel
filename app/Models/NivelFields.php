<?php 

namespace App\Models;

interface NivelFields {
    const table_name = "niveles";
    
    const Id_col = "IdNivel";
    const TituloNivel_col = "TituloNivel";
    const PathVideoNivel_col = "PathVideoNivel";
    const PathPDFNivel_col = "PathPDFNivel";
    const ContenidoNivel_col = "ContenidoNivel";
    const NivelGratis_col = "NivelGratis";
    const FechaCreacionNivel_col = "FechaCreacionNivel";
    const EstadoNivel_col = "EstadoNivel";
    const CursoImpartido_col = "CursoImpartido";
}