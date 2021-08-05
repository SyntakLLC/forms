<template>
    <app-layout>
        <div class="h-screen flex overflow-hidden">

        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">

            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                <!-- Page title & actions (used to have border-b ) -->
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            My Flowforms
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <inertia-link type="button"
                                :href="route('spark.portal')"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:order-1 sm:ml-3">
                            Upgrade
                        </inertia-link>
                    </div>
                </div>

                <div class="flex flex-wrap flex-shrink-0 pb-8 pt-5 font-sans text-sm leading-5 text-gray-900"
                     style="min-width: 0px;">
                    <div class="text-sm text-gray-900">
                        <div class="leading-5"></div>
                    </div>

                    <!-- New Flowform -->
                    <inertia-link class="ml-5 mb-5 text-sm text-gray-900"
                                  :href="route('form.index')">
                            <div orientation="horizontal"
                                 width="full"
                                 class="flex w-full text-gray-900"
                                 style="flex-flow: row nowrap;">

                                <div class="flex-shrink-0" style="min-width: 0px; min-height: 0px;">
                                    <button data-qa="form-item-new-quiz"
                                            class="overflow-visible relative flex-col py-6 px-4 m-0 w-40 h-48 text-center text-white normal-case bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-600 hover:shadow-lg focus:outline-none"
                                            style="font-family: sans-serif; font-size: 128%; line-height: 1.15; align-items: initial; transition: all 0.2s ease 0s;">
                                    <span color="notification"
                                          font-weight="bold"
                                          font-family="sans"
                                          class="block text-xl font-bold leading-7 text-left">
                                        <p class="m-0">New</p>
                                        <p class="m-0">flowform</p>
                                    </span>
                                        <div class="mx-auto mt-8 mb-0"
                                             style="line-height: 0px; font-family: sans-serif;">
                                            <div
                                                class="inline-flex p-2 shadow-xs"
                                                style="border-radius: 50%; font-family: sans-serif; line-height: 0px;">
                                                <div
                                                    height="auto"
                                                    width="auto"
                                                    color="notification"
                                                    class="flex justify-center items-center w-auto h-auto"
                                                    style="font-family: sans-serif; line-height: 0px;">
                                                    <span
                                                          class=""
                                                          style="font-family: sans-serif; line-height: 0px;"><svg
                                                          class="block w-3 h-3"
                                                          style="width: 14px; height: 14px; fill: rgb(255, 255, 255); font-family: sans-serif; line-height: 0px;"
                                                          width="10"
                                                          height="10"
                                                          viewBox="0 0 10 10"
                                                          fill="none"
                                                          xmlns="http://www.w3.org/2000/svg">
                                                          <path
                                                              fill-rule="evenodd"
                                                              clip-rule="evenodd"
                                                              d="M0 6c0-1.10457.89543-2 2-2h8c0 1.10457-.89543 2-2 2H0z"
                                                              class=""
                                                              style="font-family: sans-serif; line-height: 0px;"></path>
                                                          <path
                                                              fill-rule="evenodd"
                                                              clip-rule="evenodd"
                                                              d="M6 0v8c0 1.10457-.89543 2-2 2V2c0-1.104569.89543-2 2-2z"
                                                              class=""
                                                              style="font-family: sans-serif; line-height: 0px;"></path></svg></span>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                    </inertia-link>

                    <!-- LI for each form -->
                    <inertia-link v-for="form in this.user.forms" class="ml-5 mb-5 text-sm text-gray-900"
                                  :href="route('form.edit', form.uuid)">
                        <div draggable="true" class="leading-5">
                            <div data-qa="form-item"
                                 data-qa-form-id="c9eQQK0O"
                                 class="relative w-40 h-48 text-gray-900 rounded-lg shadow-md bg-white hover:shadow-lg border border-gray-100"
                                 style="animation: 0.3s ease-in-out 0s 1 normal none running lbWRkT; transition: all 0.2s ease-in 0s;">
                                <div height="full"
                                     orientation="vertical"
                                     class="flex h-full"
                                     style="flex-flow: column nowrap;">

                                    <img v-show="form.cover_photo" :src="form.cover_photo" class="w-full h-full object-cover absolute overflow-hidden rounded-lg" />
                                    <div class="w-full h-full object-cover absolute overflow-hidden bg-white opacity-60 rounded-lg" />

                                    <!-- Thumbnail -->
                                    <div orientation="vertical"
                                         class="flex flex-col items-center p-4 h-full text-sm leading-5 text-center text-black border-2 border-transparent border-solid cursor-pointer"
                                         style='min-height: 118px; font-family: "System font";'>

                                        <div width="100%"
                                             height="100%"
                                             class="flex flex-none justify-center items-center w-full h-full leading-5 text-black"
                                             style='font-family: "System font";'>

                                            <span data-qa="form-item-title"
                                                  font-family="sans"
                                                  class="overflow-hidden z-20 mt-0 max-w-full font-sans text-base leading-6 break-words"
                                                  style="display: -webkit-box; overflow-wrap: break-word;">{{ form.title }}</span>
                                        </div>
                                    </div>

                                    <!-- Bottom Bar -->
                                    <div class="flex-shrink-0" style="min-width: 0px; min-height: 0px;">
                                        <div class="relative p-4 bg-white shadow-xs"
                                             style="border-radius: 0px 0px 8px 8px;">
                                            <div orientation="horizontal"
                                                 class="flex flex-row justify-between items-center">
                                                <a href="/form/c9eQQK0O/results#responses"
                                                   class="overflow-hidden relative py-1 px-2 text-xs leading-4 no-underline bg-gray-200 rounded opacity-100 cursor-pointer whitespace-no-wrap hover:bg-gray-200 hover:text-gray-900 hover:no-underline"
                                                   style="outline: none;">
                                                    <span font-family="sans" class="block flex-shrink truncate">1 response</span>
                                                </a>
                                                <button
                                                    aria-label="form item menu"
                                                    color="icon"
                                                    data-qa="form-item-menu-button"
                                                    aria-controls="kitt-6"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    class="overflow-visible relative p-0 m-0 w-6 h-6 text-center text-black normal-case bg-transparent rounded border border-transparent border-solid cursor-pointer hover:bg-gray-300"
                                                    style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none; transition: all 0.4s ease 0s;">
                                                    <div
                                                        height="auto"
                                                        width="auto"
                                                        color="icon"
                                                        class="flex justify-center items-center w-auto h-auto leading-4"
                                                        style="font-family: sans-serif;">
                                                        <span class="" style="font-family: sans-serif;">
                                                            <svg class="block"
                                                                 width="14"
                                                                 height="4"
                                                                 viewBox="0 0 14 4"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 style="fill: rgb(137, 137, 137); transition: all 0.4s ease 0s; font-family: sans-serif;">
                                                                <g
                                                                    transform="rotate(90 7 7)"
                                                                    fill-rule="evenodd"
                                                                    class=""
                                                                    style="font-family: sans-serif;">
                                                                    <circle cx="2"
                                                                            cy="2"
                                                                            r="1.5"
                                                                            class=""
                                                                            style="font-family: sans-serif;">
                                                                    </circle>
                                                                    <circle cx="2"
                                                                            cy="7"
                                                                            r="1.5"
                                                                            class=""
                                                                            style="font-family: sans-serif;">
                                                                    </circle>
                                                                    <circle
                                                                        cx="2"
                                                                        cy="12"
                                                                        r="1.5"
                                                                        class=""
                                                                        style="font-family: sans-serif;">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </inertia-link>

                    <div class="text-sm text-gray-900"></div>
                </div>

                </main>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import FlowForm, {Question} from '@ditdot-dev/vue-flow-form';
