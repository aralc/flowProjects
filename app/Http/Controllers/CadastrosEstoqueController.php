<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Estoque;
use App\Empresa;
use App\Local;

class CadastrosEstoqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function estoque()
    {
       $emp = Empresa::all();
       $loc = Local::all();
        $est = Estoque::all();
       
        
        if (view()->exists('estoque'))
        {
            return view('estoque')->with('estV',$est)->with('empV',$emp)->with('locV',$loc);
        }
    }
    
    public function estoqueIncluir()
    {
       $empresa = Request::input('estoqueEmpresa');
       $local = Request::input('estoqueLocal');
       $tipo = Request::input('estoqueTipo');
       $id = Request::input('estoqueId');
       $descricao = Request::input('estoqueDescricao');
            
      $Estoque = new Estoque();
      $Estoque->CodigoEmpresa = $empresa;
      $Estoque->CodigoLocal = $local;
      $Estoque->Id = $id;
      $Estoque->TipoEstoque = $tipo;
      $Estoque->DescricaoEstoque = $descricao;
      $Estoque->save();
      
      Return redirect()->action('CadastrosEstoqueController@estoque');
        
        
       
        
    }
    
    
    
    public function estoqueEditar($CodigoEmpresa,$CodigoLocal,$Id)
    {
        
        
        $estoque = Estoque::where('CodigoEmpresa',$CodigoEmpresa)
                            ->where('CodigoLocal',$CodigoLocal)
                            ->where('Id', $Id)
                            ->first();
            
            if (!empty($estoque))
            {
               return view('estoqueEditar')->with('estV',$estoque); 
            }
        
                            
              
    }
    
    public function estoqueUpdate()
    {
        $descricao = Request::input('estoqueDescricao');
        $empresa = Request::input('estoqueEmpresa');
        $local = Request::input('estoqueLocal');
        $id = Request::input('estoqueId');
        
        //return $empresa.  ' - '. $local .  ' - '.$descricao.  ' - '.$id; 
        
        
        $estoque = Estoque::where('CodigoEmpresa',$empresa)
                            ->where('CodigoLocal',$local)
                            ->where('Id',$id)
                            ->update(['DescricaoEstoque' => $descricao]);
        
                            return redirect()->action('CadastrosEstoqueController@estoque');
       
    }
    
    public function estoqueDelete($CodigoEmpresa,$CodigoLocal,$Id)
    {
        
        
        
        
                
        $estoque = Estoque::where('CodigoEmpresa',$CodigoEmpresa)
                            ->where('CodigoLocal',$CodigoLocal)
                            ->where('Id',$Id)
                            ->delete();
        
                            //return $empresa .'-'.'-'.$local.'-'.$id;
        return redirect()->action('CadastrosEstoqueController@estoque');                            
                            //return count($estoque);
                            
    }
    
    
    
}
