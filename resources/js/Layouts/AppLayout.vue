<template>
    <div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                        <!-- Mobile menu button -->
                        <button @click="showingNavigationDropdown=!showingNavigationDropdown" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!--
                              Icon when menu is closed.

                              Heroicon name: outline/menu

                              Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg v-show="!showingNavigationDropdown" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                              Icon when menu is open.

                              Heroicon name: outline/x

                              Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg v-show="showingNavigationDropdown" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
                        </div>

                        <!-- Nav options -->
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                            <inertia-link :href="route('dashboard')" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                          :class="route().current('dashboard') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'">
                                <a href="#">
                                    Edit Site
                                </a>
                            </inertia-link>

                            <inertia-link :href="route('response.index')" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                          :class="route().current('response.index') || route().current('response.show') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'">
                                <a href="#">
                                    Responses
                                </a>
                            </inertia-link>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button @click="showingProfileMenu=!showingProfileMenu" type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         :src="$page.props.user.profile_photo_url"
                                         :alt="$page.props.user.name"/>
                                </button>
                            </div>

                            <transition
                                enter-active-class="transition ease-out duration-200"
                                enter-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95">
                                <div v-show="showingProfileMenu" class="z-10 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a @click="$inertia.get(route('profile.show'))" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" :class="route().current('profile.show') ? 'bg-gray-100' : 'bg-white'" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                    <a @click="$inertia.post(route('logout'))" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div v-show="showingNavigationDropdown" class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-4 space-y-1">
                    <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
                    <a :href="route('dashboard')" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium"
                       :class="route().current('dashboard') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'">Edit Site</a>
                    <a :href="route('response.index')" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium"
                       :class="route().current('response.index') || route().current('response.show') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'">Responses</a>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto">
            <slot/>
        </main>


        <!--        <jet-banner/>-->

<!--        <div class="h-screen flex overflow-hidden bg-white">-->
<!--            &lt;!&ndash; Off-canvas menu for mobile, show/hide based on off-canvas menu state. &ndash;&gt;-->
<!--            <div class="lg:hidden">-->
<!--                <transition-->
<!--                    enter-active-class="transition-opacity ease-linear duration-300"-->
<!--                    enter-class="opacity-0"-->
<!--                    enter-to-class="opacity-100"-->
<!--                    leave-active-class="transition-opacity ease-linear duration-300"-->
<!--                    leave-class="opacity-100"-->
<!--                    leave-to-class="opacity-0">-->
<!--                    <div v-show="showingNavigationDropdown" class="fixed inset-0 flex z-40">-->

<!--                        <transition-->
<!--                            enter-active-class="transition-opacity ease-linear duration-300"-->
<!--                            enter-class="opacity-0"-->
<!--                            enter-to-class="opacity-100"-->
<!--                            leave-active-class="transition-opacity ease-linear duration-300"-->
<!--                            leave-class="opacity-100"-->
<!--                            leave-to-class="opacity-0">-->
<!--                            <div v-show="showingNavigationDropdown" class="fixed inset-0" aria-hidden="true">-->
<!--                                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>-->
<!--                            </div>-->
<!--                        </transition>-->

<!--                        <transition-->
<!--                            enter-active-class="transition ease-in-out duration-300 transform"-->
<!--                            enter-class="-translate-x-full"-->
<!--                            enter-to-class="translate-x-0"-->
<!--                            leave-active-class="transition ease-in-out duration-300 transform"-->
<!--                            leave-class="translate-x-0"-->
<!--                            leave-to-class="-translate-x-full">-->
<!--                            <div v-show="showingNavigationDropdown"-->
<!--                                 class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">-->
<!--                                <div class="absolute top-0 right-0 -mr-12 pt-2">-->
<!--                                    <button @click="showingNavigationDropdown=!showingNavigationDropdown"-->
<!--                                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">-->
<!--                                        <span class="sr-only">Close sidebar</span>-->
<!--                                        &lt;!&ndash; Heroicon name: outline/x &ndash;&gt;-->
<!--                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M6 18L18 6M6 6l12 12"/>-->
<!--                                        </svg>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                                <div class="flex-shrink-0 flex items-center px-4">-->
<!--                                    <img class="h-8 w-auto"-->
<!--                                         src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"-->
<!--                                         alt="Workflow">-->
<!--                                </div>-->
<!--                                <div class="mt-5 flex-1 h-0 overflow-y-auto">-->
<!--                                    <nav class="px-2">-->
<!--                                        <div class="space-y-1">-->

