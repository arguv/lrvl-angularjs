@extends('layouts.app')

@section('content')
<div class="container" data-ng-app="commentApp" data-ng-controller="mainController">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div>
				<!-- NEW POST FORM =============================================== -->
				<button class="btn btn-success" data-ng-click="display()" style="margin-bottom: 2%;">Create</button>

				<fieldset data-ng-show="visible">

					<form data-ng-submit="submitComment()" role="form" novalidate>

						<div class="form-group">
							<input type="text" class="form-control" name="title" data-ng-model="commentData.title" placeholder="Title">
						</div>

						<div class="form-group">
							<textarea class="form-control" rows="3" name="content" data-ng-model="commentData.content" placeholder="Content"></textarea>
						</div>

						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
							<input type="reset" class="btn btn-primary" value="Reset"/>
						</div>
					</form>

				</fieldset>

				<!-- LOADING ICON =============================================== -->
				<p class="text-center" data-ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

				<!-- THE POSTS =============================================== -->
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>ID</th>
							<th>TITLE</th>
							<th>CONTENT</th>
							<th>ACTION</th>
							<th>ACTION</th>
						</tr>
						</thead>
						<tbody>
						<tr data-ng-hide="loading" data-ng-repeat="comment in comments track by $index">
							<td>@{{ comment.id }}</td>
							<td>@{{ comment.title }}</td>
							<td>@{{ comment.content }}</td>
							<td><a href="#" data-ng-click="editComment(comment.id)" class="btn btn-warning">Edit</a></td>
							<td><a href="#" data-ng-click="deleteComment(comment.id)" class="btn btn-danger">Delete</a></td>
						</tr>
						</tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
</div>
@stop