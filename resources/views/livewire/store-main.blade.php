<div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
    <?php $count = 0; ?>

    @foreach ($products as $row)
        <?php if ($count == 4) {
            break;
        } ?>
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <div class="flex items-end justify-end h-56 w-full bg-cover"
                style="background-image: url('{{ Storage::url($row->img_paths) }}')">
                <button wire:click="AddItem({{ $row->id }})"
                    class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="px-5 py-3">
                <h3 class="text-gray-700 uppercase"><a
                        href="{{ route('details.show', $row->id) }}">{{ $row->name }}</a></h3>
                <span class="text-gray-500 mt-2">${{ $row->inventories['0']->sale_price }}</span>
            </div>
        </div>
        <?php $count++; ?>
    @endforeach
</div>
