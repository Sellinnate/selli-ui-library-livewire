@props([
    'title' => null,
    'search' => true,    // show the ⌘K search trigger
])
{{--
    The Selli application shell: a sticky sidebar (brand + navigation + user)
    and a main column with a sticky topbar and a scrollable, centered content
    area. Slots:
      - brand    : the logo lockup (defaults to <x-selli::brand/>)
      - sidebar  : the navigation (usually a <x-selli::navlist>)
      - user     : the account block pinned to the bottom of the sidebar
      - actions  : extra topbar controls (rendered before the theme toggle)
      - default  : the page content
--}}
<div {{ $attributes->class(['selli-app']) }} x-data="{ open: false }" :data-open="open">
    <aside class="selli-app__sidebar">
        <div class="selli-app__brand">{{ $brand ?? '' }}@empty($brand)<x-selli::brand />@endempty</div>
        <div class="selli-app__nav selli-scroll">{{ $sidebar ?? '' }}</div>
        @isset($user)<div class="selli-app__user">{{ $user }}</div>@endisset
    </aside>
    <div class="selli-app__backdrop" @click="open = false"></div>

    <main class="selli-app__main">
        <header class="selli-app__topbar">
            <button type="button" class="selli-app__iconbtn selli-app__hamburger selli-focusable" aria-label="Menu" @click="open = true">
                <x-selli::icon name="menu" :size="18" />
            </button>
            <h1 class="selli-app__title">{{ $title }}</h1>
            @if ($search)
                <button type="button" class="selli-app__search selli-focusable" @click="$dispatch('selli-open-command')">
                    <x-selli::icon name="search" :size="15" />
                    <span>Cerca…</span>
                    <x-selli::kbd>⌘K</x-selli::kbd>
                </button>
            @endif
            {{ $actions ?? '' }}
            <x-selli::theme-switcher />
            <x-selli::theme-toggle />
        </header>
        <div class="selli-app__content selli-scroll">
            <div class="selli-app__content-inner">
                {{ $slot }}
            </div>
        </div>
    </main>
</div>
