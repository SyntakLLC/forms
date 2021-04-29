<template>
    <app-layout>

        <!--
          When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

          Open: "fixed inset-0 z-40 overflow-y-auto", Closed: ""
        -->
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="h-screen">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">
                <!-- Search header -->
                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->


<!--                    @click="showingQuestionsDropdown=!showingQuestionsDropdown"-->
                    <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

<!--                <div class="relative min-w-0 px-6">-->
<!--                    <h1 contenteditable @input="updateTitle" placeholder="Untitled Form" class="pt-4 text-lg font-medium leading-6 text-gray-900 sm:truncate pb-4">-->
<!--                        Edit My Site-->

<!--                        <span class="absolute inset-y-0 right-0 pl-3 flex items-center pointer-events-none text-gray-400">-->
<!--                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
<!--                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />-->
<!--                            </svg>-->
<!--                        </span>-->
<!--                    </h1>-->
<!--                </div>-->

<!--                <div class="flex-1 " />-->

<!--                <div class="flex sm:ml-4 px-6">-->
<!--                    <inertia-link class="truncate hover:text-gray-600 block">-->
<!--                        <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">-->
<!--                            Preview-->
<!--                        </button>-->
<!--                    </inertia-link>-->
<!--                </div>-->
            </div>

            <div class="h-full flex overflow-hidden bg-white">
                <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
                <div class="lg:hidden">
                    <transition
                        enter-active-class="transition-opacity ease-linear duration-300"
                        enter-class="opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="transition-opacity ease-linear duration-300"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                        <div v-show="showingQuestionsDropdown" class="fixed inset-0 flex z-40">

                            <transition
                                enter-active-class="transition-opacity ease-linear duration-300"
                                enter-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="transition-opacity ease-linear duration-300"
                                leave-class="opacity-100"
                                leave-to-class="opacity-0">
                                <div v-show="showingQuestionsDropdown" class="fixed inset-0" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                                </div>
                            </transition>

                            <transition
                                enter-active-class="transition ease-in-out duration-300 transform"
                                enter-class="-translate-x-full"
                                enter-to-class="translate-x-0"
                                leave-active-class="transition ease-in-out duration-300 transform"
                                leave-class="translate-x-0"
                                leave-to-class="-translate-x-full">
                                <div v-show="showingQuestionsDropdown" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                                    <div class="absolute top-0 right-0 -mr-12 pt-20">
                                        <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"
                                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                            <span class="sr-only">Close sidebar</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex-shrink-0 flex items-center px-4">
                                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                            Edit My Site
                                        </h1>
                                    </div>
                                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                                        <nav class="px-2">
                                            <div class="space-y-1">

                                                <!--HOME-->

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
                    <!--below thing used to be pt-5 and pb-4-->
                    <div class="flex flex-col w-64 border-r border-gray-200 pt-0 pb-0 bg-white">

                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="h-0 flex-1 flex flex-col overflow-y-auto">

                            <!-- Navigation, below nav before was mt-6 -->
                            <nav class="mt-0">
                                <div class="space-y-1">

                                    <!-- HOMEPAGE -->

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Accent Color
                                        </a>
                                        <chrome-picker :value="colors" @input="updateColor" />
                                    </div>

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Pattern
                                        </a>

                                    </div>

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Cover Photo
                                        </a>

                                    </div>

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Layout
                                        </a>

                                        <fieldset>
                                            <legend class="sr-only">
                                                Pricing plans
                                            </legend>
                                            <div class="relative bg-white rounded-md -space-y-px">
                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="border-gray-200 rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3">
                                                    <div class="flex w-full items-center text-sm">
                                                        <input type="radio" :checked="layout===1" @input="layout=1" name="pricing_plan" value="Startup" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                                        <span v-if="layout===1" id="layout-1-label-checked" class="ml-3 font-medium text-indigo-700">Layout 1</span>
                                                        <span v-else id="layout-1-label" class="ml-3 font-medium text-gray-900">Layout 1</span>
                                                    </div>

                                                    <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                </label>

                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="border-gray-200 relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3">
                                                    <div class="flex items-center text-sm">
                                                        <input type="radio" :checked="layout===2" @input="layout=2" name="pricing_plan" value="Business" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                                                        <span v-if="layout===2" id="layout-2-label-checked" class="ml-3 font-medium text-indigo-700">Layout 2</span>
                                                        <span v-else id="layout-2-label" class="ml-3 font-medium text-gray-900">Layout 2</span>
                                                    </div>

                                                    <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                </label>
                                            </div>
                                        </fieldset>

                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                        <!-- Page title & actions -->
                        <div class="p-5 bg-gray-50">
                            <div class="shadow-md h-screen">

                                <!--ABOVE: OPTRIONS HEADER-->

                                <div class="h-screen bg-white rounded-md">
                                    <div class="relative ">
                                        <div class="lg:absolute lg:inset-0">
                                            <!--                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">-->
                                            <!--                    <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1567&q=80" alt="">-->
                                            <!--                </div>-->
                                            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 lg:h-screen"
                                                 :style="this.getURL"
                                                 id="pattern">

                                                <!--                    <img class="h-56 w-full object-cover lg:fixed lg:h-full" id="coverPhoto"-->
                                                <!--                         src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1567&q=80"-->
                                                <!--                         alt="">-->
                                                <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">
                                                    <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                            <div class="lg:pr-8">
                                                <!--                    <chrome-picker v-model="colors" />-->
                                                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                        {{$page['props']['user']['name']}}
                                                    </h2>
                                                    <p contenteditable placeholder="Message (optional)" @input="updateMessage" class="font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                                        {{$page['props']['site']['message']}}
                                                    </p>

                                                    <ul class="mt-2" v-if="$page['props']['forms'].length">
                                                        <li v-for="(form) in $page['props']['forms']"
                                                            class="group">
                                                            <inertia-link :href="route('form.show', form.uuid)">
                                                                <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border">
                                                                    <div class="px-4 py-5 sm:p-6">
                                                                        <div class="sm:flex sm:items-start sm:justify-between">
                                                                            <div>
                                                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                                    {{ form.title }}
                                                                                </h3>
                                                                            </div>
                                                                            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                                                                                <button type="button"
                                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                                                                    Go
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </inertia-link>
                                                        </li>
                                                    </ul>

                                                    <inertia-link :href="route('form.index')">
                                                        <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border-2 border-gray-300 border-dashed">
                                                            <div class="px-4 py-5 sm:p-6">
                                                                <div class="sm:flex sm:items-start sm:justify-between">
                                                                    <div>
                                                                        <h3 class="text-lg leading-6 font-medium text-gray-400">
                                                                            Make a New Form
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </inertia-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>



    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import { Chrome, Swatches } from 'vue-color'

    export default {
        components: {
            AppLayout,
            Welcome,
            'chrome-picker': Chrome,
            'swatches-picker': Swatches,
        },

        props: ['user', 'site'],

        data() {
            return {
                layout: this.site.layout,
                showingAccentColorDropdown: false,
                showingLayoutDropdown: false,
                colors: this.site.accent_color,

                getURL: {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + this.site.accent_color + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                },
            };
        },

        methods: {
            /**
             * Update fields
             */
            async updateColor(e) {
                this.colors = e.hex;
                this.getURL = {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + e.hex.replace('#', '') + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                };

                let data = {
                    'color': e.hex.replace('#', ''),
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-color', data)
            },

            async updateMessage(e) {
                let data = {
                    'message': e.target.innerText,
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-message', data)
            },
        }
    }
</script>

<style lang="css">
img {
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}

#coverPhoto {
    opacity: 0.4;
}

/*#pattern {*/
/*    background-color: #ffffff;*/
/*    background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%238b5cf6' fill-opacity='1'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");*/
/*}*/
[contenteditable] {
    outline: 0px solid transparent;
}

[contenteditable]:empty:before {
    color: #999999;
    content: attr(placeholder);
}
</style>
