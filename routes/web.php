<?php

use App\Http\Controllers\principalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
            //  Acesso inicial 
Route::get('/Principal', 'principalController@inicio');
           //  Rotas cadastros gerais empresa
Route::get('/Empresa','CadastrosGeraisController@empresa');
Route::post('/Empresa/incluir','CadastrosGeraisController@empresaIncluir');
Route::get('/Empresa/Editar/{Codigo}','CadastrosGeraisController@empresaEditar');
Route::post('/Empresa/Editar/Update/{Codigo}','CadastrosGeraisController@empresaUpdate');
Route::get('/Empresa/Delete/{Codigo}','CadastrosGeraisController@empresaDelete');
            //Rodas cadastros gerais local
Route::get('/Local','CadastrosGeraisLocalController@local');
Route::post('/Local/Incluir','CadastrosGeraisLocalController@localIncluir');
Route::get('/Local/Editar/{CodigoEmpresa}/{Codigo}','CadastrosGeraisLocalController@localEditar');
Route::post('/Local/Editar/Update/{CodigoEmpresa}/{Codigo}','CadastrosGeraisLocalController@localUpdate');
Route::get('/Local/Delete/{CodigoEmpresa}/{Codigo}','CadastrosGeraisLocalController@localDelete');
        // Rotas cadastros gerais usuarios 
Route::get('/Usuario','CadastrosGeraisUsuarioController@usuario');
Route::post('/Usuario/Incluir','CadastrosGeraisUsuarioController@usuarioIncluir');
        //ROtas para estoque 
Route::get('/Estoque','CadastrosEstoqueController@estoque');
Route::post('/Estoque/Incluir','CadastrosEstoqueController@estoqueIncluir');
Route::get('/Estoque/Editar/{CodigoEmpresa}/{CodigoLocal}/{Id}', 'CadastrosEstoqueController@estoqueEditar');
Route::post('/Estqoue/Editar/Update/','CadastrosEstoqueController@estoqueUpdate');
Route::get('/Estoque/Delete/{CodigoEmrpesa}/{CodigoLocal}/{Id}',"CadastrosEstoqueController@estoqueDelete");
        //Rotas para cadastro de item
Route::get('/Item','CadastrosEstoqueItemController@item');
Route::post('/Item/json','CadastrosEstoqueItemController@itemJson');
Route::post('/Item/Incluir','CadastrosEstoqueItemController@itemIncluir');
Route::get('/Item/Editar/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueItemController@itemEditar');
Route::post('/Item/Editar/Update','CadastrosEstoqueItemController@itemUpdate');
Route::get('/Item/Delete/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueItemController@itemDelete');
        //Rotas item segurança 
Route::get('/Estoque/ItemSeguranca','CadastrosEstoqueItemController@itemSeguranca');
Route::post('/Estoque/ItemSeguranca/Incluir','CadastrosEstoqueItemController@itemSegurancaIncluir');
Route::get('/Estoque/ItemSeguranca/Delete/{CodigoEmpresa}/{CodigoLocal}/{IdPS}','CadastrosEstoqueItemController@itemSegurancaDelete');
        //Rotas para Cliente e Fonecedor 
Route::get('/Estoque/Cliente','CadastrosEstoqueCliForController@cliente');
Route::get('/Estoque/Fornecedor','CadastrosEstoqueCliForController@fornecedor');
Route::post('/Estoque/Cliente/Incluir','CadastrosEstoqueCliForController@clienteIncluir');
Route::post('/Estoque/Fornecedor/Incluir','CadastrosEstoqueCliForController@fornecedorIncluir');
Route::get('/Estoque/Cliente/Editar/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueCliForController@clienteEditar');
Route::get('/Estoque/Fornecedor/Editar/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueCliForController@fornecedorEditar');
Route::post('/Estoque/Cliente/Update','CadastrosEstoqueCliForController@clienteUpdate');
Route::post('/Estoque/Forncedor/Update','CadastrosEstoqueCliForController@fornecedorUpdate');
Route::get('/Estoque/Cliente/Delete/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueCliForController@clienteDelete');
Route::get('/Estoque/Forncedor/Delete/{CodigoEmpresa}/{CodigoLocal}/{Id}','CadastrosEstoqueCliForController@fornecedorDelete');
        //Rotas movimento de estoque 
Route::get('/EntradaEstqoue','MovimentosEstoqueEntradaController@entrada');        
Route::post('/EntradaEstoque/Incluir', 'MovimentosEstoqueEntradaController@entradaIncluir');
Route::post('/EntradaEstoque/Item/Incluir', 'MovimentosEstoqueEntradaController@entradaItemIncluir');
Route::post('/EntradaEstoque/item/listar', 'MovimentosEstoqueEntradaController@entradaEstoqueItemDocumento');
        //Saida
