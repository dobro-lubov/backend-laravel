<?php

class OrderService
{
    /**
     * Оформлят заказ и списывает деньги у пользователя
     * @param float $total
     */
    public function run(float $total): bool
    {
        $user = auth()->user();
        $user->money -= $total;
        $user->save();
        Order::insert([
            'user_id' => $user->getKey(),
            'total' => $total,
        ]);

        return true;
    }
}


/**
 * @property float $money
 */
class User extends Model
{
    protected $table = 'users';

}

/**
 * @property int $userId
 * @property float $total
 */
class Order extends Model
{

}