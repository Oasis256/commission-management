<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pmethod;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;

class CommissionController extends Controller
{
    public function ProductCommisition()
    {
        // $suppliers = Supplier::first();
        // $sum = Purchase::where('id',$suppliers->id)->select('id','instant_commisition')->sum('instant_commisition');
        // dd($sum);
       
        $purchases = Purchase::orderBy('id','DESC')->get();
        return view('admin.commisition.commisition_index',compact('purchases'));
    }

    public function TotalCommisition()
    {
        $instant_commisition = Purchase::select('instant_commisition','')->sum('instant_commisition');
        $monthly_commisition = Purchase::select('monthly_commisition','')->sum('monthly_commisition');
        $yearly_commisition = Purchase::select('yearly_commisition','')->sum('yearly_commisition');
        $transport_commisition = Purchase::select('transport_commisition','')->sum('transport_commisition');
        $extra_one_commisition = Purchase::select('extra_one_commisition','')->sum('extra_one_commisition');
        $extra_two_commisition = Purchase::select('extra_two_commisition','')->sum('extra_two_commisition');
        $total_commisition = $instant_commisition + $monthly_commisition + $yearly_commisition + $transport_commisition + $extra_one_commisition + $extra_two_commisition;
        return view('admin.commisition.total_commisition',compact('instant_commisition','monthly_commisition','yearly_commisition','transport_commisition','extra_one_commisition','extra_two_commisition','total_commisition'));
    }

    public function CommisitionBalance()
    {
        $instant_commisition = Purchase::select('instant_commisition','')->sum('instant_commisition');
        $monthly_commisition = Purchase::select('monthly_commisition','')->sum('monthly_commisition');
        $yearly_commisition = Purchase::select('yearly_commisition','')->sum('yearly_commisition');
        $transport_commisition = Purchase::select('transport_commisition','')->sum('transport_commisition');
        $extra_one_commisition = Purchase::select('extra_one_commisition','')->sum('extra_one_commisition');
        $extra_two_commisition = Purchase::select('extra_two_commisition','')->sum('extra_two_commisition');
        $commisition_balance = $instant_commisition + $monthly_commisition + $yearly_commisition + $transport_commisition + $extra_one_commisition + $extra_two_commisition;
        return view('admin.commisition.commisition_balance',compact('instant_commisition','monthly_commisition','yearly_commisition','transport_commisition','extra_one_commisition','extra_two_commisition','commisition_balance'));
    }
}
