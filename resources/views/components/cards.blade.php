<div class="print:p-0 print:overflow-hidden p-8 bg-white h-full w-full overflow-x-scroll">
    {{-- <button wire:click="generate()">DEBUG</button> --}}

    {{-- =============================================================== --}}
    {{-- ============================ RECTO ============================ --}}
    {{-- =============================================================== --}}
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
                <div class="card bg{{$current_family}} text-white w-[5.71cm] h-[8.89cm] m-auto"
                     :style="{ 'border-radius': radius+'px' }">
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
