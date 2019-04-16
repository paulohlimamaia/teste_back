<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refri extends Model
{
    protected $table = 'refris';
    protected $primaryKey = 'id_refri';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marca', 'litragem', 'tipo', 'quantidade', 'valor_unidade'
    ];

    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $schema = env('DB_CONNECTION') === 'pgsql'?'public.':'';
        $this->table = $schema.$this->table;
    }
}
