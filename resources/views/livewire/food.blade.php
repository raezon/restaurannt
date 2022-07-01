<div>
    @if (session()->has('message'))
        <div class="flex mx-auto w-1/4 sm:w-full md:w-full">
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 mx-auto">
            <span class="inline-block align-middle mr-8">
                <b class="capitalize">Success!</b> {{ session('message') }}
              </span>
                <button wire:click="clearFlash()"
                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span>×</span>
                </button>
            </div>
        </div>
    @endif
    <div>
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden  sm:rounded-lg p-2 flex flex-row justify-between">
                        <div class="w-1/4">
                            <input wire:model="search" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-1/2" id="search" type="text" name="search" wire:model="search" required="required" autofocus="autofocus">
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition" wire:click="create">
                               {{ __('Add New') }} Food
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            NAME
                            </th>

<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PICTURE
                            </th>

<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CREATED AT
                            </th>

<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            UPDATED AT
                            </th>



                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($rows as $row)
<tr> <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $row->name}}</td>

 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $row->picture}}</td>

 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $row->created at}}</td>

 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $row->updated at}}</td>

<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900" wire:click="edit({{ $row->id }})">{{ __("Edit") }}</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900" wire:click="confirmDelete({{ $row->id }})">{{ __("Delete") }}</a>
                            </td></tr>@empty  <tr><td>No Records Found</td></tr>   @endforelse

                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $rows->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--    create / edit form --}}
    @if($showForm)
      <div class="fixed z-10 inset-0 overflow-y-scroll" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-200 opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full mx-auto">
                        <div class="flex flex-row justify-start p-2 bg-gray-100">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{ $mode == 'create' ? 'bg-green-100' : 'bg-blue-100' }} sm:mx-0 sm:h-10 sm:w-10">
                                @if($mode == 'create')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900 ml-4 p-2" id="modal-title">
                                {{ $mode == 'create' ? 'Add New Record' : 'Update Record ' }}
                            </h3>
                        </div>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">

                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">

                                    <div class="mt-2">
                                       <div><label class='block'><span class='text-gray-700 @error('name') text-red-500  @enderror'>Name</span><input type='text' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('name')  border-red-500 @enderror focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' wire:model='name'>@error('name')<span class='text-red-500 text-sm'>{{ $message }}</span>@enderror</label></div>
<div><label class='block'><span class='text-gray-700 @error('picture') text-red-500  @enderror'>Picture</span><input type='text' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('picture')  border-red-500 @enderror focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' wire:model='picture'>@error('picture')<span class='text-red-500 text-sm'>{{ $message }}</span>@enderror</label></div>
<div><label class='block'><span class='text-gray-700 @error('created_at') text-red-500  @enderror'>Created at</span><input type='text' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('created_at')  border-red-500 @enderror focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' wire:model='created_at'>@error('created_at')<span class='text-red-500 text-sm'>{{ $message }}</span>@enderror</label></div>
<div><label class='block'><span class='text-gray-700 @error('updated_at') text-red-500  @enderror'>Updated at</span><input type='text' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('updated_at')  border-red-500 @enderror focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' wire:model='updated_at'>@error('updated_at')<span class='text-red-500 text-sm'>{{ $message }}</span>@enderror</label></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button @if($mode == 'create') wire:click="store()" @else wire:click="update()" @endif type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                {{ $mode == 'create' ? 'Save Record' : 'Update Record' }}
                            </button>
                            <button wire:click="$set('showForm', false)" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    @endif
{{--    /create /edit form--}}


{{--    delete popup--}}
    @if($showConfirmDeletePopup)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-200 opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full mx-auto">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Delete Record
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                    Are you Sure you want to delete? This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="destroy()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                        <button wire:click="$set('showConfirmDeletePopup', false)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
{{--    /delete popup--}}
</div>
