<?php

namespace App\Actions;

class StorePanelAction
{

    public function getPanels()
    {
        $dumiesPanel =  [
            '0' => [
                'name' => 'Invoices',
                'img' => 'facture.png',
                'url' => 'invoices'
            ],
            '1' => [
                'name' => 'Bill payment',
                'img' => 'bill.png',
                'url' => 'bill'
            ],

        /*    '2' => [
                'name' => 'Shopping',
                'img' => 'goods.png',
                'url' => 'ingrediants'
            ],*/
            '3' => [
                'name' => 'Categories',
                'img' => 'barbecue.png',
                'url' => 'categories'
            ],
            '4' => [
                'name' => 'Foods',
                'img' => 'food.png',
                'url' => 'foods'
            ],
            '5' => [
                'name' => 'Plat',
                'img' => 'plat.png',
                'url' => 'plats'
            ],
            '6' => [
                'name' => 'Pack',
                'img' => 'pack.png',
                'url' => 'packs'
            ],
            '7' => [
                'name' => 'Inventory management',
                'img' => 'warehouse.png',
                'url' => 'inventory'
            ],
           /* '8' => [
                'name' => 'Reports',
                'img' => 'report.png',
                'url' => 'reports'
            ],*/
          /*  '9' => [
                'name' => 'Transaction',
                'img' => 'visa.png',
                'url' => 'transactions'
            ],*/
            '10' => [
                'name' => 'The rooms',
                'img' => 'store.png',
                'url' => 'rooms'
            ],
            '11' => [
                'name' => 'Customers',
                'img' => 'specialist-user.png',
                'url' => 'customers'
            ],
            '12' => [
                'name' => 'Users',
                'img' => 'customer-service.png',
                'url' => 'users'
            ],
            '13' => [
                'name' => 'Restaurant Settings',
                'img' => 'settings.png',
                'url' => 'settings'
            ],


        ];
        return $dumiesPanel;
    }
}
