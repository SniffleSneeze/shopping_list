<?php
declare(strict_types=1);

use App\DbConnection\DbConnection;
use App\Factories\DeleteItemControllerFactory;
use App\Factories\DisplayAllItemsControllerFactory;
use App\Factories\ItemPriceUpdateControllerFactory;
use App\Factories\ItemsModelFactory;
use App\Factories\ItemStatusUpdateControllerFactory;
use App\Factories\NewItemControllerFactory;
use App\Models\ItemsModel;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    // DB Connection
    $container['dbConnection'] = DbConnection::getConnection();

    // Modals
    $container['itemsModel'] = DI\factory(ItemsModelFactory::class);

    // Factories
    $container['DisplayAllItemsController']  = DI\factory(DisplayAllItemsControllerFactory::class);
    $container['NewItemController']          = Di\factory(NewItemControllerFactory::class);
    $container['ItemStatusUpdateController'] = DI\factory(ItemStatusUpdateControllerFactory::class);
    $container['ItemPriceUpdateController']  = DI\factory(ItemPriceUpdateControllerFactory::class);
    $container['DeleteItemController']       = DI\factory(DeleteItemControllerFactory::class);

    // renderer
    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        return new PhpRenderer($settings['template_path']);
    };


    $containerBuilder->addDefinitions($container);
};
