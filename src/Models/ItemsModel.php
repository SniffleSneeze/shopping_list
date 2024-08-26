<?php

namespace App\Models;

use PDO;

class ItemsModel
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all items from the Database
     *
     * @return array
     */
    public function getAllItems(): array
    {
        $query = $this->db->prepare('SELECT `id`, `item`, `price`, `status` FROM `items`;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     *  Add a new items to the database
     *
     * @param string $item
     * @return bool
     */
    public function addItem(string $item, float $price = 0.0): bool
    {
        $query = $this->db->prepare('INSERT INTO `items` (item, price) VALUES (:item, :price);');
        return $query->execute(
            [
                ':item' => $item,
                ':price' => $price,
            ]
        );
    }

    /**
     *  Update status of item
     *
     *  Zero ⇒ not completed <br>
     *  One ⇒ completed
     *
     * @param string $itemId
     * @return bool
     */
    public function updateItemStatus(string $itemId, string $status): bool
    {
        $query = $this->db->prepare('UPDATE `items` SET status = :status WHERE  id = :itemId;');
        return $query->execute(
            [
                ':itemId' => $itemId,
                ':status' => $status,
            ]
        );
    }

    /**
     * Update price of item
     *
     * @param string $itemId
     * @param float $price
     * @return bool
     */
    public function updateItemPrice(string $itemId, float $price): bool
    {
        $query = $this->db->prepare('UPDATE `items` SET price = :price  WHERE  id = :itemId;');
        return $query->execute(
            [
                ':itemId' => $itemId,
                ':price' => $price,
            ]
        );
    }

    /**
     * Delete an item
     *
     * @param string $itemId
     * @return bool
     */
    public function deleteItem(string $itemId): bool
    {
        $query = $this->db->prepare('DELETE FROM `items`  WHERE  id = :itemId;');
        return $query->execute([':itemId' => $itemId,]);
    }

}