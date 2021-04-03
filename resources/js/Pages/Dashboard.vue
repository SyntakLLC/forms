<template>
    <app-layout>

        <div class="relative bg-white">
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
                    <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                            {{$page['props']['user']['name']}}
                        </h2>
                        <p class="mt-4 text-lg text-gray-500 sm:mt-3">
                            I’d love to hear from you! Send me a message using the forms below, or email me.
                        </p>

                        <ul v-if="$page['props']['forms'].length">
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
                                                    <!--                                            <div class="mt-2 max-w-xl text-sm text-gray-500">-->
                                                    <!--                                                <p>-->
                                                    <!--                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae-->
                                                    <!--                                                    voluptatibus corrupti atque repudiandae nam.-->
                                                    <!--                                                </p>-->
                                                    <!--                                            </div>-->
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
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        props: ['user'],

        data() {
            return {
                getURL: {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + this.user.accent_color + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                },
            };
        },
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
</style>