<!--                                            &lt;!&ndash;HOME&ndash;&gt;-->
<!--                                            <inertia-link :href="route('dashboard')">-->
<!--                                                <a v-if="route().current('dashboard')" href="#"-->
<!--                                                   class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"-->
<!--                                                   aria-current="page">-->

<!--                                                    <svg class="text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2"-->
<!--                                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>-->
<!--                                                    </svg>-->
<!--                                                    My Site-->
<!--                                                </a>-->
<!--                                                <a v-else href="#"-->
<!--                                                   class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">-->

<!--                                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2"-->
<!--                                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>-->
<!--                                                    </svg>-->
<!--                                                    My Site-->
<!--                                                </a>-->
<!--                                            </inertia-link>-->

<!--                                            &lt;!&ndash;NEW FORM&ndash;&gt;-->
<!--                                            <inertia-link :href="route('form.index')">-->
<!--                                                <a v-if="route().current('form.index')" href="#"-->
<!--                                                   class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"-->
<!--                                                   aria-current="page">-->

<!--                                                    <svg class="text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>-->
<!--                                                    </svg>-->
<!--                                                    New form-->
<!--                                                </a>-->
<!--                                                <a v-else href="#"-->
<!--                                                   class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">-->

<!--                                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>-->
<!--                                                    </svg>-->
<!--                                                    New form-->
<!--                                                </a>-->
<!--                                            </inertia-link>-->

<!--                                            &lt;!&ndash;LEADS&ndash;&gt;-->
<!--                                            <inertia-link :href="route('response.index')">-->
<!--                                                <a v-if="route().current('response.index') || route().current('response.show')"-->
<!--                                                   href="#"-->
<!--                                                   class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"-->
<!--                                                   aria-current="page">-->

<!--                                                    <svg class="text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>-->
<!--                                                    </svg>-->
<!--                                                    Responses-->
<!--                                                </a>-->
<!--                                                <a v-else href="#"-->
<!--                                                   class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">-->

<!--                                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"-->
<!--                                                         xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                              stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>-->
<!--                                                    </svg>-->
<!--                                                    Responses-->
<!--                                                </a>-->
<!--                                            </inertia-link>-->

<!--                                            &lt;!&ndash;                                    <a href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                        &lt;!&ndash; Heroicon name: outline/view-list &ndash;&gt;&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                        </svg>&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                        My tasks&ndash;&gt;-->
<!--                                            &lt;!&ndash;                                    </a>&ndash;&gt;-->
<!--                                        </div>-->


<!--                                        <div class="mt-8">-->
<!--                                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"-->
<!--                                                id="teams-headline">-->
<!--                                                Forms-->
<!--                                            </h3>-->
<!--                                            <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">-->
<!--                                                <div v-if="$page['props']['forms'].length"-->
<!--                                                     v-for="form in $page['props']['forms']">-->
<!--                                                    <inertia-link :href="route('form.edit', form.uuid)"-->
<!--                                                                  class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">-->
<!--                                                        <span class="w-2.5 h-2.5 mr-4 rounded-full"-->
<!--                                                              :class="form.id_color" aria-hidden="true"></span>-->
<!--                                                        <span class="truncate">-->
<!--                                                        {{ form.title }}-->
<!--                                                    </span>-->
<!--                                                    </inertia-link>-->
<!--                                                </div>-->

<!--                                                &lt;!&ndash;IF NO FORMS&ndash;&gt;-->
<!--                                                <div v-else>-->
<!--                                                    <div-->
<!--                                                        class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">-->
<!--                                                    <span class="truncate">-->
<!--                                                        You have no forms.-->
<!--                                                    </span>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </nav>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </transition>-->
<!--                        <div class="flex-shrink-0 w-14" aria-hidden="true">-->
<!--                            &lt;!&ndash; Dummy element to force sidebar to shrink to fit close icon &ndash;&gt;-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </transition>-->
<!--            </div>-->

<!--            &lt;!&ndash; Static sidebar for desktop &ndash;&gt;-->
<!--            <div class="hidden lg:flex lg:flex-shrink-0">-->
<!--                <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">-->
<!--                    <div class="flex items-center flex-shrink-0 px-6">-->
<!--                        <img class="h-8 w-auto"-->
<!--                             src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"-->
<!--                             alt="Workflow">-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Sidebar component, swap this element with another sidebar if you like &ndash;&gt;-->
<!--                    <div class="h-0 flex-1 flex flex-col overflow-y-auto">-->


