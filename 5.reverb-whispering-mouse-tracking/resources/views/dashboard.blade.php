<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"
                    x-data="{ userPositions: [] }"
                    x-init="
                        const channel = Echo.private('app');
                        let width = window.innerWidth;
                        let height = window.innerHeight;
                        channel.listenForWhisper('mousemove', (event) => {
                            const user = userPositions.find(p => p.user.id === event.user.id);
                            if(typeof user == 'undefined'){
                                userPositions.push(event);
                                return;
                            }
                            user.position = {
                                x: event.position.x * width,
                                y: event.position.y * height
                            }
                        })
                        onmousemove = (e) => {
                            channel.whisper('mousemove', {
                                user: {{ json_encode(auth()->user()->only('id', 'name')) }},
                                position: {
                                    x: e.x / width,
                                    y: e.y / height
                                }
                            })
                        }
                    ">
                    <template x-for='user in userPositions'>
                        <div class="flex items-center absolute leading-none h-3 space-x-1" x-bind:style="`left: ${user.position.x}px; top: ${user.position.y}px`">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M11 21L4 4l17 7l-6.265 2.685a2 2 0 0 0-1.05 1.05z"/></svg>
                            <span class="text-sm font-semibold" x-text="user.user.name"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
