<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    

    $user = $db->single('users',[
        'username' => $_POST['username'],
        'password' => md5($_POST['password']),
    ]);
    $db->query = ("SELECT * 
                FROM periods 
                WHERE status = 1
                ");
    $period = $db->exec("single");


    if($user)
    {
        Session::set(['aktifperiods' => $period->id]);
        Session::set(['user_id'=>$user->id]);

        header('location:'.routeTo(config('after_login_page')));
        die();
    }

    set_flash_msg(['error'=>'Login Gagal! Nama Pengguna atau Kata Sandi tidak cocok']);
    header('location:'.routeTo('auth/login'));
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
];