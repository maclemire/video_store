<x-layout.main-layout :title="$video->id">
  
    <div class="flex flex-col justify-center text-start px-96 py-10">
        <div class="">
          <p class="font-black text-4xl text-center pb-12">{{ $video->title }}<span class="font-bold underline"></span></p>
          <img class="mx-auto" src="{{ asset('storage/' . $video->url_img) }}" alt="{{ $video->title }}">
          <p class="pt-10"><span class="font-black underline pr-2">Description: </span> {{ $video->description }}</p>
          <p class="pt-4"><span class="font-bold underline pr-2">Nationalité: </span>{{ $video->nationality }}</p>
          <p class="pt-4"><span class="font-bold underline pr-2">Année de création: </span>{{ $video->year_created }}</p>
          
					<p class="font-bold text-gray-800 pt-4"><span class="text-black underline pr-2">
							Acteurs:
              </span>@forelse ($video->actors as $actor){{ $actor->name }} <x-link-delete :itemId="$actor->id" linkName="X" routeName="actors.destroy" /><span> @auth
									
							 <a class="bg-green-700 text-white rounded-lg font-semibold w-auto px-2 py-1" href="{{ route('actors.edit', $actor->id) }}">Mod.</a>@endauth</span> @endforeach
					</p>
				</div>
    
    @auth
		  <form action="{{ route('actors.store', $video->id) }}" class="flex space-x-6 pt-6 justify-center" method="POST">
					@csrf
					<input name="name" class="rounded-lg" placeholder="Ajouter un acteur" type="text">
					<button class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg mx-6" type="submit">Envoyer</button>
					<x-error-msg name="name" />
			</form>

      
			<div class="flex space-x-6 pt-6 justify-center">
					<x-btn-delete :video="$video" />
					<a class="bg-green-800 w-auto text-white font-semibold px-4 py-2 rounded-lg" href="{{ $video->id }}/edit">Modifier</a>
			</div>
						
		@endauth
	</div>
</x-layout.main-layout>
              