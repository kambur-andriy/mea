@extends('layouts.user')


@section('title')
	Dashboard
@endsection


@section('content')

	<div class="row">

		<div class="col-6">
			<div class="card card-stats">
				<div class="card-header card-header-warning card-header-icon">
					<div class="card-icon">
						<i class="material-icons">school</i>
					</div>
					<p class="card-category">Translated</p>
					<h3 class="card-title">{{ $translations->count() }}</h3>
				</div>
				<div class="card-footer">
					<div class="stats">
						<i class="material-icons text-gray">warning</i>
						<a href="/user/translate" class="text-gray">Translate words ...</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6">
			<div class="card card-stats">
				<div class="card-header card-header-success card-header-icon">
					<div class="card-icon">
						<i class="material-icons">pages</i>
					</div>
					<p class="card-category">Dictionary</p>
					<h3 class="card-title">{{ $descriptions->count() }}</h3>
				</div>
				<div class="card-footer">
					<div class="stats">
						<i class="material-icons">date_range</i>
						<a href="/user/dictionary" class="text-gray">Open dictionary ...</a>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-12">

			<div class="card">

				<div class="card-header card-header-info">
					<h4 class="card-title">Last translated words</h4>
				</div>

				<div class="card-body table-responsive">

					<table id="translations_list" class="table table-hover">

						<tbody>

						@forelse ($translations->take(9) as $translation)

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

	</div>

	<div class="row">

		<div class="col-12">

			<div class="card">

				<div class="card-header card-header-primary">
					<h4 class="card-title">Last described words</h4>
				</div>

				<div class="card-body table-responsive">

					<table id="descriptions_list" class="table table-hover">

						<tbody>

						@forelse($descriptions->take(9) as $description)

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

	</div>

@endsection