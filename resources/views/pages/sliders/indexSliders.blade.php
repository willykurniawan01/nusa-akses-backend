@extends('layouts.app')

@section('title', 'Nusa Akses | Postingan')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
         
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Image Sliders</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <button data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm">
                            Add Picture
                        </button>
                    </div>
                </div>
                <div name="row-content" class="row px-3">
                   
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->



    <!-- confirm delete Modal-->
    <form name="deleteSlidersForm" action="{{ route('sliders.destroy') }}" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <input type="hidden" name="id">
        <div class="modal fade" name="deleteModal" id="deleteModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik tombol ok akan menghapus sliders</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <form name="saveSlidersForm" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id">
        <div class="modal fade" name="addModal" id="addModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Picture</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><input name="picture" type="file" class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="saveButton" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('style')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/venobox@2.0.4/dist/venobox.min.css">
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/venobox@2.0.4/dist/venobox.min.js"></script>

    <script>
        $(function() {
            let deleteButton = $("button[name='deleteButton']");
            let saveButton = $("button[name='saveButton']");
            let deleteModal = $("div[name='deleteModal']");
            let addModal = $("div[name='addModal']");
            let deleteSlidersForm = $("form[name='deleteSlidersForm']");
            let saveSlidersForm = $("form[name='saveSlidersForm']");
            let rowContent = $("div[name ='row-content']");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


       

            //load data
            fetchSlider();

            function fetchSlider(){
                $.ajax({
                    type: "GET",
                    url: "{{ route('sliders.get.get-all-sliders') }}",
                    beforeSend: function(){
                        let content = `
                        <div class="spinner-grow m-auto" style="width: 5rem; height: 5rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>`
                       rowContent.html(content)
                    },
                    success: function(res) {
                        let content=loadSlider(res);
                        rowContent.html(content)

                        //init venobox
                        new VenoBox({
                        selctor: '.venobox',
                        overlayClose:false
                        });

                    }
                })

            }

        function loadSlider(data){
            let content = ""

            $.each(data,function(i,v){
                content += `
                        <div class="card mr-5" style="width: 18rem;">
                            <a class="venobox" href="{{ Storage::url('') }}${v.picture}">
                                <img src="{{ Storage::url('') }}${v.picture}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body d-flex justify-content-center">
                                <button data-toggle="modal" data-id="${v.id}"  data-target="#deleteModal" href="#" class="btn btn-danger">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                
                `;
            })

            return content;

        }
            



            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })




            deleteModal.on("shown.bs.modal", function(event) {
                //ambil button yang men trigger modal
                let button = $(event.relatedTarget);

                //ambil atribut id
                let id = button.data('id');
                deleteSlidersForm.find("input[name='id']").val(id);
            })



            //event submit form delete
            deleteSlidersForm.on("submit", function(event) {
                event.preventDefault();

                let form = $(this);
                let url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(res) {
                        deleteModal.modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: res.message
                        })

                        fetchSlider();

                        
                    }
                })

            })


            saveSlidersForm.on("submit",function(event){
                event.preventDefault();

                let form = $(this);
                let url = form.attr('action');

                var file_data = $("input[name='picture']").prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('picture', file_data);

                $.ajax({
                    type:"POST",
                    url:url,
                    data:form_data,
                    processData: false,
                    contentType: false,
                    success:function(res){
                        console.log(res)
                        Toast.fire({
                            icon: 'success',
                            title: res.message
                        })
                        
                        addModal.modal('hide');
                        fetchSlider();
                        saveSlidersForm[0].reset()
                    }
                })
            })

           
        })
    </script>
@endpush
