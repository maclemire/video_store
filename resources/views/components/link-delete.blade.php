@props(['routeName', 'itemId', 'linkName'])
@auth
		<a class="bg-red-700 w-auto p-1 text-white" href="{{ route($routeName, $itemId) }}">{{ $linkName }}</a>
@endauth