<?php

session_start();

//include header template
include "templates/header.template.php";

//display contents
include "templates/cart-contents.template.php";

//display checkout form
include "templates/checkout-form.template.php";

//include footer template
include "templates/footer.template.php";