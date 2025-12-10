<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public string $name, $description, $ingredients;
    public Category $category;
}
