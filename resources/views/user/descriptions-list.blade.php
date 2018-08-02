@extends('layouts.user')


@push('scripts')
	<script src="/js/dictionary.js"></script>
@endpush


@section('title')
	My Dictionary
@endsection


@section('content')

	<div class="row">

		<div class="card">

			<div class="card-header card-header-primary">

				<h4 class="card-title">Words List</h4>

			</div>

			<div class="card-body table-responsive">

				<table id="descriptions_list" class="table table-hover">

					<tbody>

					@forelse($descriptions as $description)

						<tr>

							<td class="font-weight-bold">
								<a href="{{ $description->url }}">
									{{ $description->word }}
								</a>
							</td>

							<td>{{ $description->stringTranslation }}</td>

							<td class="text-center sound-column">

								<button type="button" class="btn btn-primary play-sound" data-sound="{{ $description->sound }}">
									<i class="material-icons">music_video</i>
								</button>

							</td>

						</tr>

					@empty

						<tr>
							<td colspan="2">Dictionary is empty</td>
						</tr>

					@endforelse

					</tbody>

				</table>

			</div>

		</div>

	</div>

@endsection