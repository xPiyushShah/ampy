<body>
    <div class="container-fluid">
        <div class="row">
            <div id="first_col" class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="button_su">
                                    <span class="su_button_circle">
                                    </span>
                                    <button type="button" class="hrbtns contractbtn addbttn" onclick="showModal('<?= base_url() ?>add','Add Order')"> <span class="button_text_container">
                                            <i class="fa fa-plus"></i> ADD
                                        </span></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-html mt-0">
                                    <table class="example display dataTable display responsive nowrap tblalign table borderless" style="width: 100%" id="example" aria-describedby="example_info">
                                        <thead class="theadrow">
                                            <tr>
                                                <th>S.No</th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Mobile Number
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Name
                                                <p class="header-effect ">
                                                        <!-- <a href="sales_invoice_view_accept.html" onclick="toggleViews(1)" -->
                                                        <a onclick="toggleViews()" data-bs-toggle="tooltip" data-placement="bottom" data-bs-title="view" data-bs-auto-close="outside">
                                                            <img src="https://login.loyalwings.com/assets/img/view.svg" height="15px" width="15px" alt="">
                                                        </a>
                                                        <!-- <span class="black"> |</span> -->
                                                        <a onclick="showModal()" data-bs-toggle="tooltip" data-bs-title="edit" data-bs-auto-close="outside">
                                                            <img src="https://login.loyalwings.com/assets/img/edit.svg" height="15px" width="15px" alt="">
                                                        </a>

                                                        <!-- <span class="black"> |</span> -->
                                                        <a onclick="datadelete()" data-bs-toggle="tooltip" data-bs-title="delete" data-bs-auto-close="outside">
                                                            <img src="https://login.loyalwings.com/assets/img/delete.svg" height="15px" width="15px" alt="">
                                                        </a>
                                                    </p>
                                                </td>
                                                <td>87674542</td>
                                                <td>name@gmail.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sec_col" class="col-md-8" style="display: none;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 relative">
                                <div class="fixed-buttons-right">

                                    <button type="button" class="editpenbtn " data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Expense" id="view_edit"><i class="fa fa-edit expicon "></i></button>
                                    <button id="view_print" type="button" class="editpenbtn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Print"><i class="bi bi-printer expicon "></i></button>
                                    <button id="view_pdf" type="button" class="editpenbtn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Pdf"><i class="bi bi-file-earmark-pdf"></i></button>
                                    <button type="button" class="editpenbtn" id="view_copy" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Copy"><i class="fa fa-clone expicon "></i></i></button>
                                    <!-- <button type="button" class="closexbtn close-button" id="delete_view"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete"><i
                                    class="fa fa-times expicon"></i></button> -->
                                    <button type="button" class="editpenbtn  " id="delete_view" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete">
                                        <!-- <i class="fa fa-times expicon"></i> -->
                                        <img src="./delete.svg" alt="">
                                    </button>
                                    <button type="button" onclick="toggleViews(id)" class="editpenbtn " class="contractfilter edittglbtn5 edittglbtn6 viewbtnByToggle" data-bs-toggle="tooltip" data-bs-title="Toggle Table" data-bs-original-title="" title="" data-bs-trigger="hover">
                                        <i class="fa-solid fa-angle-left" style="font-size: 12px" aria-hidden="true"></i>
                                    </button>
                                    <span id="view_invoice"></span>
                                </div>

                                <table class="details-table table table-striped">
                                    <tbody>
                                        <tr class="project-overview greyback">
                                            <td class="viewjobft " width="20%"><b>Origin :</b></td>
                                            <td class="viewjobft "></td>
                                        </tr>
                                        <tr class="project-overview">
                                            <td class="viewjobft "><b>Colours :</b></td>
                                            <td class="viewjobft "></td>
                                        </tr>
                                        <tr class="project-overview">
                                            <td class="viewjobft "><b>Styles :</b></td>
                                            <td class="viewjobft ">Baju anak</td>
                                        </tr>
                                        <tr class="project-overview">
                                            <td class="viewjobft "><b>Sales price :</b></td>
                                            <td class="viewjobft ">900.00</td>
                                        </tr>
                                        <tr class="project-overview">
                                            <td class="viewjobft "><b>Default Profit Rate(%) :</b></td>
                                            <td class="viewjobft "></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_md" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header hdrbg">
                    <button type="button" class="btn-close closebtn" data-bs-dismiss="modal"></button>
                    <!-- <h5 class="modal-title"></h5> -->
                    <h5 class="fnt_head">

                        <b class="modal-title"></b>
                        <div class="vertical-line">

                            <span class="Bcgtop capsule"></span>
                            <span class="Bcgbttm capsule"></span>
                        </div>
                    </h5>
                </div>
                <div class="modal-body mbdclr">
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <script>
    $(document).ready(function() {
        // Function to show modal
        function showModal(url, title) {
            $('#modal_md').on('shown.bs.modal', function() {
                $('.selectpicker').selectpicker('refresh');
            });
            $('#modal_md').modal('show', {
                backdrop: 'true'
            });
            $.ajax({
                url: url,
                success: function(response) {
                    $('#modal_md .modal-title').html(title);
                    $('#modal_md .modal-body').html(response);
                }
            });
        }

        // Event listener for the button click
        $('.addbttn').on('click', function() {
            var baseUrl = '<?= base_url() ?>'; // Assuming base_url() is defined somewhere
            var url = baseUrl + 'add'; // Constructing the URL
            var title = 'Add Order'; // Title for the modal

            // Call the showModal function
            showModal(url, title);
        });
    });
