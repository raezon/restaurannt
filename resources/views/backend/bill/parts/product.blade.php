 <div ng-repeat="product in products">
     <div class="flex justify-between">
         <div>
             <img ng-click="display(product)" class="border-4 border-indigo-600" ng-src="{{ url('/') }}/uploads/test/<%product.photo%>" alt="" width="80" height="80">
             <span class="text-lime-700 font-bold text-lg"> <%product.name%> </span>
             <br>
             <span class="text-lime-700 font-bold text-lg"> <%product.price%> </span>
         </div>
     </div>
 </div>