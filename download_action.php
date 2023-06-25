

<?php



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=femtech_project', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// $id = $_GET['id'] ?? null;

// if(!$id) {
//     header('location: Library.php');
//     exit;
// }

//.$_FILES["file"]["name"]

// if(!empty($_GET['file'])){
//     $filename = basename($_GET['file']);
//     $filepath = ('./files' . $filename);
//     if(!empty($filename) && file_exists($filepath));

//     //headers

//     header("cache-control:public");
//     header("content-Description: File Transfer");
//     header("content-Diposition: attachement; filename= $filename");
//     header("content-Type: application/zip");
//     header("content-Transfer-Emcoding: binary");
//     readfile($filepath);

//     exit;
// } else{
//     echo "file not exist.";
// }

// $file = './files';

// if (file_exists($file)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="'.basename($file).'"');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));
//     readfile($file);
//     exit;
// }


if(isset($_GET['file'])){
    header("content-Disposition: attachment; filename = ".basename($_GET['file']));
    readfile($_GET['file']);
    exit();
}

?>