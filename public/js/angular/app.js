(function (angular) {
    var app = angular.module('app', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });



    app.controller('productController', function ($scope, $http) {

        //retrieve products listing from API
        $scope.purchasedProducts = [];
        $scope.ids = [];
        $scope.getProducts = function getProducts(name) {

            $http.get("http://restaurant2023.test/api/product/category/" + name)
                .then(function (response) {
                    $scope.products = response.data.data;
                });

        }
        $scope.printBill = function getProducts() {
          /*  var ids = [];
            var elements = document.getElementsByClassName("product-purchase");
            for (var i = 0, len = elements.length; i < len; i++) {

                ids.push(elements[i].id)
            }

            document.getElementById('ids-billing').value =ids;*/
           

        }
        $scope.display = function disp(product) {
            $scope.purchasedProducts.push(product)
            $scope.ids.push(product.id)
            document.getElementById('ids-billing').value =$scope.ids;            
        }
        //save new record / update existing record
        $scope.save = function (modalstate, id) {
            var url = "http://restaurant2023.test/api/product";

            //append employee id to the URL if the form is in edit mode
            if (modalstate === 'edit') {
                url += "/" + id;
            }

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.employee),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function (response) {
                console.log(response);
                location.reload();
            }).error(function (response) {
                console.log(response);
                alert('This is embarassing. An error has occured. Please check the log for details');
            });
        }

        //delete record
        $scope.confirmDelete = function (id) {
            var isConfirmDelete = confirm('Are you sure you want this record?');
            if (isConfirmDelete) {
                $http({
                    method: 'DELETE',
                    url: "http://restaurant2023.test/api/product" + id
                }).
                    success(function (data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function (data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
            } else {
                return false;
            }
        }
    });
})(window.angular);
