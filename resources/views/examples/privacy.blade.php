<x-selli::stacked-layout>
    <x-slot:navbar>
        <x-selli::navbar>
            <x-slot:start><x-selli::brand /></x-slot:start>
            <x-slot:end>
                <x-selli::theme-toggle />
                <x-selli::button href="login.html" size="sm" variant="secondary">Accedi</x-selli::button>
            </x-slot:end>
        </x-selli::navbar>
    </x-slot:navbar>

    <x-selli::breadcrumbs :items="[['label' => 'Home', 'url' => '#'], ['label' => 'Legale', 'url' => '#'], ['label' => 'Privacy Policy']]" style="margin-bottom:1.5rem;" />

    <x-selli::prose title="Privacy Policy" meta="Ultimo aggiornamento: 1 giugno 2026">
        <p>
            La presente informativa descrive come <strong>Sellinnate S.r.l.</strong> raccoglie, utilizza e
            protegge i dati personali degli utenti del servizio Selli, in conformità al Regolamento (UE)
            2016/679 (<strong>GDPR</strong>).
        </p>

        <h2>1. Titolare del trattamento</h2>
        <p>
            Il titolare del trattamento è Sellinnate S.r.l., con sede in Italia. Per qualsiasi richiesta puoi
            scrivere a <a href="mailto:privacy@selli.io">privacy@selli.io</a>.
        </p>

        <h2>2. Dati che raccogliamo</h2>
        <ul>
            <li><strong>Dati di registrazione</strong> — nome, indirizzo email, password (cifrata).</li>
            <li><strong>Dati di utilizzo</strong> — pagine visitate, azioni e log tecnici.</li>
            <li><strong>Dati di pagamento</strong> — gestiti dal nostro fornitore, non memorizziamo i numeri di carta.</li>
        </ul>

        <h2>3. Finalità e base giuridica</h2>
        <p>Trattiamo i dati per erogare il servizio (esecuzione del contratto), per la sicurezza (legittimo interesse) e, previo consenso, per comunicazioni di marketing.</p>

        <h2>4. I tuoi diritti</h2>
        <p>Hai diritto di accesso, rettifica, cancellazione, limitazione, portabilità e opposizione. Puoi esercitarli in qualsiasi momento contattandoci.</p>

        <hr>

        <p class="selli-prose__meta">Questo testo è un esempio dimostrativo del componente <code>&lt;x-selli::prose&gt;</code> e non costituisce consulenza legale.</p>
    </x-selli::prose>

    <x-slot:footer>
        <x-selli::text size="sm">© 2026 Sellinnate — Tutti i diritti riservati.</x-selli::text>
        <span style="display:flex;gap:1rem;">
            <a href="privacy.html" style="color:var(--muted-foreground);">Privacy</a>
            <a href="#" style="color:var(--muted-foreground);">Termini</a>
            <a href="#" style="color:var(--muted-foreground);">Cookie</a>
        </span>
    </x-slot:footer>
</x-selli::stacked-layout>
