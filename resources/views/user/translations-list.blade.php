@extends('layouts.user')


@push('scripts')
	<script src="/js/translation.js"></script>
@endpush


@section('title')
	Translations List
@endsection


@section('content')

	<div class="row">

		<div class="card">

			<div class="card-header card-header-primary">

				<h4 class="card-title">Translated words</h4>

			</div>

			<div class="card-body table-responsive">

				<table id="translations_list" class="table table-hover">

					<tbody>

					@forelse ($translations as $translation)

						<tr>

							<td class="font-weight-bold">{{ $translation->word }}</td>

							<td>{{ implode('; ', $translation->translation) }}</td>

							<td class="text-right font-italic">{{ $translation->created_at }}</td>

						</tr>

					@empty

						<tr>
							<td colspan="3">
								Translations list is empty
							</td>
						</tr>

					@endforelse

					</tbody>

				</table>

			</div>

		</div>

	</div>

@endsection