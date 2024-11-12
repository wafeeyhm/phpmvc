<h1>Edit prodoct</h1>

<p><a href="/products/<?= $product["id"] ?>/show">Cancel</a></p>

<form action="/products/<?= $product["id"] ?>/update" method="post">
    <?php require "form.php"; ?>
</form>