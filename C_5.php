<?php


class DestroyUserJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private User $user
    )
    {

    }
    public function handle()
    {
        $this->onConnection('redis');

        if (!($this->user->getKey() % 2))
        {
            throw new \RuntimeException('Id четное!');
        }

        app(UserDestroyer::class)->destroy($this->user);


    }
}

class UserController extends Controller
{
    public function destroy(User $user): Response
    {
        try {
            dispatch(new DestroyUserJob($user));
        } catch (\Throwable $e) {
            return response(['message' => $e->getMessage()]);
        }

        return response(['message' => 'OK']);

    }
}