<template>
    <app-layout :forms="$page['props']['forms']">



        <div class="bg-white">
            <div class="mx-auto">
                <div class="space-y-12">

                    <!-- Page title & actions -->
                    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                        <div class="flex-1 min-w-0">
                            <h1 class="py-2 text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                New Form
                            </h1>
                        </div>
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
                                                <h3>Blank Form</h3>
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
                                    <button type="submit" class="focus:outline-none w-full h-full">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2 bg-red-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                                                     stroke="currentColor" class="text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1">
                                                    <h3>How Much is my Home Worth?</h3>
                                                    <p class="text-indigo-600">Premade Form</p>
                                                </div>

                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                            <!--I'M LOOKING FOR AN APARTMENT-->
                            <li>
                                <form @submit.prevent="apartmentForm.post('/form/apartment')">
                                    <button type="submit" class="focus:outline-none w-full h-full">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2 bg-blue-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                                                     stroke="currentColor" class="text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1">
                                                    <h3>I'm Looking for an Apartment</h3>
                                                    <p class="text-indigo-600">Premade Form</p>
                                                </div>

                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                            <!--I'M THINKING ABOUT BUYING A HOME-->
                            <li>
                                <form @submit.prevent="buyHomeForm.post('/form/buy_home')">
                                    <button type="submit" class="focus:outline-none w-full h-full">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2 bg-green-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                                                     stroke="currentColor" class="text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1">
                                                    <h3>I'm Thinking About Buying a Home</h3>
                                                    <p class="text-indigo-600">Premade Form</p>
                                                </div>

                                            </div>
                                        </div>
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
            formColor: Math.floor(Math.random()*16777215).toString(16),

            customForm: this.$inertia.form({
                // user_id: this.user.id,
                formColor: this.getNewIdColor(),
            }),
            homeWorthForm: this.$inertia.form({
                // user_id: this.user.id,
                formColor: this.getNewIdColor(),
            }),
            apartmentForm: this.$inertia.form({
                // user_id: this.user.id,
                formColor: this.getNewIdColor(),
            }),
            buyHomeForm: this.$inertia.form({
                // user_id: this.user.id,
                formColor: this.getNewIdColor(),
            }),
        };
    },

    methods: {
        getNewIdColor() {
            let shades = [50, 100, 200, 300, 400, 500, 600, 700, 800];
            let colors = ['gray', 'red', 'indigo', 'purple', 'green', 'yellow', 'blue', 'pink'];

            return 'bg-' + colors[this.randomIntFromInterval(0, 7)] + '-500'
        },
        randomIntFromInterval(min, max) { // min and max included
            return Math.floor(Math.random() * (max - min + 1) + min);
        },
        async apiTest() {
            let response = await axios.get('/api/api-example')
            console.log(response.data)
        }
    }
}
</script>

<style scoped>

</style>
