<?php

$conn = conn();
$db   = new Database($conn);

// Insert users
$_POST['users']['username'] = $_POST['students']['nik'];
$_POST['users']['name'] = $_POST['students']['name'];
$_POST['users']['password'] = md5('123');

$id = $db->insert('users',$_POST['users']);

// Insert user role
$_POST['user_roles']['user_id'] = $id->id;
$_POST['user_roles']['role_id'] = 4;
$db->insert('user_roles',$_POST['user_roles']);

// Insert teachers
$_POST['students']['user_id'] = $id->id;