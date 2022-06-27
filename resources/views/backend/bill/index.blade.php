<!-- View stored in resources/views/greeting.blade.php -->
@extends('layouts.bill')

@section('content')
<style>
    ul {
        display: inline-block;

    }

    li {
        display: inline-block;
    }

    .table td {
        background-color: white !important;
    }

    .face:hover {
        animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
    }

    @keyframes shake {

        10%,
        90% {
            transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
            transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
            transform: translate3d(-4px, 0, 0);
        }

        40%,
        60% {
            transform: translate3d(4px, 0, 0);
        }
    }

    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }
</style>

<div id="1">
    <div>
        <div class="container">
            <div class="row">
                <div class="grid grid-cols-6 gap-4 pt-4">
                    <div class="col-start-2 col-span-4">
                        <div class="bg-slate-300 border-2  text-center"><label class="col-form-label  rounded   d-block" style="padding: 10px;font-size: 21px;margin: 1px;padding-top: 3px;padding-bottom: 3px;">New Bill<br></label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container mx-auto px-4">
            <div class="row" style="background-color: #bcbcbc;margin: 4px;">
                <div class="col-md-12 col-lg-12 text-right" style="margin: 9px;"><input id="R" type="number" value="0"><label style="margin-top: 3px;margin-left: 3px;">: rest</label><input id="P" type="number" value="0"><label style="margin-right: 3px;margin-left: 3px;">: paid </label><input id="C" type="text"><label style="margin-right: 3px;margin-left: 3px;">: Name client</label>
                    <input id="T" type="tel"><label style="margin-right: 3px;margin-left: 3px;">: Phone Number&nbsp;</label>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 " style="background-color: #e9e9e9;margin-left:0;padding: 6px;">
                <!---First row category with product-->
                <div class="col-span-2">
                    <div class="grid grid-cols-1 gap-4 ">
                        @include('backend.bill.parts.category',['categories'=>$data['category']])
                        <div id="image_2">
                            @include('backend.bill.parts.product')
                        </div>
                    </div>
                </div>
                <!---end row category with product-->
                <!---second  row display bill-->
                <div class="text-center" style="background-color: #e9e9e9;margin-left: 0;margin-right: 0;"><label class="text-center text-xl border rounded" style="background-color: #f76c6c;"> List Types المختارة</label>
                    @include('backend.bill.parts.product-purchased')
                </div>
                <!---end second  row display bill-->
            </div>
        </div>
    </div>
    <div class="col text-center">
        <form action="http://127.0.0.1:8000/bill/view" method="POST" class="pay-bill">
            @csrf

            <button type="submit" ng-click="printBill()" id="imp" class="bg-teal-500 hover:bg-teal-700 text-white font-bold  rounded" type="button" style="width: 150px;height: 50px;margin: 20px;">
                Imprimer الفاتورة
            </button>
            <input type="hidden" name="ids" id="ids-billing">
        </form>

    </div>
 
</div>
@endsection