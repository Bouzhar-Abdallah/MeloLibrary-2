<div class="flex-col w-120 py-4 mx-auto mt-3 mb-3 bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm ">
    <div class="flex flex-row ">
        <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Anonymous's avatar" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
        <div class="flex-col mt-1">
            <div class="flex items-center flex-1 px-4 font-bold leading-tight">{{$comment->user->name}}
                <span class="ml-2 text-xs font-normal text-gray-500">3 days ago</span>
            </div>
            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">
                {{$comment->text}}
            </div>
            
        </div>
        <button class="inline-flex items-center px-1 pt-2 ml-auto flex-column">
            <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
            </svg>

        </button>
    </div>
</div>