Route::get('/RequisicaoEstoque','MovimentosEstoqueSaidaController@saida');
Route::post('/RequisicaoEstoque/Incluir','MovimentosEstoqueSaidaController@saidaIncluir');
Route::post('/RequisicaoEstoque/Item/Incluir','MovimentosEstoqueSaidaController@saidaItemIncluir');
Route::post('/RequisicaoEstoque/item/listar', 'MovimentosEstoqueSaidaController@saidaEstoqueItemSaida');
        // Rotas movimento de estoque 
Route::post('/Movimento/Entrada', 'MovimentosController@entradaEstoque');
Route::post('/Movimento/Saida', 'MovimentosController@saidaEstoque');

        //Relatorios 
        
Route::get('/Relatorios/Produto','RelatoriosProdutoEstoqueController@produto');




//

//Route::post('/EntradaEstoque/item/salvar', 'MovEstoqueController@entradaestoqueItemIncluir');







Route::get('/teste/{info}/{info2}', function () {
	echo  'teste';
});



        
        
        Route::get('/principal', 'PrincipalController@inicio');
        Route::get('/listar', 'PrincipalController@listar');
        
        //Route::get('/CadastroGeral', 'ControllerCadastrosG@menucg');
        //Route::get('/CadastroGEmpresa', 'ControllerCadastrosG@empresa'); //-> CadastrosGeraisController
        //Route::post('/CadastroGEmpresa/salvar','ControllerCadastrosG@empresaIncluir' );
       // Route::get('/CadastroGEmpresa/editar/{Codigo}', 'ControllerCadastrosG@empresaEditar');
        //Route::post('/CadastroGEmpresa/update/{Codigo}', 'ControllerCadastrosG@empresaUpdate');
        //Route::get('/CadastroGEmpresa/deletar/{Codigo}', 'ControllerCadastrosG@empresaDeletar');
        
        
        //Route::get('/CadastroGLocal', 'ControllerCadastrosG@local');
        //Route::post('/CadastroGLocal/salvar', 'ControllerCadastrosG@localIncluir');
        //Route::get('/CadastroGLocal/deletar/{CodigoEmpresa}/{Codigo}', 'ControllerCadastrosG@localDeletar');
     
        //Route::get('/CadastroGUsuario', 'ControllerCadastrosG@usuario');
        //Route::post('/CadastroGUsuario/salvar', 'ControllerCadastrosG@usuarioIncluir');
        
//        Route::get('/CadastroGUsuarioLocal','ControllerCadastrosG@GrupoUsuario');
  //      Route::post('/CadastroGUsuarioLocal/Salvar','ControllerCadastrosG@suarioLocalIncluir');
        
        
    //    Route::get('/CadastroSegUsuario', 'ControllerCadastrosG@seguranca');
      //  Route::post('/CadastroSegUsuario/Salvar', 'ControllerCadastrosG@segurancaIncluir');
        
        
        //Cadastros de estoque.
//        Route::get('/CadastroEstoque', 'CadEstoqueController@estoque'); //CadastroEstoqueController
//        Route::post('/CadastroEstoque/Salvar','CadEstoqueController@estoqueIncluir');
        
//        Route::get('/CadatroItem', 'CadEstoqueController@item');
  //      Route::post('/CadastroItem/salvar', 'CadEstoqueController@itemIncluir');
        
//        Route::get('/CadastroItemSeguranca', 'CadEstoqueController@itemSeg');
  //      Route::post('/CadastroItemSeguranca/salvar', 'CadEstoqueController@itemSegIncluir');
        
    //    Route::get('/CadastroFornecedor', 'CadEstoqueController@fornecedor');
        //Route::post('/CadastroFornecedor/salvar', 'CadEstoqueController@fornecedorIncluir');
        
//        Route::get('CadastroCliente','CadEstoqueController@cliente');
        //Route::post('CadastroCliente/salvar','CadEstoqueController@clienteIncluir');
        
        //Movimentos
        Route::get('/EntradaEstoque', 'MovEstoqueController@entradaestoque');
        // btn-gi - Route::get('/EntradaEstoque/salvar', 'MovEstoqueController@entradaestoqueIncluir');
        //Route::post('/EntradaEstoque/salvar', 'MovEstoqueController@entradaestoqueIncluir');
        //route::any('EntradaEstoque/salvar', [ 'uses' => 'MovEstoqueController@entradaestoqueIncluir' , 'nocsrf' => true ]);
        Route::post('/EntradaEstoque/salvar', 'MovEstoqueController@entradaestoqueIncluir');
       
        //Route::post('/EntradaEstoque/item/listar', 'MovEstoqueController@entradaestoqueItemDocumento');
        
        
        
        Route::get('/SaidaEstoque', 'MovEstoqueController@saidaestoque');
        Route::get('/AprovaSaida', 'MovEstoqueController@aprovasaida');
        Route::get('/SolicitacaoCompra', 'MovEstoqueController@solicitacaocompra');
        
        //Relatorios
        
        




?>