<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;

class ExportService
{
    /**
     * Export data to PDF
     */
    public static function toPdf(Collection $data, string $title, array $columns): \Barryvdh\DomPDF\PDF
    {
        $html = view('exports.pdf', [
            'title' => $title,
            'data' => $data,
            'columns' => $columns,
        ])->render();

        return Pdf::loadHTML($html)
            ->setOption(['isRemoteEnabled' => true])
            ->setPaper('A4', 'landscape');
    }

    /**
     * Export data to CSV
     */
    public static function toCsv(Collection $data, string $filename, array $columns): string
    {
        $csv = '';

        // Add headers
        $csv .= implode(',', array_values($columns)) . "\n";

        // Add data rows
        foreach ($data as $row) {
            $values = [];
            foreach (array_keys($columns) as $key) {
                $values[] = '"' . str_replace('"', '""', $row->{$key} ?? '') . '"';
            }
            $csv .= implode(',', $values) . "\n";
        }

        return $csv;
    }
}
