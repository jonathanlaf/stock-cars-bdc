<?php

namespace App\Nova;

use App\Models\CompetitorClass as CompetitorClassModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CompetitorClass extends Resource
{
    public static string $model = CompetitorClassModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'number',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Number::make('Class', 'race_class_id')->sortable()->rules('required', 'integer'),

            Text::make('Number')->sortable()->rules('required'),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
