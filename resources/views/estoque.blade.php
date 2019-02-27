@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Estoque')

<script type="text/javascript">
	function apagar(url)
	{
	if (window.confirm('Deseja realmente apagar ?'))
		{
			window.location = url;
		}
	
	}
</script>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueController@estoqueIncluir');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->


                      	

							<?php foreach($empV as $val) 
							{
							?>
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Empresa</label>
                        		<div class="col-lg-10">
                          		<!-- <input type="numeric" class="form-control" name="estoqueEmpresa" id="CodigoLoc" maxlength="4" size="4" required > -->
                          		<select class="form-control" name="estoqueEmpresa">
                          		<option value="<?php echo $val->Codigo;?>" > <?php echo $val->Nome;?> </option>
                          		</select>
                          		<?php } ?>
                          		
                        		</div>
                      		</div>
                      		
                      		
                      		<?php foreach($locV as $valL )
                      		{
                      		?>
                      			<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Local</label>
                        		<div class="col-lg-10">
                        		<select class="form-control" name="estoqueLocal">
                        			<option value="<?php echo $valL->Codigo;?>"> <?php echo $valL->Nome;?> </option>
                        		</select>
                        		<?php } ?>
                        		
                        		
                          		
                        		</div>
                      		</div>
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Id</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="estoqueId" id="CodigoLoc" maxlength="4" size="4" required >
                        		</div>
                      		</div>
                   		  
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Descricao Estoque</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="estoqueDescricao" id="NomeEmp" maxlength="20"  placeholder="Descrição do estoque" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                            
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">Tipo de Estoque</label>
                        			<div class="col-lg-10">
                          				<select class="form-control" name="estoqueTipo">
                                             <option value="">- Selecione -</option>
                                             <option value="Mv">Movimento</option>
                                             <option value="Mn">Manutenção</option>
                                         </select>
                        			</div>
                      			</div>
                      			</div>
                      		                    		
                      <br>
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">Salvar</button>
                          	<button type="reset" class="btn btn-danger">Reset</button>
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
          	<div class="pull-left">Usuários</div>
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
            		<td>Codigo Empresa</td>
            		<td>Codigo Local</td>
            		<td>Id</td>
            		<td>Descrição</td>
            		<td>Tipo Estoque</td>
            		<td>Ação</td>
            	</tr>
            	   <tr>
            	   	<?php foreach ($estV as $value) { ?>
                        <td><?php echo $value->CodigoEmpresa;?></td>
                        <td><?php echo $value->CodigoLocal;?></td>
                        <td><?php echo $value->Id;?></td>
                        <td><?php echo $value->DescricaoEstoque;?></td>
                        <td><?php echo $value->TipoEstoque;?></td>
                        <br>
                                                <td><a href="<?php echo action('CadastrosEstoqueController@estoqueEditar', array('CodigoEmpresa' => $value->CodigoEmpresa,'CodigoLocal' => $value->CodigoLocal,'Id' => $value->Id ));?>"> <button type="submit" class="btn btn-default">EDITAR</button> </a>
						<a href="#" onclick="apagar('<?php echo action('CadastrosEstoqueController@estoqueDelete', array('CodigoEmpresa' => $value->CodigoEmpresa,'CodigoLocal' => $value->CodigoLocal, 'Id' => $value->Id ));?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
                        </td>
                        
                        
            <!--        echo "<td><a href='".action("ClienteController@editar", $key)."'><span class='glyphicon glyphicon-pencil'>[editar]</span></a></td>"; -->
                   </tr>
                   <?php } ?>
            	</table>              
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
        
        
        
        






@stop