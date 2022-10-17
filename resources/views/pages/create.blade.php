<x-layout.main-layout title="Nouveau film">
  <div class="px-24">
    <h1 class="font-bold text-4xl py-10">Nouveau Film</h1>
    <form  action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="max-w-md">
        {{-- title --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="title" placeholder="Titre du film" value="{{ old('title') }}">
        <x-error-msg name="title"></x-error-msg>
        {{-- description --}}
        <textarea name="description" cols="30" rows="10" class="mt-5 block w-full rounded-lg border-gray-400" placeholder="Description du film ...">{{ old('description') }}</textarea>
        <x-error-msg name="description"></x-error-msg>
        {{-- nationality --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="nationality" placeholder="Nationalité" value="{{ old('nationality') }}">
        <x-error-msg name="nationality"></x-error-msg>
        {{-- year_created --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="year_created" placeholder="Année de création" value="{{ old('year_created') }}">
        <x-error-msg name="year_created"></x-error-msg>
        {{-- actors --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="actors" placeholder="Nom des acteurs" value="{{ old('actors') }}">
        <x-error-msg name="actors"></x-error-msg>


        {{-- image --}}
        <div class="py-4">
          <label for="">Image :</label>
          <input class="block pt-6" type="file" name="url_img" id="">
          <x-error-msg name="url_img" />
        </div>
        
        <button class="bg-blue-700 text-white font-bold my-6 w-auto rounded-lg px-4 py-2" type="submit">Envoyer</button>

      </div>
    </form>

  </div>
</x-layout.main-layout>