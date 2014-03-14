angular.module('mainCtrl', [])

    // inject the Category service into our controller
    .controller('mainController', function($scope, $http, Category, Product) {
        // object to hold all the data for the new category form
        $scope.categoryData = {};
        $scope.productData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // GET ALL Categorues
        Category.get()
            .success(function(data) {
                $scope.categories = data;
                $scope.loading = false;
            })
            .error(function(data,status){
                    console.log(data);
                    console.log(status);
                });

        // function to handle submitting the form
        // SAVE A Category 
        $scope.createCategory = function() {
            $scope.loading = true;
            
            // save the category data from form
            // use the function we created in our service
            Category.save($scope.categoryData)
                .success(function(data) {

                    // if successful, we'll need to refresh the category list
                    Category.get()
                        .success(function(getData) {
                            $scope.categories = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        // function to handle deleting a category
        // DELETE A Category
        $scope.removeCategory = function(id) {
            $scope.loading = true; 

            // use the function we created in our service
            Category.destroy(id)
                .success(function(data) {

                    // if successful, we'll need to refresh the category list
                    Category.get()
                        .success(function(getData) {
                            $scope.categories = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data,status){
                    console.log(data);
                    console.log(status);
                });
        };






        // GET ALL Products
        Product.get()
            .success(function(data) {
                $scope.products = data;
                $scope.loading = false;
            })
            .error(function(data,status){
                    console.log(data);
                    console.log(status);
                });

        // function to handle submitting the form
        // SAVE A Product
        $scope.createProduct = function() {
            $scope.loading = true;
            
            // save the product data from form
            // use the function we created in our service
            Product.save($scope.productData)
                .success(function(data) {

                    // if successful, we'll need to refresh the category list
                    Product.get()
                        .success(function(getData) {
                            $scope.products = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        // function to handle deleting a category
        // DELETE A Product
        $scope.removeProduct = function(id) {
            $scope.loading = true; 

            // use the function we created in our service
            Product.destroy(id)
                .success(function(data) {

                    // if successful, we'll need to refresh the category list
                    Product.get()
                        .success(function(getData) {
                            $scope.products = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data,status){
                    console.log(data);
                    console.log(status);
                });
        };

    });