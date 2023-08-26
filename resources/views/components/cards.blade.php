<!-- === === === === === === Cards component === === === === === === -->
<div class="print:p-0 print:overflow-hidden p-8 bg-white h-full w-full overflow-x-scroll">
     {{-- <button wire:click="generate()">DEBUG</button> --}}

    <!-- Recto -->
    <div class="print:py-0 print:w-auto print:border-none print:my-[0.505cm] w-[21cm] borderdashed cards-container recto grid grid-cols-3 gap-[1.01cm_0cm] mx-auto apply-font bg-white p-4 justify-items-center"
         :class="[theme, verso ? 'isVerso' : 'isRecto']"
         x-show="!verso"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-x-12"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-out duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform -translate-x-12"
         x-ref="rectoTextareasContainer">
        @for ($current_family = 1; $current_family <= $families_count; $current_family++)
            @for ($family_member = 1; $family_member <= $members_per_family; $family_member++)
                @include('components.card-recto')
            @endfor
        @endfor
    </div>

    <!-- Verso -->
    <div class="print:py-0 print:w-auto print:border-none print:my-[0.505cm] w-[21cm] borderdashed cards-container verso grid grid-cols-3 gap-[1.01cm_0cm] mx-auto apply-font bg-white p-4 justify-items-center"
         :class="[theme, verso ? 'isVerso' : 'isRecto']"
         x-show="verso"
         x-transition:enter="transition ease-out duration-300 delay-300"
         x-transition:enter-start="opacity-0 transform translate-x-12"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-out duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform translate-x-12"
         x-data="{versoTextareas: []}"
         x-ref="versoTextareasContainer">
        @for ($current_family = 1; $current_family <= $families_count; $current_family++)
            @for ($family_member = 1; $family_member <= $members_per_family; $family_member++)
                @include('components.card-verso')
            @endfor
        @endfor
    </div>
</div>
