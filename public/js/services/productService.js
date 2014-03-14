angular.module('productService', [])

    .factory('Product', function($http) {

        return {
            // get all the comments
            get : function() {
                return $http.get('/sims/public/v1/products');
            },

            // save a comment (pass in comment data)
            save : function(productData) {
                return $http({
                    method: 'POST',
                    url: '/sims/public/v1/products',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(productData)
                });
            },

            update : function(id,productData){
                    return $http({
                    method: 'POST',
                    url: '/sims/public/v1/products/'+id,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(productData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/sims/public/v1/products/' + id);
            }
        }

    });
    