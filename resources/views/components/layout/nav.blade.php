<div class="flex justify-between bg-white text-indigo-700 py-4 px-12 border-b-2 mb-4">
  <div class="font-black text-xl" id="logo">
    <a href="/">Video_ <span class="text-red-600">Store</span></a>
  </div>
  <div class="text-xl font-black text-indigo-800 space-x-8 flex items-center" id="navitem">
    @guest
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @endguest
      <a href="{{ route('categories.home') }}">Categories</a>
    @auth
        <a href="{{ route('videos.create') }}">Nouveau Film</a>
        <x-btn-logout />
        <p>Coucou {{ Auth::user()->name }} </p>
    @endauth
  </div>
</div>