<!-- === === === === === === Recto Card component === === === === === === -->
<div class="card bg{{$current_family}} text-white w-[5.71cm] h-[8.89cm] m-auto"
     :style="{ 'border-radius': radius+'px' }">
    <div class="card-body justify-between" :style="{ 'padding': padding+'px' }">

        <!-- Recto card title -->
        <h2 class="card-title text-center self-center">
            {{$family_name = $families[$current_family]['name'] ?? "Family #" . $current_family}}
        </h2>

        <!-- Recto card image -->
        <label for="photo_families.{{$current_family}}.family_members.{{$family_member}}" class="avatar justify-center cursor-pointer" x-show="display_photo">
            <div
                class="group photo-upload w-20 rounded-full ring ring-white ring-offset-base-100 ring-offset-2"
                wire:key="families.{{$current_family}}.family_members.{{$family_member}}"
                x-data="{ uploading: false, progress: 0, loading: false }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false; loading = false"
                x-on:livewire-upload-error="uploading = false; loading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                :style="'--p:'+progress"
            >
                @php
                    $photo = $families[$current_family]['family_members'][$family_member]['photo'] ?? null;
                @endphp
                <img src="{{ $photo?->temporaryUrl() ?? asset('placeholder.webp') }}"  alt=""/>

                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>

                <!-- Overlay -->
                <div @click="loading = true" class="hidden group-hover:flex items-center justify-center absolute bg-black bg-opacity-50 rounded-full w-full h-full top-0 text white text-xs text-center font-normal">
                    <span x-show="!loading">Click to choose an image</span>
                    <span x-show="loading"><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.1"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.12" transform="rotate(15 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.15" transform="rotate(30 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.18" transform="rotate(45 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.22" transform="rotate(60 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.25" transform="rotate(75 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.29" transform="rotate(90 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.34" transform="rotate(105 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.34" transform="rotate(120 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.42" transform="rotate(135 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.47" transform="rotate(150 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.52" transform="rotate(165 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.57" transform="rotate(180 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.62" transform="rotate(195 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.66" transform="rotate(210 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.71" transform="rotate(225 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.75" transform="rotate(240 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.8" transform="rotate(255 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.84" transform="rotate(270 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.87" transform="rotate(285 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.91" transform="rotate(300 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.94" transform="rotate(315 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="0.96" transform="rotate(330 64 64)"/><path d="M61.5 0h5a25.8 25.8 0 0 1 5.25 9 26.35 26.35 0 0 1 1.3 10.8l-5 .1A23.38 23.38 0 0 0 67 10a32.3 32.3 0 0 0-5.5-10z" fill="#ffffff" fill-opacity="1" transform="rotate(345 64 64)"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;15 64 64;30 64 64;45 64 64;60 64 64;75 64 64;90 64 64;105 64 64;120 64 64;135 64 64;150 64 64;165 64 64;180 64 64;195 64 64;210 64 64;225 64 64;240 64 64;255 64 64;270 64 64;285 64 64;300 64 64;315 64 64;330 64 64;345 64 64" calcMode="discrete" dur="2160ms" repeatCount="indefinite"/></g></svg></span>
                </div>

                <!-- File Input -->
                <input class="hidden" id="photo_families.{{$current_family}}.family_members.{{$family_member}}" type="file"
                       wire:model="families.{{$current_family}}.family_members.{{$family_member}}.photo"
                >
            </div>
        </label>

        @error('photo') <span class="error">{{ $message }}</span> @enderror

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
            <div x-show="display_badges">
                @for ($members_pill = 1; $members_pill <= $members_per_family; $members_pill++)
                    <div class="badge bg{{$current_family}}-alt border-white text-white overflow-hidden h-auto max-w-full inline-block whitespace-nowrap overflow-ellipsis text-xs">
                        {{$families[$current_family]['family_members'][$members_pill]['name'] ?? "Name #" . $members_pill}}
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>
