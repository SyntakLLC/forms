<template>
    <app-layout :forms="$page['props']['forms']">

        <div class="bg-white">
            <div class="mx-auto">
                <div class="space-y-12">

                    <!-- Page title & actions -->
                    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                        <div class="flex-1 min-w-0">
                            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                New Form
                            </h1>
                        </div>
                        <!--                        <div class="mt-4 flex sm:mt-0 sm:ml-4">-->
                        <!--                            <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">-->
                        <!--                                Share-->
                        <!--                            </button>-->
                        <!--                            <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">-->
                        <!--                                Create-->
                        <!--                            </button>-->
                        <!--                        </div>-->
                    </div>

                    <div class="px-4 sm:px-6 lg:px-8">
                        <ul class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-4 2xl:grid-cols-6 lg:gap-x-8">

                            <!--CUSTOM FORM BUTTON-->
                            <li>
                                <form @submit.prevent="customForm.post('/form/custom')">
<!--                                <inertia-link @click="customForm.type = 'custom'"-->
<!--                                              :href="route('form.edit', $page['props']['user'])">-->
                                    <button type="submit" class="focus:outline-none w-full h-full">
                                    <div class="space-y-4">
                                        <div class="aspect-w-3 aspect-h-2 border-2 border-gray-300 border-dashed rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                                                 stroke="currentColor" class="text-gray-300">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                        </div>

                                        <div class="space-y-2">
                                            <div class="text-lg leading-6 font-medium space-y-1">
                                                <h3>Make a Custom Form</h3>
                                                <!--                                            <p class="text-indigo-600">Preset Form</p>-->
                                            </div>

                                        </div>
                                    </div>
<!--                                </inertia-link>-->
                                    </button>
                                </form>
                            </li>
                            <!--HOW MUCH IS MY HOME WORTH-->
                            <li>
                                <form @submit.prevent="homeWorthForm.post('/form/home_worth')">
<!--                                <inertia-link :href="route('form.store', 'How Much is my Home Worth?')">-->
                                    <button type="submit" class="focus:outline-none">
                                    <div class="space-y-4">
                                        <div class="aspect-w-3 aspect-h-2">
                                            <img class="object-cover shadow-lg rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                        </div>

                                        <div class="space-y-2">
                                            <div class="text-lg leading-6 font-medium space-y-1">
                                                <h3>How Much is my Home Worth?</h3>
                                                <p class="text-indigo-600">Premade Form</p>
                                            </div>

                                        </div>
                                    </div>
<!--                                </inertia-link>-->
                                    </button>
                                </form>
                            </li>
                            <!--I'M LOOKING FOR AN APARTMENT-->
                            <li>
                                <form @submit.prevent="apartmentForm.post('/form/apartment')">
<!--                                <inertia-link :href="route('form.store', 'I\'m Looking for an Apartment')">-->
                                    <button type="submit" class="focus:outline-none">
                                    <div class="space-y-4">
                                        <div class="aspect-w-3 aspect-h-2">
                                            <img class="object-cover shadow-lg rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                        </div>

                                        <div class="space-y-2">
                                            <div class="text-lg leading-6 font-medium space-y-1">
                                                <h3>I'm Looking for an Apartment</h3>
                                                <p class="text-indigo-600">Premade Form</p>
                                            </div>

                                        </div>
                                    </div>
<!--                                </inertia-link>-->
                                    </button>
                                </form>
                            </li>
                            <!--I'M THINKING ABOUT BUYING A HOME-->
                            <li>
                                <form @submit.prevent="buyHomeForm.post('/form/buy_home')">
<!--                                <inertia-link :href="route('form.store', 'I\'m Thinking About Buying a Home')">-->
                                    <button type="submit" class="focus:outline-none">
                                    <div class="space-y-4">
                                        <div class="aspect-w-3 aspect-h-2">
                                            <img class="object-cover shadow-lg rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                        </div>

                                        <div class="space-y-2">
                                            <div class="text-lg leading-6 font-medium space-y-1">
                                                <h3>I'm Thinking About Buying a Home</h3>
                                                <p class="text-indigo-600">Premade Form</p>
                                            </div>

                                        </div>
                                    </div>
<!--                                </inertia-link>-->
                                    </button>
                                </form>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";

export default {
    name: "Index.vue",
    components: {Button, AppLayout},

    props: ['user'],

    data: function () {
        return {
            customForm: this.$inertia.form({
                // user_id: this.user.id,
            }),
            homeWorthForm: this.$inertia.form({
                // user_id: this.user.id,
            }),
            apartmentForm: this.$inertia.form({
                // user_id: this.user.id,
            }),
            buyHomeForm: this.$inertia.form({
                // user_id: this.user.id,
            }),
        };
    }
}
</script>

<style scoped>

</style>
