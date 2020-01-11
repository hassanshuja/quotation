<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataTableExportStatusReport implements FromCollection, WithHeadings
{
    protected $headings;

    protected $query;

    protected $columns;
    protected $invoice_rows;

    public function __construct(array $headings, Builder $query, array $columns, array $invoice_rows)
    {
        $this->headings = $headings;
        $this->query = $query;
        $this->columns = $columns;
        $this->invoice_rows = $invoice_rows;
    }

    public function headings(): array
    {
        array_push($this->headings, 'invoice_number');
        return $this->headings;
    }

    public function collection()
    {
        // dd($this->invoice_rows);
        array_push($this->columns, 'id');

        $res = $this->query->with('quotes')->get($this->columns);

        // dd($res);
        foreach($res as $key => $val) {
            // dd($invoice_rows, $val);
            foreach($this->invoice_rows  as $rowz){
                
                if($val['quotes'] !== null && $val['status'] == 'Invoiced'){
                    
                    if(json_decode($rowz->id) !==  null){
                        
                        if(in_array($val['quotes']['id'], json_decode($rowz->id))){
                            $res[$key]['invoice_number'] = $rowz->invoice_number;
                            break;
                        }else{
                            $res[$key]['invoice_number']  = '';
                        }
                    }
                    
                }else{
                    $res[$key]['invoice_number'] =  '';
                }
            }
        }

        // unset($this->columns[3]);


        //  dd($this->columns,'lskdfj');
        array_push($this->columns, 'invoice_number');


        return $res->each(function (Model $item) {
            unset($item->id);
            // dd($item);
            return $item->setAppends([]);
        });
    }
}
