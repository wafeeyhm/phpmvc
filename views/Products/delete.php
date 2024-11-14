<h1>Delete prodoct</h1>

<p><a href="/products/<?= $product["id"] ?>/show">Cancel</a></p>

<form action="/products/<?= $product["id"] ?>/destroy" method="post">
    
    <p>Delete this product?</p>
    <button>Yes</button>

</form>