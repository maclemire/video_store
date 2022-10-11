<form action="{{ route('logout') }}" method="POST">
		@csrf
		<button class="bg-blue-700 text-white font-semibold rounded-lg px-4 py-1" type="submit">Déconnexion</button>
</form>