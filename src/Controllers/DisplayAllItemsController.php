<?php

namespace App\Controllers;

use App\Models\ItemsModel;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class DisplayAllItemsController
{
    private ItemsModel $itemsModel;
    private PhpRenderer $renderer;

    public function __construct(ItemsModel $itemsModel, PhpRenderer $renderer)
    {
        $this->itemsModel = $itemsModel;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args): ResponseInterface
    {
        $items = $this->itemsModel->getAllItems();
        return $this->renderer->render($response, "index.php", ['items' => $items]);
    }
}