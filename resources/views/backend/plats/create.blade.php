@extends('layouts.crud')

@section('content')
<!-- Create Post -->
<div>
    <div class="flex flex-col items-center min-h-screen  bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="mb-4">
                <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
                    Create Plat
                </h1>
            </div>

            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form method="POST" action="/plats/store"  enctype="multipart/form-data">
                    @csrf
                    <!-- name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            name
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="180" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700" for="password">
                            Description
                        </label>
                        <textarea name="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" placeholder="400"></textarea>
                    </div>

                    <!-- price -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            price
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="price" placeholder="dzd" />
                    </div>
                    <!-- category -->
                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700" for="password">
                            category
                        </label>
                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="category" placeholder="" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            sku
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="sku" placeholder="" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            photo
                        </label>

                        <input class="" type="file" name="photo" />
                    </div>

                    <div class="flex items-center justify-start mt-4 gap-x-2">
                        <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection