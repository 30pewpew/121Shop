<?php
session_start();
if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign');
}
elseif($_SESSION['item'] < 1){
  header('Location: index');
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
  $email_sess = $_SESSION['email'];
  $country_sess = $_SESSION['country'];
  $firstname_sess = $_SESSION['firstname'];
  $lastname_sess = $_SESSION['lastname'];
  $city_sess = $_SESSION['city'];
  $address_sess = $_SESSION['address'];
}
 require 'includes/header.php';
 require $nav;?>
 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Home</a>
            <a href="cart" class="breadcrumb">Cart</a>
            <a href="checkout" class="breadcrumb">Checkout</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container checkout">
    <div class="card pay">
      <form method="post" action="final">
        <div class="row">

            <div class="input-field col s6">
              <input id="icon_prefix" type="text" name="email" value='<?= $email_sess; ?>' class="validate" placeholder=Ïnput NA if none required>
              <label for="icon_prefix">Credit Card Number</label>
            </div>

            <div class="input-field col s6">
              <select class="icons" name="payment" value=""; ?>">
          <option value=""  disabled selected>Choose your Payment Method</option>
          <option value="Master Card">Master Card</option>
          <option value="Visa">Credit Card</option>
          <option value="cash">Cash on Delivery</option>
        </select>
            </div>
                <div class="center-align">
                    <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Pay</button>
                </div>
          </div>
      </form>
    </div>
</div>

<?php require 'includes/footer.php'; ?>