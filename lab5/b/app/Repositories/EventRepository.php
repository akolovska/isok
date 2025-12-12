<?php
namespace App\Repositories;
use App\Models\Event;

class EventRepository implements IEventRepository {

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Event::all();
    }

    public function find(int $id): Event
    {
        return Event::query()->find($id);
    }

    public function create(array $data): Event
    {
        return Event::query()->create($data);
    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        return $event;
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    public function findAll(string $search): \Illuminate\Pagination\LengthAwarePaginator
    {
        return Event::query()
            ->when($search,
                fn($query) => $query->where('name', 'like', '%'.$search.'%'))
            ->latest()
            ->paginate(10);
    }
}
