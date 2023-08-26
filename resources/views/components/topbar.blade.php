<!-- === === === === === === Topbar component === === === === === === -->
<div class="print:hidden topbar flex py-2 flex-col items-center w-full sticky bg-opacity-90 backdrop-blur transition-all duration-100 bg-base-100 text-base-content z-50 top-[64px] shadow-md">
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
