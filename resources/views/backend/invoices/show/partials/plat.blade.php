@foreach ($data->plat as $key => $element)
<div class="flex justify-between pb-4">
    <div>
        <br>
        <h2 class="text-lime-700 font-bold text-xl">{{$element->name}}</h2>
        <p for="">test</p>
        <span class="text-lime-700 font-bold text-lg">{{$element->price}} $</span>
    </div>
    <div>
    <img src="/uploads/test/{{$element->photo}}" alt="" width="80" height="80">
    </div>
</div>
@endforeach