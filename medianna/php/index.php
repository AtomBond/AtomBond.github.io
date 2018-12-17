<!DOCTYPE html>
<html>
  <head>
    <title>AboutUs</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/2style.css">
    
  </head>
  <body>
    <!--HEADER-->
  <header class="header">
    <div class="container">
      <img src="images/cinema.png" alt="a simple dove logo">

      <h1>MEDI@NNA</h1>
      <!--LOGIN FORM-->
      <form action="#" class="login">
        <input type="text" placeholder="LOGIN" required>
        <input type="password" placeholder="PASSWORD" required>
        <input type="submit" value="Sign In">
      </form>
      <!--/LOGIN FORM-->
      <h2>
      <small>ініціативна група</small>
      </h2>
   
    </div>

      
  </header>
  <!--/HEADER-->
  <!--NAVIGATION-->
  <nav class="page-navigation">
    <div class="container">
      <ul>
        <li><a href="https://atombond.github.io/medianna/">Home</a></li>
        <li><a href="https://atombond.github.io/medianna/AboutUs">About Us</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contacts</a></li>
      </ul>
      
    </div>
  </nav>
  <!--/NAVIGATION-->
  <!--MAIN SECTION-->
  <div class="container">
<main> 
    <section>
          <h1>ІСТОРІЯ «MEDI@NNA»</h1>
<form action="index.php" method="POST">
    <div>Enter your name: <input type="text" name="name" placeholder="Enter your name"></div>
    <div>Message: <textarea name="message" cols="20" rows="10"></textarea></div>
    <input type="submit" name="submit" value="Send">
</form>

<?php
save_message();
$messages = get_messages();
?>

<div class="messages">
    <?php foreach($messages as $message):?>
    <div class="message">
        <p>Name: <span class="name"><?php echo $message['name']?></span></php></p>
        <p>Message: <span class="message"><?php echo $message['message']?></span></p>
    </div><hr>
    <?php endforeach;?>
</div>
</body>
</html>

<?php

function get_messages() {
    /*return array(
        array(
                'name' => 'John',
                'message' => 'Test message from John...'
        ),
        array(
            'name' => 'Alice',
            'message' => 'Test message from Alice...'
        ),
    );*/
    $result = array();
    $messages = file_get_contents('messages');
    $messages = explode("---\n", $messages);

    foreach ($messages as $message) {
        $buf = explode("\n", $message);
        $m = array('name' => $buf[0]);
        unset($buf[0]);
        $m['message'] = implode("\n", $buf);
        $result[] = $m;
    }
    return $result;
}

function save_message() {
    if (!isset($_POST['name']) or !isset($_POST['message']))
        return;

    $message = "---\n".
               $_POST['name']."\n".
               $_POST['message']."\n";
    file_put_contents('messages', $message , FILE_APPEND | LOCK_EX);
}