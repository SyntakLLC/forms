<template>
    <div class="h-screen">
        <div class="h-full flex overflow-hidden bg-white">
            <!-- Main column -->
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                    <!-- Page title & actions -->
                    <div class="h-screen bg-white rounded-md">
                        <div class="relative ">
                            <div class="lg:absolute lg:inset-0">

                                <!-- Pattern background -->
                                <div v-if="$page.props.user.cover_photo_url==null"
                                     class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 lg:h-screen"
                                     :class="layout===1 ? 'lg:right-0 lg:fixed' : 'lg:left-0 lg:fixed'"
                                     :style="this.getURL"
                                     id="pattern">

                                    <div
                                        class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">
                                        <img
                                            class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md"
                                            :src="$page.props.user.profile_photo_url"
                                            :alt="$page.props.user.name"/>
                                    </div>
                                </div>
                                <!-- Cover photo -->
                                <div v-else
                                     class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 overflow-hidden lg:h-screen"
                                     :class="layout===1 ? 'lg:right-0 lg:fixed' : 'lg:left-0 lg:fixed'">
                                    <img class="h-56 w-full object-cover lg:absolute lg:h-full"
                                         :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url"/>

                                    <div
                                        class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56">
                                        <img
                                            class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md"
                                            :src="$page.props.user.profile_photo_url"
                                            :alt="$page.props.user.name"/>
                                    </div>
                                </div>

                            </div>

                            <!-- Main info -->
                            <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                <div v-if="layout===2" class="lg:mx-8"/>
                                <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                    <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                                            {{ $page['props']['user']['name'] }}
                                        </h2>
                                        <p class="font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                            {{ $page['props']['site']['message'] }}
                                        </p>

                                        <!-- The list of forms -->
                                        <ul class="mt-2" v-if="$page['props']['forms'].length">
                                            <li v-for="(form) in $page['props']['forms']"
                                                class="group">
                                                <inertia-link :href="route('form.show', form.uuid)">
                                                    <div
                                                        class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border">
                                                        <div class="px-4 py-5 sm:p-6">
                                                            <div
                                                                class="sm:flex sm:items-start sm:justify-between">
                                                                <div>
                                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                        {{ form.title }}
                                                                    </h3>
                                                                </div>
                                                                <div
                                                                    class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                                                                    <button type="button"
                                                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                                                            :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)">
                                                                        Go
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </inertia-link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import {Chrome, Swatches} from 'vue-color'

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
            photoPreview: null,
            layout: this.site.layout,
            showingAccentColorDropdown: false,
            showingLayoutDropdown: false,
            showingQuestionsDropdown: false,
            colors: '#' + this.site.accent_color,

            getURL: {
                'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + this.site.accent_color + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
            },
        };
    },

    methods: {
        // returns black or white depending on the appropriate 'logo' color
        getContrastYIQ(hexcolor) {
            hexcolor = hexcolor.replace("#", "");
            var r = parseInt(hexcolor.substr(0, 2), 16);
            var g = parseInt(hexcolor.substr(2, 2), 16);
            var b = parseInt(hexcolor.substr(4, 2), 16);
            var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
            return (yiq >= 128) ? 'black' : 'white';
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
