<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator {
    public function attemt($email, $password) {
        $db = App::resolve(Database::class);
        $user = $db->query('SELECT * from users where email=:email', [
            ':email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        } else {
            return false;
        }

    }

    public function login($user) {
        Session::put('user', [
            'email' => $user['email']
        ]);

        session_regenerate_id(true);
    }

    public function logout() {
        Session::destroy();
    }
}