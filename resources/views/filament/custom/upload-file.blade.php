<div>
    <x-filament::breadcrumbs :breadcrumbs="[
    '/admin/' => 'Students',
    '/admin/students' => 'Daftar',
]" />
    <div class="font-bold text-3xl">Students</div>

    <div class="flex justify-between items-center mt-1">
        <div class="mt-2">
            <form wire:submit="save" class="w-full max-w-sm flex">
                <div class="flex rounded-lg shadow-sm">
                    <label for="small-file-input" class="sr-only">Choose file</label>
                    <input type="file" id="fileInput" wire:model="file" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
      file:bg-gray-50 file:border-0
      file:me-4
      file:py-2 file:px-4
      dark:file:bg-neutral-700 dark:file:text-neutral-400">
                    <button type="submit" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Import
                    </button>
                </div>
            </form>
        </div>
        <div class="ml-auto">
            {{ $data }}
        </div>
    </div>


</div>