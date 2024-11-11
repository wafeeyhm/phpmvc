<h1>Products</h1>
<a href="/products/new">New Product</a>
<table class="table">
    <thead>
        <th scope="col">Name</th>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
        <td>
            <a href="/products/<?= $product["id"]?>/show">
            <?= htmlspecialchars($product['name']) ?>
            </a>
        </td> 
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>