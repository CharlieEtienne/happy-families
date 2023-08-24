<div x-data="{
    padding: 22,
    radius: 16,
    font: 'Nunito',
    theme: 'colorful',
    verso: false,
    verso__defaultFontSize: 24,
    verso__fontSize: this.defaultFontSize,
    verso__textBoxHeight: 'auto',
    verso__minFontSize: 16,
    verso__maxFontSize: 36,
    verso__coefficient: 0.5,
    verso__shortTextLimit: 14
}">

    <div class="drawer lg:drawer-open lg:auto-cols-auto">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center justify-center w-[97vw] lg:w-[calc(100vw-26rem)]">

            <div class="flex py-2 flex-col items-center w-full sticky bg-gray-100 z-50 top-[64px] box-gradient-shadow-custom">
                <label for="verso" class="cursor-pointer label">

                    <span class="label-text" :class="!verso ? 'text-primary mx-1 font-extrabold relative inline-block stroke-current' : ''">
                        Recto
                        <svg :class="!verso ? 'absolute -bottom-0.5 w-full max-h-1.5' : 'hidden'" viewBox="0 0 55 5" xmlns="http://www.w3.org/2000/svg"
                             preserveAspectRatio="none">
                            <path d="M0.652466 4.00002C15.8925 2.66668 48.0351 0.400018 54.6853 2.00002" stroke-width="2"></path>
                        </svg>
                    </span>

                    <input id="verso" type="checkbox" class="toggle toggle-primary mx-4" x-model="verso"/>

                    <span class="label-text" :class="verso ? 'text-primary mx-1 font-extrabold relative inline-block stroke-current' : ''">
                        Verso
                        <svg :class="verso ? 'absolute -bottom-0.5 w-full max-h-1.5' : 'hidden'" viewBox="0 0 55 5" xmlns="http://www.w3.org/2000/svg"
                             preserveAspectRatio="none">
                            <path d="M0.652466 4.00002C15.8925 2.66668 48.0351 0.400018 54.6853 2.00002" stroke-width="2"></path>
                        </svg>
                    </span>
                </label>
            </div>
            {{-- <div class="flex mt-2 flex-col items-center w-full sticky z-50" style="top: 40px;box-shadow: inset 0 10px 10px -10px #00000054;height: 10px;z-index: 999;"></div> --}}

            {{-- <button wire:click="generate()">DEBUG</button> --}}

            <div class="p-8 bg-white h-full w-full overflow-x-scroll">

                {{-- =============================================================== --}}
                {{-- ============================ RECTO ============================ --}}
                {{-- =============================================================== --}}
                <div class="cards-container recto grid grid-cols-3 gap-4 mx-auto apply-font bg-white p-4"
                     style="width: 21cm;border: 2px dashed rgba(0,0,0,0.1);"
                     :class="[theme, verso ? 'isVerso' : 'isRecto']"
                     x-show="!verso"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-x-12"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-out duration-300"
                     x-transition:leave-start="opacity-100 transform translate-x-0"
                     x-transition:leave-end="opacity-0 transform -translate-x-12">
                    @for ($current_family = 1; $current_family <= $families_count; $current_family++)
                        @for ($family_member = 1; $family_member <= $members_per_family; $family_member++)
                            <div class="card bg{{$current_family}} text-white w-[5.71cm] h-[8.89cm] m-auto" :style="{ 'border-radius': radius+'px' }">
                                <div class="card-body justify-between" :style="{ 'padding': padding+'px' }">

                                    <h2 class="card-title text-center self-center">
                                        {{$family_name = $families[$current_family]['name'] ?? "Family #" . $current_family}}
                                    </h2>

                                    <label>
                                        <textarea rows="1"
                                                  x-data="textResize()"
                                                  x-on:input="handleInput"
                                                  x-bind:style="{ fontSize: fontSize + 'px', height: textBoxHeight }"
                                                  placeholder="Click to edit"
                                                  class="input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-2xl placeholder-gray-200 resize-none overflow-hidden"
                                                  id="families.{{$current_family}}.family_members.{{$family_member}}.name"
                                                  wire:key="families.{{$current_family}}.family_members.{{$family_member}}"
                                                  wire:model.blur="families.{{$current_family}}.family_members.{{$family_member}}.name">
                                        </textarea>
                                    </label>

                                    <div class="card-actions overflow-hidden">
                                        @for ($members_pill = 1; $members_pill <= $members_per_family; $members_pill++)
                                            <div class="badge bg{{$current_family}}-alt border-white text-white overflow-hidden h-auto max-w-full inline-block whitespace-nowrap overflow-ellipsis text-xs">
                                                {{$families[$current_family]['family_members'][$members_pill]['name'] ?? "Name #" . $members_pill}}
                                            </div>
                                        @endfor
                                    </div>

                                </div>
                            </div>
                        @endfor
                    @endfor
                </div>

                {{-- =============================================================== --}}
                {{-- ============================ VERSO ============================ --}}
                {{-- =============================================================== --}}
                <div class="cards-container verso grid grid-cols-3 gap-4 mx-auto apply-font bg-white p-4"
                     style="width: 21cm;border: 2px dashed rgba(0,0,0,0.1);"
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
                            <div class="card bg-primary text-white w-[5.71cm] h-[8.89cm] m-auto" :style="{ 'border-radius': radius+'px' }">
                                <div class="card-body justify-center" :style="{ 'padding': padding+'px' }">
                                    <label>
                                        <textarea
                                            rows="1"
                                            x-data="textResize('verso')"
                                            x-on:input="handleInput"
                                            x-bind:style="{ fontSize: verso__fontSize + 'px', height: verso__textBoxHeight }"
                                            placeholder="Click to edit"
                                            class="verso-textbox input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-2xl placeholder-gray-200 resize-none overflow-hidden"
                                            id="verso_text_families.{{$current_family}}.family_members.{{$family_member}}"
                                            wire:model.debounce.500ms="verso_text">
                                        </textarea>
                                    </label>
                                </div>
                            </div>
                        @endfor
                    @endfor
                </div>
            </div>
        </div>


        {{-- =============================================================== --}}
        {{-- ======================= SETTINGS SIDEBAR ====================== --}}
        {{-- =============================================================== --}}
        <div class="drawer-side z-50 sm:shadow-[0_0_10px_0_rgba(0,0,0,0.3)]">
            <label for="my-drawer-2" class="drawer-overlay"></label>

            <div class="px-8 py-4 pb-12 bg-gray-100 max-w-md shadow-[0_0_10px_0_rgba(0,0,0,0.3)]">

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

        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('textResize', (side) => ({
                defaultFontSize: 24,
                fontSize: this.defaultFontSize,
                textBoxHeight: 'auto',
                minFontSize: 16,
                maxFontSize: 36,
                coefficient: 0.5,
                shortTextLimit: 14,

                /**
                 * Calculate font size and textarea height automagically
                */
                calculateSizeAndHeight(textBox, textLength, shortTextLimit, minFontSize, maxFontSize, coefficient, defaultFontSize) {
                    let fontSize, textBoxHeight;

                    if (textLength > shortTextLimit) {
                        const relativeLength = textLength - shortTextLimit;
                        fontSize = Math.max(minFontSize, Math.min(maxFontSize, maxFontSize - relativeLength * coefficient));
                        textBoxHeight = `${textBox.scrollHeight}px`;
                    } else if (textLength === 0) {
                        fontSize = defaultFontSize;
                        textBoxHeight = 'auto';
                    } else {
                        fontSize = maxFontSize;
                        textBoxHeight = `${textBox.scrollHeight}px`;
                    }

                    return { fontSize, textBoxHeight };
                },

                /**
                 * Handle resizing of recto or verso side textareas
                 */
                handleInput(event) {
                    const textBox = event.target;
                    const textContent = textBox.value.trim();
                    const textLength = textContent.length;

                    if (side === 'verso') {
                        const sizes = this.calculateSizeAndHeight(
                            textBox,
                            textLength,
                            this.verso__shortTextLimit,
                            this.verso__minFontSize,
                            this.verso__maxFontSize,
                            this.verso__coefficient,
                            this.verso__defaultFontSize
                        );
                        this.verso__fontSize = sizes.fontSize;
                        this.verso__textBoxHeight = sizes.textBoxHeight;

                        this.$nextTick(() => {
                            this.versoTextareas = [...this.$refs.versoTextareasContainer.querySelectorAll('.verso-textbox')];
                            this.versoTextareas.forEach((textarea) => {
                                textarea.style.fontSize = `${this.verso__fontSize}px`;
                                textarea.style.height = this.verso__textBoxHeight;
                            });
                        });
                    } else {
                        const sizes = this.calculateSizeAndHeight(
                            textBox,
                            textLength,
                            this.shortTextLimit,
                            this.minFontSize,
                            this.maxFontSize,
                            this.coefficient,
                            this.defaultFontSize
                        );
                        this.fontSize = sizes.fontSize;
                        this.textBoxHeight = sizes.textBoxHeight;
                    }
                }
            }));
        });
    </script>

</div>
