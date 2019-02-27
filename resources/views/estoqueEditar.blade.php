@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Estoque')
     <div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Estoque</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueController@estoqueUpdate');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->

                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Empresa</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="estoqueEmpresa" id="CodigoLoc" maxlength="4" size="4" value="<?php echo $estV->CodigoEmpresa ;?>" readonly >
                        		</div>
                      		</div>
                      		
                      			<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Local</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="estoqueLocal" id="CodigoLoc" maxlength="4" size="4" value="<?php echo $estV->CodigoLocal; ?>" readonly>
                        		</div>
                      		</div>
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Id</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="estoqueId" id="CodigoLoc" maxlength="4" size="4" value="<?php echo $estV->Id;?>" readonly >
                        		</div>
                      		</div>
                   		  
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Descricao Estoque</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="estoqueDescricao" id="NomeEmp" maxlength="20"  placeholder="Descrição do estoque" value="<?php  echo $estV->DescricaoEstoque;?>" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                            
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">Tipo de Estoque</label>
                        			<div class="col-lg-10">
                          				<input type="text" class="form-control" name="estoquetTipo" id="estoqueTipoe" maxlength="20" value="<?php echo $estV->TipoEstoque;?>" readonly>
                        			</div>
                      			</div>
                      			</div>
                      		                    		
						<br>                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">Salvar</button>
                          	
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