angular.module('categoryService', [])

    .factory('Category', function($http) {

        return {
            // get all the active categories
            get : function() {
                return $http.get('/sims/public/v1/categories');
            },

            // save a new category
            save : function(categoryData) {
                console.log(categoryData);
                return $http({
                    method: 'POST',
                    url: '/sims/public/v1/categories',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(categoryData)
                });
            },

            // update a category
            update : function(id,categoryData) {
                return $http({
                    method: 'POST',
                    url: '/sims/public/v1/categories/' + id,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(categoryData)
                });
            },

            // destroy a category
            destroy : function(id) {
                return $http.delete('/sims/public/v1/categories/' + id);
            }
        }

    });
    