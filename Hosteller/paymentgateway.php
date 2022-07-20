<?php
$apiKey = "rzp_test_h4zon0VufsHj1v";
include 'connection.php';
session_start();
if (isset($_SESSION['hosteller'])) {

  $id = $_SESSION['hosteller'];
  $query = "SELECT * FROM tbl_login where Login_id ='$id'";
  $res = mysqli_query($con, $query);
  $r = mysqli_fetch_array($res);



  $query1 = "SELECT * FROM tbl_hosteller where Login_id ='$id'";
  $res1 = mysqli_query($con, $query1);
  $r1 = mysqli_fetch_array($res1);


?>
  <!DOCTYPE html>
  <html>
  <title>Payment Gateway</title>

  <head>
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #242d60;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto',
          'Helvetica Neue', 'Ubuntu', sans-serif;
        height: 100vh;
        margin: 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      section {
        background: #ffffff;
        display: flex;
        flex-direction: column;
        width: 500px;
        height: 202px;
        border-radius: 6px;
        justify-content: space-between;
      }

      .product {
        display: flex;
        padding: 24px;
      }

      .description {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      p {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: -0.154px;
        color: #242d60;
        height: 100%;
        width: 100%;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
      }

      h3,
      h5 {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: -0.154px;
        color: #242d60;
        margin: 0;
      }

      h5 {
        opacity: 0.5;
      }

      button {
        height: 36px;
        background: #556cd6;
        color: white;
        width: 100%;
        font-size: 14px;
        border: 0;
        font-weight: 500;
        cursor: pointer;
        letter-spacing: 0.6;
        border-radius: 0 0 6px 6px;
        transition: all 0.2s ease;
        box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
      }

      .cbutton {
        height: 36px;
        background: #556cd6;
        color: white;
        width: 100%;
        font-size: 14px;
        margin-top: 20px;
        border: 0;
        font-weight: 500;
        cursor: pointer;
        letter-spacing: 0.6;
        border-radius: 0 0 6px 6px;
        transition: all 0.2s ease;
        box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
      }

      button:hover {
        opacity: 1;
      }

      .detailsection {
        display: block;
      }

      .anim {
        width: 25%;
        margin: 0% 4%;
      }
    </style>
    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->

  </head>
  <div class="anim" id="anim"></div>
  <?php

  $hid = $_GET['hid'];



  ?>
  <section>
    <div class="product">
      <div class="description">
        <h3>The AmountPay By: <?php echo $r1['host_name']; ?> </h3>
        <?php
        $rate = 26000;
        ?>
        <h3>The Amount : <?php echo $rate; ?> </h3>
      </div>
    </div>

    <form action="payment.php?hid=<?php echo $hid ?>" method="POST">
      <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys data-amount="<?php echo  $rate . "00"; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35. data-currency="INR" // You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account data-order_id="<?php rand(100000, 999999); ?>" // Replace with the order_id generated by you in the backend. data-buttontext="Procced to Pay" data-name="sneha nilya ladies hostel" data-description="Hostel rent" data-image="" data-prefill.name="" data-prefill.email="<?php echo $r1['host_email']; ?>" data-theme.color="darkblue"></script>
      <input type="hidden" name="hid" value="<?php echo $hid; ?>">
      <input type="hidden" custom="Hidden Element" name="hidden">
    </form>

    <!--style>
.razorpay-payment-button { display:none; }
</style>


<script type="text/javascript">
  $(document).ready(function(){
    $('.razorpay-payment-button').click();

});
</script-->
  <?php

} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
    } else {
        header("location:../Login/login.php?e=1");
        die();
    }
}


  ?>