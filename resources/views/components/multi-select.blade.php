<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>multi select</title>
</head>

<div class="w-3/3">

  <label class="block text-sm font-bold text-gray-700 pt-4" for="title">
    Select food or pack
  </label>
  <div class="relative flex w-full">
    <select id="select-role" name="pack[]" multiple placeholder="Select product..." autocomplete="off" class="block w-full rounded-sm cursor-pointer focus:outline-none" multiple>
      @foreach($products as $product)
      <option value="{{$product['product_id']}}">{{$product['name']}}</option>
      @endforeach

    </select>
  </div>
</div>
<script>
  new TomSelect('#select-role', {
    maxItems: 100,
  });
</script>
</body>

</html>