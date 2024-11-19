<?php
namespace App\DataTables;

use App\Admin;
//use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;



class AdminDataTable extends DataTable
{


   public function dataTable(DataTables $dataTables, $query)
   {
      return datatables($query)
         ->addColumn('actions', 'admin.admin.buttons.actions')
         ->addColumn('post_admin', 'admin.admin.buttons.post_admin')
         ->addColumn('checkbox', '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
			<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}"> <span></span></label>')
         ->rawColumns(['checkbox', 'show_action', 'actions', 'post_admin', 'user', 'date']);
   }


   public function query()
   {
      return Admin::query()->orderBy('id', 'desc')->select('admins.*');
      //->with('group_id')
   }


   public function html()
   {
      $html = $this->builder()
         ->columns($this->getColumns())
         ->ajax('')
         ->parameters([
            'dom'          => 'Blfrtip',
            "lengthMenu"   => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
            'buttons'      => [
               ['extend' => 'print', 'className' => 'btn dark btn-outline', 'text' => '<i class="fa fa-print"></i> ' . trans('admin.print')],
               ['extend' => 'excel', 'className' => 'btn green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('admin.export_excel')],
               /*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('admin.export_pdf')],*/
               ['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('admin.export_csv')],
               ['extend' => 'reload', 'className' => 'btn blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> ' . trans('admin.reload')],
               [
                  'text'      => '<i class="fa fa-trash"></i> ' . trans('admin.delete'),
                  'className' => 'btn red btn-outline deleteBtn',
               ], [
                  'text'      => '<i class="fa fa-plus"></i> ' . trans('admin.add'),
                  'className' => 'btn btn-primary',
                  'action'    => 'function(){
                        	window.location.href =  "' . \URL::current() . '/create";
                        }',
               ],
            ],
            'initComplete' => "function () {
                this.api().columns([1,2]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",
            'order'        => [[1, 'desc']],

            'language'     => [
               'sProcessing'     => trans('admin.sProcessing'),
               'sLengthMenu'     => trans('admin.sLengthMenu'),
               'sZeroRecords'    => trans('admin.sZeroRecords'),
               'sEmptyTable'     => trans('admin.sEmptyTable'),
               'sInfo'           => trans('admin.sInfo'),
               'sInfoEmpty'      => trans('admin.sInfoEmpty'),
               'sInfoFiltered'   => trans('admin.sInfoFiltered'),
               'sInfoPostFix'    => trans('admin.sInfoPostFix'),
               'sSearch'         => trans('admin.sSearch'),
               'sUrl'            => trans('admin.sUrl'),
               'sInfoThousands'  => trans('admin.sInfoThousands'),
               'sLoadingRecords' => trans('admin.sLoadingRecords'),
               'oPaginate'       => [
                  'sFirst'    => trans('admin.sFirst'),
                  'sLast'     => trans('admin.sLast'),
                  'sNext'     => trans('admin.sNext'),
                  'sPrevious' => trans('admin.sPrevious'),
               ],
               'oAria'           => [
                  'sSortAscending'  => trans('admin.sSortAscending'),
                  'sSortDescending' => trans('admin.sSortDescending'),
               ],
            ],
         ]);

      return $html;

   }


   protected function getColumns()
   {
      return [
         [
            'name'       => 'checkbox',
            'data'       => 'checkbox',
            'title'      => '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                  <input type="checkbox" class="select-all" onclick="select_all()" >
                  <span></span></label>',
            'orderable'  => false,
            'searchable' => false,
            'exportable' => false,
            'printable'  => false,
            'width'      => '10px',
            'aaSorting'  => 'none',
         ],

         [
            'name'  => 'name',
            'data'  => 'name',
            'title' => trans('admin.name'),
         ],
         [
            'name'  => 'email',
            'data'  => 'email',
            'title' => trans('admin.email'),
         ],
         /*[
         'name'  => 'group_id.group_name',
         'data'  => 'group_id.group_name',
         'title' => trans('admin.group_id'),
         ],
         [
         'name'  => 'post_admin',
         'data'  => 'post_admin',
         'title' => trans('admin.post_admin'),
         ],*/
         [
            'name'       => 'actions',
            'data'       => 'actions',
            'title'      => trans('admin.actions'),
            'exportable' => false,
            'printable'  => false,
            'searchable' => false,
            'orderable'  => false,
         ],
      ];
   }

   /**
    * Get filename for export.
    * Auto filename Method By Baboon Script
    * @return string
    */
   protected function filename()
   {
      return 'admin_' . time();
   }

}
