<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StoreController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $stores = Store::all();

            return DataTables::of($stores)
                ->addIndexColumn()

                ->editColumn('active', function (Store $store) {
                    return $store->getActive();

                })
                ->make(true);
        }


        return view('dashboard.pages.stores.index', [
            'stores' => Store::get(),
        ]);
    }
    public function create(){
        return view('dashboard.pages.stores.create');
    }


    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required|string',
            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'name.string' => 'يجب ان يكون الحقل نصي',
            ]);

            $data = [];
            $data['name'] = $request->name;
            Store::create($data);
            toastr()->success(__('تم حفظ البيانات بنجاح'));

            return redirect()->route('admin.stores') ;
        }catch (\Exception $exception){
            toastr()->error(__('يوجد خطاء ما '));
            return redirect()->route('admin.product') ;

        }
    }
    public function edit($id)
    {
        $store = Store::select()->find($id);



        return view('dashboard.pages.stores.edit', compact('store'));
    }
    public function update(Request $request,$id){
        try {
            $request->validate([
                'name' => 'required|string',
            ],[
                'name.required' => 'هذا الحقل مطلوب',
                'name.string' => 'يجب ان يكون الحقل نصي',
            ]);

            $data = [];
            $data['name'] = $request->name;
            $store = Store::select()->find($id);
            $store->update($data);
            toastr()->success(__('تم تعديل البيانات بنجاح'));

            return redirect()->route('cities.index') ;
        }catch (\Exception $exception){
            toastr()->error(__('يوجد خطاء ما '));
            return redirect()->route('admin.stores') ;
        }
    }
    public function delete($id){
        $store = Store::find($id);
        $product = Product::where('store_id', '=', $id)->get();
        if (!$store) {
            toastr()->error(__('يوجد خطاء ما'));
            return redirect()->route('projects.index');
        }
        if (count($product) > 0) {
            toastr()->error(__('لا يمكن حذفه يوجد منتجات مرتبطه به'));
            return redirect()->route('projects.index');
        }
        $store->delete();

        toastr()->success(__('تم حذف المخزن بنجاح'));
        return back();
    }
}
