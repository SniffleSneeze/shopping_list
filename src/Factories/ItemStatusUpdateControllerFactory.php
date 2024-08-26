<?php

namespace App\Factories;

use App\Controllers\ItemStatusUpdateController;

class ItemStatusUpdateControllerFactory
{
    public function __invoke($container): ItemStatusUpdateController
    {
        $model = $container->get('itemsModel');
        return new ItemStatusUpdateController($model);
    }
}