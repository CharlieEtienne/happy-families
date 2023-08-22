<div x-data="{
    padding: 22,
    radius: 16,
    font: 'Nunito',
    theme: 'colorful',
    verso: false,
    verso__defaultFontSize: 28,
    verso__fontSize: this.defaultFontSize,
    verso__textBoxHeight: 'auto',
    verso__minFontSize: 16,
    verso__maxFontSize: 36,
    verso__coefficient: 0.5,
    verso__shortTextLimit: 14
}">

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center justify-center">

            <div class="flex mt-2 flex-col items-start">
                <label class="cursor-pointer label">
                    <span class="label-text">Recto / Verso</span>
                    <input type="checkbox" class="toggle toggle-primary ml-4" x-model="verso"/>
                </label>
            </div>

            {{-- <button wire:click="generate()">DEBUG</button> --}}

            {{-- =============================================================== --}}
            {{-- ============================ RECTO ============================ --}}
            {{-- =============================================================== --}}
            <div class="cards-container recto grid grid-cols-3 gap-4 my-12 mx-auto apply-font bg-white rounded-lg p-4"
                 style="max-width: 21cm;"
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
                        <div class="card bg{{$current_family}} text-white" style="min-height: 9cm;" :style="{ 'border-radius': radius+'px' }">
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
                                              class="input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-3xl placeholder-gray-200 resize-none overflow-hidden"
                                              wire:model.blur="families.{{$current_family}}.family_members.{{$family_member}}.name">
                                    </textarea>
                                </label>

                                <div class="card-actions overflow-hidden">
                                    @for ($members_pill = 1; $members_pill <= $members_per_family; $members_pill++)
                                        <div class="badge bg{{$current_family}}-alt border-white text-white overflow-hidden min-h-6 h-auto max-w-full inline-block whitespace-nowrap overflow-ellipsis">
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
            <div class="cards-container verso grid grid-cols-3 gap-4 my-12 mx-auto apply-font bg-white rounded-lg p-4"
                 style="max-width: 21cm;"
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
                        <div class="card bg-primary text-white" style="min-height: 9cm;" :style="{ 'border-radius': radius+'px' }">
                            <div class="card-body justify-center" :style="{ 'padding': padding+'px' }">
                                <label>
                                    <textarea
                                        rows="1"
                                        x-data="textResize('verso')"
                                        x-on:input="handleInput"
                                        x-bind:style="{ fontSize: verso__fontSize + 'px', height: verso__textBoxHeight }"
                                        placeholder="Click to edit"
                                        class="verso-textbox input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-3xl placeholder-gray-200 resize-none overflow-hidden"
                                        wire:model.debounce.500ms="verso_text">
                                    </textarea>
                                </label>
                            </div>
                        </div>
                    @endfor
                @endfor
            </div>
        </div>
        <div class="drawer-side p-4">
            <label for="my-drawer-2" class="drawer-overlay"></label>

            <div class="{{--grid grid-cols-3 gap-4--}}">
                <div class="form-control w-full max-w-md">
                    <label for="families_count" class="label">
                        <span class="label-text">How many families do you want to create?</span>
                    </label>

                    <div class="flex mt-2 items-center" x-data>
                        <input type="range" min="1" max="10"
                               class="range range-xs range-primary max-w-[130px]"
                               wire:model.live.debounce.250="families_count"/>
                        <span class="label-text ml-3" x-text="$wire.families_count"></span>
                    </div>

                    <label for="members_per_family" class="label">
                        <span class="label-text">How many members for each family?</span>
                    </label>

                    <div class="flex mt-3">
                        <input type="range" min="1" max="10"
                               class="range range-xs range-primary max-w-[130px]"
                               wire:model.live.debounce.250="members_per_family"/>
                        <span class="label-text ml-3" x-text="$wire.members_per_family"></span>
                    </div>

                </div>

                <div class="text-xl">{{$families_count * $members_per_family}} cards</div>

            </div>

            <form wire:submit>
            @for ($current_family = 1; $current_family <= $families_count; $current_family++)
                <div class="flex">
                    <label for="family.{{$current_family}}.name" class="label">
                        <span class="label-text">Name of family #{{$current_family}}</span>
                    </label>
                    <input
                        class="input input-bordered input-sm max-w-md ml-4 mt-2"
                        name="family.{{$current_family}}.name"
                        type="text"
                         wire:model.blur="families.{{$current_family}}.name" >
                </div>
            @endfor
            </form>

            {{-- =============================================================== --}}
            {{-- =========================== SETTINGS ========================== --}}
            {{-- =============================================================== --}}
            <h2 class="text-2xl">Settings</h2>

            <div class="settings">
                {{-- Font family setting --}}
                <div class="flex mt-2 items-center">
                    <label for="border-radius" class="label">
                        <span class="label-text">Font family</span>
                    </label>
                    <div class="ml-4" id="font-picker" wire:ignore></div>
                </div>

                {{-- Border Radius setting --}}
                <div class="flex mt-2 items-center">
                    <label for="border-radius" class="label">
                        <span class="label-text">Border Radius (px)</span>
                    </label>
                    <input
                        class="range range-xs range-primary max-w-[130px] ml-4"
                        type="range" min="0" max="50" x-model="radius" id="border-radius">
                    <span class="label-text ml-3" x-text="radius + 'px'"></span>
                </div>

                {{-- Padding setting --}}
                <div class="flex mt-2 items-center">
                    <label for="padding" class="label">
                        <span class="label-text">Padding (px)</span>
                    </label>
                    <input
                        class="range range-xs range-primary max-w-[130px] ml-4"
                        type="range" min="0" max="50" x-model="padding" id="padding">
                    <span class="label-text ml-3" x-text="padding + 'px'"></span>
                </div>

                {{-- Theme setting --}}
                <div class="flex mt-2 items-center">
                    <label for="theme" class="label">
                        <span class="label-text">Theme</span>
                    </label>
                    <select x-model="theme" id="theme" class="select select-bordered select-sm max-w-md ml-4">
                        <option value="colorful" selected>Colorful</option>
                        <option value="gradient">Gradient</option>
                        <option value="light">Light</option>
                    </select>
                </div>

            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('textResize', (side) => ({
                defaultFontSize: 28,
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
