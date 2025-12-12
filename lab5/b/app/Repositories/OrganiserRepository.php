<?php
namespace App\Repositories;

use App\Models\Organiser;
use Illuminate\Database\Eloquent\Collection;
class OrganiserRepository implements IOrganiserRepository {

    public function all(): Collection
    {
        return Organiser::all();
    }

    public function find(int $id): Organiser
    {
        return Organiser::query()->find($id);
    }

    public function create(array $data): Organiser
    {
        return Organiser::query()->create($data);
    }

    public function update(Organiser $organiser, array $data): Organiser
    {
        $organiser->update($data);
        return $organiser;
    }

    public function delete(Organiser $organiser): bool
    {
        return $organiser->delete();
    }

    public function findAll(?string $search): \Illuminate\Pagination\LengthAwarePaginator
    {
        return Organiser::query()
            ->when($search,
                fn($query) => $query->where('full_name', 'like', '%'.$search.'%'))
            ->latest()
            ->paginate(10);
    }
}
