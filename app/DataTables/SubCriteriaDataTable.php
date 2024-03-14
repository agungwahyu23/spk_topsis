<?php

namespace App\DataTables;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SubCriteriaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->editColumn('id', function ($q) {
            $criteria = Criteria::find($q->id);

            return $criteria->criteria_name;
        })
        ->editColumn('criteria_name', function ($q) {
            
            $list_group_html = '-';

            $criteria = Criteria::find($q->id);
            $sub_criteria = SubCriteria::where('criteria_id', $criteria->id)->get();

            if (count($sub_criteria) > 0) {
                $html = '';
                foreach ($sub_criteria as $sub) {
                    $html = $html . '<li>' . $sub->value .' = '. $sub->description . '</li>';
                }

                $list_group_html = '
                    <ul>
                        ' . $html . '
                    </ul>
                ';
            }
            
            return $list_group_html;
        })
        ->addColumn('action', 'sub_criterias.datatables_actions')
        ->rawColumns(['action', 'id', 'criteria_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubCriteria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubCriteria $model)
    {
        // $query = SubCriteria::query();
        // $query->leftJoin('criteria', 'criteria.id', 'sub_criteria.criteria_id');
        // $query = $query->select(
        //     'sub_criteria.id',
        //     'criteria_id',
        //     'description',
        //     'value',
        //     'criteria.criteria_name'
        // );

        $query = Criteria::query();

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title'=> 'Kriteria'],
            'criteria_name' => ['title'=> 'Bobot & Keterangan'],
            // 'value' => ['title'=> 'Bobot']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'sub_criterias_datatable_' . time();
    }
}
