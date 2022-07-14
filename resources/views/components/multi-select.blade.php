<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind Multiselect with tom-select</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
      rel="stylesheet"
    />
  </head>

    <div class="w-3/3">
      <label class="inline-block text-sm text-gray-600" for="Multiselect"
        >Select food or pack</label
      >
      <div class="relative flex w-full">
        <select
          id="select-role"
          name="pack[]"
          multiple
          placeholder="Select product..."
          autocomplete="off"
          class="block w-full rounded-sm cursor-pointer focus:outline-none"
          multiple
        >
          @foreach($products as $product)
          <option value="{{$product['product_id']}}">{{$product['name']}}</option>
          @endforeach
        
        </select>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
      new TomSelect('#select-role', {
        maxItems: 100,
      });
    </script>
  </body>
</html>