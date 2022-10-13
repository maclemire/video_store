<x-layout.main-layout title="Catégories">
  <div class="px-32">
    <h1 class="font-bold text-4xl py-10">Catégories</h1>
				<form action="{{ route('categories.store') }}" method="POST">
						@csrf
						<div class="">
								<input class="rounded-lg my-3" name="name" placeholder="Votre catégorie" type="text">
								<button class="ml-6 w-auto px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold" type="submit">Enregister</button>
								<x-error-msg name="name" />
						</div>
				</form>

				<div class="py-10">
						<p class="pb-5 text-2xl">Mes catégories actuelles</p>
						@forelse ($categories as $category)
								<div class="flex items-center space-x-4 border-b py-3">
										<p class="font-bold uppercase">{{ $category->name }}</p>
										<div class="">
												<a class="bg-green-700 text-white rounded-lg font-semibold w-auto px-4 py-2" href="{{ $category->id }}/editCategory">Modifier</a>
												<a class="bg-red-700 text-white rounded-lg font-semibold w-auto px-4 py-2" href="{{ route('categories.destroy', $category->id) }}">Delete</a>
										</div>
								</div>
						@empty
								<p>Pas de catégorie enregistrée actuellement</p>
						@endforelse
				</div>
  </div>
</x-layout.main-layout>