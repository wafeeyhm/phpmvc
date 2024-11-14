<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Products</h1>
<a href="/products/new">New Product</a>
<p>Total: {{ total }}</p>
<table class="table">
    <thead>
        <th scope="col">Name</th>
    </thead>
    <tbody>
    {% foreach ($products as $product): %}
        <tr>
        <td>
            <a href="/products/<?= $product["id"]?>/show">
            {{ product["name"] }}
            </a>
        </td> 
        </tr>
    {% endforeach; %}
    </tbody>
</table>
</body>
</html>