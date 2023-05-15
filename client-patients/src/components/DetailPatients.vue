<script>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
    <div class="hero min-h-screen">
        <div class="hero-content">
            <div class="w-screen flex flex-col items-center gap-2">
                <div class="avatar">
                    <div class="w-24 rounded-full">
                        <img
                            src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2231&q=80" />
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <h1 class="text-3xl font-bold">Patient Detail</h1>
                    <RouterLink to="/" class="btn btn-primary pad">Back</RouterLink>
                </div>
                <table class="mt-5 table w-5/12 shadow-xl">
                    <tbody>
                        <tr>
                            <td class="text-sky-600">Name</td>
                            <td>Maria Anders</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">NIK</td>
                            <td>Francisco Chang</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Sex</td>
                            <td>Francisco Chang</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Religion</td>
                            <td>Francisco Chang</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Phone</td>
                            <td>Francisco Chang</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Address</td>
                            <td>Francisco Chang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped></style>