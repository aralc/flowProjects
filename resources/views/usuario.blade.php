@extends('principal')
@section('content')
@section('title_position','Parametros Gerais')
@section('position', 'Paramestros Gerais / Cadastro de Usuário')
     <div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Cadastro de Usuário</div>
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


                    	
                       
                       
          			          
                    <form class="form-horizontal" action="<?php echo action('CadastrosGeraisUsuarioController@usuarioIncluir'); ?>" method="post">
                          <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                          
                          
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-2">
                        <select class="form-control" name="empresaUsuario">
                        		<?php foreach ($empV as $val) 
                        		{
                        		    echo "<option value=" . $val->Codigo . ">" . $val->Codigo. "-" . $val->Nome."</option>";
								 } 
								 ?>                                             		
                            </select>
                        		</div>
                      		</div>
                    	
                    	
                   		  
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome Completo</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" maxlength="50"  placeholder="Nome completo" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Login</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="loginUsuario" name="loginUsuario" maxlength="50"  placeholder="Login de usuario" required>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Senha</label>
                        		<div class="col-lg-10">
                          		<input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" maxlength="50"  placeholder="Nome do Usuario" required>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        					<label class="control-label col-lg-2">Grupo Usuario</label>
                        						<div class="col-lg-2">
                          						<select class="form-control" name="grupoUsuario" required>
                                             		<option value="">- Selecione -</option>
                                             		<option value="AdmS">Administrador Sistema</option>
                                             		<option value="AdmE">Administrador Empresa</option>
                                             		<option value="AdmEs">Administrador Estoque</option>
                                             		<option value="UsrR">Usuario de Relatorios</option>
                                         		</select>
                        						</div>
                      					</div>
                      		
	                    		
                        
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">Email</label>
                        		<div class="col-lg-10">
                          		<input type="email" class="form-control" id="emailUsuario" name="emailUsuario" maxlength="30" required>
                        	</div>
                      		</div>
                      				<div class="form-group">
		                        	<label class="control-label col-lg-2" for="tags">Telefone</label>
                        				<div class="col-lg-10">
                          				<input type="text" class="form-control" id="telefoneUsuario" maxlength=12 name="telefoneUsuario" >
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
          	<div class="pull-left">Usuarios</div>
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
            		<td>Id</td>
            		<td>Nome</td>
            		<td>Email</td>
            		<td>Permissão</td>
            		<td>Empresa</td>
            		<td>Ação</td>
            	</tr>
            	   <tr>
            	   <?php foreach ($usuV as $value){  ?>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo "permissão";  ?></td>
                        <td><?php echo"empresa" ; ?></td>
                        
                        <td><button type="submit" class="btn btn-default">Editar</button> </td>
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