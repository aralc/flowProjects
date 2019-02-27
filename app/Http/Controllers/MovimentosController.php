<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Request;
use App\ItemDocumentoEntrada;
use App\MovimentoEstoque;
use App\Estoque;
use App\ProdutoEstoque;
use App\ItemRequisicao;
//use Response;


class MovimentosController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function entradaEstoque()
    {
      
        
         $empresa = Request::input('estoqueEmpresa');
          $local = Request::input('estoqueLocal');
         $documento = Request::input('estoqueId');
         $data = Request::input('estoqueDataDoc');
         $valor = Request::input('estoqueValor');
         
         $itemMovimento = ItemDocumentoEntrada::where('CodigoEmpresa', $empresa)
         ->where('CodigoLocal',$local)
         ->where('IdDocumento',$documento)
         ->get();
         
         foreach ($itemMovimento as $i)
         {
             $movimentoEstoque = new MovimentoEstoque();
             $movimentoEstoque->CodigoEmpresa = $i->CodigoEmpresa;
             $movimentoEstoque->CodigoLocal = $i->CodigoLocal;
             $movimentoEstoque->Documento = $i->IdDocumento;
             $movimentoEstoque->CodigoProduto = $i->CodigoProduto;
             $movimentoEstoque->TipoMovimentação  = 'E';
             $movimentoEstoque->IdEstoque = 1;
             $movimentoEstoque->QuantidadeEstoque = 0; // tratar para levar o saldo em estoque dos produtos na posição atual 
             $movimentoEstoque->Quantidade = $i->Quantidade;
             $movimentoEstoque->DataMovimento = $i->DataDocumento;
             $movimentoEstoque->valor = 1; //tbItemDocumentoEntrada.valor;
             $movimentoEstoque->save();
             
             $estoqueProdutoSaldo = ProdutoEstoque::where('CodigoEmpresa',$empresa)
             ->where('CodigoLocal',$local)
             ->where('Id',$i->CodigoProduto)
             ->get();
             
             
             
             foreach ($estoqueProdutoSaldo as $ie)
             {
                 
                 //echo $ie->Quantidade;
                 $saldo = $ie->Quantidade + $i->Quantidade;
                 echo $ie->Id .'-'. $saldo .'<br>';
                 
                 $estoqueProduto = ProdutoEstoque::where('CodigoEmpresa',$ie->CodigoEmpresa)
                 ->where('CodigoLocal', $ie->CodigoLocal)
                 ->where('Id',$ie->Id)
                 ->update(['Quantidade' => $saldo]);
                 
                
             }
             
             
          
           //

  /*
   * -- tem que incluir na tbMovimentoEstoque -- 'Sequencia', 'int(4)', 'NO', 'PRI', NULL, ''
'Valor', 'double(10,2)', 'YES', '', NULL, '' -- tem que ser por item e nao por documento.
'CodigoPatrimonio', 'varchar(20)', 'YES', '', NULL, '' -- tem que ser por item e nao por documento
--'updated_at', 'datetime', 'YES', '', NULL, ''
--'created_at', 'datetime', 'YES', '', NULL, ''
*/
    
         }
         return redirect()->action('MovimentosEstoqueEntradaController@entrada');
    }
    
    public function saidaEstoque()
    {
        $empresa = Request::input('saidaEmpresa');
        $local = Request::input('saidaLocal');
        $requisicao = Request::input('saidaId');
            
        $itemMovimento = ItemRequisicao::where('CodigoEmpresa',$empresa)
                                    ->where('CodigoLocal',$local)
                                    ->where('IdRequisicao',$requisicao)
                                    ->get();
        
        foreach ($itemMovimento as $i)
        {
            $movimentoEstoqueSaida = new MovimentoEstoque();
            $movimentoEstoqueSaida->CodigoEmpresa = $i->CodigoEmpresa;
            $movimentoEstoqueSaida->CodigoLocal = $i->CodigoLocal;
            $movimentoEstoqueSaida->Documento = $i->IdRequisicao;
            $movimentoEstoqueSaida->CodigoProduto = $i->CodigoProduto;
            $movimentoEstoqueSaida->TipoMovimentação = 'S';
            $movimentoEstoqueSaida->IdEstoque = 1;
            $movimentoEstoqueSaida->QuantidadeEstoque = 0;
            $movimentoEstoqueSaida->Quantidade = $i->Quantidade;
            $movimentoEstoqueSaida->DataMovimento = $i->DataRequisicao;
            $movimentoEstoqueSaida->valor = 1;
            $movimentoEstoqueSaida->save();
            
             $estoqueProdutoSaldo = ProdutoEstoque::where('CodigoEmpresa',$empresa)
                                                ->where('CodigoLocal', $local)
                                                ->where('Id',$i->CodigoProduto)
                                                ->get();
                                                
            foreach ($estoqueProdutoSaldo as $ie)
            {
                $saldo = $ie->Quantidade - $i->Quantidade;
                
                $estoqueProduto = ProdutoEstoque::where('CodigoEmpresa',$ie->CodigoEmpresa)
                                                ->where('CodigoLocal',$ie->CodigoLocal)
                                                ->where('Id',$ie->Id)
                                                ->update(['Quantidade' => $saldo]);
                
                
                                                
                
            }
            
        }
        return redirect()->action('MovimentosEstoqueSaidaController@saida');
    }
    
    
    
}