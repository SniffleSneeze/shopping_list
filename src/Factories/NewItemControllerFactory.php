<?php

namespace App\Factories;

use App\Controllers\NewItemController;

class NewItemControllerFactory
{
    public function __invoke($container): NewItemController
    {
        $model = $container->get('itemsModel');
        return new NewItemController($model);
    }
}
