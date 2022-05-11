/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtProjectTable = $('.project-list-table');


    let statusObj;
    statusObj = {
        1: {title: 'Pending', class: 'badge-light-warning'},
        2: {title: 'Active', class: 'badge-light-success'},
        3: {title: 'Inactive', class: 'badge-light-secondary'}
    };

    var assetPath = '../../../app-assets/',
        userView = 'app-user-view.html',
        userEdit = 'app-user-edit.html';
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
        userView = assetPath + 'app/user/view';
        userEdit = assetPath + 'app/user/edit';
    }

    // Users List datatable
    if (dtProjectTable.length) {

        dtProjectTable.DataTable({
            ajax: assetPath + 'data/user-list.json', // JSON file to add data
            columns: [
                // columns according to JSON
                // {data: 'company_name'},
                // {data: 'project_name'},
                // {data: 'grant_date'},
                // {data: 'category_id'},
                // {data: 'grant_value'},
                // {data: 'currency_id'},
                // {data: 'managerial_fees'},
                // {data: 'project_proposal'},
                // {data: 'start_date'},
                // {data: 'project_branch_count_id'},
                // {data: 'project_attachment_id'},
                // {data: 'main_branch_id'},
                // {data: 'created_at'},
                // {data: ''}

                {data: 'full_name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'current_plan'},
                {data: 'current_plan'},
                {data: 'status'},
                {data: 'full_name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'current_plan'},
                {data: 'current_plan'},
                {data: 'status'},
                {data: 'status'},
                {data: ''},

            ],
            columnDefs: [
                {
                    // User Role
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $role = full['role'];
                        var roleBadgeObj = {
                            Subscriber: feather.icons['user'].toSvg({class: 'font-medium-3 text-primary mr-50'}),
                            Author: feather.icons['settings'].toSvg({class: 'font-medium-3 text-warning mr-50'}),
                            Maintainer: feather.icons['database'].toSvg({class: 'font-medium-3 text-success mr-50'}),
                            Editor: feather.icons['edit-2'].toSvg({class: 'font-medium-3 text-info mr-50'}),
                            Admin: feather.icons['slack'].toSvg({class: 'font-medium-3 text-danger mr-50'})
                        };
                        return "<span class='text-truncate align-middle'>" + roleBadgeObj[$role] + $role + '</span>';
                    }
                },
                {
                    // Actions
                    targets: -1,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({class: 'font-small-4'}) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-right">' +
                            '<a href="' +
                            userView +
                            '" class="dropdown-item">' +
                            feather.icons['file-text'].toSvg({class: 'font-small-4 mr-50'}) +
                            'Details</a>' +
                            '<a href="' +
                            userEdit +
                            '" class="dropdown-item">' +
                            feather.icons['archive'].toSvg({class: 'font-small-4 mr-50'}) +
                            'Edit</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-record">' +
                            feather.icons['trash-2'].toSvg({class: 'font-small-4 mr-50'}) +
                            'Delete</a></div>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }
            ],
            order: [[2, 'desc']],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..'
            },
           // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'Export',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'Print',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({class: 'font-small-4 mr-50'}) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({class: 'font-small-4 mr-50'}) + 'Copy',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'Add new',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        'onclick': "document.getElementById('create_new').submit()",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],

            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            initComplete: function () {
                // Adding role filter once table initialized
                this.api()
                    .columns(3)
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select id="UserRole" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
                        )
                            .appendTo('.user_role')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                            });
                    });
                // Adding plan filter once table initialized
                this.api()
                    .columns(4)
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select id="UserPlan" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> Select Plan </option></select>'
                        )
                            .appendTo('.user_plan')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                            });
                    });

            }

        });
    }



});
