<div class="row expanded">

	@if(isset($errors))

		<div class="callout alert" data-closable>

			@foreach($errors as $error)


				@foreach($error as $item)

					{{ $item }} <br />

				@endforeach

			@endforeach

			<button class="close-button" data-close>

				<span arial-hidden="true">&times;</span>

			</button>

		</div>

	@endif


	@if(isset($success))

		<div class="callout success" data-closable>


			{{ $success }} <br/>


			<button class="close-button" data-close>

				<span arial-hidden="true">&times;</span>

			</button>

		</div>

	@endif

</div>