angular.module('commentService', [])

	.factory('Comment', function($http) {

		return {
			// get all the posts
			get : function() {
				return $http.get('/posts');
			},

			// save a post (pass in post data)
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: '/posts',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},

			// destroy a post
			destroy : function(id) {
				return $http.delete('/posts/' + id);
			},

			// edit a post
			edit : function(id, comment) {

				return $http.put('/posts/' + id, comment);
			}

		}

	});