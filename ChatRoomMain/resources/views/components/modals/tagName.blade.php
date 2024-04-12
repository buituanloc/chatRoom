<div id="tagName" class="absolute bottom-16 left-12">
    <div class="bg-white h-auto rounded-lg">
        <div class="flex flex-wrap items-center m-1">
            <div class="h-8 w-8 mr-[10px]">
                @include('components.avatar', ['avatar_path' => $room->icon ?? 'http://chatroom.th/images/avatar.jpg'])
            </div>
            <div class="grid grid-cols-1">
                <div class="pb-1">
                    <p>No Name</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center m-1 ">
            <div class="h-8 w-8 mr-[10px]">
                @include('components.avatar', ['avatar_path' => $room->icon ?? 'http://chatroom.th/images/avatar.jpg'])
            </div>
            <div class="grid grid-cols-1">
                <div class="pb-1">
                    <p>No Name</p>
                </div>
            </div>
        </div>
    </div>
</div>>

