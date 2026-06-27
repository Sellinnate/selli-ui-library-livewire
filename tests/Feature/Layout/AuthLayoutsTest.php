<?php

it('renders a centered guest layout', function () {
    expect($this->render('<x-selli::guest-layout>x</x-selli::guest-layout>'))
        ->toContain('selli-guest')
        ->toContain('x');
});

it('renders a split guest layout with brand and aside slots', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::guest-layout :split="true">
            <x-slot:brand><x-selli::brand /></x-slot:brand>
            <x-slot:aside><p>Marketing copy</p></x-slot:aside>
            <p>Form here</p>
        </x-selli::guest-layout>
    BLADE);

    expect($html)
        ->toContain('selli-guest__split')
        ->toContain('selli-guest__aside')
        ->toContain('Marketing copy')
        ->toContain('Form here');
});

it('renders an auth card with brand, title, sub, body and footer', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::auth-card title="Bentornato" sub="Accedi">
            <input>
            <x-slot:footer>Non hai un account? <a href="#">Registrati</a></x-slot:footer>
        </x-selli::auth-card>
    BLADE);

    expect($html)
        ->toContain('selli-auth-card')
        ->toContain('selli-brand')
        ->toContain('Bentornato')
        ->toContain('Accedi')
        ->toContain('selli-auth-card__footer')
        ->toContain('Registrati');
});

it('renders a stacked layout with navbar, content and footer', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::stacked-layout>
            <x-slot:navbar><x-selli::navbar><x-slot:start><x-selli::brand /></x-slot:start></x-selli::navbar></x-slot:navbar>
            <h1>Contenuto</h1>
            <x-slot:footer>© 2026</x-slot:footer>
        </x-selli::stacked-layout>
    BLADE);

    expect($html)
        ->toContain('selli-stacked')
        ->toContain('selli-navbar')
        ->toContain('selli-stacked__content')
        ->toContain('Contenuto')
        ->toContain('selli-stacked__footer')
        ->toContain('© 2026');
});

it('renders an error page', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::error-page code="500" title="Errore interno" desc="Riprova più tardi.">
            <x-slot:actions><x-selli::button href="/">Home</x-selli::button></x-slot:actions>
        </x-selli::error-page>
    BLADE);

    expect($html)
        ->toContain('selli-error')
        ->toContain('500')
        ->toContain('Errore interno')
        ->toContain('Riprova più tardi.')
        ->toContain('selli-error__actions');
});

it('renders a prose block for legal content', function () {
    $html = $this->render('<x-selli::prose title="Privacy" meta="Agg. 2026"><h2>Sezione</h2><p>Testo</p></x-selli::prose>');

    expect($html)
        ->toContain('selli-prose')
        ->toContain('<h1>Privacy</h1>')
        ->toContain('selli-prose__meta')
        ->toContain('<h2>Sezione</h2>')
        ->toContain('Testo');
});

it('renders the auth & legal example pages end to end', function (string $view, string $needle) {
    expect(view("selli::examples.$view")->render())->toContain($needle);
})->with([
    ['login', 'Bentornato'],
    ['register', 'Crea il tuo account'],
    ['forgot-password', 'Reimposta la password'],
    ['verify-email', 'Verifica la tua email'],
    ['privacy', 'Privacy Policy'],
    ['error-404', 'Pagina non trovata'],
]);
