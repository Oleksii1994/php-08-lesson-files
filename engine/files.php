<?php
//$_GET / $_POST / $_SERVER / $_FILES

// print_r($_FILES);

//file_exists
//rename
//mkdir
//rmdir
//copy
//unlink видаляє файл з корня
//is_dir \ is_file
//file_get_contents //повертає строку
//file              //поветрає масив
//file_put_contents
//filesize
//fopen , fwrite, fread, fclose

if (!empty($_FILES)) {
  move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
}

if (file_exists('uploads/1678747777431.jpeg')) echo "File exists <br>";

rename('uploads/1678747777431.jpeg', 'uploads/photo.jpeg');

// mkdir("folder"); //створює нову папку

if (file_exists("folder2/img")) {
  rmdir("folder2/img");
  echo "folder2 deleted <br>";
}

if (mkdir("folder2/img", 0777, true)) { //передали права доступу і поставили рекурсію на тру
  echo "folder2/img created <br>";
}

if (copy("uploads/photo.jpeg", 'folder/img.jpeg')) {
  echo "File copied <br>";
}

if (unlink('folder/img.jpeg')) {
  echo "File removed <br>";
}

if (is_dir("index.php")) {
  echo "This is directory <br>";
} else {
  echo "This is not directory <br>";
}

if (is_file("index.php")) {
  echo "This is file <br>";
} else {
  echo "This is not file <br>";
}

$text = file_get_contents("text.txt", false, null, 5, 10);
echo nl2br($text) . "<br>";

$text = file("text.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
print_r($text);
echo "<br>";


// $htmlSite = file('https://www.php.net/manual/ru/class.datetimezone.php#datetimezone.constants.europe', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// foreach ($htmlSite as $num => $line) {
//   echo $num . ": " . htmlspecialchars($line) . "<br>";
// }

$file = 'text.txt';
$var = "World\n";

$bytes = file_put_contents($file, $var, FILE_APPEND | LOCK_EX); //поветрає кількість байт які були додані до файлу
echo $bytes . "<br>";

$handle = fopen('text.txt', 'a+');
$text = fread($handle, filesize($file));

fwrite($handle, "Good Day\n");

fclose($handle);

echo $text;





?>

<style>
  form {
    margin-top: 12px;
  }

  label {
    display: block;

    margin-bottom: 12px;
  }
</style>
<form action="" method="POST" enctype="multipart/form-data">
  <label for="title"><input type="text" name="title"></label>

  <label for="file"><input type="file" name="file"></label>
  <button>Submit</button>
</form>