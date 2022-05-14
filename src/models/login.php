<?php

class Login extends Model {

    public function validation() {
        $errors = [];
        if (!$this->email) {
            $errors['email'] = 'E-mail é um campo obrigatório';
        }

        if (!$this->password) {
            $errors['password'] = 'Por favor, informe a senha';
        }

        if (count($errors) > 0 ) {
            throw new ValidationException($errors);
            
        }
    }

    public function chechLogin(){
        $this->validation();
        $user = User::getOne(['email' => $this->email]);
        if($user){
            if(password_verify($this->password, $user->password)){
                if($user->end_date){
                    throw new AppException('Usuário está desligado da empresa.');
                }
                $user->password = null;
                $this->password = null;
                logger("Login de Usuário: '{$user->name}', Email: '{$user->email}'");
                return $user;
            }
        }
        throw new AppException('Usuário/Senha inválidos.');
        
    }
}