<?php

namespace App\Factories;

use App\Models\ItemsModel;

class ItemsModelFactory
{
    public function __invoke($container): ItemsModel
    {
        $db = $container->get('dbConnection');
        return new ItemsModel($db);
    }
}