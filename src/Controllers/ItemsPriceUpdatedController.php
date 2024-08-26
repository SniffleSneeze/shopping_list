<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\ItemsModel;
use Psr\Http\Message\ResponseInterface;

class ItemsPriceUpdatedController extends Controller
{
    private ItemsModel $itemsModel;

    public function __construct(ItemsModel $itemsModel)
    {
        $this->itemsModel = $itemsModel;
    }

    public function __invoke($request, $response, $args): ResponseInterface
    {

        $this->itemsModel->updateItemPrice($args['id'], $args['price']);
        return $response->withheader('Location', '/')->withStatus(302);
    }
}