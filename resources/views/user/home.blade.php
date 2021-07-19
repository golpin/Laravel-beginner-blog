<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-indigo-100 border-b border-gray-200">
                    @if (session('err_msg'))
                    <p class="bg-green-400 rounded-lg text-lg w-1/3 text-center mx-auto">
                        {{ session('err_msg') }}
                    </p>
                    @endif
                    <div class="text-gray-200 body-font">
                        <div class="flex flex-wrap mx-auto ">
                            @foreach ($blogs as $blog)
                            <div class="p-2 sm:w-1/3  mx-auto flex flex-wrap break-all">
                                <div class="bg-gray-100 border p-6 rounded-lg">
                                    <img class="max-w-xs max-h-80  rounded  object-cover object-center mb-6 mx-auto"
                                        src="{{ asset('storage/images/'.$blog->image) }}" alt="content">
                                    <h3 class="tracking-widest text-indigo-500 text-lg font-medium title-font">
                                        {{ $blog->title}}
                                    </h3>
                                    <p class="text-md text-gray-900 font-medium title-font mb-2 ">
                                        {{ $blog->content}}
                                    </p>

                                        <p class="text-gray-600 py-2 text-sm">
                                            投稿日:{{ $blog->created_at->format('Y-m-d')}}</p>

                                        <div class="flex justify-between">
                                            @if($blog->user_id ==Auth::id()){{--user_idと認証されたユーザーのidが同じなら更新ボタンが表示されます--}}
                                            <form action="{{ route('user.edit',$blog->id) }}" method="GET" >
                                                <div class="flex flex-row-reverse">
                                                    @csrf
                                                    <button type="submit"
                                                        class="focus:outline-none text-white text-sm py-2 px-2 mr-1 rounded-lg bg-yellow-400 hover:bg-yellow-500 hover:shadow-lg flex items-center">
                                                        更新
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>

                                            <form action="{{ route('user.delete',$blog->id) }}" method="POST"
                                                onsubmit="return checkDelete()">
                                                <div class="flex flex-row-reverse">
                                                    @csrf
                                                    <button type="submit"
                                                        class="focus:outline-none text-white text-sm py-2 px-2 rounded-lg bg-red-500 hover:bg-red-600 hover:shadow-lg flex items-center">
                                                        削除
                                                        <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                            @else
                                            @endif
                                        </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
        }
    </script>
</x-app-layout>