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
            <div class="card chat-room">
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col">
                                <div class="card-body py-0" data-simplebar style="max-height: 562px">
                                   
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
 <script>
    $(function(){
        moment.locale("id");
        setInterval(async () => {
            let chats = await getChatRoom();
            displayChatRoom(chats.data);
        }, 3000);


        async function displayChatRoom(chats){
            let html = "";
            let chatRoom = $(".chat-room");
            
            $.each(chats,function(i,v){
                html += `
                <a href="javascript:void(0);" class="text-body">
                    <div class="d-flex align-items-start mt-1 p-2">
                        <div class="w-100 overflow-hidden">
                            <h5 class="mt-0 mb-0 font-14">
                                <span class="float-end text-muted font-12">${moment(v.messages[v.messages.length -1].created_at).format('LT')}</span>
                                ${v.guest.name}
                            </h5>
                            <p class="mt-1 mb-0 text-muted font-14">
                                <span class="w-75">${v.messages[v.messages.length -1].message}</span>
                            </p>
                        </div>
                    </div>
                </a>
                `;
                
            });

            let messages = await getMessages(chats[0].id);
            // console.log(chats[0].id);
            // console.log(messages);
            displayMessages(messages.data);

            chatRoom.html(html);
        }


        function displayMessages(messages){
            let html = "";
            let conversationList = $(".conversation-list");
            
            $.each(messages,function(i,v){
                if(v.type == "guest-admin"){
                    console.log(v.type)
                    html += `
                        <li class="clearfix">
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>${v.guest.name}</i>
                                    <p>
                                       ${v.message}
                                    </p>
                                </div>
                            </div>
                        </li>
                    `
                }else{
                    html += `
                       <li class="clearfix odd">
                           <div class="conversation-text">
                               <div class="ctext-wrap">
                                   <i>${v.user.name}</i>
                                   <p>
                                        ${v.message}
                                   </p>
                               </div>
                           </div>
                       </li>
                    `;
                }
               
                
            });

            conversationList.html(html);
        }


        async function getChatRoom(){
            let result =  await $.ajax({
                url: `{{ route("chat.get.chat-room") }}`,
                type: "get",
                dataType: 'JSON',
            });
            
            return result;
        }

        async function getMessages(roomId){
            let result =  await $.ajax({
                url: `{{ route("chat.get.messages") }}`,
                type: "get",
                dataType: 'JSON',
                data:{
                    id:roomId
                }
            });
            
            return result;
        }
    });
 </script>
@endpush


