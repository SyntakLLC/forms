<template>
    <app-layout>

        <div class="bg-white">
            <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Our Team</h2>
                        <p class="text-xl text-gray-500">Odio nisi, lectus dis nulla. Ultrices maecenas vitae rutrum dolor ultricies donec risus sodales. Tempus quis et.</p>
                    </div>
                    <ul class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
                        <li>
                            <div class="space-y-4">
                                <div class="aspect-w-3 aspect-h-2">
                                    <img class="object-cover shadow-lg rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                </div>

                                <div class="space-y-2">
                                    <div class="text-lg leading-6 font-medium space-y-1">
                                        <h3>How Much is my Home Worth?</h3>
                                        <p class="text-indigo-600">Preset Form</p>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <!-- More items... -->
                    </ul>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
name: "Create.vue",
    components: {AppLayout}
}
</script>

<style scoped>

</style>
