<template>
    <div>
        <jet-banner />

        <div class="h-screen flex overflow-hidden bg-white">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div class="lg:hidden">
                <div class="fixed inset-0 flex z-40">
                    <!--
                      Off-canvas menu overlay, show/hide based on off-canvas menu state.

                      Entering: "transition-opacity ease-linear duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "transition-opacity ease-linear duration-300"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                    </div>
                    <!--
                      Off-canvas menu, show/hide based on off-canvas menu state.

                      Entering: "transition ease-in-out duration-300 transform"
                        From: "-translate-x-full"
                        To: "translate-x-0"
                      Leaving: "transition ease-in-out duration-300 transform"
                        From: "translate-x-0"
                        To: "-translate-x-full"
                    -->
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <div class="absolute top-0 right-0 -mr-12 pt-2">
                            <button class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
                        </div>
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
                                    <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">
                                        <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                                        <!-- Heroicon name: outline/home -->
                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>

                                    <a href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/view-list -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        My tasks
                                    </a>

                                    <a href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/clock -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Recent
                                    </a>
                                </div>
                                <div class="mt-8">
                                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                                        Teams
                                    </h3>
                                    <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                        <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                                            <span class="truncate">
                                          Engineering
                                        </span>
                                        </a>

                                        <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                                            <span class="truncate">
                                            Human Resources
                                        </span>
                                        </a>

                                        <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                                            <span class="truncate">
                                            Customer Success
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden lg:flex lg:flex-shrink-0">
                <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
                    <div class="flex items-center flex-shrink-0 px-6">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
                    </div>
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="h-0 flex-1 flex flex-col overflow-y-auto">
                        <!-- User account dropdown -->
                        <div class="px-3 mt-6 relative inline-block text-left">
                            <div>
                                <inertia-link :href="route('profile.show')">
                                    <button type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu" aria-expanded="false" aria-haspopup="true">
                                    <span class="flex w-full justify-between items-center">
                                        <span class="flex min-w-0 items-center justify-between space-x-3">

                                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />

<!--                                            <span class="flex-1 flex-col min-w-0">-->
                                                    <span class="text-gray-900 text-sm font-medium truncate">{{ $page.props.user.name + " * " + $page.props.user.email }}</span>
<!--                                                </div>-->
<!--                                                <div>-->
<!--                                                    <span class="text-gray-500 text-sm whitespace-pre-line truncate">-->
<!--                                                            {{ $page.props.user.email }}-->
<!--                                                    </span>-->
<!--                                                </div>-->
<!--                                            </span>-->
                                        </span>

                                    </span>
                                    </button>
                                </inertia-link>
                            </div>
                        </div>


                        <!-- Navigation -->
                        <nav class="px-3 mt-6">
                            <div class="space-y-1">
                                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                <a href="#" class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                                    <!-- Heroicon name: outline/home -->
                                    <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Home
                                </a>

                                <a href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/view-list -->
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    My tasks
                                </a>

                                <a href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Recent
                                </a>
                            </div>
                            <div class="mt-8">
                                <!-- Secondary navigation -->
                                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                                    Teams
                                </h3>
                                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                    <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                        Engineering
                                    </span>
                                    </a>

                                    <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                        Human Resources
                                    </span>
                                    </a>

                                    <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                        Customer Success
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Main column -->
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
                <!-- Search header -->
                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                    <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </button>
                    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                        <div class="flex-1 flex">
                            <form class="w-full flex md:ml-0" action="#" method="GET">
                                <label for="search_field" class="sr-only">Search</label>
                                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                        <!-- Heroicon name: solid/search -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="search_field" name="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
                                </div>
                            </form>
                        </div>
                        <div class="flex items-center">
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <inertia-link :href="route('profile.show')">
                                        <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open user menu</span>
                                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>
                                    </inertia-link>
                                </div>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">View profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Settings</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Notifications</a>
                                    </div>
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Get desktop app</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Support</a>
                                    </div>
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                    <!-- Page title & actions -->
                    <div class="py-6">
                        <slot />
                    </div>
                </main>
            </div>
        </div>


