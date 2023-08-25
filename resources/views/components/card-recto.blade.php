<!-- === === === === === === Recto Card component === === === === === === -->
<div class="card bg{{$current_family}} text-white w-[5.71cm] h-[8.89cm] m-auto"
     :style="{ 'border-radius': radius+'px' }">
    <div class="card-body justify-between" :style="{ 'padding': padding+'px' }">

        <!-- Recto card title -->
        <h2 class="card-title text-center self-center">
            {{$family_name = $families[$current_family]['name'] ?? "Family #" . $current_family}}
        </h2>

        <!-- Recto card name -->
        <label>
            <textarea
                rows="1"
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

        <!-- Badges -->
        <div class="card-actions overflow-hidden">
            @for ($members_pill = 1; $members_pill <= $members_per_family; $members_pill++)
                <div class="badge bg{{$current_family}}-alt border-white text-white overflow-hidden h-auto max-w-full inline-block whitespace-nowrap overflow-ellipsis text-xs">
                    {{$families[$current_family]['family_members'][$members_pill]['name'] ?? "Name #" . $members_pill}}
                </div>
            @endfor
        </div>

    </div>
</div>
