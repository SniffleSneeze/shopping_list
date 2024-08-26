<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Shopping List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
          rel="stylesheet">
    <link href="/css/normalise.css" rel='stylesheet' type="text/css">
    <link href="/css/styles.css" rel='stylesheet' type="text/css">
    <script defer src="/javascript/index.js"></script>
</head>
<body>
<div class="container">
    <main>
        <div class="shopping-card">
            <div class="main-flex">
                <h1>Shopping List</h1>
                <form class="new-item-form" method="post" action="/add-item">
                    <label>
                        Item
                        <input type="text" name="addItem" required>
                    </label>
                    <label>
                        Price
                        <input type="number" step="0.01" name="addPrice" value="0.0" style="width: 50px">
                    </label>
                    <button type="submit">Add Items</button>
                </form>

                <div class="flex-table">
                    <div class="flex-table-title">Item</div>
                    <div class="flex-table-title">Price</div>
                    <div class="flex-table-title">Check</div>
                    <div class="flex-table-title">Delete</div>

                    <?php if (!empty($items)) {
                        foreach ($items as $item) {
                            echo '<div class="flex-item mark-status" data-status="' . $item['status'] . '">' . $item['item'] . '</div>';
                            echo '<div class="flex-item-price mark-status" data-status="' . $item['status'] . '">' . $item['price'] . '</div>';
                            echo '<div class="flex-item-status"><label class="label" for="' . $item['item'] . '"></label>'
                                . '<input class="checkbox" type="checkbox" id="' . $item['id'] . '" name="itemStatusToUpdate" value="' . $item['status'] . '"></div>';
                            echo '<div class="flex-item-delete"><button class="delete-item" name="deleteItem" value="' . $item['id'] . '">Delete</button></div>';
                        }
                    } else {
                        echo '<p class="welcome-message"> Welcome to your shopping list, please write down what you need.</p>';
                    }
                    ?>
                </div>
                <div class="total">
                    <p>Total:</p>
                    <p class=".currency">£</p>
                    <p class="total-value">0</p>
                </div>
            </div>
    </main>
</div>
</body>
</html>