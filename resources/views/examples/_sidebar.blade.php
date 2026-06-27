@php $active = $active ?? 'dashboard'; @endphp
<x-selli::navlist>
    <x-selli::navlist.label>Generale</x-selli::navlist.label>
    <x-selli::navlist.item icon="layout-dashboard" href="dashboard.html" :active="$active === 'dashboard'">Dashboard</x-selli::navlist.item>
    <x-selli::navlist.item icon="users" href="crm.html" :active="$active === 'crm'">
        CRM
        <x-slot:badge><x-selli::badge tone="violet">12</x-selli::badge></x-slot:badge>
    </x-selli::navlist.item>
    <x-selli::navlist.item icon="bar-chart-3" href="#">Report</x-selli::navlist.item>
    <x-selli::navlist.item icon="inbox" href="#">Posta</x-selli::navlist.item>
    <x-selli::navlist.label>Account</x-selli::navlist.label>
    <x-selli::navlist.item icon="settings" href="settings.html" :active="$active === 'settings'">Impostazioni</x-selli::navlist.item>
    <x-selli::navlist.item icon="shield-check" href="#">Sicurezza</x-selli::navlist.item>
</x-selli::navlist>
