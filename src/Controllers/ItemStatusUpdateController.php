<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\ItemsModel;
use Psr\Http\Message\ResponseInterface;

class ItemStatusUpdateController extends Controller
{
    private ItemsModel $itemsModel;

    public function __construct(ItemsModel $itemsModel)
    {
        $this->itemsModel = $itemsModel;
    }

    public function __invoke($request, $response, $args): ResponseInterface
    {
        // translate the string boolean from the front-end to int for the DB
        $status = strtolower($args['status']) == 'true' ? 1 : 0;

        $this->itemsModel->updateItemStatus($args['id'], $status);
        return $response->withheader('Location', '/')->withStatus(302);
    }
}