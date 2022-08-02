<?php

$host='localhost';
$dbname='dbname';
$user='dbuser';
$password='dbpassword';



$connect = new mysqli($host,$user,$password,$dbname);
        if (mysqli_connect_errno())
        {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $fetch1 = mysqli_query($connect, "SELECT * FROM mytable");
        $data5 = mysqli_fetch_all($fetch1, MYSQLI_ASSOC);


foreach ($data5 as $value) {
      $text=file_get_contents('proto.html');
      $workingrow=$value;
      foreach ($value as $key=>$field) {
          $oldstring='**'.$key.'**';
          $newstring=$field;
          $text=str_replace($oldstring, $newstring, $text);
      }

      $filename="../output/".$value['filename'];
      file_put_contents($filename,$text);
      print_r($filename.'<br/>');
}
unset($value);
