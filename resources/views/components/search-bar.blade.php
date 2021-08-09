<div x-data="users" x-init="loadUsers" x-on:click="showUsers = true" x-on:click.away="showUsers = false" x-bind:class="{ 'border-2 border-white rounded-sm shadow-2xl': showUsers }" class="w-full max-w-lg font-medium mt-1.5">	
	<form x-bind:class="{ 'bg-white': showUsers }" class="border-none" >
  		<div class="flex items-center h-9 border-b-2 border-gray-400 py-2 px-0.5">
    		<input id="searchInput" x-model="findUser" x-bind:class="{ 'text-black pb-2 -ml-0.5': showUsers }" class="appearance-none bg-transparent border-none border-2 rounded-sm w-full text-black placeholder-gray-400 mr-3 pb-1 pt-4 pl-1 pr-2 leading-none outline-none" type="text" placeholder="{{ $placeholder ?? '' }}" aria-label="Full name" autocomplete="off">
	    	<span x-bind:class="{ 'pb-0.75 -mr-0.5': showUsers }" class="pt-2 pr-0.5">
				<x-search-icon/>
			</span>
  		</div>
	</form>
	<template x-if="showUsers">
		<div class="bg-white text-black duration-300">
            <template x-for="user in users">
			    <div class="w-full grid grid-cols-3 gap-2 border-t border-solid pt-1 pb-0.5 px-1" x-show="user.show">
			    	<div class="col-start-1 col-span-10 pt-1.5" x-text="user.name"></div>
			    	<div class="col-start-11 col-span-1 pt-0.5">
			    		<x-button-visual x-bind:href="'/profile/' + user.id"/>
			    	</div>
					{{--
					<div class="col-start-12 col-span-1 pt-2">
			    		<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			    			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
			    		</svg>
			    	</div>
					--}}
			    </div>
            </template>
        </div>
    </template>
</div>
