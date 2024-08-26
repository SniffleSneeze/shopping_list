<?php

namespace App\Factories;

use App\Controllers\DeleteItemController;

class DeleteItemControllerFactory
{
    public function __invoke($container): DeleteItemController
    {
        $model = $container->get('itemsModel');
        return new DeleteItemController($model);
    }
}