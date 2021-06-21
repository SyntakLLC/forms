<template>
    <app-layout :forms="$page['props']['forms']">

        <div>
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

                        <ul class="space-y-12 grid grid-cols-2 gap-x-6 gap-y-12 space-y-0 md:grid-cols-3 md:gap-x-7 lg:grid-cols-4 2xl:grid-cols-6 lg:gap-x-8">

                            <!--CUSTOM FORM BUTTON-->
                            <li>
                                <form @submit.prevent="customForm.post('/form/custom')">
<!--                                <inertia-link @click="customForm.type = 'custom'"-->
<!--                                              :href="route('form.edit', $page['props']['user'])">-->
                                    <button type="submit" class="focus:outline-none w-full h-full">
                                    <div class="space-y-4">
                                        <div class="aspect-w-10 aspect-h-10 hover:bg-gray-50 border-2 border-gray-300 border-dashed rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                                                 stroke="currentColor" class="text-gray-300">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                        </div>

                                        <div class="space-y-2">
                                            <div class="text-lg leading-6 font-medium space-y-1">
                                                <h3>Blank Form</h3>
                                                <!--                                            <p class="text-blue-600">Preset Form</p>-->
                                            </div>

                                        </div>
                                    </div>
<!--                                </inertia-link>-->
                                    </button>
                                </form>
                            </li>
                            <!--How Much is Your Home Worth-->
                            <li>
                                <form @submit.prevent="homeWorthForm.post('/form/home_worth')">
                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">
                                        <div class="space-y-4">
                                            <div class="aspect-w-10 aspect-h-10">
                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.homeWorthIcon" style="object-position: -10px 0;" alt="Form Icon">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1">
                                                    <h3>How Much is Your Home Worth?</h3>
                                                    <p class="text-blue-600">Premade Form</p>
                                                </div>

                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                            <!--Are You Looking for an Apartment-->
                            <li>
                                <form @submit.prevent="apartmentForm.post('/form/apartment')">
                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">
                                        <div class="space-y-4">
                                            <div class="aspect-w-10 aspect-h-10">
                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" style="object-position: -10px 0;" alt="Form Icon">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1">
                                                    <h3>Are You Looking for an Apartment?</h3>
                                                    <p class="text-blue-600">Premade Form</p>
                                                </div>

                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                            <!--Do You Need a New Agent-->
<!--                            <li>-->
<!--                                <form @submit.prevent="newAgentForm.post('/form/new-agent')">-->
<!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
<!--                                        <div class="space-y-4">-->
<!--                                            <div class="aspect-w-10 aspect-h-10">-->
<!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" style="object-position: -10px 0;" alt="Form Icon">-->
<!--                                            </div>-->

<!--                                            <div class="space-y-2">-->
<!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
<!--                                                    <h3>Do You Need a New Agent?</h3>-->
<!--                                                    <p class="text-blue-600">Premade Form</p>-->
<!--                                                </div>-->

<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </form>-->
<!--                            </li>-->
                            <!--Are You Planning on Buying a Home?-->
<!--                            <li>-->
<!--                                <form @submit.prevent="buyingHomeForm.post('/form/selling-home')">-->
<!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
<!--                                        <div class="space-y-4">-->
<!--                                            <div class="aspect-w-10 aspect-h-10">-->
<!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" style="object-position: -10px 0;" alt="Form Icon">-->
<!--                                            </div>-->

<!--                                            <div class="space-y-2">-->
<!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
<!--                                                    <h3>Are You Planning On Buying a Home?</h3>-->
<!--                                                    <p class="text-blue-600">Premade Form</p>-->
<!--                                                </div>-->

<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </form>-->
<!--                            </li>-->
                            <!--Contact Me-->
<!--                            <li>-->
<!--                                <form @submit.prevent="contactForm.post('/form/contact-me')">-->
<!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
<!--                                        <div class="space-y-4">-->
<!--                                            <div class="aspect-w-10 aspect-h-10">-->
<!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.contactIcon" style="object-position: -10px 0;" alt="Form Icon">-->
<!--                                            </div>-->

<!--                                            <div class="space-y-2">-->
<!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
<!--                                                    <h3>Contact Me!</h3>-->
<!--                                                    <p class="text-blue-600">Premade Form</p>-->
<!--                                                </div>-->

<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </form>-->
<!--                            </li>-->

                            <!-- And More Soon -->
                            <li class="hover:opacity-90">
                                <div class="space-y-4">
                                    <div class="aspect-w-10 aspect-h-10 items-center rounded-lg cursor-default">
                                        <div class="text-lg leading-6 font-medium text-center items-end justify-end">
                                            <h3 class="mt-20">More Templates Coming Soon!</h3>
                                        </div>
                                    </div>
                                </div>
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
import Input from "@/Jetstream/Input";

export default {
    name: "Index.vue",
    components: {Input, Button, AppLayout},

    props: ['user'],

    data: function () {

        return {
            formColor: Math.floor(Math.random()*16777215).toString(16),

            customForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
            homeWorthForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
            apartmentForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
            newAgentForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
            buyingHomeForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
            contactForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
            }),
        };
    },

    methods: {
        getNewIdColor() {
            let shades = [50, 100, 200, 300, 400, 500, 600, 700, 800];
            let colors = ['gray', 'red', 'blue', 'purple', 'green', 'yellow', 'blue', 'pink'];

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
