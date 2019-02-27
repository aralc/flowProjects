@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Fornecedor')
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueCliForController@fornecedorUpdate');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-10">
                          		<input class="form-control" name="fornecedorEmpresa" value="<?php echo $forV->CodigoEmpresa; ?>" readonly>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-10">
                          		<input class="form-control" name="fornecedorLocal" value="<?php echo $forV->CodigoLocal; ?>" readonly>
                        		</div>
                      		</div>
                     		
                   		  <!-- Title -->
                   		  <div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Fornecedor</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="fornecedorCodigo" id="CodigoEmp" maxlength="4" size="4" value="<?php echo $forV->id;?>" readonly>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="fornecedorNome" id="NomeEmp" maxlength="100"  value="<?php echo $forV->Nome; ?>" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorCnpj" id="CnpjEmp" maxlength="14" size="14" value="<?php echo $forV->Cnpj; ?>"required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Endereco</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorEndereco" id="CnpjEmp" maxlength="30" size="30" value="<?php echo $forV->Endereco;?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Cidade</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorCidade" id="CnpjEmp" maxlength="30" size="30" value="<?php echo $forV->Bairro; ?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Bairro</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorBairro" id="CnpjEmp" maxlength="20" size="20" value="<?php echo $forV->Bairro;?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		
                      		
                      		
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Contato</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorContato" id="CnpjEmp" maxlength="30" size="30" value="<?php echo $forV->Contato; ?> " required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Email</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="fornecedorEmail" id="CnpjEmp" maxlength="20" size="20" value="<?php echo $forV->Email;?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      <!-- Cateogry -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">UF</label>
                        			<div class="col-lg-10">
                          				<select class="form-control" name="fornecedorUf">
                                             <option value="">- Selecione -</option>
                                             <option value="MG">Minas Gerais</option>
                                             <option value="SP">São Paulo</option>
                                         </select>
                        			</div>
                      			</div>
                      <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">telefone</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="EmailEmp" name="fornecedorTelefone" value="<?php echo $forV->Telefone;?>">
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

</div>

        <!-- </div>  -->
        
        
        
        






@stop