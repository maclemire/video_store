<x-layout.main-layout title="dashboard">
    <div class="text-center py-60 text-4xl text-green-700 font-black">
        <p>Vous êtes bien connecté {{ Auth::user()->name }} !</p>
        <div class="">
            <a href="{{ route('videos.create') }}">Nouveau Film</a>
            <a href="{{ route('categories.home') }}">Categories</a>
        </div>
    </div>
</x-layout.main-layout>
