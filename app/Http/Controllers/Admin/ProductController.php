<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $product = Product::all();
            $stores = Store::all();

            return DataTables::of($product)
                ->addIndexColumn()

                ->editColumn('active', function (Product $product) {
                    return $product->getActive();

                })
                ->editColumn('store_id', function (Product $product) {
                    return $product->stores->name;

                })
                ->make(true);
        }


        return view('dashboard.pages.products.index', [
            'products' =>Product::get(),
        ]);
    }
    public function create(){
        $stores = Store::all();
        return view('dashboard.pages.products.create',compact('stores'));
    }
    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'count'=>'required|numeric',
                'store_id' => 'required',
            ],[
                'required' => 'هذا الحقل مطلوب',
                'string' => 'يجب ان يكون الحقل نصي',
                'numeric' => 'يجب ان يكون الحقل رقم',
            ]);

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'count' => $request->count,
                'store_id' => $request->store_id
            ]);
            toastr()->success(__('تم حفظ البيانات بنجاح'));

            return redirect()->route('admin.product') ;
        }catch (\Exception$exception){
            toastr()->error(__('يوجد خطاء ما '));
            return redirect()->route('admin.product') ;

        }
    }
    public function edit($id){

        $product = Product::select()->find($id);
        $stores = Store::all();



        return view('dashboard.pages.products.edit', compact('stores','product'));
    }
    public function update(Request $request , $id){
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'count'=>'required|numeric',
                'store_id' => 'required',
            ],[
                'required' => 'هذا الحقل مطلوب',
                'string' => 'يجب ان يكون الحقل نصي',
                'numeric' => 'يجب ان يكون الحقل رقم',
            ]);
            $product = Product::find($id);

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'count' => $request->count,
                'store_id' => $request->store_id
            ]);
            toastr()->success(__('تم تحديث البيانات بنجاح'));

            return redirect()->route('admin.product') ;
        }catch (\Exception$exception){
            toastr()->error(__('يوجد خطاء ما '));
            return redirect()->route('admin.product') ;

        }
    }
    public function delete($id){
        $product = Product::find($id);
        $invoices = Invoice::where('product_id', '=', $id)->get();
        if (!$product) {
            toastr()->error(__('يوجد خطاء ما'));
            return redirect()->route('projects.index');
        }
        if (count($invoices) > 0) {
            toastr()->error(__('لا يمكن حذفه يوجد منتجات مرتبطه به'));
            return redirect()->route('projects.index');
        }
        $product->delete();

        toastr()->success(__('تم حذف الصنف بنجاح'));
        return back();
    }
}
