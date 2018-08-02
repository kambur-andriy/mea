@extends('layouts.user')


@push('scripts')
	<script src="/js/dictionary.js"></script>
@endpush


@section('title')
	My Dictionary / Word
@endsection


@section('content')

	<div class="row">

		<div class="col-12 col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-sm-2 offset-md-2 offset-lg-3 offset-xl-3">

			<div class="card card-profile">

				<div class="card-header">

					<a href="/user/dictionary/view/{{ $id }}" target="_blank" class="float-left text-gray">
						<i class="material-icons">assignment</i> View
					</a>

					<a href="/user/dictionary/revise" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</a>

				</div>

				<div class="card-body">

					<h4 id="answer" class="card-category font-weight-bold text-uppercase text-primary"> {{ $word }} </h4>

					<p class="card-description"> {!! $content !!} </p>

				</div>


			</div>

		</div>

	</div>

@endsection