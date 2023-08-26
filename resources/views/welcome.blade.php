<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/svg+xml" href="{{asset('favicon.svg')}}"/>

        <title>Happy Families - Create and print your happy families</title>
        <meta name="description" content="Do you ever dreamed about creating your own Happy Families game? This app is for you. For free.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=nunito:400,600,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=gochi-hand:400" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="antialiased">

        <div data-theme="dark" class="print:hidden navbar sticky top-0 z-[60] transition-all duration-100 bg-base-100 text-base-content shadow-md">
            <div class="navbar-start">
                <label for="my-drawer-2" tabindex="0" class="btn btn-ghost btn-circle drawer-button lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </label>
            </div>
            <div class="navbar-center">
                <a class="btn btn-ghost normal-case text-2xl font-logo">
                    <svg class="w-[32px] h-[32px]" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve"><path d="M96.7,37.1c0.2-1.1-0.2-2.3-1.3-3.1L71.8,14.2c-1.3-1.1-3.3-1.7-5.4-1.7c-1.2,0-2.3,0.2-3.4,0.5L8.1,32.3  c-1.9,0.7-3.1,1.8-3.3,3.2c-0.2,1.1,0.3,2.3,1.3,3.1l23.6,19.8c1.3,1.1,3.3,1.7,5.4,1.7c1.2,0,2.3-0.2,3.4-0.5l54.9-19.2  C95.2,39.7,96.5,38.5,96.7,37.1 M98.3,41.8l0-2c-0.9,1.3-2.2,2.3-4,3L39.4,62.1c-1.3,0.5-2.8,0.7-4.3,0.7c-2.8,0-5.4-0.8-7.1-2.3  L4.4,40.7c-0.5-0.4-0.9-0.8-1.2-1.3v0.8c0,0,0,0,0,0l0,1c0,0.8,0.4,1.7,1.3,2.4l23.6,19.8c2.5,2.1,7.6,2.7,11.5,1.3l54.9-19.2  C96.9,44.7,98.2,43.3,98.3,41.8 M98.3,47l0-3.1c-0.1,1.4-1.4,2.9-3.8,3.7L39.6,66.8c-3.9,1.4-9,0.8-11.5-1.3L4.6,45.7  c-0.9-0.8-1.3-1.6-1.3-2.4l0-2.9l0,5c0,0,0,0,0,0l0,1c0,0.8,0.4,1.7,1.3,2.4l23.6,19.8c2.5,2.1,7.6,2.7,11.5,1.3l54.9-19.2  C96.9,49.9,98.3,48.4,98.3,47 M98.3,52.1l0,0.7l0-3.9c0,1.5-1.4,2.9-3.8,3.7L39.6,72c-3.9,1.4-9,0.8-11.5-1.3L4.6,50.9  c-0.9-0.8-1.3-1.6-1.3-2.4l0-2.1l0,4.2c0,0,0,0,0,0l0,1c0,0.8,0.4,1.7,1.3,2.4l23.6,19.8c2.5,2.1,7.6,2.7,11.5,1.3l54.9-19.2  C97,55,98.3,53.6,98.3,52.1 M98.3,57.3l0,1.6l0-4.8c0,1.5-1.4,2.9-3.8,3.8L39.6,77.1c-3.9,1.4-9,0.8-11.5-1.3L4.6,56  c-0.9-0.7-1.3-1.6-1.3-2.4l0-1.2l0,3.6l0,0.7c0,0.8,0.4,1.7,1.3,2.4l23.6,19.8c2.5,2.1,7.6,2.7,11.5,1.3L94.5,61  C97,60.2,98.3,58.8,98.3,57.3 M98.3,61.6l0-2.3c0,1.5-1.3,2.9-3.8,3.8L39.6,82.3c-3.9,1.4-9,0.8-11.5-1.3L4.6,61.2  c-0.9-0.8-1.3-1.6-1.3-2.4l0-0.4l0,2.7c0,0.8,0.4,1.7,1.3,2.4l23.6,19.8c2.5,2.1,7.6,2.7,11.5,1.3l54.9-19.2  C97,64.5,98.3,63,98.3,61.6"/></svg>
                    happy families
                </a>
            </div>
            <div class="navbar-end"></div>
        </div>

        <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:text-white dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <livewire:families/>
        </div>

        <footer data-theme="dark" id="footer" class="print:hidden footer items-center p-4 bg-base-200 text-neutral-content">
            <div class="items-center grid-flow-col">
                <div class="avatar">
                    <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="https://avatars.githubusercontent.com/u/9772943?v=4" />
                    </div>
                </div>
                <p class="ml-2">Charlie Etienne © {{date('Y')}} - Absolutely no right reserved -
                                Logo: deck of cards by Daniel Solis from <a href="https://thenounproject.com/browse/icons/term/deck-of-cards/" target="_blank" title="deck of cards Icons">Noun Project</a> (CC BY 3.0)
                </p>
            </div>
            <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
                <a title="GitHub" target="_blank" href="https://github.com/CharlieEtienne"><svg height="24" id="Layer_1" viewBox="0 0 512 512" width="24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-current"><g><path clip-rule="evenodd" d="M296.133,354.174c49.885-5.891,102.942-24.029,102.942-110.192   c0-24.49-8.624-44.448-22.67-59.869c2.266-5.89,9.515-28.114-2.734-58.947c0,0-18.139-5.898-60.759,22.669   c-18.139-4.983-38.09-8.163-56.682-8.163c-19.053,0-39.011,3.18-56.697,8.163c-43.082-28.567-61.22-22.669-61.22-22.669   c-12.241,30.833-4.983,53.057-2.718,58.947c-14.061,15.42-22.677,35.379-22.677,59.869c0,86.163,53.057,104.301,102.942,110.192   c-6.344,5.452-12.241,15.873-14.507,30.387c-12.702,5.438-45.808,15.873-65.758-18.592c0,0-11.795-21.31-34.012-22.669   c0,0-22.224-0.453-1.813,13.592c0,0,14.96,6.812,24.943,32.653c0,0,13.6,43.089,76.179,29.48v38.543   c0,5.906-4.53,12.702-15.865,10.89C96.139,438.977,32.2,354.626,32.2,255.77c0-123.807,100.216-224.022,224.03-224.022   c123.347,0,224.023,100.216,223.57,224.022c0,98.856-63.946,182.754-152.828,212.688c-11.342,2.266-15.873-4.53-15.873-10.89   V395.45C311.1,374.577,304.288,360.985,296.133,354.174L296.133,354.174z M512,256.23C512,114.73,397.263,0,256.23,0   C114.73,0,0,114.73,0,256.23C0,397.263,114.73,512,256.23,512C397.263,512,512,397.263,512,256.23L512,256.23z" fill-rule="evenodd"/></g></svg></a>
                <a title="Twitter" target="_blank" href="https://twitter.com/charlie_etienne"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
            </div>
        </footer>
    </body>
</html>

{{--
TODO: add list of stack =>
TALL stack (Tailwind Alpine Livewire Laravel) (https://tallstack.dev/)
DaisyUI (https://daisyui.com/)
Heroicons (https://heroicons.com/)
Font Picker (https://github.com/samuelmeuli/font-picker)
...
--}}
