<?php

$conn = conn();
$db   = new Database($conn);

// Insert users
$_POST['users']['username'] = $_POST['teachers']['nik'];
$_POST['users']['name'] = $_POST['teachers']['name'];
$_POST['users']['password'] = md5('123');

$id = $db->insert('users',$_POST['users']);

// Insert user role
$_POST['user_roles']['user_id'] = $id->id;
$_POST['user_roles']['role_id'] = 2;
$db->insert('user_roles',$_POST['user_roles']);

// Insert teachers
$_POST['teachers']['user_id'] = $id->id;    