<x-app-layout>


    <div class="flex items-center bg-indigo-100 w-screen min-h-screen" style="font-family: 'Muli', sans-serif;">
        <div class="container ml-auto mr-auto flex flex-wrap items-start mt-4">

            @foreach($panels as $panel)
            <div class="w-full md:w-1/2 lg:w-1/4 pl-5 pr-5 mb-5 lg:pl-2 lg:pr-2">
                <div class="bg-white rounded-lg m-h-80 p-2 transform hover:translate-y-2 hover:shadow-xl transition duration-300">
                    <figure class="mb-2">
                        <img width="150" height="150" src="{{'assets/img/'.$panel['img']}}" alt="" class="h-24 ml-auto mr-auto" />
                    </figure>

                    <div class="flex items-center">
                            @php $url=$panel['url'] @endphp
                            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 rounded"
                            onclick="location.href='{{$url}}'">
                                {{$panel['name']}}
                            </button>
                        

                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>