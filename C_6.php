<?php


interface StateStore
{
    public function getState(string $id): ?string;
}

class InMemoryStateStore implements StateStore
{

    public function __construct(
        private array $storeData
    )
    {
    }

    public function getState(string $id): ?string
    {
        return $this->storeData[$id] ?? null;
    }

}


class AdapterStateStore implements StateStore
{
    public function __construct(
        private StateStore $store,
        private Cache $cache
    )
    {

    }

    public function getState(string $id): ?string
    {
        $state = $this->cache->get($id);

        if ($state) {
            return $state;
        }

        return $this->store->getState($id);
    }
}