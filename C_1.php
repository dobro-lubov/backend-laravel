<?php



class UserController extends Controller
{
    function create()
    {
        $firstName = request()->get('firstName');
        $lastName = $_POST['lastName'];

        $user = User::create(
            [
                'firstName' => $firstName,
                'lastName' => $lastName
            ]
        );

        return $user;
    }
}

/**
 * @property string $firstName
 * @property string $secondName
 */
class User extends Model
{
    protected $table = 'users';
}