<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'descricao', 'imagem'];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use ($filter) {
            if ($query) {
                $query->where('nome', 'like', "%{$filter}%");
            }
        })//->toSql()
        ->paginate();

        return $results;
    }
}
