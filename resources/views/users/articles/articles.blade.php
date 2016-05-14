@extends('layouts.app')

@section('content')
<div class="container" data-ng-app="commentApp" data-ng-controller="mainController">
	<div class="row">

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
		<p class="text-center" data-ng-show="loading"><span class="fa fa-spinner fa-5x fa-spin"></span></p>

		<!-- THE POSTS =============================================== -->

		<div class="col-md-1">ID</div>
		<div class="col-md-4">TITLE</div>
		<div class="col-md-5">CONTENT</div>
		<div class="col-md-1">ACTION</div>
		<div class="col-md-1">ACTION</div>
		<hr>

		<div class="col-md-12" data-ng-hide="loading" data-ng-repeat="comment in comments track by $index">

			<form class='form-inline' data-ng-submit="editComment(comment.id, comment)" role="form" novalidate>
				<div class="form-group col-md-1">
					<input class="form-control" name="id" style="width: 100%" data-ng-model="comment.id" disabled>
				</div>
				<div class="form-group col-md-4">
					<input id='txttitle' type="text" class="form-control" name="title" data-ng-model="comment.title">
				</div>
				<div class="form-group col-md-5">
					<textarea id='txtcontent' class="form-control" rows="3" name="content" data-ng-model="comment.content"></textarea>
				</div>
				<div class="form-group col-md-1">
					<button type="submit" class="btn btn-warning">Edit</button>
				</div>
			</form>

			<div class="col-md-1">
				<button data-ng-click="deleteComment(comment.id)" class="btn btn-danger">Delete</button>
			</div>

			<div class="hr"></div>
		</div>

	</div>
</div>
@stop