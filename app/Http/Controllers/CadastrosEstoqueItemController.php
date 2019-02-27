<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Item;
use App\Empresa;
use App\Local;
use App\ItemSeguranca;
use Response;

class CadastrosEstoqueItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
        public function item()
        {
            $emp = Empresa::all();
            $loc = Local::all();
            $ite = Item::all();
            if (view()->exists('item'))
            {
                return view('item')->with('iteV',$ite)->with('empV',$emp)->with('locV',$loc);
            }
        }
        
        //json
        public function itemJson()
        {
            $empresa = Request::input('estoqueEmpresa');
            $local = Request::input('estoqueLocal');
            $produto = Request::input('estoqueItem');
            
            $itemJson = Item::where('CodigoEmpresa',$empresa)
                            ->where('CodigoLocal',$local)
                            ->where('Id',$produto)
                            ->get();
            
                            return Response::json($itemJson);
            //return view('MovEntradaEstoque')->with('IteDoc',$ItemDoc)->render();
        }
        
        
        public function itemIncluir()
        {
            $empresa = Request::input('itemEmpresa');
            $local = Request::input('itemLocal');
            $codigo = Request::input('itemCodigo');
            $descricao = Request::input('itemDescricao');
            $unidade = Request::input('itemUnidade');
            $controle = Request::input('itemControle');
            
              
                if ($controle == 1)
                    {
                    $patrimonio = Request::input('itemPatrimonio');
                    }
                    else 
                    {
                        $patrimonio = '000000';
                    }
            
            $classificacao = Request::input('itemCriticidade');
            
            
            
            $item = new Item();
            
            $item->CodigoEmpresa = $empresa;
            $item->CodigoLocal = $local;
            $item->Id = $codigo;
            $item->Descricao = $descricao;
            $item->UnidadeMedida = $unidade;
            $item->ControlaPatrimonio = $controle;
            $item->CodigoPatrimonio = $patrimonio;
            $item->Classificacao = $classificacao;
            $item->save();
            
            return redirect()->action('CadastrosEstoqueItemController@item');
            
            
        }
        
        public function itemEditar($CodigoEmpresa,$CodigoLocal,$Id)
        {
            if(view()->exists('itemEditar'))
            {
                
                
                
                $ite = Item::where('CodigoEmpresa',$CodigoEmpresa)
                           ->where('CodigoLocal',$CodigoLocal)
                           ->where('Id',$Id)
                            ->first();
                $item = $ite;
                if(!empty($ite))
                    {
                        return view('itemEditar')->with('iteV',$item);
                    }
            }
        }
        
        public function itemUpdate()
        {
            $empresa = Request::input('itemEmpresa');
            $local = Request::input('itemLocal');
            $codigo = Request::input('itemCodigo');
            $descricao = Request::input('itemDescricao');
            $unidade = Request::input('itemUnidade');
            $controle = Request::input('itemControle');
            
            
            if ($controle == 1)
            {
                $patrimonio = Request::input('itemPatrimonio');
            }
            else
            {
                $patrimonio = '0000000000000';
            }
            
            $classificacao = Request::input('itemCriticidade');
            
            $ite = Item::where('CodigoEmpresa',$empresa)
                        ->where('CodigoLocal',$local)
                        ->where('id',$codigo)
                        ->update(['Descricao' => $descricao,
                                  'UnidadeMedida' => $unidade,
                                   'ControlaPatrimonio' => $controle,
                                   'CodigoPatrimonio' => $patrimonio,
                                    'Classificacao' => $classificacao]);
                        
                        
            return redirect()->action('CadastrosEstoqueItemController@item');                        
                        
                        
        }
        
        public function itemDelete($CodigoEmpresa,$CodigoLocal,$Id)
        {
            $ite = Item::where('CodigoEmpresa',$CodigoEmpresa)
                        ->where('CodigoLocal',$CodigoLocal)
                        ->where('Id',$Id)
                        ->get();
            
                        if(!empty($ite))
                            {
                            $item = Item::where('CodigoEmpresa',$CodigoEmpresa)
                                        ->where('CodigoLocal',$CodigoLocal)
                                        ->where('Id',$Id)
                                        ->delete();
                            
                            return redirect()->action('CadastrosEstoqueItemController@item');                                        
                            }
                            else 
                                {
                                echo "dev null";    
                                }
        }
        
        //item segurança
        
        public function itemSeguranca()
        {
            if(view()->exists('itemSeguranca'))
            {
                $emp = Empresa::all();
                $loc = Local::all();
                $ite = Item::all();
                $iteS = ItemSeguranca::all();
                    return view('itemSeguranca')->with('iteVS',$iteS)->with('empV',$emp)->with('locV',$loc)->with('iteV',$ite);
                
            }
        }
        
        public function itemSegurancaIncluir()
        {
            $empresa = Request::input('itemSegEmpresa');
            $local = Request::input('itemSegLocal');
            $codigo = Request::input('itemSegCodigo');
            $quantidadeSeg = Request::input('itemSegQuantidade');
            $quantidadeSegComp = Request::input('itemSegQuantidadeCom');
            
            $iteSegur = new ItemSeguranca();
            $iteSegur->CodigoEmpresa = $empresa;
            $iteSegur->CodigoLocal = $local;
            $iteSegur->IdPS = $codigo;
            $iteSegur->EstoqueMinimo = $quantidadeSeg;
            $iteSegur->EstoqueCompraAut = $quantidadeSegComp;
            $iteSegur->save();
            
            return redirect()->action('CadastrosEstoqueItemController@itemSeguranca');
        }
        
        public function itemSegurancaDelete($CodigoEmpresa,$CodigoLocal,$IdPS)
            {
                $iteS = ItemSeguranca::where('CodigoEmpresa',$CodigoEmpresa)
                                        ->where('CodigoLocal',$CodigoLocal)
                                        ->where('IdPS',$IdPS)
                                        ->delete();
                
                return redirect()->action('CadastrosEstoqueItemController@itemSeguranca');                                        
            }
        
        
        
}
