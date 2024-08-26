<?php

namespace App\Factories;

use App\Controllers\DisplayAllItemsController;

class DisplayAllItemsControllerFactory
{
    public function __invoke($container): DisplayAllItemsController
    {
        $model = $container->get('itemsModel');
        $renderer = $container->get('renderer');
        return new DisplayAllItemsController($model, $renderer);
    }

}