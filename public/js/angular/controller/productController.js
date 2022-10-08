app.controller("productController", function ($scope, $http) {
    //retrieve products listing from API
    $scope.purchasedProducts = [];
    $scope.purchasedProductsJsonArray = [];
    $scope.count = 0;
    $scope.ids = [];
    $scope.getProducts = function getProducts(name) {
        $http
            .get("http://127.0.0.1:8000/api/product/category/" + name)
            .then(function (response) {
                $scope.products = response.data.data;
            });
    };
    $scope.printBill = function getProducts() {};
    $scope.display = function disp(product) {
        console.log(product);
        $scope.purchasedProductsJson = [];
        $scope.purchasedProducts.push(product);
        $scope.purchasedProductsJson["product_id"] = product.id;
        $scope.purchasedProductsJson["quantity"] = 1;
        $scope.purchasedProductsJsonArray.push($scope.purchasedProductsJson);
        $scope.ids.push(product.id);
        console.log($scope.purchasedProductsJsonArray);
        document.getElementById("ids-billing").value = $scope.ids;
    };
    $scope.updateJsonProduct = function inc(count, product) {
        $scope.purchasedProductsJsonArray.forEach((purshased) => {
            if (purshased["product_id"] == product.id) {
                purshased["quantity"] = count;
            }
        });
        console.log($scope.purchasedProductsJsonArray);
    };
    //save new record / update existing record
    $scope.save = function (modalstate, id) {
        var url = "http://127.0.0.1:8000/api/product";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === "edit") {
            url += "/" + id;
        }

        $http({
            method: "POST",
            url: url,
            data: $.param($scope.employee),
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
        })
            .success(function (response) {
                console.log(response);
                location.reload();
            })
            .error(function (response) {
                console.log(response);
                alert(
                    "This is embarassing. An error has occured. Please check the log for details"
                );
            });
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
                    console.log(data);
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
