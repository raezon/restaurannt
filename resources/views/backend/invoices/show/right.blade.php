<div class=" col-span-2">
    <div id="pointer" class="p-2 text-lg font-bold">
        <b>Food</b>
    </div>
    @include('backend.invoices.show.partials.food',['data'=>$data])
    <div id="pointer" class="p-2 text-lg font-bold">
        <b>Plat</b>
    </div>
    @include('backend.invoices.show.partials.plat',['data'=>$data])
</div>