<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wdith-device-width, initial-scale-1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title> SEARCH PRODUCT </title>
</head>

<body>
    <div class="container text-center mt-5">
        <form action="search-product.php" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search a product" name="search_prod">
                <button class="btn btn-success" type="submit" id="search"> Search <i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$products = [
    'products' => []
];
if (isset($_POST['search_product'])){

    $search_product = $_POST['search_product'];
    $response = $client->get('https://dummyjson.com/products/search?q='. $search_product);
    $code = $response->getStatusCode();
    $body = $response->getBody();
    $products = json_decode($body, true);}
?>

<html>
    <body>
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thumbnail</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($products['products'] as $product){ ?>
                    <tr>
                        <th scope="row"><?= $product['id'];?></th>
                        <td><?= $product['title']; ?></td>
                        <td><?= $product['description']; ?></td>
                        <td><?= $product['price']; ?></td>
                        <td><?= $product['brand']; ?></td>
                        <td><?= $product['category']; ?></td>
                        <td><img src="<?= $product['thumbnail']; ?>" width="100px"></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </body>
</html>
