@push('style')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush
<x-panel>
    <div class="mt-12">
        <div
            class="grid mb-12 gap-y-10 gap-x-4 md:grid-cols-2 {{ Auth::guard('inspector')->user()->lvl == 'admin' ? 'xl:grid-cols-5' : 'xl:grid-cols-4' }}">
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                <div
                    class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/40 place-items-center">
                    <x-mdi-car-multiple class="w-6 h-6 text-white" />
                </div>
                <div class="p-4 text-right">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                        Total Mobil</p>
                    <h4
                        class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        {{ $totalCars }}</h4>
                </div>
                <div class="p-4 border-t border-blue-gray-50">
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                        <strong class="text-green-500"></strong>
                    </p>
                </div>
            </div>
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                <div
                    class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-pink-600 to-pink-400 shadow-pink-500/40 place-items-center">
                    <x-mdi-credit-card-settings-outline class="w-6 h-6 text-white" />
                </div>
                <div class="p-4 text-right">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                        Jumlah Transaksi</p>
                    <h4
                        class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        {{ $totalTransaksi }}</h4>
                </div>
                <div class="p-4 border-t border-blue-gray-50">
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                        <strong class="text-green-500"></strong>
                    </p>
                </div>
            </div>
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                <div
                    class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-green-600 to-green-400 shadow-green-500/40 place-items-center">
                    <x-mdi-account-group class="w-6 h-6 text-white" />
                </div>
                <div class="p-4 text-right">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                        Jumlah Member</p>
                    <h4
                        class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        {{ $totalMembers }}</h4>
                </div>
                <div class="p-4 border-t border-blue-gray-50">
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                        <strong class="text-red-500"></strong>
                    </p>
                </div>
            </div>
            @if (Auth::guard('inspector')->user()->lvl == 'admin')
                <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                    <div
                        class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-orange-600 to-orange-400 shadow-orange-500/40 place-items-center">
                        <x-mdi-shield-account class="w-6 h-6 text-white" />
                    </div>
                    <div class="p-4 text-right">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                            Jumlah Petugas</p>
                        <h4
                            class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            {{ $totalPetugas }}</h4>
                    </div>
                    <div class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                            <strong class="text-green-500"></strong>
                        </p>
                    </div>
                </div>
            @endif
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                <div
                    class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-red-600 to-red-400 shadow-red-500/40 place-items-center">
                    <x-mdi-cash-multiple class="w-6 h-6 text-white" />
                </div>
                <div class="p-4 text-right">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                        Total Pendapatan</p>
                    <h4
                        class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                </div>
                <div class="p-4 border-t border-blue-gray-50">
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                        <strong class="text-green-500"></strong>
                    </p>
                </div>
            </div>
        </div>

        <div class="grid w-full grid-cols-2 gap-4 mb-4">
            <div class="col-span-2">
                {!! $peminjamanChart->container() !!}
            </div>
        </div>
    </div>
    <script src="{{ $peminjamanChart->cdn() }}"></script>
    {{ $peminjamanChart->script() }}
</x-panel>