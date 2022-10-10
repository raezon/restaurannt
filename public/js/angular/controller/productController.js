app.controller("productController", function ($scope, $http) {
    //state
    $scope.purchasedProducts = [];
    $scope.purchasedProductsJsonArray = [];
    $scope.count = 0;
    $scope.ids = [];
    $scope.totalPrice=0

    //function needed
    function createOrder(totalPrice) {
        console.log(totalPrice)
        var url = "http://127.0.0.1:8000/orders/store";
        $http
            .post(url, { total: totalPrice })
            .success(function (data, status, headers, config) {
                console.log(data);
            })
            .error(function (data, status, header, config) {});
    }
    function createOrderItem(jsonData) {
        var url = "http://127.0.0.1:8000/order-items/bulkInsert";
        $http
            .post(url, jsonData)
            .success(function (data, status, headers, config) {})
            .error(function (data, status, header, config) {});
    }
    function calculateTotalPrice() {
       
        $scope.purchasedProductsJsonArray.forEach((purshased) => {
            $scope.totalPrice += purshased.price * purshased.quantity;
        });
        return $scope.totalPrice;
    }
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
            price: product.price,
            quantity: 1,
        };

        $scope.purchasedProductsJsonArray.push(purshased);
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
        let totalPrice = calculateTotalPrice();
        let jsonData = $scope.purchasedProductsJsonArray;
        console.log(totalPrice);
        createOrder(totalPrice);
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