<!--                        &lt;!&ndash; User account Button &ndash;&gt;-->
<!--                        <div class="px-3 mt-6 relative inline-block text-left">-->
<!--                            <div>-->
<!--                                <button @click="showingProfileMenu=!showingProfileMenu"-->
<!--                                        type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu-button" aria-expanded="false" aria-haspopup="true"-->
<!--                                        :class="route().current('profile.show') ? 'bg-gray-200' : 'bg-gray-100' ">-->
<!--                                    <span class="flex w-full justify-between items-center">-->
<!--                                        <span class="flex min-w-0 items-center justify-between space-x-3">-->

<!--                                            <img class="h-10 w-10 rounded-full object-cover"-->
<!--                                                 :src="$page.props.user.profile_photo_url"-->
<!--                                                 :alt="$page.props.user.name"/>-->

<!--                                            <span class="flex-1 flex flex-col min-w-0">-->
<!--                                                <span class="text-gray-900 text-left text-sm font-medium truncate">{{ $page.props.user.name }}</span>-->
<!--                                                <span class="text-gray-500 text-left text-sm truncate">{{ $page.props.user.email }}</span>-->
<!--                                            </span>-->
<!--                                        </span>-->
<!--                                        &lt;!&ndash; Heroicon name: solid/selector &ndash;&gt;-->
<!--                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
<!--                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                </button>-->
<!--                            </div>-->

<!--                            <transition enter-active-class="transition ease-out duration-100"-->
<!--                                        enter-class="transform opacity-0 scale-95"-->
<!--                                        enter-to-class="transform opacity-100 scale-100"-->
<!--                                        leave-active-class="transition ease-in duration-75"-->
<!--                                        leave-class="transform opacity-100 scale-100"-->
<!--                                        leave-to-class="transform opacity-0 scale-95">-->
<!--                                <div v-show="showingProfileMenu" class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">-->
<!--                                    <div class="py-1" role="none">-->
<!--                                        &lt;!&ndash; Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" &ndash;&gt;-->
<!--                                        <a @click="$inertia.get(route('profile.show'))" href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-item-0">View profile</a>-->
<!--                                    </div>-->
<!--                                    <div class="py-1" role="none">-->
<!--                                        <a @click="$inertia.post(route('logout'))" href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-item-5">Logout</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </transition>-->
<!--                        </div>-->

<!--                        &lt;!&ndash; Navigation &ndash;&gt;-->
<!--                        <nav class="px-3 mt-6">-->
<!--                            <div class="space-y-1">-->
<!--                                &lt;!&ndash; HOMEPAGE &ndash;&gt;-->
<!--                                <inertia-link :href="route('dashboard')">-->
<!--                                    <a v-if="route().current('dashboard')" href="#"-->
<!--                                       class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"-->
<!--                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>-->
<!--                                        </svg>-->
<!--                                        My Site-->
<!--                                    </a>-->
<!--                                    <a v-else href="#"-->
<!--                                       class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"-->
<!--                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                             stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>-->
<!--                                        </svg>-->
<!--                                        My Site-->
<!--                                    </a>-->
<!--                                </inertia-link>-->

<!--                                &lt;!&ndash;NEW FORM&ndash;&gt;-->
<!--                                <inertia-link :href="route('form.index')">-->
<!--                                    <a v-if="route().current('form.index')" href="#"-->
<!--                                       class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"-->
<!--                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>-->
<!--                                        </svg>-->
<!--                                        New form-->
<!--                                    </a>-->
<!--                                    <a v-else href="#"-->
<!--                                       class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"-->
<!--                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>-->
<!--                                        </svg>-->
<!--                                        New form-->
<!--                                    </a>-->
<!--                                </inertia-link>-->

<!--                                &lt;!&ndash;LEADS&ndash;&gt;-->
<!--                                <inertia-link :href="route('response.index')">-->
<!--                                    <a v-if="route().current('response.index') || route().current('response.show')"-->
<!--                                       href="#"-->
<!--                                       class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"-->
<!--                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M4 6h16M4 10h16M4 14h16M4 18h16"/>-->
<!--                                        </svg>-->
<!--                                        Responses-->
<!--                                    </a>-->
<!--                                    <a v-else href="#"-->
<!--                                       class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">-->

<!--                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"-->
<!--                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                             stroke="currentColor" aria-hidden="true">-->
<!--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                                  d="M4 6h16M4 10h16M4 14h16M4 18h16"/>-->
<!--                                        </svg>-->
<!--                                        Responses-->
<!--                                    </a>-->
<!--                                </inertia-link>-->

