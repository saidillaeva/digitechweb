<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title','doc_group','period','file_path','published_at','description'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    // Твои группы
    public static function groups(): array
    {
        return [
            'progress_technical_report' => 'Progress technical report',
            'qa_report' => 'Digitech Quality Assurance Report',
            'external_evaluation' => 'External Evaluation',
            'needs_analysis' => 'Needs Analysis',
            'sustainability_strategy' => '“Sustainability, long-term impact and continuation” strategy',
            'event_strategy' => '“The Event, Communication and Dissemination” strategy',
        ];
    }

    // Твои периоды
    public static function periods(): array
    {
        return [
            '6_month' => '6 month',
            '12_month' => '12 month',
            '18_month' => '18 month',
            '24_month' => '24 month',
            '30_month' => '30 month',
            '36_month' => '36 month',
        ];
    }
}
