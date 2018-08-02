@extends('layouts.user')


@push('scripts')
	<script src="/js/dictionary.js"></script>
@endpush


@section('title')
	Extend Dictionary
@endsection


@section('content')

	<div class="card">

		<div class="card-header card-header-primary">
			<h4>Define new word</h4>
		</div>

		<div class="card-body">

			<form id="describe_word_frm" novalidate>

				<div class="row">

					<div class="col-lg-4">
						<div class="form-group">
							<label for="word" class="bmd-label-floating">Word</label>
							<input type="text" class="form-control" name="word" autocomplete="off" />
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label for="transcription" class="bmd-label-floating">Transcription</label>
							<input type="text" class="form-control" name="transcription" autocomplete="off" />
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label for="sound" class="bmd-label-floating">Sound URL</label>
							<input type="text" class="form-control" name="sound" autocomplete="off" />
						</div>
					</div>

				</div>

				<div class="row">

					<div class="col-lg-6">
						<div class="form-group">
							<label for="description" class="bmd-label-floating">Description</label>
							<textarea id="description" class="form-control" rows="9"></textarea>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="translation" class="bmd-label-floating">Translation</label>
							<textarea id="translation" class="form-control" rows="9"></textarea>
						</div>
					</div>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary float-right">Add</button>
				</div>

			</form>

		</div>

	</div>

		<div class="row">


			<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3">


			</div>

		</div>

@endsection