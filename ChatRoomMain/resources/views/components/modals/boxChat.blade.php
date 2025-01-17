<div class="hidden" id="boxRoom">
    <div class="absolute top-0 left-0 h-screen w-full opacity-50 bg-black"></div>
    <div class="absolute top-0 left-0 h-screen w-full flex justify-center">
        <div class=" w-1/3 self-top p-4 relative">
            <div class="w-full h-full bg-[#212540] px-2 rounded-lg" id="RoomChat">
                <div class="flex w-full h-[10vh] bg-[#262948] rounded-lg mb-8" id="infoRoom">
                    <div class="flex flex-wrap items-center mx-5" >
                        <div class="h-14 w-14">
                            @include('components.avatar', ['avatar_path' => $room->icon ?? 'http://chatroom.th/images/avatar.jpg'])
                        </div>
                        <div class="grid grid-cols-1 p-2">
                            <div class="font-bold text-lg text-white pb-1">
                                <p>{{$room->name}}</p>
                            </div>
                            <div>
                                <sub class="text-gray-400">2 Thành viên</sub>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-[75vh] w-full mb-5 overflow-auto" id="boxChat">
                    <div class="flex">
                        <div class="h-10 w-10 m-[10px]">
                            @include('components.avatar', ['avatar_path' => $room->icon ?? 'http://chatroom.th/images/avatar.jpg'])
                        </div>
                        <div class="bg-[#262948] rounded-lg p-2 text-white">
                            <p>hi</p>
                            <small class="float-right">17:30</small>
                        </div>
                        <div class="text-white m-[5px]"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                    </div>

                    <div class="flex flex-row-reverse">
                        <div class="h-10 w-10 m-[10px]">
                            @include('components.avatar', ['avatar_path' => $room->icon ?? 'http://chatroom.th/images/avatar.jpg'])
                        </div>
                        <div class="bg-[#262948] rounded-lg p-2 text-white">
                            <p>hello</p>
                            <small class="float-left">18:30</small>
                        </div>
                        <div class="text-white m-[5px]"><i class="fa-solid fa-ellipsis-vertical"></i></div>

                    </div>
                </div>
                <div id="form_mess" class="absolute w-[92%] bottom-[20px]">

                </div>
            </div>

            <button type="button" onclick="closeModal('boxRoom')"
                    class="absolute top-0 right-0 border border-gray-300 bg-gray-300 w-8 h-8 rounded-full text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
