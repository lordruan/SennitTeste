'use strict';
function UsuariosController($scope,$http,$window){
	$scope.usuarios = null;
	$scope.usuario = null;
	$scope.excluirUsuarios = function (id) {
		var data = {
				'id' : id
			};
		$http.post(
			'Usuarios/excluir',
			data
		).then(function (response) {
			$window.alert(response.data.retorno);
			$window.location.reload();
		},function (response) {
			$window.alert(response.data.retorno);
		});
	}
	$scope.editarUsuarios = function (usuario) {
			$scope.usuario = usuario;
	}
	$scope.salvar = function (usuario) {
		var data = {
				'Usuarios' : usuario
			};
		$http.post(
			'Usuarios/salvar',
			data
		).then(function (response) {
			$window.alert(response.data.retorno);
			$window.location.reload();
		},function (response) {
			$window.alert(response.data.retorno);
		});
	}
	$http.defaults.headers.common.Authorization = '3e1175883f758a4658ea95e09313fb09';
	$http.get(
		'Usuarios/index'
	).then(
	function (response) {
		if (response.data.code === '00'){
			$scope.usuarios = response.data.retorno;
		}else{
			$scope.usuarios = "erro";
		}
	},
	function (response) {
			$scope.usuarios = response.data.retorno;
	});
};
angular.
module('usuarios').
controller('UsuariosController',['$scope','$http','$window', UsuariosController]);