<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- .App\\Events\\Chat\\ExampleTwo --}}
                {{-- x-init="
                    Echo.channel('chat').listen('ExampleEvent', (event) => {
                        console.log(event)
                    })" --}}
                <div class="p-6 text-gray-900"
                    x-data="{
                        dispatched: false,
                        delivered: false,
                        order: null
                    }"
                    x-init="
                    Echo.private('users.{{ auth()->id() }}')
                    .listen('OrderDispatched', (event) => {
                        dispatched = true;
                        order = event.order
                    })
                    .listen('OrderDelivered', (event) => {
                        delivered = true;
                        order = event.order
                    })
                    
                ">
                    <template x-if="dispatched">
                        <div>
                            Order (#<span x-text="order.id"></span>) has been dispatched!
                        </div>
                    </template>
                    <template x-if="delivered">
                        <div>
                            Order (#<span x-text="order.id"></span>) has been delivered!
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
