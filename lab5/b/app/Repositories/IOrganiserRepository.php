<?php
namespace App\Repositories;

use App\Models\Organiser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface IOrganiserRepository {
    public function all(): Collection;
    public function findAll(?string $search): LengthAwarePaginator;

    public function find(int $id): Organiser;

    public function create(array $data): Organiser;

    public function update(Organiser $organiser, array $data): Organiser;

    public function delete(Organiser $organiser): bool;
}
