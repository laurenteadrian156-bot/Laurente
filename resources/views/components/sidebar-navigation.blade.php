@php
$user = auth()->user();
$isManager = $user && $user->isManager();
$isStudent = $user && $user->isStudent();
@endphp

<div class="sidebar-wrapper">
    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

            <li class="nav-header">Navigation</li>

            <x-new-nav-link title="Dashboard" bi_icon="bi-speedometer" route="dashboard" />

            {{-- Manager Menu --}}
            @if($isManager)
            <x-new-nav-link-dropdown title="Bus Management" bi_icon="bi-house" route="buses*">
                <x-new-nav-link title="Bus" bi_icon="" route="buses.index" />
                <x-new-nav-link title="Create Bus" bi_icon="" route="buses.create" />
            </x-new-nav-link-dropdown>

            <x-new-nav-link-dropdown title="Booking Management" bi_icon="bi-people" route="schedules*">
                <x-new-nav-link title="Booking" bi_icon="" route="schedules.index" />
                <x-new-nav-link title="Create Booking" bi_icon="" route="schedules.create" />
            </x-new-nav-link-dropdown>


            @endif

            {{-- Student Menu --}}
            @if($isStudent)
            <x-new-nav-link-dropdown title="Bus Management" bi_icon="bi-house" route="buses*">
                <x-new-nav-link title="Bus" bi_icon="" route="buses.index" />
                <x-new-nav-link title="Create Bus" bi_icon="" route="buses.create" />
            </x-new-nav-link-dropdown>

            @endif

        </ul>
    </nav>
</div>