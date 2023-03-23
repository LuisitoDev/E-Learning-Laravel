<?php 

namespace App\Models;

interface CompraFields {
    const table_name = "compras";
    
    const UsuarioComprador_col = "UsuarioComprador";
    const CursoComprado_col = "CursoComprado";
    const FechaCreacionCompra_col = "FechaCreacionCompra";
    const ProgresoCursoComprado_col = "ProgresoCursoComprado";
    const FormaPago_col = "FormaPago";
    const Pago_col = "Pago";
    const FechaUltimaVisualizacion_col = "FechaUltimaVisualizacion";
    const FechaCompletado_col = "FechaCompletado";
}