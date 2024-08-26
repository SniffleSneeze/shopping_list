<?php

namespace App\Factories;

use App\Controllers\ItemsPriceUpdatedController;

class ItemPriceUpdateControllerFactory
{
    public function __invoke($container): ItemspriceUpdatedController
    {
        $model = $container->get('itemsModal');
        return new ItemspriceUpdatedController($model);
    }
}
