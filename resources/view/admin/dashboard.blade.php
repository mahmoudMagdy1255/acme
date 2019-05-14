@extends('admin.layout.base')

@section('title' , 'Dashboard')

@section('content')

	<div class="dashboard">

		<div class="row expanded">
			<h1>Dashboard</h1>


			<form method="POST" enctype="multipart/form-data">
				<input name="product" value="testing">
				<input type="file" name="image">
				<input type="submit" name="submit" value="GO">
			</form>

		</div>

	</div>

@stop