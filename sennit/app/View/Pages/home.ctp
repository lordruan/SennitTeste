<?php 
	//inicia o angular referente a este modulo
	echo $this->Html->script('app'.DS.'usuarios'.DS.'usuarios.module.js');
	echo $this->Html->script('app'.DS.'usuarios'.DS.'usuarios.controller.js');
	echo $this->Html->script('app'.DS.'usuarios'.DS.'usuarios-list.component.js');
 ?>
<div class="row" ng-controller="UsuariosController">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
			<form class="form-inline">
		        <div class="form-group">
		            <label >Pesquisar</label>
		            <input type="text" ng-model="search" class="form-control" placeholder="Pesquisar">
		        </div>
		    </form>
			<table class="table table-condensed" id="usuariosTable" >
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="usuario in usuarios|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
						<td>{{usuario.id}}</td>
						<td>{{usuario.nome}}</td>
						<td>{{usuario.email}}</td>
						<td>
							<a ng-click="editarUsuarios(usuario)" class="btn btn-warnning">Editar</a>
							<a ng-click="excluirUsuarios(usuario)" class="btn btn-danger">Excluir</a>
						</td>
					</tr>
				</tbody>
			</table>
			<dir-pagination-controls
		       max-size="5"
		       direction-links="true"
		       boundary-links="true" >
		    </dir-pagination-controls>
		</div>
		<div class="row">
			<p></p>
			<form name="form" novalidate>
				<input type="hidden" name="id" id="id" ng-model="usuario.id">
				<div class="form-group">
			    <label for="descricao">Nome</label>
			    <input type="text" class="form-control" ng-model="usuario.nome" placeholder="Descrição" name="pNome" required>
                <div ng-show="form.$submitted || form.pNome.$touched">
                    <div ng-show="form.pNome.$error.required">Preeencha seu nome.</div>
                </div>
			  </div>
			  <div class="form-group">
			    <label>E-mail</label>
			    <input type="email" class="form-control" ng-model="usuario.email" required name="pEmail" placeholder="e-mail">
			    <div ng-show="form.$submitted || form.pEmail.$touched">
                    <div ng-show="form.pEmail.$error.required">Preeencha seu email.</div>
                    <div ng-show="form.pEmail.$error.email">Utilize um email valido.</div>
                </div>
			  </div>
			  <button  type="submit" ng-click="salvar(usuario)" ng-disabled="form.$invalid" class="btn btn-success">Salvar</button>
			  <button  ng-click="usuario = null" class="btn btn-danger">Limpar</button>
			</form>
		</div>
	</div>
</div>

