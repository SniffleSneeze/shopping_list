<?php

namespace App\Controllers;

use App\Models\ItemsModel;
use Psr\Http\Message\ResponseInterface;

class DeleteItemController
{
    private ItemsModel $itemsModel;

    /**
     * @param mixed $itemsModel
     */
    public function __construct($itemsModel)
    {
        $this->itemsModel = $itemsModel;
    }

    public function __invoke($request, $response, $args): ResponseInterface
    {
        $this->itemsModel->deleteItem($args['id']);

        return $response->withheader('Location', '/')->withStatus(302);
    }
}