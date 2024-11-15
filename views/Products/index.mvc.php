{% extends "base.mvc.php" %}

{% block title %}Products{% endblock %}

{% block body %}

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
            <a href="/products/{{ product['id'] }}/show">
            {{ product["name"] }}
            </a>
        </td> 
        </tr>
    {% endforeach; %}
    </tbody>
</table>

{% endblock %}