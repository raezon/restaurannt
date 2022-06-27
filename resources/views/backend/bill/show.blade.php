@extends('layouts.bill')

@section('content')
<?php
      
            print_r($data['products']);
       
?>
<div>
    <div class="col text-center"><button id="printPageButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" style="margin: 10px;padding-right: 15px;padding-left: 15px;font-family: Changa, sans-serif;" onClick="window.print();">Print Bill</button></div>
    
    <div class="flex justify-center">
        <img style="margin: 5px;border-color: blue;" src="{{'/uploads/test/'.$data['image']['0']['image']}}" class="" height="{{$data['image']['2']['height']}}" width="{{$data['image']['1']['width']}}" />
    </div>

    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الموقع مكة المكرمة</label></div>
    <!--phone-->
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الهاتف:{{$data['settings']->apear_phone}}</label></div>
    <!--date-->
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">Date:<?php echo Date('y-m-d'); ?><br></label></div>
    <!-- user-->
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">مدخل الفاتورة:<?php echo "ammar dje" ?><br></label></div>

    <div id="image_data"></div>
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">شكرا لزيارتكم<br>Thank you for your visit<br></label></div>
    <div class="col text-center"><button id="printPageButton" class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" type="button" style="margin: 10px;margin-bottom:20px">Cancel<i class="fa fa-close" style="margin: 5px;"></i></button></div>
</div>
@endsection