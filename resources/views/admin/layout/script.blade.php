    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        function globalgetactivemenu() {
            //deactivate menu
        }
        $(document).ready(function() {
            App.init();
            $('a').attr('data-active', 'false');
            $('a').attr('aria-expanded', 'false');
            //get path now
            var pathNow = window.location.pathname;

            //activate menu based on path
            $('a[href="' + pathNow + '"]').attr('data-active', 'true');
            $('a[href="' + pathNow + '"]').attr('aria-expanded', 'true');
            $('a[href="' + pathNow + '"]').parent('li').parent('ul').siblings('.dropdown-toggle').attr('data-active', 'true');
            $('a[href="' + pathNow + '"]').parent('li').parent('ul').siblings('.dropdown-toggle').attr('aria-expanded', 'true');
            $('a[href="' + pathNow + '"]').parent('li').parent('ul').addClass('active');
            // console.log(window.location.pathname)


            var ss = $(".basic").select2({
                tags: true,
            });

        

            $('#zero-config').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10
            });

            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                        title: 'Apakah anda yakin ingin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire(
                                'Dihapus!',
                                'Data Anda telah dihapus.',
                                'success'
                            )

                        }
                    });
            });


            var i = 0;
            $("#dynamic-ar").click(function() {
                console.log('helo')
                    ++i;
                $("#dynamicAddRemove").append(

                    '<tr><td><div class="row mb-1"><div class="col-lg-6"><label for="form-control">Meta properties</label><input type="text" class="form-control" name="meta[' + i + '][properties]" placeholder="Meta properties"></div><div class="col-lg-6"><label for="form-control">Meta content</label><input type="text" class="form-control" name="meta[' + i + '][content]" placeholder="Meta content"></div></div></td><td width="5%"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'

                    // '<tr><td><div class="row"><div class="col-lg-6"><label for="form-control">Host SMTP</label><input type="text" class="form-control" name="webmail[' + i + '][host_smtp]" placeholder="Host SMTP"></div><div class="col-lg-6"><label for="form-control">Port SMTP</label><input type="number" min="0" class="form-control" name="webmail[' + i + '][port_smtp]" placeholder="Port SMTP"></div></div><div class="row mb-1"><div class="col-lg-6"><label for="form-control">Host Imap</label><input type="text" class="form-control" name="webmail[' + i + '][host_imap]" placeholder="Host Imap"></div><div class="col-lg-6"><label for="form-control">Port Imap</label><input type="number" min="0" class="form-control" name="webmail[' + i + '][port_imap]" placeholder="Port Imap"></div></div><div class="row mb-1"><div class="col-lg-4"><label for="form-control">Email</label><input type="email" class="form-control" placeholder="Email" name="webmail[' + i + '][email]"></div><div class="col-lg-4"><label for="form-control">Username</label><input type="text" class="form-control" placeholder="Username" name="webmail[' + i + '][username]"></div><div class="col-lg-4"><label for="form-control">Password</label><input type="password" class="form-control" placeholder="password" name="webmail[' + i + '][password]"></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'


                );
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
            });
        });
    </script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/select2.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script src="{{asset('admin/plugins/table/datatable/datatables.js')}}"></script>
    
    <script>
        const thumbnailInput = document.getElementById('thumbnail');
        const previewImage = document.getElementById('previewImage');
    
        thumbnailInput.addEventListener('change', function () {
            if (thumbnailInput.files && thumbnailInput.files[0]) {
                const reader = new FileReader();
    
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
    
                reader.readAsDataURL(thumbnailInput.files[0]);
            }
        });
    </script>

    
    

    
    
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->