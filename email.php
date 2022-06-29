<?php

#Receive User Input
$name_field = $_POST['name'];
$email_field = $_POST['email'];
$message = $_POST['message'];

#Filter User Input
function filter_email_header($form_field) {
    return preg_replace('/[nr|!/<>^$%*&]','',$form_field);
}

#$email_field = filter_email_header($email_field);

#Send email
$sent = mail('deannawalters@outlook.com', "$name_field - $email_field Request for Quote", $message);

#Thank user or notify them of a problem
if($sent) {
    ?><html>
    <head>
    <title>Thank You</title>
    </head>
    <body>
    <h1>Thank You</h1>
    <p>Thank you for your request. We will get back to you as soon as we can.</p>
    </body>
    </html>
    <?php
} else {
    ?><html>
    <head>
    <title>Something went wrong</title>
    </head>
    <body>
    <h1>Something went wrong</h1>
    <p>We could not send your request. Please try again.</p>
    </body>
    </html>
    <?php
}
?>