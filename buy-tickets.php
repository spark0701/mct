<?
//include configuration file
include_once 'paypal_ipn.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mother's Christmas Tea</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
  </head>
<body>
  
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="index.html" class="pull-left visible-md visible-lg">
            <!-- <div id="logo-img"></div> -->
          </a>

          <div class="navbar-brand">
            <a href="index.html"><h1>Mother's Christmas Tea</h1></a>
            <!-- <p>
              <img src="images/star-k-logo.png" alt="Kosher certification">
              <span>Kosher Certified</span>
            </p> -->
          </div>

          <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div id="collapsable-nav" class="collapse navbar-collapse">
           <ul id="nav-list" class="nav navbar-nav navbar-right">
            <li class="visible-xs active">
              <a href="index.html">
                <span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li id="buy-tickets">
              <a href="buy-tickets.html">
                <!-- <span class="glyphicon glyphicon-cutlery"></span> --><br class="hidden-xs">Buy Tickets</a>
            </li>
            <li id="buy-tickets">
              <a href="how-you-can-help.html">
                <!-- <span class="glyphicon glyphicon-info-sign"></span> --><br class="hidden-xs">How You Can Help</a>
            </li>
            <li id="buy-tickets">
              <a href="pre-sales.html">
                <!-- <span class="glyphicon glyphicon-certificate"></span> --><br class="hidden-xs">Pre-Sales</a>
            </li>
            <li id="buy-tickets">
              <a href="raffle.html">
                <!-- <span class="glyphicon glyphicon-certificate"></span> --><br class="hidden-xs">Raffle</a>
            </li>

            <!-- <li id="phone" class="hidden-xs">
              <a href="tel:410-602-5008">
                <span>410-602-5008</span></a><div>* We Deliver</div>
            </li> -->
          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>


  <div id="main-content" class="container">
    <!-- <div class="jumbotron">
      <img src="images/jumbotron_768.jpg" alt="Picture of restaurant" class="img-responsive visible-xs">
    </div> -->

  

<!-- <form action="<?php echo $paypal_url; ?>" method="post"> -->
<!-- Get paypal email address from core_config.php -->
<!-- <input type="hidden" name="business" value="<?php echo $paypal_seller; ?>">
 -->
<!-- Specify product details -->
<!-- <input type="hidden" name="item_name" value="<?php echo $name; ?>">
<input type="hidden" name="item_number" value="<?php echo $id; ?>">
<input type="hidden" name="amount" value="<?php echo $price; ?>">
<input type="hidden" name="currency_code" value="USD">
 -->
<!-- IPN Url -->
 <!-- <input type='hidden' name='notify_url' value='https://demo.dopehacker.com/paypal_integration/paypal_ipn.php'> -->
<!-- Return URLs -->
<!-- <input type='hidden' name='cancel_return' value='<? echo $payment_return_cancel; ?>'>
 <input type='hidden' name='return' value='<? echo $payment_return_success; ?>'>-->

<!-- Submit Button -->
<!-- <input type="hidden" name="cmd" value="_xclick">
<input type="submit" value="Buy Now!" name="submit">
</form>  -->


    <div id="home-tiles" class="row">

    	<!-- <b> coming soon buy tickets</b> -->
      
      

    <!-- <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="QTG8XN2NYEMMU">
 -->

 <form target="_self" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <!-- <input type="hidden" name="business" value="sb-m43vy0238341@business.example.com"> -->
    <input type="hidden" name="hosted_button_id" value="VXHUDMYUSKK3Q">

     MCT Tickets: Please select text box below <br>
    <div class="form-group">
    <input type="hidden" name="on0" value="MCT Tickets">
<div class="row">
<div class="col-lg-3 col-sm-4 col-xs-8">
<select class="form-control" onchange="getSelectedIndex();" id="ticket-number-select" name="os0"  value="MCT Tickets"> 

<!-- <select class="input-small form-control" onchange="getSelectedIndex();" id="ticket-number-select">  -->
<option value="1 Ticket" option_index>1 Ticket $20.00 CAD</option>
<option value="2 Tickets" option_index="1">2 Tickets $40.00 CAD</option>
<option value="3 Tickets" option_index="2">3 Tickets $60.00 CAD</option>
<option value="4 Tickets" option_index="3">4 Tickets $80.00 CAD</option>
<option value="5 Tickets" option_index="4">5 Tickets $100.00 CAD</option>
<option value="6 Tickets" option_index="5">6 Tickets $120.00 CAD</option>
</select> 
</div>
</div>
<br>



<div class="row">
<div class="col-lg-3 col-sm-4 col-xs-8">
<!-- <input type="hidden" for="formForos1" name="on1" value="Name">Guest Name 1 (Mandatory)
<input class="form-control" name="os1" type="text"> -->
Guest Name 1 (Mandatory) 
<input class="form-control" type="text" id="guestName1" required placeholder="Enter Guest Name">
Email or Phone Number 1 (Optional)
<input class="form-control" type="text" id="email_phone1">
<input type="hidden" name="on1" value="guestInfo1">
<input id="guestInfoData1" type="hidden" name="os1">
</div>
</div>

<p id="index_number"></p>
<p id="guest_info_field"></p>
<p id="guest_info_concat"></p>
<?php
echo ("<br>");
    echo ("<br>");

    echo ($querystring);

  
    ?>

<!-- <button onclick="gettingGuestData()">hello</button> -->
<br>
<input type="hidden" name="currency_code" value="CAD">
<!-- <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
 -->

