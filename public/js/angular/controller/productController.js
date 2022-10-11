app.controller("productController", function ($scope, $http) {
    //state
    $scope.purchasedProducts = [];
    $scope.purchasedProductsJsonArray = [];
    $scope.count = 0;
    $scope.orderId;
    $scope.totalPrice = 0;

    //function needed
    $scope.createOrder = function createOrder(totalPrice) {
        console.log(totalPrice);
        var url = "http://127.0.0.1:8000/orders/store";
        let data = $http
            .post(url, { total: totalPrice })
            .success(function (data, status, headers, config) {
                return data;
            })
            .error(function (data, status, header, config) {});
        return data;
    };
    $scope.createOrderItem = function createOrderItem(jsonData, orderId) {
        const orderItem = jsonData.map((jsonObj) => ({
            ...jsonObj,
            order_id: orderId,
        }));
        console.log(orderItem);
        var url = "http://127.0.0.1:8000/order-item/bulk-insert";
        $http
            .post(url, orderItem)
            .success(function (data, status, headers, config) {})
            .error(function (data, status, header, config) {});
    };
    function calculateTotalPrice() {
        $scope.purchasedProductsJsonArray.forEach((purshased) => {
            $scope.totalPrice += purshased.price * purshased.qunatity;
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
            qunatity: 1,
        };

        $scope.purchasedProductsJsonArray.push(purshased);
    };
    $scope.updateJsonProduct = function inc(count, product) {
        $scope.purchasedProductsJsonArray.forEach((purshased) => {
            if (purshased.product_id == product.id) {
                purshased.qunatity = count;
            }
        });
    };

    //create an invoice
    $scope.submitPostForm = function () {
        let totalPrice = calculateTotalPrice();
        let jsonData = $scope.purchasedProductsJsonArray;
        $scope.createOrder(totalPrice).then((response) => {
            const orderId = response.data.id;
            $scope.createOrderItem(jsonData, orderId);
            console.log(response.data.id);
            window.location ="http://127.0.0.1:8000/bill/view/" + orderId;
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
