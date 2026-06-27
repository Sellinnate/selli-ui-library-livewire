{{-- Screenshot gallery: each [data-shot] tile is captured to a PNG by
     playwright/screenshots.mjs and embedded in the docs. Not user-facing. --}}
<style>
    body { background: #0a0612; }
    .shot-grid { display: flex; flex-wrap: wrap; gap: 28px; padding: 28px; align-items: flex-start; }
    .shot {
        display: inline-block;
        background: var(--background);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 32px;
        box-sizing: border-box;
    }
    .shot--wide { width: 560px; }
    .shot--mid { width: 420px; }
    .shot .stack { display: flex; flex-direction: column; gap: 14px; }
    .shot .row { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; }
    /* force the (hover-only) tooltip bubble visible for its screenshot */
    .force-tip .selli-tooltip__bubble { opacity: 1 !important; position: static; transform: none; display: inline-block; margin-left: 10px; }
</style>

<div class="shot-grid">
    <div class="shot" data-shot="button">
        <div class="stack">
            <div class="row">
                <x-selli::button>Primario</x-selli::button>
                <x-selli::button variant="secondary">Secondario</x-selli::button>
                <x-selli::button variant="ghost">Ghost</x-selli::button>
            </div>
            <div class="row">
                <x-selli::button icon="rocket">Con icona</x-selli::button>
                <x-selli::button variant="ghost" icon-right="arrow-right">Avanti</x-selli::button>
                <x-selli::button variant="blue">Blue</x-selli::button>
            </div>
        </div>
    </div>

    <div class="shot" data-shot="badge">
        <div class="row">
            <x-selli::badge tone="violet">Violet</x-selli::badge>
            <x-selli::badge tone="success" icon="circle-check">Attivo</x-selli::badge>
            <x-selli::badge tone="blue">Blu</x-selli::badge>
            <x-selli::badge tone="neutral">Neutro</x-selli::badge>
            <x-selli::badge tone="outline" :dashed="true">Bozza</x-selli::badge>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="card">
        <x-selli::card :glow="true">
            <x-selli::card.icon name="sparkles" />
            <x-selli::card.title>Componenti enterprise</x-selli::card.title>
            <x-selli::card.body>Pronti per la produzione, testati e documentati.</x-selli::card.body>
        </x-selli::card>
    </div>

    <div class="shot" data-shot="stat-card">
        <x-selli::stat-card icon="dollar-sign" label="Ricavi mensili" value="€48.250" delta="+12,5%" :spark="[12,18,15,22,19,26,31]" style="width:280px;" />
    </div>

    <div class="shot shot--mid" data-shot="section-heading">
        <x-selli::section-heading eyebrow="Selli UI" title="Componenti" accent="enterprise" lead="Tutto ciò che serve per interfacce coerenti." />
    </div>

    <div class="shot" data-shot="avatar">
        <div class="row">
            <x-selli::avatar name="Filippo Calabrese" size="lg" status="online" />
            <x-selli::avatar name="Anna Neri" size="lg" status="busy" />
            <x-selli::avatar-group :extra="3">
                <x-selli::avatar name="A B" size="lg" />
                <x-selli::avatar name="C D" size="lg" />
                <x-selli::avatar name="E F" size="lg" />
            </x-selli::avatar-group>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="callout">
        <div class="stack">
            <x-selli::callout variant="info" title="Informazione">Puoi cambiare il tema con una variabile CSS.</x-selli::callout>
            <x-selli::callout variant="success" title="Salvato">Le modifiche sono state applicate.</x-selli::callout>
            <x-selli::callout variant="warning" title="Attenzione">La 2FA è disattivata.</x-selli::callout>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="form">
        <div class="stack">
            <x-selli::field label="Email" for="g-email" hint="Non la condivideremo.">
                <x-selli::input id="g-email" type="email" icon="mail" value="tu@azienda.it" />
            </x-selli::field>
            <x-selli::field label="Piano">
                <x-selli::select :options="['free' => 'Free', 'pro' => 'Pro', 'ent' => 'Enterprise']" :selected="'pro'" />
            </x-selli::field>
            <div class="row">
                <x-selli::switch label="Notifiche" />
                <x-selli::checkbox label="Ricordami" />
            </div>
        </div>
    </div>

    <div class="shot shot--wide" data-shot="table">
        <x-selli::table :columns="[
            ['key' => 'cliente', 'label' => 'Cliente'],
            ['key' => 'stato', 'label' => 'Stato'],
            ['key' => 'mrr', 'label' => 'MRR', 'numeric' => true],
        ]" :rows="[
            ['cliente' => 'Acme S.r.l.', 'stato' => 'Attivo', 'mrr' => '€2.400'],
            ['cliente' => 'Globex SpA', 'stato' => 'Attivo', 'mrr' => '€1.150'],
            ['cliente' => 'Initech', 'stato' => 'Lead', 'mrr' => '€0'],
        ]" striped />
    </div>

    <div class="shot shot--mid" data-shot="chart-bar">
        <x-selli::chart type="bar" :height="200" :data="['Gen' => 12, 'Feb' => 18, 'Mar' => 9, 'Apr' => 22, 'Mag' => 16]" />
    </div>

    <div class="shot shot--mid" data-shot="chart-line">
        <x-selli::chart type="line" :height="200" :data="[
            ['label' => 'Gen', 'value' => 32], ['label' => 'Feb', 'value' => 41],
            ['label' => 'Mar', 'value' => 38], ['label' => 'Apr', 'value' => 52], ['label' => 'Mag', 'value' => 61],
        ]" />
    </div>

    <div class="shot" data-shot="donut">
        <x-selli::donut :value="72" :size="160" label="del target" />
    </div>

    <div class="shot" data-shot="calendar">
        <x-selli::calendar :month="2" :year="2027" selected="2027-02-14" :events="['2027-02-10','2027-02-20']" />
    </div>

    <div class="shot shot--mid" data-shot="tabs">
        <x-selli::tabs :tabs="['Generale', 'Avanzate', 'Sicurezza']" :default="0">
            <x-selli::tab-panel :index="0"><x-selli::text>Contenuto del primo pannello.</x-selli::text></x-selli::tab-panel>
        </x-selli::tabs>
    </div>

    <div class="shot shot--mid" data-shot="accordion">
        <x-selli::accordion>
            <x-selli::accordion.item heading="Come funziona la fatturazione?" :open="true">Ti addebitiamo il primo di ogni mese.</x-selli::accordion.item>
            <x-selli::accordion.item heading="Posso disdire?">Sì, in qualsiasi momento.</x-selli::accordion.item>
        </x-selli::accordion>
    </div>

    <div class="shot" data-shot="menu">
        <x-selli::menu style="width:220px;">
            <x-selli::menu.label>Azioni</x-selli::menu.label>
            <x-selli::menu.item icon="pencil" shortcut="E">Modifica</x-selli::menu.item>
            <x-selli::menu.item icon="copy">Duplica</x-selli::menu.item>
            <x-selli::menu.separator />
            <x-selli::menu.item icon="trash-2" :danger="true">Elimina</x-selli::menu.item>
        </x-selli::menu>
    </div>

    <div class="shot" data-shot="breadcrumbs">
        <x-selli::breadcrumbs :items="[['label' => 'Home', 'url' => '#'], ['label' => 'Clienti', 'url' => '#'], ['label' => 'Acme']]" />
    </div>

    <div class="shot" data-shot="pagination">
        <x-selli::pagination :current="3" :total="12" url="#:page" />
    </div>

    <div class="shot shot--mid" data-shot="progress">
        <div class="stack">
            <x-selli::progress :value="68" label="Spazio utilizzato" />
            <x-selli::progress :value="34" color="var(--success)" label="Backup" />
        </div>
    </div>

    <div class="shot" data-shot="feedback">
        <div class="row force-tip">
            <x-selli::spinner :size="28" />
            <x-selli::dot :pulse="true" color="var(--success)" />
            <x-selli::kbd>⌘</x-selli::kbd>
            <x-selli::kbd>K</x-selli::kbd>
            <x-selli::tooltip label="Suggerimento" placement="top"><x-selli::button variant="ghost" icon="info" /></x-selli::tooltip>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="skeleton">
        <div class="stack">
            <div class="row">
                <x-selli::skeleton :circle="true" width="44" height="44" />
                <div class="stack" style="flex:1;gap:8px;">
                    <x-selli::skeleton width="60%" height="14" />
                    <x-selli::skeleton width="90%" height="12" />
                </div>
            </div>
            <x-selli::skeleton width="100%" height="80" />
        </div>
    </div>

    <div class="shot" data-shot="navlist">
        <x-selli::navlist style="width:240px;">
            <x-selli::navlist.label>Generale</x-selli::navlist.label>
            <x-selli::navlist.item icon="layout-dashboard" :active="true">Dashboard</x-selli::navlist.item>
            <x-selli::navlist.item icon="users">Clienti
                <x-slot:badge><x-selli::badge tone="violet">12</x-selli::badge></x-slot:badge>
            </x-selli::navlist.item>
            <x-selli::navlist.item icon="settings">Impostazioni</x-selli::navlist.item>
        </x-selli::navlist>
    </div>

    <div class="shot" data-shot="themes">
        <div class="row">
            <span class="selli-swatch selli-swatch--violet" style="width:28px;height:28px;"></span>
            <span class="selli-swatch selli-swatch--blue" style="width:28px;height:28px;"></span>
            <span class="selli-swatch selli-swatch--emerald" style="width:28px;height:28px;"></span>
            <span class="selli-swatch selli-swatch--amber" style="width:28px;height:28px;"></span>
            <span class="selli-swatch selli-swatch--rose" style="width:28px;height:28px;"></span>
            <span class="selli-swatch selli-swatch--cyan" style="width:28px;height:28px;"></span>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="modal">
        {{-- a static representation of the modal panel for the screenshot --}}
        <div class="selli-modal__panel selli-modal__panel--sm" style="box-shadow:var(--glow-card);">
            <div class="selli-modal__header">
                <h2 class="selli-modal__title">Conferma eliminazione</h2>
            </div>
            <div class="selli-modal__body">L'operazione non è reversibile. Vuoi continuare?</div>
            <div class="selli-modal__footer">
                <x-selli::button variant="ghost">Annulla</x-selli::button>
                <x-selli::button variant="blue">Elimina</x-selli::button>
            </div>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="auth-card">
        <x-selli::auth-card title="Bentornato" sub="Accedi al tuo account Selli">
            <div class="selli-auth-card__body">
                <x-selli::field label="Email"><x-selli::input type="email" icon="mail" value="tu@azienda.it" /></x-selli::field>
                <x-selli::field label="Password"><x-selli::input type="password" icon="lock" value="secret" /></x-selli::field>
                <x-selli::button :full="true">Accedi</x-selli::button>
            </div>
        </x-selli::auth-card>
    </div>

    <div class="shot" data-shot="brand"><x-selli::brand size="lg" /></div>

    <div class="shot" data-shot="button-group">
        <x-selli::button-group>
            <x-selli::button variant="secondary">Giorno</x-selli::button>
            <x-selli::button variant="secondary">Settimana</x-selli::button>
            <x-selli::button variant="secondary">Mese</x-selli::button>
        </x-selli::button-group>
    </div>

    <div class="shot shot--mid" data-shot="heading">
        <div class="stack">
            <x-selli::heading :level="1">Titolo H1</x-selli::heading>
            <x-selli::heading :level="2" :gradient="true">Titolo gradiente</x-selli::heading>
            <x-selli::heading :level="3">Sottotitolo H3</x-selli::heading>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="text">
        <div class="stack">
            <x-selli::text color="default">Testo predefinito, ben leggibile.</x-selli::text>
            <x-selli::text color="muted">Testo secondario attenuato.</x-selli::text>
            <x-selli::text color="brand" weight="600">Testo nel colore del brand.</x-selli::text>
        </div>
    </div>

    <div class="shot" data-shot="eyebrow">
        <div class="row">
            <x-selli::eyebrow>Novità</x-selli::eyebrow>
            <x-selli::eyebrow :pulse="false">Statico</x-selli::eyebrow>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="stat">
        <div class="row" style="gap:18px;">
            <x-selli::stat value="98%" label="Uptime">Affidabilità garantita.</x-selli::stat>
            <x-selli::stat value="60+" label="Clienti">In tutta Europa.</x-selli::stat>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="separator">
        <div class="stack" style="width:300px;">
            <x-selli::text color="default">Sezione sopra</x-selli::text>
            <x-selli::separator />
            <x-selli::separator label="oppure" />
            <x-selli::text color="default">Sezione sotto</x-selli::text>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="icons">
        <div class="row" style="gap:18px;color:var(--foreground);">
            @foreach (['rocket','sparkles','search','bell','settings','user','users','heart','star','shield-check','calendar','mail','download','trash-2','bar-chart-3','folder','lock','sun','moon','zap'] as $ic)
                <x-selli::icon :name="$ic" :size="24" />
            @endforeach
        </div>
    </div>

    <div class="shot" data-shot="sparkline">
        <div style="color:var(--foreground);"><x-selli::sparkline :data="[3,7,4,9,6,11,8,13]" :width="240" :height="56" /></div>
    </div>

    <div class="shot shot--mid" data-shot="input">
        <div class="stack">
            <x-selli::field label="Cerca"><x-selli::input icon="search" placeholder="Cerca un cliente…" /></x-selli::field>
            <x-selli::field label="Email" error="Indirizzo non valido"><x-selli::input type="email" icon="mail" value="non-valido" :invalid="true" /></x-selli::field>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="textarea">
        <x-selli::field label="Note"><x-selli::textarea rows="4">Testo su più righe, con altezza ridimensionabile…</x-selli::textarea></x-selli::field>
    </div>

    <div class="shot shot--mid" data-shot="select">
        <x-selli::field label="Piano">
            <x-selli::select :options="['free' => 'Free', 'pro' => 'Pro', 'ent' => 'Enterprise']" :selected="'pro'" />
        </x-selli::field>
    </div>

    <div class="shot shot--mid" data-shot="choice">
        <div class="stack">
            <x-selli::switch label="Notifiche email" />
            <x-selli::checkbox label="Accetto i termini" description="Leggi prima il contratto." />
            <x-selli::radio name="g-r" label="Opzione selezionata" checked />
        </div>
    </div>

    <div class="shot shot--mid" data-shot="radio-group">
        <x-selli::radio-group label="Piano" :horizontal="true">
            <x-selli::radio name="g-rg" value="free" label="Free" />
            <x-selli::radio name="g-rg" value="pro" label="Pro" checked />
            <x-selli::radio name="g-rg" value="ent" label="Enterprise" />
        </x-selli::radio-group>
    </div>

    <div class="shot shot--mid" data-shot="autocomplete">
        <div class="selli-autocomplete" style="width:320px;">
            <div class="selli-input-wrap">
                <span class="selli-input-wrap__icon"><x-selli::icon name="search" :size="18" /></span>
                <input class="selli-input selli-input--has-icon" value="Mil" readonly>
            </div>
            <div class="selli-autocomplete__menu" style="position:static;margin-top:6px;animation:none;">
                <div class="selli-autocomplete__option selli-autocomplete__option--active">Milano</div>
                <div class="selli-autocomplete__option">Milano Marittima</div>
            </div>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="editor">
        <x-selli::editor value="<p><b>Testo</b> formattato con <i>corsivo</i> e un elenco.</p><ul><li>Primo punto</li><li>Secondo punto</li></ul>" />
    </div>

    <div class="shot" data-shot="datepicker">
        <div style="display:flex;flex-direction:column;gap:8px;width:300px;">
            <div class="selli-input-wrap">
                <span class="selli-input-wrap__icon"><x-selli::icon name="calendar" :size="18" /></span>
                <input class="selli-input selli-input--has-icon" value="14/02/2027" readonly>
            </div>
            <x-selli::calendar :month="2" :year="2027" selected="2027-02-14" />
        </div>
    </div>

    <div class="shot" data-shot="dropdown">
        <div style="display:inline-flex;flex-direction:column;gap:8px;align-items:flex-start;">
            <x-selli::button variant="secondary" icon-right="chevron-down">Opzioni</x-selli::button>
            <x-selli::menu style="width:220px;">
                <x-selli::menu.item icon="user">Profilo</x-selli::menu.item>
                <x-selli::menu.item icon="settings">Impostazioni</x-selli::menu.item>
                <x-selli::menu.separator />
                <x-selli::menu.item icon="log-out" :danger="true">Esci</x-selli::menu.item>
            </x-selli::menu>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="popover">
        <div style="display:inline-flex;flex-direction:column;gap:8px;align-items:flex-start;">
            <x-selli::button variant="ghost" icon="info">Dettagli</x-selli::button>
            <div class="selli-popover__panel" style="position:static;width:280px;animation:none;">
                <x-selli::heading :level="5">Spazio occupato</x-selli::heading>
                <div style="margin-top:10px;"><x-selli::progress :value="64" /></div>
            </div>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="command">
        <div class="selli-command" style="width:420px;">
            <div class="selli-command__search">
                <x-selli::icon name="search" :size="18" color="var(--muted-foreground)" />
                <input class="selli-command__input" value="cli" readonly>
                <x-selli::kbd>ESC</x-selli::kbd>
            </div>
            <div class="selli-command__list">
                <a class="selli-command__item selli-command__item--active"><span>Apri il CRM</span><span class="selli-command__item-shortcut"><kbd class="selli-kbd">C</kbd></span></a>
                <a class="selli-command__item"><span>Crea nuovo cliente</span></a>
                <a class="selli-command__item"><span>Vai alle impostazioni</span></a>
            </div>
        </div>
    </div>

    <div class="shot shot--mid" data-shot="toast">
        <div class="stack">
            <div class="selli-toast selli-toast--success" style="min-width:320px;">
                <span class="selli-toast__icon"><x-selli::icon name="circle-check" :size="20" /></span>
                <div class="selli-toast__body"><div class="selli-toast__title">Salvato</div><div class="selli-toast__msg">Modifiche applicate.</div></div>
                <button class="selli-toast__close">&times;</button>
            </div>
            <div class="selli-toast selli-toast--danger" style="min-width:320px;">
                <span class="selli-toast__icon"><x-selli::icon name="alert-circle" :size="20" /></span>
                <div class="selli-toast__body"><div class="selli-toast__title">Errore</div><div class="selli-toast__msg">Riprova più tardi.</div></div>
                <button class="selli-toast__close">&times;</button>
            </div>
        </div>
    </div>

    <div class="shot shot--wide" data-shot="navbar">
        <x-selli::navbar style="position:static;border-radius:14px;">
            <x-slot:start><x-selli::brand /></x-slot:start>
            <x-slot:end>
                <x-selli::button size="sm" variant="ghost">Accedi</x-selli::button>
                <x-selli::button size="sm">Registrati</x-selli::button>
            </x-slot:end>
        </x-selli::navbar>
    </div>

    <div class="shot shot--wide" data-shot="page-head">
        <x-selli::page-head title="Clienti" sub="42 clienti attivi · 12 nuovi questo mese">
            <x-slot:actions>
                <x-selli::button variant="ghost" icon="download">Esporta</x-selli::button>
                <x-selli::button icon="plus">Aggiungi</x-selli::button>
            </x-slot:actions>
        </x-selli::page-head>
    </div>

    <div class="shot shot--mid" data-shot="panel">
        <x-selli::panel title="Vendite" sub="Ultimi 30 giorni">
            <x-slot:action><x-selli::badge tone="success" icon="trending-up">+18%</x-selli::badge></x-slot:action>
            <x-selli::text>Contenuto del pannello, con intestazione e azione.</x-selli::text>
        </x-selli::panel>
    </div>

    <div class="shot shot--mid" data-shot="empty-state">
        <x-selli::empty-state icon="inbox" title="Nessun messaggio" desc="La tua casella è vuota. Inizia una nuova conversazione.">
            <x-slot:action><x-selli::button icon="plus">Componi</x-selli::button></x-slot:action>
        </x-selli::empty-state>
    </div>

    <div class="shot" data-shot="theme-controls">
        <div class="row">
            <x-selli::theme-toggle />
            <x-selli::theme-switcher />
        </div>
    </div>
</div>
