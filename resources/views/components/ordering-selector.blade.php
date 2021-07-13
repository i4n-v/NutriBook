@props(['asc', 'desc'])

<div class="space-y-1">
    <span class="block hover:text-yellow-400">
        <a href="{{ route('ordering', ['order' => $asc ?? '']) }}" class="">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </a>
    </span>
    <span class="block hover:text-yellow-400">
        <a href="{{ route('ordering', ['order' => $desc ?? '']) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
    </span>
</div>
