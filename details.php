<?php
  session_start();

 if (!isset($_SESSION['logged_in'])) {
     header('Location: sign');
 }

else {
 $idsess = $_SESSION['id'];
}
 require 'includes/header.php';
 ?>

 <div class="container print">
   <table>
      <thead>
        <tr>
            <th data-field="name">Item Name</th>
            <th data-field="category">Category</th>
            <th data-field="price">Price</th>
            <th data-field="quantity">Quantity</th>
            <th data-field="country">Sub Total</th>
        </tr>
      </thead>
      <tbody class="scroll">
        <?php
           include 'db.php';
          //get products
          $queryproduct = "SELECT product.name as 'name',
          product.id as 'id', product.price as 'price',
          category.name as 'category', command.id_user, command.statut,
          command.quantity as 'quantity'
FROM category, product, command
WHERE command.id_produit = product.id AND product.id_category = category.id AND command.statut = 'ordered'";
          $result1 = $connection->query($queryproduct);
          if ($result1->num_rows > 0) {
          // output data of each row
          while($rowproduct = $result1->fetch_assoc()) {
            $id_productdb = $rowproduct['id'];
            $name_product = $rowproduct['name'];
            $category_product = $rowproduct['category'];
            $quantity_product = $rowproduct['quantity'];
            $price_product = $rowproduct['price'];

            ?>
          <tr>
            <td><?= $name_product; ?></td>
            <td><?= $category_product; ?></td>
            <td><?= $price_product; ?></td>
            <td><?= $quantity_product; ?></td>
            <td><?= $price_product*$quantity_product; ?></td>
          </tr>
        <?php }}?>
      </tbody>
    </table>
    <div class="right-align">
      <p>Thank you for trusting us © Esy Buys Inc <?= date('Y'); ?></p>
    </div>

    <form method="post">
      <button type="submit" name="done" class="button-rounded waves-effect waves-light btn">Home</button>
      <!--<button type="submit" name="done2" class="blue waves-effect waves-light btn">
      save as pdf <i class="fa fa-print"></i></button>-->
      <?php

        if (isset($_POST['done'])) {



          $queryupdate = "UPDATE details_command SET statut = 'done' WHERE id_user = '$idsess' AND statut = 'ready'";
          $queryupdate = mysqli_query($connection, $queryupdate);

          echo "<meta http-equiv='refresh' content='0;url=index' />";
        }

       ?>
    </form>
 </div>

<?php require 'includes/footer.php'; ?>
