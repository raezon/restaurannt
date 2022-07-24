<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>=Ingrediants</title>
</head>

<div class="w-3/3 pt-4">
    <label class="block text-sm font-bold text-gray-700" for="title">
        Ingrediants
    </label>
    <div class="relative flex w-full">
        <select id="select-role" name="stock[]" multiple placeholder="Select ingrediant..." autocomplete="off" class="block w-full rounded-sm cursor-pointer focus:outline-none" multiple>
            @foreach($ingrediants as $ingrediant)
            <option value="{{$ingrediant['id']}}">{{$ingrediant['name']}}</option>
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