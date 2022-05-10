<ul id="image_1" class="col-form-label  rounded   d-block" style="background-color: #6a6a6a;margin: 4px;">
@foreach($categories as $category)
    <li class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
        <button ng-click="getProducts('<?= $category->name ?>')" 
        id="<?= $category->id ?> " 
        class="p-4 nav-link active text-center border rounded border-light shadow-sm V" 
        style="background-color: #da9328;margin: 3px;color: rgb(0,0,0);">{{$category->name}}</button>
    </li>
    @endforeach
</ul>