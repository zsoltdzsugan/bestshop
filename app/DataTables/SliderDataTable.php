<?php

namespace App\DataTables;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($slider) {
                return view('admin.slider.partials.actions', compact('slider'));
            })
            ->addColumn('banner', function ($slider) {
                return '<img src="' . asset('storage/' . $slider->banner) . '" width="100">';
            })
            ->addColumn('status', function ($slider) {
                $statusIcon = $slider->status == 1
                    ? '<i class="fa-solid fa-circle" style="color: #48bb78;"></i>'
                    : '<i class="fa-solid fa-circle"></i>';

                return $statusIcon;
            })
            ->addColumn('created_at', function ($slider) {
                return Carbon::parse($slider->created_at)->format('Y/m/d H:i');
            })
            ->addColumn('updated_at', function ($slider) {
                return Carbon::parse($slider->updated_at)->format('Y/m/d H:i');
            })
            ->rawColumns(['banner', 'status', 'created_at', 'updated_at', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('slider-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('banner')
                ->width(150)
                ->orderable(false)
                ->searchable(false),
            Column::make('type'),
            Column::make('title'),
            Column::make('starting_price'),
            Column::make('btn_url')->width(150),
            Column::make('serial'),
            Column::make('status')->addClass('dt-type-status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}
