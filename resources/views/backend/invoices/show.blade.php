<!-- View stored in resources/views/greeting.blade.php -->
@extends('layouts.crud')

@section('content')

<style>
    h1 {
        color: #FCB715;
        font-weight: bolder;
    }

    .vl {
        border-left: 6px solid #FCB715;
        min-height: 500px;
        position: absolute;
        left: 50%;
        margin-left: -3px;
        top: 220px;
        padding-left: 10px;
        padding-right: 10px;
    }

    #pointer {
        width: 200px;
        height: 40px;
        position: relative;
        background: #FCB715;
    }

    #pointer:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 0px solid none;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
    }

    #pointer:before {
        content: "";
        position: absolute;
        right: 0px;
        bottom: 0;
        width: 0;
        height: 0;
        border-right: 41px solid white;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
    }
    .container{
        height: 1000px;
    }
</style>
<div class="container mx-auto mt-12">
    <div class="text-center text-6xl pb-12">
        <h1>Billing</h1>
    </div>

    <div class="grid grid-flow-col gap-3">
        @include('backend.invoices.show.right',['data'=>$data])
        <div class="vl"></div>
        @include('backend.invoices.show.left',['data'=>$data])

    </div>

</div>


@endsection