import Welcome from '@/Jetstream/Welcome'
import {Chrome, Swatches} from 'vue-color'
import Show from "@/Pages/Show";

export default {
    components: {
        Show,
        AppLayout,
        Welcome,
        FlowForm,
        Question,
        'chrome-picker': Chrome,
        'swatches-picker': Swatches,
    },

    props: [
        'user',
        'site',
        'logoImageURL',
        'logoTextURL',
        'errors',
        'onTrial',
        'subscribed',
        'justInitialized',
    ],

    data() {
        return {};
    },

    watch: {},

    methods: {},

    computed: {
        cssProps() {
            return {
                '--bg-accent-color': this.colors,
                '--correct-text-color': this.getContrastYIQ(this.colors),
            }
        }
    }
}
</script>

<style lang="css">
@import '../../css/flow-form-text.css';
@import '../../css/flow-form-white-bg.css';

div.vff-footer {
    display: none !important;
}

button.o-btn-action {
    background-color: var(--bg-accent-color) !important;
    color: var(--correct-text-color) !important;
}

img {
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}

[contenteditable]:hover {
    border-radius: 5px;
    box-shadow: 0px 0px 0px 2px #2563EB;
}

[contenteditable]:empty:before {
    color: #999999;
    content: attr(placeholder);
}

#coverPhoto {
    opacity: 0.4;
}

li {
    cursor: pointer;
}

.minimalistFormItem:hover {
    background-color: var(--bg-accent-color) !important;
}
</style>
