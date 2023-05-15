<script>
export default {
    methods: {
        toEdit() {
            this.$router.push("/edit/1")
        },
        toDetail() {
            this.$router.push("/detail/1")
        }
    }
}

</script>
    
<template>
    <div class="overflow-x-auto shadow-2xl">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Sex</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr class="hover" @click="toDetail">
                    <th>1</th>
                    <td>Cy Ganderton</td>
                    <td>Quality Control Specialist</td>
                    <td>Blue</td>
                    <td>
                        <div class="action">
                            <button>
                                <i class="fa-solid fa-trash" style="color: #dc2626; width: 20px;"></i>
                            </button>
                            <button @click.stop="toEdit">
                                <i class="fa-solid fa-user-pen" style="color: #0ea5e9; width: 20px;"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- row 2 -->
                <tr class="hover">
                    <th>2</th>
                    <td>Hart Hagerty</td>
                    <td>Desktop Support Technician</td>
                    <td>Purple</td>
                    <td>
                        <div class="action">
                            <button>
                                <i class="fa-solid fa-trash" style="color: #dc2626; width: 20px;"></i>
                            </button>
                            <button @click.stop="toEdit">
                                <i class="fa-solid fa-user-pen" style="color: #0ea5e9; width: 20px;"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- row 3 -->
                <tr class="hover">
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td>
                        <div class="action">
                            <button>
                                <i class="fa-solid fa-trash" style="color: #dc2626; width: 20px;"></i>
                            </button>
                            <button @click.stop="toEdit">
                                <i class="fa-solid fa-user-pen" style="color: #0ea5e9; width: 20px;"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.action {
    display: flex;
    gap: 20px;
}

.add-gropu {
    display: flex;
    gap: 5px;
}
</style>