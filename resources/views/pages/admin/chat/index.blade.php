@extends('layouts.app')

@section('title','Chat')

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <h4 class="page-title">Chat</h4>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <!-- start chat users-->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body p-0">
                    {{-- <ul class="nav nav-tabs nav-bordered">
                        <li class="nav-item">
                            <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                All
                            </a>
                        </li>
                    </ul> <!-- end nav--> --}}
                    <div class="tab-content">
                        {{-- <div class="tab-pane show active card-body pb-0" id="newpost">

                            <!-- start search box -->
                            <div class="app-search">
                                <form>
                                    <div class="mb-2 position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="People, groups & messages..." />
                                        <span class="mdi mdi-magnify search-icon"></span>
                                    </div>
                                </form>
                            </div>
                            <!-- end search box -->
                        </div> --}}

                            <!-- users -->
                        <div class="row">
                            <div class="col">
                                <div class="card-body py-0" data-simplebar style="max-height: 562px">
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">4:30am</span>
                                                    Brandon Smith
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">3</span></span>
                                                    <span class="w-75">How are you today?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start bg-light p-2">
                                            <img src="assets/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">5:30am</span>
                                                    Shreyu N
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-75">Hey! a reminder for tomorrow's meeting...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Thu</span>
                                                    Maria C
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">2</span></span>
                                                    <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-10.jpg" class="me-2 rounded-circle" height="48" alt="Rhonda D" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Wed</span>
                                                    Rhonda D
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-75">Please check these design assets...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="48" alt="Michael H" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Tue</span>
                                                    Michael H
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">6</span></span>
                                                    <span class="w-75">Are you free for 15 min? I would like to discuss something...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="48" alt="Thomas R" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Tue</span>
                                                    Thomas R
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-75">Let's have meeting today between me, you and Tony...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="48" alt="Thomas J" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Tue</span>
                                                    Thomas J
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-75">Howdy?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start mt-1 p-2">
                                            <img src="assets/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="48" alt="Ricky J" />
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0 mb-0 font-14">
                                                    <span class="float-end text-muted font-12">Mon</span>
                                                    Ricky J
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted font-14">
                                                    <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">28</span></span>
                                                    <span class="w-75">Are you interested in learning?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>                                                        

                                </div> <!-- end slimscroll-->
                            </div> <!-- End col -->
                        </div> <!-- end users -->
                    </div> <!-- end tab content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end chat users-->

        <!-- chat area -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body px-0 pb-0">
                    <ul class="conversation-list px-3" data-simplebar style="max-height: 538px">
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" class="rounded" alt="Shreyu N" />
                                <i>10:00</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu N</i>
                                    <p>
                                        Hello!
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" class="rounded" alt="dominic" />
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Dominic</i>
                                    <p>
                                        Hi, How are you? What about our next meeting?
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" class="rounded" alt="Shreyu N" />
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu N</i>
                                    <p>
                                        Yeah everything is fine
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" class="rounded" alt="dominic" />
                                <i>10:02</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Dominic</i>
                                    <p>
                                        Wow that's great
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                                <i>10:02</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu N</i>
                                    <p>
                                        Let's have it today if you are free
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="dominic" class="rounded" />
                                <i>10:03</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Dominic</i>
                                    <p>
                                        Sure thing! let me know if 2pm works for you
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                                <i>10:04</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu N</i>
                                    <p>
                                        Sorry, I have another meeting scheduled at 2pm. Can we have it
                                        at 3pm instead?
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                                <i>10:04</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Shreyu N</i>
                                    <p>
                                        We can also discuss about the presentation talk format if you have some extra mins
                                    </p>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="dominic" class="rounded" />
                                <i>10:05</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Dominic</i>
                                    <p>
                                        3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                        I am attaching the last year format and assets here...
                                    </p>
                                </div>
                                <div class="card mt-2 mb-1 shadow-none border text-start">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title rounded">
                                                        .ZIP
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);"
                                                    class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                                <p class="mb-0">2.3 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);"
                                                    class="btn btn-link btn-lg text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="conversation-actions dropdown">
                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="row px-3 pb-3">
                        <div class="col">
                            <div class="mt-2 bg-light p-3 rounded">
                                <form class="needs-validation" novalidate="" name="chat-form"
                                    id="chat-form">
                                    <div class="row">
                                        <div class="col mb-2 mb-sm-0">
                                            <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                            <div class="invalid-feedback">
                                                Please enter your messsage
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="btn-group">
                                                {{-- <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                                <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a> --}}
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </form>
                            </div> 
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        <!-- end chat area-->

        <!-- end user detail -->
    </div> <!-- end row-->

</div> <!-- container -->
@endsection

@push('style')
@endpush

@push('script')
 
@endpush

