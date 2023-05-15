<script>
export default {
    methods: {}
}
</script>

<template>
    <div class="card flex-shrink-0 w-5/12  shadow-xl bg-base-100">
        <form class="card-body">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" placeholder="Name" class="input input-bordered" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIK</span>
                </label>
                <input type="text" placeholder="NIK" class="input input-bordered" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Sex</span>
                </label>
                <input type="text" placeholder="Sex" class="input input-bordered" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Religion</span>
                </label>
                <input type="text" placeholder="Religion" class="input input-bordered" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Phone Number</span>
                </label>
                <input type="text" placeholder="Phone Number" class="input input-bordered" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Address</span>
                </label>
                <input type="text" placeholder="Address" class="input input-bordered" />
            </div>
            <div class="form-control mt-3" v-if="this.$route.name == 'addPatient'">
                <button class="btn btn-primary">Add Patient</button>
            </div>
            <div class="form-control mt-3" v-else>
                <button class="btn btn-primary">Edit Patient</button>
            </div>
        </form>
    </div>
</template>