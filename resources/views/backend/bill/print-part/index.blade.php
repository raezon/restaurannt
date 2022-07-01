<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    product name
                </th>
                <th scope="col" class="px-6 py-3">
                    description
                </th>
                <th scope="col" class="px-6 py-3">
                    category
                </th>
                <th scope="col" class="px-6 py-3">
                    price
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{$product->name}}
                </th>
                <td class="px-6 py-4">
                    {{$product->description}}
                </td>
                <td class="px-6 py-4">
                    {{$product->category }}
                </td>
                <td class="px-6 py-4">
                    {{$product->price}}
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>