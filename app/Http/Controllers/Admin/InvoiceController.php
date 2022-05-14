<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductInvoice;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{

    public function saleIndex(Request $request)
    {


        if ($request->ajax()) {
            $product = Product::all();
            $stores = Store::all();
            $invoices = Invoice::where('status',0)->get();

            return DataTables::of($invoices)
                ->addIndexColumn()


                ->make(true);
        }


        return view('dashboard.pages.invoices.sale.index', [
            'invoices' =>Invoice::get(),
        ]);
    }
    public function buyIndex(Request $request)
    {


        if ($request->ajax()) {
            $product = Product::all();
            $stores = Store::all();
            $invoices = Invoice::where('status',1)->get();

            return DataTables::of($invoices)
                ->addIndexColumn()

                ->editColumn('active', function (Invoice $invoices) {
                    return $invoices->getActive();

                })

                ->make(true);
        }


        return view('dashboard.pages.invoices.buy.index', [
            'invoices' =>Invoice::get(),
        ]);
    }
    public function createBuy(){
        $products = Product::all();
        return view('dashboard.pages.invoices.buy.add',compact('products'));
    }
    public function storeBuy(Request $request){
$total = 0;

            $project = Invoice::insertGetId([
                'client_name'=>$request->customer,
                'date_of_invoice'=>$request->date,
                'total'=>$total,
                'status' => 1
            ]);

            $attachment_array = $request->invoice;
$count = [];
            for ($i = 0; $i < count($attachment_array); $i++) {
                $product = Product::where('id',$attachment_array[$i]["product_id"])->get();
                $total +=$product[0]->price*$attachment_array[$i]["quantity"];
                ProductInvoice::create([
                 'inovice_id' =>$project,
                    'product_id'=> $attachment_array[$i]["product_id"],
                    'count'=>$attachment_array[$i]["quantity"],

                ]);
                $count[$i] = $product[0]['count'] + $attachment_array[$i]["quantity"];
                Product::where('id',$attachment_array[$i]["product_id"])->update([
                    'count'=>$count[$i],
                ]);




            }


        Invoice::where('id', $project)->update([
        'total' => $total
        ]);


            toastr()->success(__('تم حفظ البيانات بنجاح'));
            return redirect()->route('admin.invoice.buy');


    }
    public function createSale(){
        $products = Product::all();
        return view('dashboard.pages.invoices.sale.add',compact('products'));
    }
    public function storeSale(Request $request){
        $total = 0;
        $project = Invoice::insertGetId([
            'client_name'=>$request->customer,
            'date_of_invoice'=>$request->date,
            'total'=>$total,
            'status' => 0
        ]);

        $attachment_array = $request->invoice;
        $count = [];
        for ($i = 0; $i < count($attachment_array); $i++) {
            $product = Product::where('id',$attachment_array[$i]["product_id"])->get();
            $total +=$product[0]->price*$attachment_array[$i]["quantity"];
            $count[$i] = $product[0]['count'] - $attachment_array[$i]["quantity"];
            Product::where('id',$attachment_array[$i]["product_id"])->update([
                'count'=>$count[$i],
            ]);
            ProductInvoice::create([
                'inovice_id' =>$project,
                'product_id'=> $attachment_array[$i]["product_id"],
                'count'=>$attachment_array[$i]["quantity"],

            ]);

        }

        Invoice::where('id', $project)->update([
            'total' => $total
        ]);


        toastr()->success(__('تم حفظ البيانات بنجاح'));
        return redirect()->route('admin.invoice.sale');


    }
    public function show($id){
    $invoice = Invoice::where('id',$id)->first();
    $Invoice_products = ProductInvoice::where('inovice_id',$id)->get();

    return view('dashboard.pages.invoices.buy.show',compact('invoice','Invoice_products'));



    }


}
