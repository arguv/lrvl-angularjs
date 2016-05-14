angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Comment) {

		$scope.visible = false;

		// object to hold all the data for the new post form
		$scope.commentData = {};
		$scope.comment = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		//hidden or show for creating button
		$scope.display = function () {
			$scope.visible = !$scope.visible;
		};

/*		//hidden or show for creating button
		$scope.displayEdit = function (event) {
			var x = event.currentTarget.attributes.data.value;
			console.log($scope.visibleEdit + x);
			//$scope.visibleEdit + x = !$scope.visibleEdit + x ;

			console.log(event);
			console.log(event.currentTarget.attributes.data.value);
		};*/

		// GET ALL POST ==============
		Comment.get()
			.success(function(data) {
				$scope.comments = data;
				$scope.loading = false;
			});

		// SAVE A POST ================
		$scope.submitComment = function() {
		$scope.loading = true;

		// save the post. pass in post data from the form
		Comment.save($scope.commentData)
			.success(function(data) {

				// if successful, we'll need to refresh the post list
				Comment.get()
					.success(function(getData) {
						$scope.comments = getData;
						$scope.loading = false;
						$scope.visible = false;
						$scope.commentData = {};
					});

			})
			.error(function(data) {
				console.log(data);
			});
		};

		// DELETE A POST ====================================================
		$scope.deleteComment = function(id) {
		$scope.loading = true;

		// use the function we created in our service
		Comment.destroy(id)
			.success(function(data) {

				// if successful, we'll need to refresh the post list
				Comment.get()
					.success(function(getData) {
						$scope.comments = getData;
						$scope.loading = false;
					});

			});
		};

		// EDIT A POST ====================================================
		$scope.editComment = function(id, comment) {
		$scope.loading = true;

		// use the function we created in our service
		Comment.edit(id, comment)
			.success(function(data) {

				// if successful, we'll need to refresh the post list
				Comment.get()
					.success(function(getData) {
						$scope.comments = getData;
						$scope.loading = false;
					});

			});
		};

	});