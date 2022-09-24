<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$response = $client->get('https://dummyjson.com/products/category/smartphones');
$code = $response->getStatusCode();
$body = $response->getBody();
$product_category = json_decode($body, true);

?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>PRODUCTS CATEGORIES</title>
    <style>
    body {
        background-color: #EFFFF1;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {
        border: 2px solid #B4EFBC;
        box-shadow: 0 0 10px 0 #B4EFBC inset,
        0 0 10px 0 #799be6;
    }
    </style>
    </head>
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
                    <?php foreach($product_category['products'] as $product){ ?>
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