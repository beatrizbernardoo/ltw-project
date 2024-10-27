<?php
    require_once(__DIR__ . '/../templates/profile.php');
    require_once(__DIR__ . '/../templates/topo.php');
    require_once(__DIR__ . '/../templates/searchForm.php');
    require_once(__DIR__ . '/../database/connectdb.php');
    require_once(__DIR__ . '/../classes/session.class.php');
    require_once(__DIR__ . '/../classes/user.class.php');
    require_once(__DIR__ . '/../classes/item.class.php');

    $db = getDatabaseConnection();
    $session = new Session();
    if (!$session->isLoggedIn()) {header('Location: /../pages/signIn.php');exit;}


    $userID = $session->getID();
    $user = User::getUser($db,$userID);

    $items = Item::getUserItems($db, $userID);

    topo($db, $user);
    profileEdit($db, $user);
    profileOptions($db, $items, $user->role == 'Admin');

?>