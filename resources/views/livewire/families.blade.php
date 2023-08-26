<div id="livewire-root-tag">
    <div x-data="app" x-cloak id="alpine-main-data">

        <div class="drawer lg:drawer-open lg:auto-cols-auto bg-base-100">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="print:w-full drawer-content flex flex-col items-center justify-center w-full lg:w-[calc(100vw-26rem)]">

                <!-- Top Bar -->
                @include('components.topbar')

                <!-- Cards -->
                @include('components.cards')

            </div>

            <div class="print:hidden drawer-side z-[100] lg:z-50 sm:shadow-[0_0_10px_0_rgba(0,0,0,0.3)]" style="scroll-behavior: smooth; scroll-padding-top: 5rem;">
                <label for="my-drawer-2" class="drawer-overlay"></label>

                <!-- Sidebar content -->
                @include('components.sidebar.sidebar-main')

            </div>

        </div>

        @include('components.print-btn')

        <script>
            document.addEventListener('alpine:init', () => {
                // Root div data
                Alpine.data( 'app', () => ({
                    padding:                22,
                    radius:                 16,
                    font:                   'Nunito',
                    theme:                  'colorful',
                    display_badges:         true,
                    display_photo:          true,
                    verso:                  false,
                    verso__defaultFontSize: 24,
                    verso__fontSize:        this.defaultFontSize,
                    verso__textBoxHeight:   'auto',
                    verso__minFontSize:     16,
                    verso__maxFontSize:     36,
                    verso__coefficient:     0.5,
                    verso__shortTextLimit:  14,
                    makeItFloat(event){
                        window.makeItFloat(
                            document.getElementById('printBtn'),
                            document.getElementById('footer'),
                            40
                        );
                    }
                }) );

                // Textboxes data and methods
                Alpine.data( 'textResize', (side) => ({
                    defaultFontSize: 24,
                    fontSize:        this.defaultFontSize,
                    textBoxHeight:   'auto',
                    minFontSize:     16,
                    maxFontSize:     28,
                    coefficient:     0.5,
                    shortTextLimit:  14,

                    /**
                     * Handle resizing of recto or verso side textareas
                     */
                    handleInput(event) {
                        const textBox = event.target;
                        const textContent = textBox.value.trim();
                        const textLength = textContent.length;

                        if (side === 'verso') {
                            const sizes = window.calculateSizeAndHeight(
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
                            const sizes = window.calculateSizeAndHeight(
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
</div>
