<?php

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface IEventRepository {
    public function all(): Collection;
    public function findAll(string $search): LengthAwarePaginator;

    public function find(int $id): Event;

    public function create(array $data): Event;

    public function update(Event $event, array $data): Event;

    public function delete(Event $event): bool;
}
