angular.module('myApp')
		.controller('myCtrl', ['$scope', '$http', '$compile', function($scope, $http, $compile){
			$scope.class_list = [];
			$scope.tax_list = [];
			$scope.bp_type_list = [];
			$scope.bp_type_class_list = [];
			$scope.bank_list = [];

			$http.get(window.location.origin+'/setup/class_list').success(function(response){
				$.each(response, function(index, value){
					$scope.class_list.push(value);
					$scope.bp_type_class_list.push(value);
				});

				$scope.bp_type_class_list.splice(0, 1);
			});

			$http.get(window.location.origin+'/setup/tax_list').success(function(response){
				$.each(response, function(index, value){
					$scope.tax_list.push(value);
				});
			});

			$http.get(window.location.origin+'/setup/bp_type_list').success(function(response){
				$.each(response, function(index, value){
					$scope.bp_type_list.push(value);
				});
			});

			$http.get(window.location.origin+'/setup/bank_list').success(function(response){
				$.each(response, function(index, value){
					$scope.bank_list.push(value);
				});
			});
		}])