<?php

namespace App\Actions;

class StorePanelAction
{

    public function getPanels()
    {
        $dumiesPanel =  [
            '0' => [
                'name' => 'Invoices',
                'img' => 'facture.png'
            ],
            '1' => [
                'name' => 'Bill payment',
                'img' => 'bill.png'
            ],
            '2' => [
                'name' => 'Shopping',
                'img' => 'goods.png'
            ],
            '3' => [
                'name' => 'Customers',
                'img' => 'specialist-user.png'
            ],
            '4' => [
                'name' => 'Users',
                'img' => 'customer-service.png'
            ],
            '5' => [
                'name' => 'Types',
                'img' => 'barbecue.png'
            ],
            '6' => [
                'name' => 'Foods',
                'img' => 'lunch-box.png'
            ],
            '7' => [
                'name' => 'Inventory management',
                'img' => 'warehouse.png'
            ],
            '8' => [
                'name' => 'Reports',
                'img' => 'report.png'
            ],
            '9' => [
                'name' => 'Bank transfers',
                'img' => 'visa.png'
            ],
            '10' => [
                'name' => 'The rooms',
                'img' => 'store.png'
            ],

            '11' => [
                'name' => 'Restaurant Settings',
                'img' => 'settings.png'
            ]

        ];
        return $dumiesPanel;
    }
}
