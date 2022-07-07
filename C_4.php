<?php

/**
 * Удаляет пользователя если его id не четное и отправляет емейл админу
 */
class UserHandler
{

    public function handle(User $user): void
    {
       if ($user->getKey() & 2) {
           resolve(MailSender::class)->send($user);
           app(UserDestroyer::class)->destroy($user);
       }
    }
}


class User extends Model
{
    protected $table = 'users';
}


class UserDestroyer
{
    public function destroy(User $user): void
    {
        //...

    }
}

class MailSender
{
    public function sendMail(User $user): void
    {
        //...
    }
}
