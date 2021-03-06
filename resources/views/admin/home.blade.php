<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理者ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-6">
            <div class="overflow-hidden shadow-sm rounded-lg mx-2">
                <div class="p-4  bg-indigo-100 border-b border-gray-200">
                    @if (session('err_msg'))
                    <p class="bg-green-400 rounded-lg text-lg w-1/3 text-center mx-auto">
                        {{ session('err_msg') }}
                    </p>
                    @endif
                    <div class="text-gray-200 body-font">
                        <div class="flex  justify-items-center flex-wrap px-auto">
                            @foreach ($blogs as $blog)
                            <div class="p-2 md:w-1/2 lg:w-1/3 mx-auto flex flex-wrap ">
                                <x-admin-blog-card  :blog="$blog"/>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

