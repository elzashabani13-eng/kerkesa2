<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role']!="admin"){
    header("Location:index.php");
    exit;
}
require_once __DIR__ . "/classes/Product.php";
require_once __DIR__ . "/classes/Contact.php";

$product = new Product();
$products = $product->getAll();

$contact = new Contact();
$messages = $contact->getAll();
?>
<h1>Admin Dashboard</h1>
<h2>Products</h2>
<table border="1">
<tr><th>ID</th><th>Title</th><th>Image</th></tr>
<?php while($p=$products->fetch_assoc()): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= $p['title'] ?></td>
<td><img src="uploads/products/<?= $p['image'] ?>" width="50"></td>
</tr>
<?php endwhile; ?>
</table>

<h2>Contact Messages</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>
<?php while($m=$messages->fetch_assoc()): ?>
<tr>
<td><?= $m['id'] ?></td>
<td><?= $m['name'] ?></td>
<td><?= $m['email'] ?></td>
<td><?= $m['message'] ?></td>
</tr>
<?php endwhile; ?>
</table>
<a href="add_product.php">Add Product</a>
