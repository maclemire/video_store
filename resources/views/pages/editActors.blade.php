<x-layout.main-layout title="Éditer acteur">
  <div class="px-32">
    <h1 class="font-bold text-4xl py-10">Éditer un acteur</h1>
				<form action="{{ route('actors.update', $actors->id) }}" method="POST">
						@csrf
            @method('PUT')
						<div class="">
								<input class="rounded-lg my-3" name="name" value="{{ old('name', $actors->name) }}" type="text">
								<button class="ml-6 w-auto px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold" type="submit">Enregister</button>
								<x-error-msg name="name" />
						</div>
				</form>
</x-layout.main-layout>