</script>

    <script>
        function toggleViews(id) {
            var hidden_columns = [4, 5, 6, 7];
            var _visible = true;
            if ($("#first_col").hasClass("col-md-12")) {
                $("#first_col").removeClass("col-md-12").addClass("col-md-4");
                _visible = false;
                $("#sec_col").show();
                $("#toggle_btn")
                    .find("i")
                    .removeClass("fa fa-angle-double-left")
                    .addClass("fa fa-angle-double-right");
            } else {
                $("#first_col").removeClass("col-md-4").addClass("col-md-12");
                $("#sec_col").hide();
                $("#toggle_btn")
                    .find("i")
                    .removeClass("fa fa-angle-double-right")
                    .addClass("fa fa-angle-double-left");
            }
            var _table = $("#example").DataTable();
            // Show hide hidden columns
            _table.columns(hidden_columns).visible(_visible, true);
            _table.columns.adjust();
        }
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({

                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                language: {
                    lengthMenu: '_MENU_',
                    search: '',
                    searchPlaceholder: " Search for order ID, customer, order status or something..."
                },
                responsive: true,
                dom: 'Blfrtip',

                buttons: [{

                    },

                    {
                        text: '<i class="fa-solid fa-arrow-rotate-right p-1" style="font-size:.9rem"></i>'
                    },
                    {
                        text: '<button type="button" style="font-size:0.9rem; font-weight:400; border:none;padding:0;background-color: inherit;"><i class="fas fa-cog text-muted"></i> MANIPULATION</button>',
                    },
                    {
                        text: '<i class="fa-solid fa-arrow-right-from-bracket"></i> EXPORT',
                        extend: 'collection',
                        buttons: [
                            // '<span class="fexport"><i class="fa-regular fa-file-excel icn me-2"></i> EXCEL</span>', '<span class="fexport"><i class="fa-regular fa-file-lines icn me-2"></i> CSV</span>', '<span class="fexport"><i class="fa-regular fa-file-pdf icn me-2"></i> PDF</span>', '<span class="fexport"><i class="fa-solid fa-print me-2 icn"></i> PRINT</span>'
                            {},
                            {
                                text: '<i class="fa-regular fa-file-excel icn me-2 excel-icon"></i> Excel',
                                extend: 'excel',

                            },
                            {
                                text: '<i class="fa-regular fa-file-lines icn me-2 csv-icon"></i> CSV',
                                extend: 'csv',
                            },
                            {
                                text: '<i class="fa-regular fa-file-pdf icn me-2 pdf-icon"></i> PDF',
                                extend: 'pdf'
                            },
                            {
                                text: '<i class="fa-solid fa-print me-2 icn print-icon"></i> PRINT',
                                extend: 'print'
                            },
                        ],
                        className: 'px-3'

                    }

                ],


            });

        });
    </script>
</body>