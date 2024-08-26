<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {

    $app->get('/', 'DisplayAllItemsController');
    $app->post('/add-item', 'NewItemController');
    $app->put('/update-status/{id}-{status}', 'ItemStatusUpdateController');
    $app->put('/update-price/{id}-{price}', 'ItemPriceUpdateController');
    $app->delete('/delete-item/{id}', 'DeleteItemController');

};
