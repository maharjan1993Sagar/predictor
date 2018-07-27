<html>
<head><title>Index</title></head>
<body><div> Index Page WELCOME you
    <?php

require_once '../vendor/autoload.php';
$user = new App\user();

    $user->setFirstName('Sagar');
    $user->setLastName('Maharjan');
echo $user->getFirstName();
?>

</div></body>
</html>