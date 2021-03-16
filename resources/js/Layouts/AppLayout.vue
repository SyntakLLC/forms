<template>
    <div>
        <jet-banner />

        <div class="h-screen flex overflow-hidden bg-white">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div class="lg:hidden">
                <transition
                    enter-active-class="transition-opacity ease-linear duration-300"
                    enter-from-class="opacity-0"
                    enter-class="opacity-100"
                    leave-active-class="transition-opacity ease-linear duration-300"
                    leave-class="opacity-100"
                    leave-to-class="opacity-0">
                <div v-show="showingNavigationDropdown" class="fixed inset-0 flex z-40">

                    <transition
                        enter-active-class="transition-opacity ease-linear duration-300"
                        enter-from-class="opacity-0"
                        enter-class="opacity-100"
                        leave-active-class="transition-opacity ease-linear duration-300"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                        <div v-show="showingNavigationDropdown" class="fixed inset-0" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                        </div>
                    </transition>

                    <transition
                        enter-active-class="transition ease-in-out duration-300 transform"
                        enter-from-class="-translate-x-full"
                        enter-class="translate-x-0"
                        leave-active-class="transition ease-in-out duration-300 transform"
                        leave-class="translate-x-0"
                        leave-to-class="-translate-x-full">
                        <div v-show="showingNavigationDropdown" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button @click="showingNavigationDropdown=!showingNavigationDropdown"
                                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
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

                                        <!--HOME-->
                                        <inertia-link :href="route('dashboard')">
                                            <a v-if="route().current('dashboard')" href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">

                                                <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                Home
                                            </a>
                                            <a v-else href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">

                                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                Home
                                            </a>
                                        </inertia-link>

                                        <!--NEW FORM-->
                                        <inertia-link :href="route('form.index')">
                                            <a v-if="route().current('form.index')" href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">

                                                <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                New form
                                            </a>
                                            <a v-else href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">

                                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                New form
                                            </a>
                                        </inertia-link>

                                        <!--LEADS-->
                                        <inertia-link :href="route('response.index')">
                                            <a v-if="route().current('response.index') || route().current('response.show')" href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">

                                                <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                </svg>
                                                Responses
                                            </a>
                                            <a v-else href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">

                                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                </svg>
                                                Responses
                                            </a>
                                        </inertia-link>

    <!--                                    <a href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">-->
    <!--                                        &lt;!&ndash; Heroicon name: outline/view-list &ndash;&gt;-->
    <!--                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
    <!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />-->
    <!--                                        </svg>-->
    <!--                                        My tasks-->
    <!--                                    </a>-->
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                                            Forms
                                        </h3>
                                        <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                            <div v-if="$page['props']['forms'].length" v-for="form in $page['props']['forms']">
                                                <inertia-link :href="route('form.edit', form.uuid)"
                                                              class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                    <span class="w-2.5 h-2.5 mr-4 rounded-full" :class="form.id_color" aria-hidden="true"></span>
                                                    <span class="truncate">
                                                        {{ form.title }}
                                                    </span>
                                                </inertia-link>
                                            </div>

                                            <!--IF NO FORMS-->
                                            <div v-else>
                                                <div class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                    <span class="truncate">
                                                        You have no forms.
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </transition>
                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
                </transition>
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
                                        <!--ACTIVE-->
                                        <button v-if="route().current('profile.show')" type="button" class="group w-full bg-gray-200 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu" aria-expanded="false" aria-haspopup="true">
                                        <span class="flex w-full justify-between items-center">
                                            <span class="flex min-w-0 items-center justify-between space-x-3">

                                                    <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />

    <!--                                            <span class="flex-1 flex-col min-w-0">-->
                                                        <span class="text-gray-900 text-sm font-medium truncate">{{ $page.props.user.name + " | " + $page.props.user.email }}</span>
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

                                        <!--INACTIVE-->
                                        <button v-else type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu" aria-expanded="false" aria-haspopup="true">
                                        <span class="flex w-full justify-between items-center">
                                            <span class="flex min-w-0 items-center justify-between space-x-3">

                                                    <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />

                                                <!--                                            <span class="flex-1 flex-col min-w-0">-->
                                                        <span class="text-gray-900 text-sm font-medium truncate">{{ $page.props.user.name + " | " + $page.props.user.email }}</span>
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
                                <!-- HOMEPAGE -->
                                <inertia-link :href="route('dashboard')">
                                    <a v-if="route().current('dashboard')" href="#" class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>
                                    <a v-else href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>
                                </inertia-link>

                                <!--NEW FORM-->
                                <inertia-link :href="route('form.index')">
                                    <a v-if="route().current('form.index')" href="#" class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        New form
                                    </a>
                                    <a v-else href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        New form
                                    </a>
                                </inertia-link>

                                <!--LEADS-->
                                <inertia-link :href="route('response.index')">
                                    <a v-if="route().current('response.index')" href="#" class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        Responses
                                    </a>
                                    <a v-else href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        Responses
                                    </a>
                                </inertia-link>

                            </div>
                            <div class="mt-8">
                                <!-- Secondary navigation -->
                                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                                    Forms
                                </h3>
                                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                    <div v-if="$page['props']['forms'].length" v-for="form in $page['props']['forms']">
                                    <inertia-link :href="route('form.edit', form.uuid)">
                                        <!--CURRENT-->
                                        <a v-if="route().current('form.edit', form.uuid)" class="bg-gray-200 group flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md">
                                            <span class="w-2.5 h-2.5 mr-4 rounded-full" :class="form.id_color" aria-hidden="true"></span>
                                            <span class="truncate">
                                                {{ form.title }}
                                            </span>
                                        </a>

                                        <!--INACTIVE-->
                                        <a v-else class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 rounded-full" :class="form.id_color" aria-hidden="true"></span>
                                            <span class="truncate">
                                                {{ form.title }}
                                            </span>
                                        </a>
                                    </inertia-link>
                                    </div>

                                    <!--IF NO FORMS-->
                                    <div v-else>
                                        <div class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="truncate">
                                            You have no forms.
                                        </span>
                                        </div>
                                    </div>

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
                    <button @click="showingNavigationDropdown=!showingNavigationDropdown"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
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
