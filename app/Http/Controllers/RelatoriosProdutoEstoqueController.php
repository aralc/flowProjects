<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdutoEstoque;

class RelatoriosProdutoEstoqueController extends Controller
{
    //
    
    public function produto()
    {
        if(view()->exists('reports.produto'))
        {
            $produto = ProdutoEstoque::paginate(1);
            return view('reports.produto')->with('produto',$produto);
        }
    }
}
