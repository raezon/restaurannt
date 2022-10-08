<!-- View stored in resources/views/greeting.blade.php -->
@extends('layouts.crud')

@section('content')

<body  class="bg-white-100">
    <form action="settings/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-6 gap-4 pt-4">
            <div class="col-start-2 col-span-4">
                <div class="bg-slate-300 border-2  text-center"><label class="col-form-label  rounded   d-block" style="padding: 10px;font-size: 21px;margin: 1px;padding-top: 3px;padding-bottom: 3px;">Paramètres du restaurant<br>Parameter<br></label></div>
            </div>
        </div>

        <div class="table-responsive table-bordered text-right" style="padding: 15px;">
            <table class="border-separate border border-slate-400">
                <tbody style="background-color: #fff4e3;">
                    <tr>
                        <td class="p-2 border border-slate-300" style="width: 20%;">
                            <input type="file" name="photo" id="logo">
                        <td class="p-2 border border-slate-300" style="width: 20%;">:Affichage du logo</td>
                        <td class="p-2 border border-slate-300" style="width: 20%;"><input type="text" id="restaurant_name" name="name" value=""></td>
                        <td class="p-2 border border-slate-300" style="width: 20%;">&nbsp;: Nom du restaurant</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-slate-300"><input type="text" id="location" name="location" value=""></td>
                        <td class="p-2 border border-slate-300">: site web</td>
                        <td class="p-2 border border-slate-300"><input type="text" id="restaurant_owner" name="owner_name" value=""></td>
                        <td class="p-2 border border-slate-300">&nbsp;: Proprietaire du restaurant</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-slate-300"><input type="checkbox" id="appear_phone" name="phone" value="0798457017"></td>
                        <td class="p-2 border border-slate-300">afficher num dans la facture</td>
                        <td class="p-2 border border-slate-300"><input type="email" id="email" name="email" value=""></td>
                        <td class="p-2 border border-slate-300">: Email</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-slate-300"><input type="checkbox" id="appear_email" name="store_email"></td>
                        <td class="p-2 border border-slate-300">afficher email dans la facture ؟</td>
                        <td class="p-2 border border-slate-300"><input type="text" inputmode="tel" id="phone" name="store_phone" value=""></td>
                        <td class="p-2 border border-slate-300">: Numéro de portable du restaurant</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-slate-300"><input  class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit" id="remove_all_bills" name="remove_all_bills" value="Delete جميع Factures" onclick="removeall()" /></td>
                        <td class="p-2 border border-slate-300 text-right justify-content-lg-center align-items-lg-center">Delete tous les factures</td>
                        <td class="p-2 border border-slate-300"><textarea style="width: 90%;height: 80px;" id="remarks" name="remarks"></textarea></td>
                        <td class="p-2 border border-slate-300">: Notes sous la facture</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-slate-300"><input type="text" inputmode="numeric" id="logo_height" name="logo_height" value=""></td>
                        <td class="p-2 border border-slate-300">: longeur logo</td>
                        <td class="p-2 border border-slate-300"><input type="text" inputmode="numeric" id="logo_width" name="logo_width" value=""></td>
                        <td class="p-2 border border-slate-300">: عرض الشعار</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col text-center"><input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit" style="width: 100px;height: 41px;" name="submit" value="update" /></div>
    </form>

</body>
@endsection