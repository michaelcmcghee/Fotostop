<?php 
$connect = mysql_connect('localhost', 'root', 'root');

if (!$connect) {
    //if could not connect...
    die('Could not connect to database.  Please contact administrator');
}

mysql_select_db('images');

$chapter = $_POST['chapter'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$typeOfAward = $_POST['typeOfAward'];
$sponsor = $_POST['sponsor'];
$bio = $_POST['bio'];

$target = "img/";
$thumb = "img/thumbs/" . $_FILES['image']['name'];
$target = $target . basename($_FILES['image']['name']);


$error_code = 0;

if ($_POST['chapter'] == "") {
    echo "Please go back and  enter the chapter name.<br />";
    $error_code = 1;
}

if ($_POST['firstName'] == "") {
    echo "Please go back and enter the first name.<br />";
    $error_code = 1;
}

if ($_POST['lastName'] == "") {
    echo "Please go back and enter the last name.<br />";
    $error_code = 1;
}

if ($_POST['typeOfAward'] == "") {
    echo "Please go back and add the type of award.<br />";
    $error_code = 1;
}

if ($_POST['sponsor'] == "") {
    echo "Please go back and add the sponsor.<br />";
    $error_code = 1;
}

if ($uploaded_type == "text/php") {
    echo "No PHP files please.<br>";
    $error_code = 1;
}

if ($_POST['bio'] == "") {
    echo "Please go back and add a bio.<br />";
    $error_code = 1;
}

if ($error_code > 0) {
    exit();
}


// Create the query and insert
// into our database.
$query = "INSERT INTO imageGallery (firstName, lastName, chapter, typeOfAward,sponsor, bio, image, thumb) VALUES ('{$firstName}','{$lastName}','{$chapter}','{$sponsor}','{$typeOfAward}','{$bio}','{$target}','{$thumb}')";

$result = mysql_query($query);

if (!$result) {

    die('Could not add information to the database.  Please make sure you have filled in the form correctly.');

} else {
    // Data Uploaded results now Upload image

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        echo "The file " . basename($_FILES['uploadedfile']['name']) . " has been uploaded";

        include('image_resize.php');

    }
    else {
        echo "Sorry, there was a problem uploading your file.";
        exit();
    }

    echo "User Added Successfully!<br />";
    echo "<a href='winner_admin.php'>Add Another</a>";
}

?>