<!--        <div class="min-h-screen bg-gray-100">-->
<!--            <nav class="bg-white border-b border-gray-100">-->
<!--                &lt;!&ndash; Primary Navigation Menu &ndash;&gt;-->
<!--                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--                    <div class="flex justify-between h-16">-->
<!--                        <div class="flex">-->
<!--                            &lt;!&ndash; Logo &ndash;&gt;-->
<!--                            <div class="flex-shrink-0 flex items-center">-->
<!--                                <inertia-link :href="route('dashboard')">-->
<!--                                    <jet-application-mark class="block h-9 w-auto" />-->
<!--                                </inertia-link>-->
<!--                            </div>-->

<!--                            &lt;!&ndash; Navigation Links &ndash;&gt;-->
<!--                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">-->
<!--                                <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                                    Dashboard-->
<!--                                </jet-nav-link>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="hidden sm:flex sm:items-center sm:ml-6">-->
<!--                            <div class="ml-3 relative">-->
<!--                                &lt;!&ndash; Teams Dropdown &ndash;&gt;-->
<!--                                <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">-->
<!--                                    <template #trigger>-->
<!--                                        <span class="inline-flex rounded-md">-->
<!--                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">-->
<!--                                                {{ $page.props.user.current_team.name }}-->

<!--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />-->
<!--                                                </svg>-->
<!--                                            </button>-->
<!--                                        </span>-->
<!--                                    </template>-->

<!--                                    <template #content>-->
<!--                                        <div class="w-60">-->
<!--                                            &lt;!&ndash; Team Management &ndash;&gt;-->
<!--                                            <template v-if="$page.props.jetstream.hasTeamFeatures">-->
<!--                                                <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                                    Manage Team-->
<!--                                                </div>-->

<!--                                                &lt;!&ndash; Team Settings &ndash;&gt;-->
<!--                                                <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">-->
<!--                                                    Team Settings-->
<!--                                                </jet-dropdown-link>-->

<!--                                                <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">-->
<!--                                                    Create New Team-->
<!--                                                </jet-dropdown-link>-->

<!--                                                <div class="border-t border-gray-100"></div>-->

<!--                                                &lt;!&ndash; Team Switcher &ndash;&gt;-->
<!--                                                <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                                    Switch Teams-->
<!--                                                </div>-->

<!--                                                <template v-for="team in $page.props.user.all_teams" :key="team.id">-->
<!--                                                    <form @submit.prevent="switchToTeam(team)">-->
<!--                                                        <jet-dropdown-link as="button">-->
<!--                                                            <div class="flex items-center">-->
<!--                                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>-->
<!--                                                                <div>{{ team.name }}</div>-->
<!--                                                            </div>-->
<!--                                                        </jet-dropdown-link>-->
<!--                                                    </form>-->
<!--                                                </template>-->
<!--                                            </template>-->
<!--                                        </div>-->
<!--                                    </template>-->
<!--                                </jet-dropdown>-->
<!--                            </div>-->

<!--                            &lt;!&ndash; Settings Dropdown &ndash;&gt;-->
<!--                            <div class="ml-3 relative">-->
<!--                                <jet-dropdown align="right" width="48">-->
<!--                                    <template #trigger>-->
<!--                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">-->
<!--                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                                        </button>-->

<!--                                        <span v-else class="inline-flex rounded-md">-->
<!--                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">-->
<!--                                                {{ $page.props.user.name }}-->

<!--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />-->
<!--                                                </svg>-->
<!--                                            </button>-->
<!--                                        </span>-->
<!--                                    </template>-->

<!--                                    <template #content>-->
<!--                                        &lt;!&ndash; Account Management &ndash;&gt;-->
<!--                                        <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                            Manage Account-->
<!--                                        </div>-->

