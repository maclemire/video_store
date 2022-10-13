<x-layout.main-layout title="Home">
  <div class="grid grid-cols-4 space-x-4 space-y-4">
  @forelse ($videos as $video)
    <a href="videos/{{ $video->id }}">  
      <x-Cards.CardVideo  :title="$video->title" :description="$video->description" :url_img="$video->url_img" >  </x-Cards.CardVideo>
    </a>
  @empty
    <p class="text-xl text-center text-red-600 font-semibold">Pas de film actuellement</p>
  @endforelse
  </div>
  <div class="py-12">
      {{ $videos->links('pagination::tailwind') }}
  </div>
  </x-layout.main-layout>