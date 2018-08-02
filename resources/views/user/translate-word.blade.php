@extends('layouts.user')


@push('scripts')
	<script src="/js/translation.js"></script>
@endpush


@section('title')
	Translate words
@endsection


@section('content')

	<div class="row">

		<div class="col-12 col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-sm-2 offset-md-2 offset-lg-3 offset-xl-3">

			<div class="card">

				<div class="card-header card-header-primary">
					<h4>Translate</h4>
				</div>

				<div class="card-body">

					<form id="translate_word_frm" novalidate>

						<div class="form-group">
							<label for="word" class="bmd-label-floating">Word to translate</label>
							<input type="text" class="form-control" name="word" autocomplete="off" />
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary float-right">Translate</button>
						</div>

					</form>

				</div>

				<div class="card-footer">

					<a href="/user/translate/view" target="_blank" class="stats">
						<i class="material-icons">assignment</i> View
					</a>

				</div>

			</div>

		</div>

	</div>

@endsection