<!--                            </div>-->
<!--                            <div class="mt-8">-->
<!--                                &lt;!&ndash; Secondary navigation &ndash;&gt;-->
<!--                                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">-->
<!--                                    Forms-->
<!--                                </h3>-->
<!--                                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">-->
<!--                                    <div v-if="$page['props']['forms'].length" v-for="form in $page['props']['forms']">-->
<!--                                        <inertia-link :href="route('form.edit', form.uuid)">-->
<!--                                            &lt;!&ndash;CURRENT&ndash;&gt;-->
<!--                                            <a v-if="route().current('form.question.edit', form.uuid)"-->
<!--                                               class="bg-gray-200 group flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md">-->
<!--                                                <span class="w-2.5 h-2.5 mr-4 rounded-full" :class="form.id_color"-->
<!--                                                      aria-hidden="true"></span>-->
<!--                                                <span class="truncate">-->
<!--                                                {{ form.title }}-->
<!--                                            </span>-->
<!--                                            </a>-->

<!--                                            &lt;!&ndash;INACTIVE&ndash;&gt;-->
<!--                                            <a v-else-->
<!--                                               class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">-->
<!--                                                <span class="w-2.5 h-2.5 mr-4 rounded-full" :class="form.id_color"-->
<!--                                                      aria-hidden="true"></span>-->
<!--                                                <span class="truncate">-->
<!--                                                {{ form.title }}-->
<!--                                            </span>-->
<!--                                            </a>-->
<!--                                        </inertia-link>-->
<!--                                    </div>-->

<!--                                    &lt;!&ndash;IF NO FORMS&ndash;&gt;-->
<!--                                    <div v-else>-->
<!--                                        <div-->
<!--                                            class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">-->
<!--                                            <span class="truncate">-->
<!--                                            You have no forms.-->
<!--                                        </span>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Main column &ndash;&gt;-->
<!--            <div class="flex flex-col w-0 flex-1 overflow-hidden">-->
<!--                &lt;!&ndash; Search header &ndash;&gt;-->
<!--                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">-->
<!--                    &lt;!&ndash; Sidebar toggle, controls the 'sidebarOpen' sidebar state. &ndash;&gt;-->
<!--                    <button @click="showingNavigationDropdown=!showingNavigationDropdown"-->
<!--                            class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">-->
<!--                        <span class="sr-only">Open sidebar</span>-->
<!--                        &lt;!&ndash; Heroicon name: outline/menu-alt-1 &ndash;&gt;-->
<!--                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                             stroke="currentColor" aria-hidden="true">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                  d="M4 6h16M4 12h8m-8 6h16"/>-->
<!--                        </svg>-->
<!--                    </button>-->
<!--                    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">-->
<!--                        <div class="flex-1 flex">-->
<!--                            <form class="w-full flex md:ml-0" action="#" method="GET">-->
<!--                                &lt;!&ndash;                                <label for="search_field" class="sr-only">Search</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                <div class="relative w-full text-gray-400 focus-within:text-gray-600">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        &lt;!&ndash; Heroicon name: solid/search &ndash;&gt;&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        </svg>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    <input id="search_field" name="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            </form>-->
<!--                        </div>-->
<!--                        <div class="flex items-center">-->
<!--                            &lt;!&ndash; Profile dropdown &ndash;&gt;-->
<!--                            <div class="ml-3 relative">-->
<!--                                <div>-->
<!--                                    <inertia-link :href="route('profile.show')">-->
<!--                                        <button type="button"-->
<!--                                                class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"-->
<!--                                                id="user-menu" aria-expanded="false" aria-haspopup="true">-->
<!--                                            <span class="sr-only">Open user menu</span>-->
<!--                                            <img class="h-10 w-10 rounded-full object-cover"-->
<!--                                                 :src="$page.props.user.profile_photo_url"-->
<!--                                                 :alt="$page.props.user.name"/>-->
<!--                                        </button>-->
<!--                                    </inertia-link>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">-->
<!--                    &lt;!&ndash; Page title & actions &ndash;&gt;-->
<!--                    &lt;!&ndash;                    <div class="py-6">&ndash;&gt;-->
<!--                    <div>-->
<!--                        <slot/>-->
<!--                    </div>-->
<!--                </main>-->
<!--            </div>-->
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
            showingProfileMenu: false,
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
