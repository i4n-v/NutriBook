<x-guest-layout>

	<div class="min-h-screen bg-white" x-data="{ food:true }">
        <x-slot name="header"> 
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                {{ __('Crie avaliações para seus pacientes!') }}
            </h2>
        </x-slot>
		

       <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="divBody">
                        <div class="p-6 bg-gray-100 border-b border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                            <div class="flex gap-4">
                               
                               <div class="p-6 border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                                    <div class="flex gap-4" x-data="{ food=true }">
                                <x-form-create-layout>
                                    <x-anamnese-form/>
                                </x-form-create-layout>
                          
                                                           
                       </div>
                   </div>  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div>

</div>


</x-guest-layout>