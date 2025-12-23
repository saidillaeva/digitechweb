<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title_ru','title_en','title_kg','title_de',
        'description_ru','description_en','description_kg','description_de',
        'doc_group','period','file_path','published_at'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public static function groups(): array
    {
        return [
            'progress_technical_report' => 'documents.groups.progress_technical_report',
            'qa_report' => 'documents.groups.qa_report',
            'external_evaluation' => 'documents.groups.external_evaluation',
            'needs_analysis' => 'documents.groups.needs_analysis',
            'sustainability_strategy' => 'documents.groups.sustainability_strategy',
            'event_strategy' => 'documents.groups.event_strategy',
        ];
    }

    public static function periods(): array
    {
        return [
            '6_month'  => 'documents.periods.6_month',
            '12_month' => 'documents.periods.12_month',
            '18_month' => 'documents.periods.18_month',
            '24_month' => 'documents.periods.24_month',
            '30_month' => 'documents.periods.30_month',
            '36_month' => 'documents.periods.36_month',
        ];
    }


}
