<div x-data="{
    padding: 24,
    radius: 16,
    font: 'Nunito',
    theme: 'colorful',
}">
    <div class="grid grid-cols-3 gap-4">
        <div class="form-control w-full max-w-md">
            <label for="families_count" class="label"> <span class="label-text text-xl">How many families do you want to create?</span>
            </label>

            <div class="flex mt-3">
                <input type="range" min="1" max="10" class="range range-primary mt-2"
                       wire:model.blur="families_count"/>

                <input
                    id="families_count"
                    class="input input-bordered max-w-md w-20 ml-4"
                    name="families_count"
                    type="number"
                    wire:model.blur="families_count"
                    required>
            </div>

        </div>

        <div class="form-control w-full max-w-md">
            <label for="members_per_family" class="label"> <span class="label-text text-xl">How many members for each family?</span>
            </label>

            <div class="flex mt-3">
                <input type="range" min="1" max="10" class="range range-primary mt-2"
                       wire:model.blur="members_per_family"/>

                <input
                    id="members_per_family"
                    class="input input-bordered max-w-md w-20 ml-4"
                    name="members_per_family"
                    type="number"
                    wire:model.blur="members_per_family"
                    required>
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
            <input type="hidden" wire:model.live.debounce.250="families.{{$current_family}}.id" value="{{$current_family}}" />
            <input
                class="input input-bordered input-sm max-w-md ml-4 mt-2"
                name="family.{{$current_family}}.name"
                type="text"
                 wire:model.blur="families.{{$current_family}}.name" >
        </div>
    @endfor
    </form>

    <h2>Settings</h2>
    <div class="settings">
        {{-- Font family setting --}}
        <div class="flex mt-2">
            <label for="border-radius" class="label">
                <span class="label-text">Font family</span>
            </label>
            <div class="ml-4" id="font-picker" wire:ignore></div>
        </div>

        {{-- Border Radius setting --}}
        <div class="flex mt-2">
            <label for="border-radius" class="label">
                <span class="label-text">Border Radius (px)</span>
            </label>
            <input
                class="input input-bordered input-sm max-w-md ml-4 mt-2"
                type="number" min="0" max="50" x-model="radius" id="border-radius">
        </div>

        {{-- Padding setting --}}
        <div class="flex mt-2">
            <label for="padding" class="label">
                <span class="label-text">Padding (px)</span>
            </label>
            <input
                class="input input-bordered input-sm max-w-md ml-4 mt-2"
                type="number" min="0" max="50" x-model="padding" id="padding">
        </div>

        {{-- Theme setting --}}
        <div class="flex mt-2">
            <label for="theme" class="label">
                <span class="label-text">Theme</span>
            </label>
            <select x-model="theme" id="theme" class="select select-bordered select-sm max-w-md ml-4 mt-2">
                <option value="colorful" selected>Colorful</option>
                <option value="light">Light</option>
                <option value="dark" disabled>Dark</option>
            </select>
        </div>

    </div>

    {{-- <button wire:click="generate()">DEBUG</button> --}}

    <div class="cards-container grid grid-cols-3 gap-4 my-12 mx-auto apply-font bg-white rounded-lg p-4" style="max-width: 21cm;" :class="theme">
        @for ($current_family = 1; $current_family <= $families_count; $current_family++)
            @for ($family_member = 1; $family_member <= $members_per_family; $family_member++)
                <div class="card bg{{$current_family}} text-primary-content" style="min-height: 9cm;" :style="{ 'border-radius': radius+'px' }">
                    <div class="card-body justify-between" :style="{ 'padding': padding+'px' }">

                        <h2 class="card-title text-center self-center">
                            {{$family_name = $families[$current_family]['name'] ?? "Family #" . $current_family}}
                        </h2>

                        <label>
                            {{-- <input type="text" class="input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-3xl placeholder-gray-200 text-autoresize" --}}
                            {{--    wire:model.blur="families.{{$current_family}}.family_members.{{$family_member}}.name" --}}
                            {{--    x-on:keyup="textAutoresize" --}}
                            {{--    placeholder="Click to edit"/> --}}
                            <textarea rows="1"
                                      x-data="{fontSize: '36px', textBoxHeight: '1px'}"
                                      x-on:input="textAutoresize"
                                      x-init="$nextTick(() => {textAutoresize})"
                                      placeholder="Click to edit"
                                      class="input input-ghost bg-opacity-0 w-full max-w-xs text-center self-center text-3xl placeholder-gray-200 text-autoresize resize-none overflow-hidden"
                                      wire:model.blur="families.{{$current_family}}.family_members.{{$family_member}}.name"></textarea>
                        </label>

                        <div class="card-actions overflow-hidden">
                            @for ($members_pill = 1; $members_pill <= $members_per_family; $members_pill++)
                                <div class="badge bg{{$current_family}}-alt border-white text-white overflow-hidden">
                                    {{$families[$current_family]['family_members'][$members_pill]['name'] ?? "Name #" . $members_pill}}
                                </div>
                            @endfor
                        </div>

                    </div>
                </div>
          @endfor
        @endfor
    </div>

    <script>
        function textAutoresize(e) {
            const textBox = e.target;
            const minFontSize = 16;
            const maxFontSize = 36;
            const coefficient = 0.1;

            textBox.style.height = '1px';
            textBox.style.height = `${textBox.scrollHeight}px`;
            this.textBoxHeight = textBox.style.height;

            const textContent = textBox.value.trim();
            const textLength = textContent.length;

            if (textLength > 14) {
                const fontSize = Math.max(minFontSize, Math.min(maxFontSize, textLength * coefficient));
                textBox.style.fontSize = fontSize + "px";
                console.log("Input resized to " + fontSize + "px");
            } else {
                textBox.style.fontSize = maxFontSize + "px";
                console.log("Input set to max font size: " + maxFontSize + "px");
            }

            console.log("Text length: " + textLength);
        }

    </script>

</div>