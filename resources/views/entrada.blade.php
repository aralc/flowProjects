@extends('principal')
@section('content')
@section('title_position','Movimentos')
@section('position', 'Movimentos / Entrada de Estoque')

<html>
<head>
<meta name="csrf_token" content="{!!csrf_token()!!}" />
</head>
<body>
<script>
function apagar(url)
{
if (window.confirm('Deseja realmente apagar ?'))
	{
		window.location = url;
	}

}

function finalizar(url)
{
if (window.confirm('Deseja realmente finalizar o documento ?'))
	{
		window.location = url;
	}

}


		

</script>

<script>



$.ajaxSetup({
		headers: 
			{
			'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			}
		}); //ajax setup --fim

$(document).ready(function()
{	
	alert('working');

	/*
	$("#btn-fn").click(function()
			{
				alert('ok');
				var token = '<input type="hidden" value="{!!csrf_token()!!}" id="toMovi">' ;
				$('#MoviEstoque').html(token);
		 	 	alert(token);
			});
		*/
	
	$("#btn-gi").click(function()
	//$("#estoqueEntrada").submit(function()
			{
			var empresa = $("#Emp").val();
			var local = $("#loc").val();
			var documento = $("#cod").val();
			var tipodocumento = $("#tip").val();
        	var data = $("#estoqueDataDoc").val();
        	var dataEntrada = $("#dte").val();
        	var usuario = $("#usu").val();
			var fornecedor = $("#for").val();
			var valor = $("#val").val();
			var token = $("#tok").val();
			var tipodocumento = $("#tip").val();
				$.ajax({
					type:"POST",
					url: '<?php echo url("/EntradaEstoque/Incluir");?>',
					data: { 'estoqueEmpresa': $('input[name=estoqueEmpresa').val(),
					'estoqueLocal': $('input[name=estoqueLocal]').val(),
					'estoqueId' : $('input[name=estoqueId]').val(),
					'estoqueDataDoc' : $('input[name=estoqueDataDoc]').val(),
					'estoqueDataEnt' : $('input[name=estoqueDataEnt]').val(),
					'estoqueUsuario' : $('input[name=estoqueUsuario]').val(),
					'estoqueFornecedor' : $('input[name=estoqueFornecedor]').val(),
					'estoqueTipo' : tipodocumento,
					'estoqueValor' : $('input[name=estoqueValor]').val()
							},
						success: function(data)
								{
								console.log(data);
								$('#teste').html('documento' + documento + 'implantando');
								document.getElementById('btn-ie').disabled=false;
								
								}
								}); //fim ajax 
			});// funciont click 	

			$('#itE').blur(function()
					{
					alert('teste');
						$.ajax({
							type: "POST",
							url: '<?php echo url("/Item/json"); ?>',
							dataType: 'json',
							data: { 'estoqueEmpresa' : $('input[name=estoqueEmpresa]').val(),
									'estoqueLocal': $('input[name=estoqueLocal]').val(),
									'estoqueItem' : $('input[name=estoqueItem]').val()
							}, success: function(data)
											{
											//alert('teste 2');
											console.log(data);
											if(data == 0)
											{
											$("#itNome").val('Item não cadastrado');
											} else 
											{
												$("#itNome").val(data[0].Descricao);
												}
											
											
											}
						});				
					});
			
			

			$('#btn-ie').click(function()
				{
				//alert('teste btnE');
					$.ajax({
							type:"POST",
							url: '<?php echo url("/EntradaEstoque/Item/Incluir");?>',
							data: { 'estoqueEmpresa': $('input[name=estoqueEmpresa]').val(),
									'estoqueLocal': $('input[name=estoqueLocal]').val(),
									'estoqueId' : $('input[name=estoqueId]').val(),
									'estoqueDataEnt' : $('input[name=estoqueDataEnt]').val(),
									'estoqueItem' : $('input[name=estoqueItem]').val(),
									'estoqueQuantidade' : $('input[name=estoqueQuantidade]').val()
							},
						success: function(data)
								{
								console.log(data);
								$('#teste').html('Item implantando');
									$.ajax({
										type:"POST",
										url: '<?php echo url("/EntradaEstoque/item/listar");?>',
										dataType: 'json',
										data: { 'estoqueEmpresa': $('input[name=estoqueEmpresa').val(),
											'estoqueLocal': $('input[name=estoqueLocal]').val(),
											'estoqueId' : $('input[name=estoqueId]').val()
												}
												,success: function(data)
													{
													alert('Incluido');
													document.getElementById('btn-fn').disabled=false;
													var dados = ' <table  class="table table-striped table-hover"><tr>';
														dados += '	<td>Documento</td><td>Sequencia</td><td>Item</td>';
							                    		dados += '<td>Quantidade</td><td>Ação</td></tr>';
													
													for (i=0;data.length >i;i++)
													{
														dados += '<tr><td>' +data[i].IdDocumento +'</td>';
														dados += '<td>' +data[i].Sequencia + '</td>';
														dados += '<td>' +data[i].CodigoProduto + '</td>';
														dados += '<td>' +data[i].Quantidade + '</td>';
														dados += '<td> <button type="reset" class="btn btn-danger">EXCLUIR</button> </td></tr>';
														//$('#Doc').html(data[i].IdDocumento);
														//$('#Seq').html(data[i].Sequencia);
														//$('#Ite').html(data[i].CodigoProduto);
														//$('#Qtd').html(data[i].Quantidade);
														
													}	
													dados += '</table>';
														$('#dados').html(dados);
																																		
							                    				
													
												        				
													
													}
											});	
								
								}
								}); //fim ajax

					 
			
				});


}); // documento ready
</script>
	<div id="teste" class="alert" "alert-success"> 
	
	</div>
	


        
         <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Entrada de Estoque</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                     <!--  <form class="form-horizontal" method="post" action="<?php echo action('MovimentosEstoqueEntradaController@entradaIncluir');?>">-->
                     <form class="form-horizontal" method="post" action="<?php echo action('MovimentosController@entradaEstoque');?>">
                     <div id='MoviEstoque'>
                     
                     </div>
                    <input type="hidden" value="{!!csrf_token()!!}" id="tok">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Codigo Empresa</label>
                        <div class="col-lg-10">
                          <input type="numeric" class="form-control" name="estoqueEmpresa" id="Emp" value="<?php echo old('estoqueEmpresa'); ?>" maxlenght=4 required >
                        </div>
                      </div>
                              
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Codigo Local</label>
                        <div class="col-lg-10">
                          <input type="numeric" maxlenght=4 class="form-control" name="estoqueLocal" id="loc" value="<?php echo old('estoqueLocal');?>" >
                        </div>
                      </div>
                           
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Numero Doc Entrada</label>
                        <div class="col-lg-10">
                          <input type="text" maxlenght=15 name="estoqueId" class="form-control" id="cod" value="<?php echo old('estoqueId');?>" >
                        </div>
                    </div>
        			<div class="form-group">
                        <label class="control-label col-lg-2"  for="title">Data Documento</label>
                        <div class="col-lg-10">
                           <input type="date" class="form-control" name="estoqueDataDoc" id="estoqueDataDoc" value="<?php echo old('estoqueDataDoc');?>">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-lg-2">Tipo de Documento</label>
                        <div class="col-lg-10">
                          <select name="estoqueTipo" class="form-control"  id="tip" >
                                                  <option value="NFe">Nota Fiscal</option>
                                                  <option value="Sa">Sol. Armazen</option>                                                  
                                                  <option value="Rel">Relatorio</option>
                            </select>
                        </div>
                        </div>
                        
                       
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Data Entrada</label>
                        <div class="col-lg-10">
                           <input type="date"  class="form-control" name="estoqueDataEnt" id="dte" value="<?php echo old('estoqueDataEnt');?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Usuário</label>
                        <div class="col-lg-10">
                          <input type="text" masxlenght=50 class="form-control" name="estoqueUsuario" id="usu" value="<?php echo old('estoqueUsuario');?>">
                        </div>
                        </div>
        
                        
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Fornecedor</label>
                        <div class="col-lg-10">
                          <input type="numeric" masxlenght=4 class="form-control" name="estoqueFornecedor" id="for" value="<?php echo old('estoqueFornecedor');?>">
                        </div>
                        </div>
        
                        
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Nome Fornecedor</label>
                        <div class="col-lg-10">
                          <input type="text" masxlenght=4 class="form-control" id="nfo" value="<?php old('estoqueNomeFornecedor');?>">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Valor Documento</label>
                        <div class="col-lg-10">
                        
                          <input type="numeric" masxlenght=10 name="estoqueValor" class="form-control" id="val" value="<?php echo old('estoqueValor');?>">
                        </div>
                        </div>

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <!-- <a href="#" onclick="saveDoc('<?php echo action("MovEstoqueController@entradaestoqueIncluir");?>')"><button type="button" class="btn btn-primary">GRAVAR E INCLUIR ITENS</button></a> -->
                         <!--   <button type="button" class="btn btn-primary" id="btn-gi">GRAVAR E INCLUIR ITENS</button>-->
                          <!-- <button type="submit" class="btn btn-primary" >GRAVAR e INCLUIR - submit</button> -->
                          <button type="button" id="btn-gi" class="btn btn-primary">GRAVAR E INCLUIR ITENS</button>
                          <!--  <button type="reset" class="btn btn-danger">LIMPAR</button>-->
                          <!--  <button type="reset" class="btn btn-default">Reset</button>-->
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" id="btn-fn" disabled="disabled"> FINALIZA NOTA FISCAL</button>
                     </form> 
                  </div>


                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

          <div class="col-md-5 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Incluir Itens</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="#" id="estoqueItem">
                    <input type="hidden" value="{!!csrf_token()!!}" id="tok">
                       <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Item</label>
                        <div class="col-lg-10">
                          <input type="text" name="estoqueItem" class="form-control" id="itE">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Nome Item</label>
                        <div class="col-lg-10">
                          <input type="text" name="nomeItem" class="form-control" id="itNome" readonly>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">Quantidade</label>
                        <div class="col-lg-10">
                          <input type="text" name="estoqueQuantidade" class="form-control" id="itQ">
                        </div>
                      </div>
                      <!-- Cateogry -->
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="button" class="btn btn-primary" id="btn-ie" disabled="disabled" >INCLUIR ITEM</button>
                          <button type="reset" class="btn btn-danger">LIMPAR</button>
                          
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        
        
        <!-- marcos -->
        <div class="col-md-7 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Itens Incluidos</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                   
					<div id="dados">
						<td id="Doc"> </td>
						<td id="Seq"> </td>
						<td id="Ite"> </td>
						<td id="Qtd"> </td>
						<td id="Act"> <button type="reset" class="btn btn-danger">EXCLUIR</button> </td>
				

					</div>
										                    	
                    	
                    </table>
              
                  </div>


                </div>
                
              </div>
            </div>
 			
          </div>
          
          
          
        
       
       
        <!--  fim marcos -->
        <!-- project team & activity end -->
        
        <!--  itens incluidos na requisição  -->
        

</div>
      </body>
</html>
@stop

