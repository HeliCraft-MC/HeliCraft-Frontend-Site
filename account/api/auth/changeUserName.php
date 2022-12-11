<?php 
	require '../db.php';

	$data = $_POST;

	if ( isset($data['do_changeUn']) )
	{

		$errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));

        if ( $data['old_password'] == '' )
		{
			$errors[] = 'Введите старый пароль';
		} else{
            if ( !(password_verify($data['old_password'], $user->password)) )
			{
				$errors[] = 'Неверно введен пароль!';
			}
        }
        if ( $data['new_username'] == '' ){
            $errors[] = 'Введите новое имя пользователя';
        }

		if ( empty($errors) )
		{
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color:dreen;">Вы успешно сменили пароль!</div><hr>';
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>