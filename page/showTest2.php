<?php
$headers = 'From: <worknarair6@gmail.com>' . "\r\n" .
  'Reply-To: <worknarair6@gmail.com>';

$r = mail(
  '<theerakarn_maiw@cmu.ac.th>',
  'the subject',
  'the message',
  $headers
);

if ($r) {
  echo 'sent';
}
