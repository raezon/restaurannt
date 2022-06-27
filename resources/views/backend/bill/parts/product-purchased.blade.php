<div ng-repeat="purchasedProduct in purchasedProducts" >
    <div class="flex justify-center pb-20 product-purchase" id="<%purchasedProduct.id%>">
        <div class="pt-4 ">
            <img class="border-4 border-indigo-600" ng-src="/uploads/test/<%purchasedProduct.photo%>" alt="" width="80" height="80">
            @include('backend.bill.parts.increment',['name'=>"test"])
            <span class="font-bold text-lg"> <%purchasedProduct.price%> $</span>
        </div>
    </div>
</div>