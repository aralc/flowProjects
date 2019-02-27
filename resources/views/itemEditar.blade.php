@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Item')


     <div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
    <?php
    
            if (old('NomeEmpresa') && (count($errors) == 0))
            {
                echo "<div class='alert alert-success'>
                        <strong> SUCESSO </strong>
                </div>";
                
            }
            else if (count($errors)>0)
            {
                
                echo "<div class='alert alert-danger'>";
                    echo  count($errors);
                    echo "<ul>";
                    foreach($errors->all() as $error)
                    {
                       
                        echo "<li>".$error."</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    
            }

                    ?>
                    
        <div class="panel-heading">
          	<div class="pull-left">Cadstro de Item</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueItemController@itemUpdate');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Empresa</label>
                        		<div class="col-lg-10">
                        		<input type="numeric" class="form-control" name="itemEmpresa" id="itemEmpresa" value="<?php echo $iteV->CodigoEmpresa;?>" readonly>
                          		</div>
                      		</div>
                      			<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Local</label>
                        		<div class="col-lg-10">
                        		<input type="numeric" class="form-control" name="itemLocal" id="itemLocal" value="<?php echo $iteV->CodigoLocal;?>" readonly>
                          		
                        		</div>
                      		</div>
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="itemCodigo" id="itemCodigo" maxlength="10" size="10" value="<?php echo $iteV->Id;?>" readonly >
                        		</div>
                      		</div>
                   		  
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Descricao Produto</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="itemDescricao" id="itemDescricao" maxlength="40"  placeholder="Descrição do produto" value="<?php echo $iteV->Descricao;?>" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                            
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">Unidade de Medida</label>
                        			
                        			<div class="col-lg-10">
                          				<select class="form-control" name="itemUnidade" >
                          				  
                                             <option value="">- Selecione -</option>
                                             <option value="UN">Unidade</option>
                                             <option value="MT">Metro</option>
                                         </select>
                        			</div>
                      			</div>
                      			
                      			<div class="form-group">
		                        	<label class="control-label col-lg-2" for="tags"> Controle de Patrimonio </label>
                        				<div class="col-lg-10">
                        				<input type="checkbox" name="itemControle" value="1">Contr. Patrimonio
                          				<br>
                          				 <label class="control-label" for="title">Patrimonio</label>
                        					
                          					<input type="text" class="form-control" name="itemPatrimonio" id="itemPatrimonio" maxlength="40" value="<?php echo $iteV->CodigoPatrimonio;?>" placeholder="Descrição do produto" >
                        				
                        				</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">Classificção</label>
                        			<div class="col-lg-10">
                          				<select class="form-control" name="itemCriticidade" >
                                             <option value="">- Selecione -</option>
                                             <option value="C">Critico</option>
                                             <option value="M">Medio</option>
                                             <option value="B">Baixa</option>
                                         </select>
                        			</div>
                      			</div>
                      			
                      			
                      			
                      		                    		
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">SALVARr</button>
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
          	<div class="pull-left">Itens</div>
           		<div class="widget-icons pull-right">
           			<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
           			<a href="#" class="wclose"><i class="fa fa-times"></i></a>
           		</div>
                			<div class="clearfix"></div>
        </div>
              
            </div>
</div>

        <!-- </div>  -->
        
        
        
        






@stop
