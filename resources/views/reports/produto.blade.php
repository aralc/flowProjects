@extends('principal')
@section('content')
@section('title_position','Movimentos')
@section('position', 'Movimentos / Entrada de Estoque')

<html>
<head>
<meta name="csrf_token" content="{!!csrf_token()!!}" />
</head>
<body>
        <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
              	  <div class="pull-left">Produtos em Estoque</div>
                	<div class="clearfix"></div>
              
                   			<div class="clearfix"></div>
        </div>
              <div class="panel-body">
              <div class="widget-foot">
                
                
                     <table border=1 class="table table-striped table-hover table-responsive">
                     <thead class="thead-dark">
            	<tr>
            	
            		<td>Codigo Empresa</td>
            		<td>Codigo Local</td>
            		<td>Codigo Item</td>
            		<td>Quantidade em Estoque</td>
            		<td>Ação</td>
            	</tr>
            	</thead>
            	   <?php foreach($produto as $i) {?>
            	   <tr>
                        <td><?php echo $i->CodigoEmpresa;?></td>
                        <td><?php echo $i->CodigoLocal;?></td>
                        <td><?php echo $i->Id;?></td>
                        <td><?php echo $i->Quantidade;?></td>
   			          <td><a href="#"> <button type="submit" class="btn btn-default">EDITAR</button> </a>
   			          	  <a href="#"> <button type="submit" class="btn btn-default">VISUALIZAR</button> </a>
   			          	  <a href="#"> <button type="submit" class="btn btn-default">ESTOQUE SEGURANCA</button> </a>
   			          	  <a href="#"> <button type="submit" class="btn btn-default">MOVIMENTOS ITEM</button> </a> 
   			          </td>                   <!-- Edit profile form (not working)-->
                   
				<?php  }
				echo $produto->links();
				?>
													

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

