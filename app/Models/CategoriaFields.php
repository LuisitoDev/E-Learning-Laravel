<?php 

namespace App\Models;

interface CategoriaFields { 
    const table_name = "categorias";
    
    const Id_col = "IdCategoria";
    const TituloCategoria_col = "TituloCategoria";
    const DescripcionCategoria_col = "DescripcionCategoria";
    const FechaCreacionCategoria_col = "FechaCreacionCategoria";
    const EstadoCategoria_col = "EstadoCategoria";
    const UsuarioCreador_col = "UsuarioCreador";
}