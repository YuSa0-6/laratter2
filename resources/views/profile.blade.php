<x-app-layout>
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Profile') }}
          </h2>
     </x-slot>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                         {{__('Profile')}}

                    </div>
               </div>
          </div>

          <div x-data="{toggle : false}" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
               <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">

                         <p class="">アカウントを削除</p>

                         <button x-show="!toggle" @click="toggle = ! toggle" class="p-2 bg-blue-400 rounded text-white"
                         >確認</button>

                         <div 
                         x-show="toggle" 
                         @click.away="toggle = false" 
                         class="flex items-center mx-3 justify-between"
                         x-transition:enter="transition transform ease-out duration-300"
                         x-transition:enter-start="-translate-x-10 opacity-0"
                         x-transition:enter-end="translate-x-0"
                         >

                              <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="py-2 px-3 bg-red-400 rounded-lg text-white">削除</button>
                              </form>

                              <button @click="toggle = false" class="p-2 mx-3 rounded-sm shadow-sm bg-yellow-100">キャンセル</button>

                              <p class="text-red-300 ">本当にいいですか？</p>
                         </div>

                    </div>
               </div>
          </div>
     </div>
</x-app-layout>