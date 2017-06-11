var app = angular.module('mainModule',[]);
app.controller('mainController', ['$scope','$http', '$window', function($scope,$http,$window) {
	$scope.filmes = null;
	$scope.mostrar = false;
	$scope.consultar = function() {
		var filtro = '',
		valor = '';
		if ($scope.filmes.diretor){
			filtro = 'director';
			valor = $scope.filmes.diretor;
		}else{
			if($scope.filmes.ator){
				filtro = 'actor';
				valor = $scope.filmes.ator;
			}
		}
		//obtem o filme via get do webservice
		$http.post(
			'http://netflixroulette.net/api/api.php?'+filtro+'=' +encodeURIComponent(valor)
		).then(
		function (response) {
			if (typeof response.data === 'object'){
				var i = Math.round(Math.random()*Object.keys(response.data).length) -1;
				if (i >= 0)
					$scope.filmes.resultado = response.data[i];
				else $scope.filmes.resultado = response.data[0];
			}else{
				$scope.filmes.resultado = response.data;
			}
			
			$scope.mostrar = !$scope.mostrar;
		},
		function (response) {
				$scope.filmes.error = response.data;
		}
		);
	}
}]);