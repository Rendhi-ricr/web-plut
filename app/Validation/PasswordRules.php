<?php

namespace App\Validation;

class PasswordRules {
    // public function custom_rule(): bool
    // {
    //     return true;
    // }

    // Check old Password
    public function checkOldPassword(string $str, string $id_user): bool {
        $model = new \App\Models\UserModel();
        $user = $model->find($id_user);

        // var password value user model use object or array
        $password = is_object($user) ? $user->password : $user['password'];

        if (!password_verify($str, $password)) {
            return false;
        }

        return true;
    }
}