<button type="submit" onclick="gettingGuestData()" style="border: 0; background: transparent">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif" border="0" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</button>

<!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('body');</script> -->


</form>

<!-- <script type="text/javascript">
        document.getElementById('buy_ticket_form').submit();
    </script> -->

</div>






      <!-- <div id="menu-tile"><span></span></div> -->
      <!-- <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="menu-categories.html"><div id="menu-tile"><span>Buy Tickets</span></div></a>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="single-category.html"><div id="specials-tile"><span>Buy Tickets</span></div></a>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <a href="single-category.html"><div id="specials-tile"><span>Buy Tickets</span></div></a>

      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <a href="single-category.html"><div id="specials-tile"><span>Buy Tickets</span></div></a>

      </div> -->
    </div><!-- End of #home-tiles -->
  </div><!-- End of #main-content -->

  <script type="text/javascript">
function getSelectedIndex() {
  var e = document.getElementById('ticket-number-select');
  //var e = document.getElementByTag("option");
  var index = e.selectedIndex;  
  var strUser = e.options[e.selectedIndex];
  //document.getElementById("index_number").innerHTML = "You selected index: " + (index + 1);
  var text = "";
for (i = 0; i < index; i++) {
  text += "<div class=\"row\">" + "<div class=\"col-lg-3 col-sm-4 col-xs-8\">";
  text += "Guest Name "+ (i+2) + " (Mandatory)";
  text += "<input class=\"form-control\" type=\"text\" id=\"guestName"+(i+2)+"\" required placeholder=\"Enter Guest Name\">";
  text += "Email or Phone Number" + (i+2) +" (Optional)";
  text += "<input class=\"form-control\" type=\"text\" id=\"email_phone"+(i+2)+"\">"
  text += "<input type=\"hidden\" name=\"on"+(i+2)+"\"" + "value=\"guestInfo" +(i+2)+"\">";
  text += "<input id=\"guestInfoData"+(i+2)+"\"" + "type=\"hidden\" name=\"os"+(i+2)+"\">";
  text += "</div></div><br>";
  // text += "<div class=\"row\">" + "<div class=\"col-lg-3 col-sm-4 col-xs-8\">";
  // text += "<input type=\"hidden\" name=\"on1\" value=\"Name\">" + "Guest Name " + (i+2) 
  // + " (Mandatory)";
  // text += "<input class=\"form-control\" name=\"os1\" type=\"text\">" 
  //       + "</div></div>"; 
  // text += "<div class=\"row\">" + "<div class=\"col-lg-3 col-sm-4 col-xs-8\">";
  // text += "<input type=\"hidden\" for=\"formForos2\" name=\"on2\" value=\"Email\">" 
  //   + "Email address" + (i+2) + " (Optional)";
  // text += "<input class=\"form-control\" name=\"os2\" type=\"text\">" 
  //       + "</div></div>"; 
  // text += "<div class=\"row\">" + "<div class=\"col-lg-3 col-sm-4 col-xs-8\">";
  // text += "<input type=\"hidden\" for=\"formForos2\" name=\"on3\" value=\"Phone\">" 
  //   + "Phone Number" + (i+2) + " (Optional)";
  // text += "<input class=\"form-control\" name=\"os3\" type=\"text\">" 
  //       + "</div></div><br>";             
  }
  //populate all the text feilds here
  document.getElementById("guest_info_field").innerHTML = text;
}

function gettingGuestData() {
  var e = document.getElementById('ticket-number-select');
  var index = e.selectedIndex; 
  // window.alert("are u here");
  // document.getElementById("guestInfoData1").value = document.getElementById("guestName1").value;
  // document.getElementById("guestInfoData2").value = document.getElementById("guestName2").value;

  for (i=0; i < index+1 ; i++) {
    var guestName = document.getElementById("guestName"+(i+1)).value;
    var email_phone = document.getElementById("email_phone"+(i+1)).value;
    //window.alert(guestName);
    if (email_phone.length > 0 ){
      var data = guestName.concat(", ").concat(email_phone)
      document.getElementById("guest_info_concat").innerHTML = data;
      document.getElementById("guestInfoData"+(i+1)).value = data;
    } else {
      document.getElementById("guest_info_concat").innerHTML = guestName;
      document.getElementById("guestInfoData"+(i+1)).value = guestName;
    }
  }
}

</script>


  <footer class="panel-footer">
    <div class="container">
      <div class="row">
        <section id="hours" class="col-sm-4">
          <span>When:</span><br>
          December 4th, 2019<br>
          Wednesday: 10am - 2:30pm<br>
          <hr class="visible-xs">
        </section>
        <section id="address" class="col-sm-4">
          <span>Address:</span><br>
          Main Gym, Vancouver College<br>
          5400 Cartier St, Vancouver
<!--           <p>* Delivery area within 3-4 miles, with minimum order of $20 plus $3 charge for all deliveries.</p>
 -->    <hr class="visible-xs">
        </section>
        <!-- <section id="testimonials" class="col-sm-4">
          <p>"The best Chinese restaurant I've been to! And that's saying a lot, since I've been to many!"</p>
          <p>"Amazing food! Great service! Couldn't ask for more! I'll be back again and again!"</p>
        </section> -->
      </div>
      <div class="text-center">&copy; Copyright Vancouver College 2019</div>
    </div>
  </footer>

  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
