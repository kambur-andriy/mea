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

					<a href="/user/dictionary" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</a>

				</div>

				<div class="card-body">

					<h2 class="card-title font-weight-bold text-primary text-uppercase"> {{ $description->word }} </h2>

					<h4 class="card-category text-gray">
						[ {{ $description->transcription }} ]

						<i class="material-icons play-sound ml-2" data-sound="{{ $description->sound }}">music_video</i>

					</h4>

					<hr>

					<p class="card-description">
						{!! $description->description !!}
					</p>

					<hr>

					<p class="card-description">
						{!! $description->translation !!}
					</p>

				</div>

			</div>

		</div>

	</div>

@endsection