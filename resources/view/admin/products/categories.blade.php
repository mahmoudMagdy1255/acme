@extends('admin.layout.base')

@section('title' , 'Product Categories')

@section('content')

	<div class="category">

		<div class="row expanded">
			<h1>Product Categories</h1>
		</div>

		@if($message)
			<p>{{ $message }}</p>
		@endif


		<div class="row expanded">

			<div class="small-12 medium-6 column">

				<form action="" method="POST">

					<div class="input-group">

						<input type="text" name="" class="input-group-field" placeholder="Search By Name">

						<div class="input-group-button">
							<input type="submit" class="button" value="Search">
						</div>

					</div>

				</form>

			</div>


			<div class="small-12 medium-5 end column">

				<form action="" method="POST">

					<div class="input-group">

						<input type="text" name="name" class="input-group-field" placeholder="Category Name">

						<input type="hidden" name="token" value="{{ csrf_token() }}">

						<div class="input-group-button">
							<input type="submit" class="button" value="Create">
						</div>

					</div>

				</form>

			</div>


		</div>

		<div class="row expanded">

			<div class="small-12 medium-11 column">

				@if( count($categories) )

					<table class="hover">

						<tbody>

							@foreach($categories as $category)

								<tr>

									<td>
										{{ $category->name }}
									</td>

									<td>
										{{ $category->slug }}
									</td>

									<td>
										{{ $category->created_at->toFormattedDateString() }}
									</td>


									<td width="100" class="text-right">


										<a href="#"> <i class="fa fa-edit"></i> </a>
										<a href="#"> <i class="fa fa-times"></i> </a>

									</td>

								</tr>

							@endforeach
						</tbody>

					</table>

				@else
					<h3>No Categories</h3>
				@endif

			</div>

		</div>


	</div>

@stop