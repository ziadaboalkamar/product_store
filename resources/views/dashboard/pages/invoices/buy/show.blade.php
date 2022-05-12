@extends('dashboard.layouts.master')
@section('title','الصفحة الرئيسية المخازن')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/app-invoice.css')}}">

@stop
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                                    <defs>
                                                        <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                            <stop stop-color="#000000" offset="0%"></stop>
                                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="invoice-linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-400.000000, -178.000000)">
                                                            <g transform="translate(400.000000, 178.000000)">
                                                                <path class="text-primary" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                                <path d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#invoice-linearGradient-1)" opacity="0.2"></path>
                                                                <polygon fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                                <polygon fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                                <polygon fill="url(#invoice-linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <h3 class="text-primary invoice-logo">Vuexy</h3>
                                            </div>
                                            <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                            <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                            <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Invoice
                                                <span class="invoice-number">{{$invoice->id}}</span>
                                            </h4>

                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Due Date:</p>
                                                <p class="invoice-date">{{$invoice->date_of_invoice}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">{{$invoice->client_name}}</h6>

                                        </div>
                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td class="pr-1">Total Due:</td>
                                                    <td><span class="font-weight-bold">{{$invoice->total}}</span></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="py-1">النتج</th>
                                            <th class="py-1">المخزن</th>
                                            <th class="py-1">الكمية</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                     @foreach($Invoice_products as $Invoice_product)
                                         <tr>
                                             <td class="py-1">
                                                 <span class="font-weight-bold">{{$Invoice_product->product->name}}</span>
                                             </td>
                                             <td class="py-1">
                                                 <span class="font-weight-bold">{{$Invoice_product->product->stores->name}}</span>
                                             </td>
                                             <td class="py-1">
                                                 <span class="font-weight-bold">{{$Invoice_product->count}}</span>
                                             </td>

                                         </tr>
                                     @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <p class="card-text mb-0">
                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">{{$invoice->total}}</p>
                                                </div>

                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">{{$invoice->total}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing" />


                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                        Send Invoice
                                    </button>
                                    <button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button>
                                    <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-print.html" target="_blank">
                                        Print
                                    </a>
                                    <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-edit.html"> Edit </a>
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                                        Add Payment
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>

                <!-- Send Invoice Sidebar -->
                <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">
                                    <span class="align-middle">Send Invoice</span>
                                </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <form>
                                    <div class="form-group">
                                        <label for="invoice-from" class="form-label">From</label>
                                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice-to" class="form-label">To</label>
                                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice-subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice-message" class="form-label">Message</label>
                                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11" placeholder="Message...">
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea>
                                    </div>
                                    <div class="form-group">
                                        <span class="badge badge-light-primary">
                                            <i data-feather="link" class="mr-25"></i>
                                            <span class="align-middle">Invoice Attached</span>
                                        </span>
                                    </div>
                                    <div class="form-group d-flex flex-wrap mt-2">
                                        <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Send Invoice Sidebar -->

                <!-- Add Payment Sidebar -->
                <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">
                                    <span class="align-middle">Add Payment</span>
                                </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <form>
                                    <div class="form-group">
                                        <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="amount">Payment Amount</label>
                                        <input id="amount" class="form-control" type="number" placeholder="$1000" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-date">Payment Date</label>
                                        <input id="payment-date" class="form-control date-picker" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-method">Payment Method</label>
                                        <select class="form-control" id="payment-method">
                                            <option value="" selected disabled>Select payment method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                                        <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                                    </div>
                                    <div class="form-group d-flex flex-wrap mb-0">
                                        <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Payment Sidebar -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>

    <!-- END: Page Vendor JS-->



@stop
