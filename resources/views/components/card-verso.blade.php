<div class="card bg-primary text-white w-[5.71cm] h-[8.89cm] m-auto" :style="{ 'border-radius': radius+'px' }">
    <div class="card-body justify-center" :style="{ 'padding': padding+'px' }">

        <!-- Verso card text -->
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
