<div class="px-8 py-4 pb-12 bg-gray-100 dark:bg-gray-800 max-w-md shadow-[0_0_10px_0_rgba(0,0,0,0.3)]">

    <div class="flex w-full justify-end">
        <label for="my-drawer-2" class="group absolute cursor-pointer p-1 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white">
            <svg class="fill-current group-hover:scale-125 transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>
        </label>
    </div>
    <x-cool-underline-title :type="'h2'" class="text-xl text-primary font-extrabold text-center mb-6">Settings</x-cool-underline-title>

    {{-- Number of families --}}
    <div class="flex mt-2 items-center" x-data>
        <label for="families_count" class="label w-[130px]">
            <span class="label-text">Number of families</span>
        </label>
        <input type="range" min="1" max="10"
               class="range range-xs range-primary ml-4"
               id="families_count"
               wire:model.live.debounce.250="families_count"/>
        <span class="label-text ml-3" x-text="$wire.families_count"></span>

    </div>

    {{-- Members for each family --}}
    <div class="flex mt-2 items-center">
        <label for="members_per_family" class="label w-[130px]">
            <span class="label-text">Members for each family?</span>
        </label>
        <input type="range" min="1" max="10"
               class="range range-xs range-primary ml-4"
               id="members_per_family"
               wire:model.live.debounce.250="members_per_family"/>
        <span class="label-text ml-3" x-text="$wire.members_per_family"></span>
    </div>

    <div class="alert bg-info/10 my-3 shadow-md border-info py-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div class="text-sm">This will generate <span class="font-semibold underline underline-offset-2 decoration-2 decoration-sky-500/30" x-text="$wire.families_count * $wire.members_per_family"></span> cards</div>
    </div>

    {{-- Theme setting --}}
    <div class="flex mt-2 items-center">
        <label for="theme" class="label w-[130px]">
            <span class="label-text">Theme</span>
        </label>
        <select x-model="theme" id="theme" class="select select-bordered select-sm ml-4 grow">
            <option value="colorful" selected>Colorful</option>
            <option value="gradient">Gradient</option>
            <option value="light">Light</option>
        </select>
    </div>

    {{-- Font family setting --}}
    <div class="flex mt-2 items-center relative z-50">
        <label for="border-radius" class="label w-[130px]">
            <span class="label-text">Font family</span>
        </label>
        <div class="ml-4" id="font-picker" wire:ignore></div>
    </div>

    {{-- Border Radius setting --}}
    <div class="flex mt-2 items-center">
        <label for="border-radius" class="label w-[130px]">
            <span class="label-text">Border Radius (px)</span>
        </label>
        <input
            class="range range-xs range-primary ml-4"
            type="range" min="0" max="50" x-model="radius" id="border-radius">
        <span class="label-text ml-3" x-text="radius + 'px'"></span>
    </div>

    {{-- Padding setting --}}
    <div class="flex mt-2 items-center">
        <label for="padding" class="label w-[130px]">
            <span class="label-text">Padding (px)</span>
        </label>
        <input
            class="range range-xs range-primary ml-4"
            type="range" min="0" max="50" x-model="padding" id="padding">
        <span class="label-text ml-3" x-text="padding + 'px'"></span>
    </div>

    <x-cool-underline-title :type="'h3'" class="text-lg text-gray-600 font-extrabold mt-6 mb-2">Families</x-cool-underline-title>

    <form wire:submit>
        @for ($current_family = 1; $current_family <= $families_count; $current_family++)
            <div class="flex">
                <label for="family.{{$current_family}}.name" class="label w-[130px]">
                    <span class="label-text">Name of family #{{$current_family}}</span>
                </label>
                <input
                    class="input input-bordered input-sm max-w-md ml-4 mt-2"
                    id="family.{{$current_family}}.name"
                    type="text"
                    wire:model.blur="families.{{$current_family}}.name" >
            </div>
        @endfor
    </form>

</div>
