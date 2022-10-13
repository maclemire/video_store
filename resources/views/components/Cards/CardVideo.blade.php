@props([
  'title',
  'description',
  'url_img',
  ])

<div class="h-auto shadow-lg bg-slate-50 rounded-lg p-4 text-center">
    <img class="pb-4 mx-auto h-44 w-32" src="{{ asset('storage/' . $url_img) }}" alt="{{ $title }}">
    <p class="pb-6 text-md font-black">{{ $title }}</p>
    <p class="text-xs font-normal">{{ Str::substr($description, 0, 120) }}</p>
</div>