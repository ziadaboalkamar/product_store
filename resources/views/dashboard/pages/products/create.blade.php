@extends('dashboard.layouts.master')
@section('title','اضافة مدينة جديد')
@section('css')
@stop
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">اضافة صنف</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">الاصناف</a>
                                    </li>
                                    <li class="breadcrumb-item active">اضافة صنف
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Input Mask start -->
                <section id="input-mask-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اضافة صنف</h4>
                                </div>
                                <div class="card-body">
                                    <form class="row" action="{{route('product.store')}}" method="POST">
                                        @csrf
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="credit-card">اسم صنف</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control credit-card-mask" placeholder="اسم الصنف"  />
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="credit-card"> المخزن</label>
                                            <select name="store_id" class="select2 form-control form-control-lg">
                                                <option value=""> --- </option>

                                                @if ($stores && $stores->count() > 0)
                                                    @foreach ($stores as $store)
                                                        <option value="{{ $store->id }}"
                                                            {{ old('store_id') == $store->id ? 'selected' : null }}>
                                                            {{ $store->name }}</option>

                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('store_id')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="credit-card">الكمية</label>
                                            <input type="text" name="count" value="{{ old('count') }}" class="form-control credit-card-mask" placeholder=" الكمية"  />
                                            @error('count')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label for="credit-card">السعر</label>
                                            <input type="text" name="price" value="{{ old('price') }}" class="form-control credit-card-mask" placeholder=" السعر"  />
                                            @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">حفظ</button>
                                            <a href="{{ route('admin.product') }}" class="btn btn-outline-secondary">اغلاق</a>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Mask End -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('js')
@stop
