'use strict';
angular.
module('usuarios').
component('usuariosList',{
	template:
		'<form class="form-inline">'+
	        '<div class="form-group">'+
	            '<label >Pesquisar</label>'+
	            '<input type="text" ng-model="search" class="form-control" placeholder="Pesquisar">'+
	        '</div>'+
	    '</form>'+
		'<table class="table table-condensed" id="usuariosTable" >'+
			'<thead>'+
				'<tr>'+
					'<th>Nome</th>'+
					'<th>Opções</th>'+
				'</tr>'+
			'</thead>'+
			'<tbody>'+
				'<tr dir-paginate="usuario in usuarios|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">'+
					'<td>{{usuario.nome}}</td>'+
					'<td>'+
						'<a ng-click="editarUsuarios(usuario)" class="btn btn-warnning">Editar</a>'+
						'<a ng-click="excluirUsuarios(usuario)" class="btn btn-danger">Excluir</a>'+
					'</td>'+
				'</tr>'+
			'</tbody>'+
		'</table>',
	controller: UsuariosController
});