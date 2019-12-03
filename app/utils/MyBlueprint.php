<?php

namespace App\Utils;

use Illuminate\Database\Schema\Blueprint;

class MyBlueprint
{
    public function __construct(Blueprint $table)
    {
        $this->table = $table;
        $this->table->increments('id');
    }

    public function string($column, $length = null)
    {
        $this->table->string($column, $length)->default('');
    }

    public function json($column)
    {
        $this->table->json($column);
    }

    public function common($createAt = 'created_at', $updatedAt = 'updated_at', $deletedAt = 'deleted_at', $precision = 0)
    {
        if (~is_null($createAt)) {
            $this->table->timestamp($createAt, $precision)->nullable();
        }
        if (~is_null($updatedAt)) {
            $this->table->timestamp($updatedAt, $precision)->nullable();
        }
        if (~is_null($deletedAt)) {
            $this->table->timestamp($deletedAt, $precision)->nullable();
        }
    }
}
