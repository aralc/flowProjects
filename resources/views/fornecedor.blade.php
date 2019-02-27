@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Fornecedor')

<script type="text/javascript">
	function apagar(url)
	{
	if (window.confirm('Deseja realmente apagar ?'))
		{
			window.location = url;
		}
	
	}
</script>

<script>
$(document).ready(function()
{	
	//alert('working');
	function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#fornecedorEndereco").val("");
        $("#fornecedorBairro").val("");
        $("#fornecedorCidade").val("");
        $("#fornecedorUf").val("");
        
    }
    
    //Quando o campo cep perde o foco.
    $("#fornecedorCep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#fornecedorEndereco").val("...");
                $("#fornecedorBairro").val("...");
                $("#fornecedorCidade").val("...");
                $("#fornecedorUf").val("...");
                //$("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#fornecedorEndereco").val(dados.logradouro);
                        $("#fornecedorBairro").val(dados.bairro);
                        $("#fornecedorCidade").val(dados.localidade);
                        $("#fornecedorUf").val(dados.uf);
                        //$("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>	

     <div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Cadastro de Fornecedor</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueCliForController@fornecedorIncluir');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-10">
                          		<select class="form-control" name="fornecedorEmpresa">
                        		 	<?php foreach ($empV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    } ?>
                        		</select>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-10">
                          		<select class="form-control" name="fornecedorLocal">
                        		 	<?php foreach ($locV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    } ?>
                        		</select>
                        		</div>
                      		</div>
                     		
                   		  <!-- Title -->
                   		  <div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Fornecedor</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="fornecedorCodigo" id="fornecedorCodigo" maxlength="4" size="4" value="{{ $find->id  ?? ''}}" required>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="fornecedorNome" id="fornecedorNome" maxlength="100"  placeholder="Nome da Empresa"  required>
                        		</div>
                      		</div>
                            <!-- Content -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorCnpj" id="fornecedorCnpj" maxlength="14" size="14" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                       		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CEP</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorCep" id="fornecedorCep" maxlength="30" size="30"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">UF</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorUf" id="fornecedorUf" maxlength="30" size="30"  required>
                        			</div>
                      			</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Endereco</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorEndereco" id="fornecedorEndereco" maxlength="30" size="30"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Cidade</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorCidade" id="fornecedorCidade" maxlength="30" size="30"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Bairro</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorBairro" id="fornecedorBairro" maxlength="20" size="20"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		
                      		
                      		
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Contato</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorContato" id="CnpjEmp" maxlength="30" size="30"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Email</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorEmail" id="CnpjEmp" maxlength="20" size="20"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      <!-- Cateogry -->
                      		
                      <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">telefone</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="EmailEmp" name="fornecedorTelefone" maxlength="12" size="12" >
                        	</div>
                      		</div>
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">SALVAR</button>
                          	<button type="reset" class="btn btn-danger">LIMPAR</button>
                          <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                <div class="widget-foot">
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
<div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Fornecedores</div>
           		<div class="widget-icons pull-right">
           			<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
           			<a href="#" class="wclose"><i class="fa fa-times"></i></a>
           		</div>
                			<div class="clearfix"></div>
        </div>
              <div class="panel-body">
              <div class="widget-foot">
              <table border=1 class="table table-striped table-hover">
            	<tr>
            		<td>Empresa</td>
            		<td>Local</td>
            		<td>Codigo</td>
            		<td>Nome</td>
            		<td>Cnpj</td>
            		<td>Contato</td>
            		<td>Telefone</td>
            		<td>Ação</td>
            	</tr>
            	<?php foreach($forV as $f) {?>
            	   <tr>
                        <td><?php echo $f->CodigoEmpresa;?></td>
                        <td><?php echo $f->CodigoLocal;?></td>
                        <td><?php echo $f->id;?></td>
                        <td><?php echo $f->Nome;?></td>
                        <td><?php echo $f->Cnpj;?></td>
                        <td><?php echo $f->Contato;?></td>
                        <td><?php echo $f->Telefone;?></td>
                        <td><a href="<?php echo action('CadastrosEstoqueCliForController@fornecedorEditar', array('CodigoEmpresa' => $f->CodigoEmpresa,'CodigoLocal' => $f->CodigoLocal,'Id' => $f->id ));?>"> <button type="submit" class="btn btn-default">EDITAR</button> </a>
						<a href="#" onclick="apagar('<?php echo action('CadastrosEstoqueCliForController@fornecedorDelete', array('CodigoEmpresa' => $f->CodigoEmpresa,'CodigoLocal' => $f->CodigoLocal,'Id' => $f->id ));?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
						</td>
            <!--        echo "<td><a href='".action("ClienteController@editar", $key)."'><span class='glyphicon glyphicon-pencil'>[editar]</span></a></td>"; -->
                   </tr>
                   <?php }?>
            	</table>              
                  {{ $forV->links() }}
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
        
        
        
        






@stop