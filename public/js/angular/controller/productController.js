app.controller("productController", function ($scope, $http) {
    //retrieve products listing from API
    $scope.purchasedProducts = [];
    $scope.purchasedProductsJsonArray = [];
    $scope.count = 0;
    $scope.ids = [];
    /**GetProduct on tabulation filter */
    $scope.getProducts = function getProducts(name) {
        $http
            .get("http://127.0.0.1:8000/api/product/category/" + name)
            .then(function (response) {
                $scope.products = response.data.data;
            });
    };
    $scope.printBill = function getProducts() {};

    $scope.display = function disp(product) {
        $scope.purchasedProductsJson = [];
        $scope.purchasedProducts.push(product);
        
        let purshased = {
            product_id: product.id,
            price:product.price,
            quantity: 1,
        };

        $scope.purchasedProductsJsonArray.push(purshased);
        console.log($scope.purchasedProductsJsonArray);
        $scope.ids.push(product.id);
        document.getElementById("ids-billing").value = $scope.ids;
    };
    $scope.updateJsonProduct = function inc(count, product) {
        $scope.purchasedProductsJsonArray.forEach((purshased) => {
            if (purshased.product_id == product.id) {
                purshased.quantity = count;
            }
        });
    };

    //create an invoice
    $scope.submitPostForm = function () {
        var url = "http://127.0.0.1:8000/orders/bulkInsert";
        // let jsonData = { ...$scope.purchasedProductsJsonArray} ;
        let jsonData = $scope.purchasedProductsJsonArray;
         
        $http
            .post(url, jsonData)
            .success(function (data, status, headers, config) {
            })
            .error(function (data, status, header, config) {});
    };

    //delete record
    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm("Are you sure you want this record?");
        if (isConfirmDelete) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/product" + id,
            })
                .success(function (data) {
                    location.reload();
                })
                .error(function (data) {
                    console.log(data);
                    alert("Unable to delete");
                });
        } else {
            return false;
        }
    };
});
