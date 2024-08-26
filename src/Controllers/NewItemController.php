<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\ItemsModel;
use Psr\Http\Message\ResponseInterface;

class NewItemController extends Controller
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
        $item = $request->getParsedBody();

        $this->itemsModel->addItem($item['addItem'], $item['addPrice']);

        return $response->withheader('Location', '/')->withStatus(302);
    }
}