<?php
    $db_connection = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");

    session_start();
    $user_check = $_SESSION['login_user'];

    $query = 'SELECT email FROM c_users WHERE email = |"$user_check"';
    $search = pg_query($db_connection, $query);
    $row = pg_fetch_assoc($search);
    $login_session = $row['username'];
?>