<script>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div class="drawer drawer-mobile">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center bg-base-200">
      <!-- Page content here -->
      <RouterView />
    </div>
    <div class="drawer-side">
      <label for="my-drawer-2" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 text-base-content bg-sky-500">
        <!-- Sidebar content here -->
        <li>
          <RouterLink to="/" class="text-white">
            <i class="fa-solid fa-list-ul" style="color: #ffffff;"></i>
            Patient Lists
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/add" class="text-white">
            <i class="fa-regular fa-plus" style="color: white;"></i><span>New
              Patient </span>
          </RouterLink>
        </li>
      </ul>

    </div>
  </div>
</template>

<style scoped></style>
