<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;
    protected $fillable = [
        'acao_extensao',
        'tipo',
        'horas',
        'anexo',
        'data_submissao',
        'situacao',
        'data_avaliacao'
    ];

    protected $attributes = [
        'situacao' => 'Em análise', // Situação padrão das atividades ao serem cadastradas
    ];

    public static function boot()
    {
        parent::boot();

        // função para adicionar a data de submissão automaticamente
        static::creating(function ($model) {
            $model->data_submissao = now();
        });

        // função para adicionar a data de aprovação automaticamente
        static::updating(function ($model) {
            if ($model->isDirty('situacao') && $model->situacao === 'Integralizada') {
                $model->data_avaliacao = now();
            }
        });
    }
}
