<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/users'
]);
$users = [
    'json' => [
    'firstName' => 'Booji',
    'maidenName' => 'Kim',
    'lastName' => 'Yu',
    'age' => '22',
    'gender' => 'Male',
    'image' => 'sup.jpeg'
      ]
  ];

$response = $client->put("https://dummyjson.com/users/1", $users);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>UPDATE USER</title>
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row"><?php echo $user->id ?></th>
                        <td><?php echo $user->firstName ?></td>
                        <td><?php echo $user->lastName ?></td>
                        <td><?php echo $user->age ?></td>
                        <td><?php echo $user->gender ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->phone ?></td>
                        <td><?php echo $user->bloodGroup ?></td>
                        <td><img src="<?php echo $user->image ?>" width="100px" length="70"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>