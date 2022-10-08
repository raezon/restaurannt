<div class="custom-number-input h-10 w-32" ng-init="count=1">
  <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">{{$name}}
  </label>
  <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
    <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
      <span class="m-auto text-2xl font-thin"  ng-click="count=count-1;">−</span>
    </button>
    <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number"  ng-model="count"></input>
  <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
    <span class="m-auto text-2xl font-thin" ng-click="count=count+1;updateJsonProduct(count,purchasedProduct)">+</span>
  </button>
</div>
