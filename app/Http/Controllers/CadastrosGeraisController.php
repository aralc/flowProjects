<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Empresa;
use Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
//use Validator;
//use Illuminate\Support\Facades\Redirect;


class CadastrosGeraisController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function empresa()
    {
        if(view()->exists('empresa'))
        {
            $emp = Empresa::all();
            return view('empresa')->with('empV',$emp);
        }
    }
    
    public function empresaIncluir()
    {
        $Nome = Request::input('NomeEmpresa');
        $Cnpj = Request::input('CnpjEmpresa');
        $Tipo = Request::input('TipoEmpresa');
        $Telefone = Request::input('TelefoneEmpresa');
        $Email = Request::input('EmailEmpresa');
                
            $empresa = new Empresa();
            $empresa->Cnpj = $Cnpj;
            $empresa->Nome = $Nome;
            $empresa->Tipo = $Tipo;
            $empresa->Email = $Email;
            $empresa->Telefone = $Telefone;
            $empresa->save();
            
            return redirect()->action('CadastrosGeraisController@empresa')->withInput(); //withInput devolve tudo que enviei para gravar na ultima requisição.
                
        
            
        
    }
    
    public function empresaEditar($Codigo)
    {
         if (view()->exists('empresa'))
         {
             $acao = "e";
             $emp = Empresa::find($Codigo);
                if (empty($emp))    
                {
                    return 'Empresa está vazio';
                }
                else 
                {
                    //return 'teste';
                     $emp->Nome;
                    //return view('empresa')->with('empV',$emp)->with('acaoV',$acao);
                    return view('empresaEditar')->with('empV',$emp);
                }
             
         }
    }
    
    public function empresaUpdate($Codigo)
    {
        $Nome = Request::input('NomeEmpresa');
        $Cnpj = Request::input('CnpjEmpresa');
        $Tipo = Request::input('TipoEmpresa');
        $Telefone = Request::input('TelefoneEmpresa');
        $Email = Request::input('EmailEmpresa');
        
            $empresa = Empresa::find($Codigo);
            $empresa->Cnpj = $Cnpj;
            $empresa->Nome = $Nome;
            $empresa->Telefone = $Telefone;
            $empresa->Email = $Email;
            $empresa->Tipo = $Tipo;
            $empresa->save();
            //return 'teste';
            return redirect()->action('CadastrosGeraisController@empresa');
        
    }
    
    public function empresaDelete($Codigo)
    {
        $empresa = Empresa::find($Codigo);
        if (empty($empresa))
        {
            return "error";
        }
        else
        {
            //return 'teste';
            $empresa->delete();
            return redirect()->action('CadastrosGeraisController@empresa');
        }
            
    }
    
    
    
}