<!--                                        <jet-dropdown-link :href="route('profile.show')">-->
<!--                                            Profile-->
<!--                                        </jet-dropdown-link>-->

<!--                                        <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">-->
<!--                                            API Tokens-->
<!--                                        </jet-dropdown-link>-->

<!--                                        <div class="border-t border-gray-100"></div>-->

<!--                                        &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                                        <form @submit.prevent="logout">-->
<!--                                            <jet-dropdown-link as="button">-->
<!--                                                Log Out-->
<!--                                            </jet-dropdown-link>-->
<!--                                        </form>-->
<!--                                    </template>-->
<!--                                </jet-dropdown>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash; Hamburger &ndash;&gt;-->
<!--                        <div class="-mr-2 flex items-center sm:hidden">-->
<!--                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">-->
<!--                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">-->
<!--                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />-->
<!--                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />-->
<!--                                </svg>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                &lt;!&ndash; Responsive Navigation Menu &ndash;&gt;-->
<!--                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">-->
<!--                    <div class="pt-2 pb-3 space-y-1">-->
<!--                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                            Dashboard-->
<!--                        </jet-responsive-nav-link>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; Responsive Settings Options &ndash;&gt;-->
<!--                    <div class="pt-4 pb-1 border-t border-gray-200">-->
<!--                        <div class="flex items-center px-4">-->
<!--                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >-->
<!--                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                            </div>-->

<!--                            <div>-->
<!--                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>-->
<!--                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="mt-3 space-y-1">-->
<!--                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">-->
<!--                                Profile-->
<!--                            </jet-responsive-nav-link>-->

<!--                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">-->
<!--                                API Tokens-->
<!--                            </jet-responsive-nav-link>-->

<!--                            &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                            <form method="POST" @submit.prevent="logout">-->
<!--                                <jet-responsive-nav-link as="button">-->
<!--                                    Log Out-->
<!--                                </jet-responsive-nav-link>-->
<!--                            </form>-->

<!--                            &lt;!&ndash; Team Management &ndash;&gt;-->
<!--                            <template v-if="$page.props.jetstream.hasTeamFeatures">-->
<!--                                <div class="border-t border-gray-200"></div>-->

<!--                                <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                    Manage Team-->
<!--                                </div>-->

<!--                                &lt;!&ndash; Team Settings &ndash;&gt;-->
<!--                                <jet-responsive-nav-link :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')">-->
<!--                                    Team Settings-->
<!--                                </jet-responsive-nav-link>-->

<!--                                <jet-responsive-nav-link :href="route('teams.create')" :active="route().current('teams.create')">-->
<!--                                    Create New Team-->
<!--                                </jet-responsive-nav-link>-->

<!--                                <div class="border-t border-gray-200"></div>-->

<!--                                &lt;!&ndash; Team Switcher &ndash;&gt;-->
<!--                                <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                    Switch Teams-->
<!--                                </div>-->

<!--                                <template v-for="team in $page.props.user.all_teams" :key="team.id">-->
<!--                                    <form @submit.prevent="switchToTeam(team)">-->
<!--                                        <jet-responsive-nav-link as="button">-->
<!--                                            <div class="flex items-center">-->
<!--                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>-->
<!--                                                <div>{{ team.name }}</div>-->
<!--                                            </div>-->
<!--                                        </jet-responsive-nav-link>-->
<!--                                    </form>-->
<!--                                </template>-->
<!--                            </template>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </nav>-->

<!--            &lt;!&ndash; Page Heading &ndash;&gt;-->
<!--            <header class="bg-white shadow" v-if="$slots.header">-->
<!--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">-->
<!--                    <slot name="header"></slot>-->
<!--                </div>-->
<!--            </header>-->

<!--            &lt;!&ndash; Page Content &ndash;&gt;-->

<!--        </div>-->
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
