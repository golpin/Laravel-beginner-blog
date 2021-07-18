<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-indigo-100 border-b border-gray-200">

                    <div class="text-gray-800 body-font">
                        <div class="flex flex-wrap mx-2 xs:mx-4">
                            <div class="p-2 sm:w-1/3">
                                <div class="bg-gray-100 border p-6 rounded-lg">
                                    <img class="h-40 rounded w-full object-cover object-center mb-6"
                                        src="https://dummyimage.com/720x400" alt="content">
                                    <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">タイトル</h3>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">タイトルが入ります</h2>
                                    <p class="text-gray-600 mb-1">日付が入ります</p>
                                    <div class="flex flex-row-reverse">
                                        <button type="submit" class=" focus:outline-none text-white text-sm py-2.5 px-5 rounded-lg bg-red-500 hover:bg-red-600 hover:shadow-lg flex items-center">
                                            削除
                                            <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>