@foreach ($data as $key => $element)
<div class="flex justify-between pb-4">
    <div>
        <br>
        <h2 class="text-lime-700 font-bold text-xl">{{$element->product->name}}</h2>
        <p for="">test</p>
        <span class="text-lime-700 font-bold text-lg">{{$element->product->price}} $</span>
    </div>
    <div>
    <img src="{{Storage :: url($element->product->picture)}}" alt="" width="80" height="80">
    </div>
</div>
@endforeach