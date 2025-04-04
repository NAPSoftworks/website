<template>
  <div class="h-screen bg-gradient">
    <div class="flex h-screen bg-mesh">
      <div class="max-w-1/2 m-auto">
        <img src="/nap_softworks_logo_shadow.png" class="opacity-100" alt="NAP Softworks logo" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-gradient {
  background: linear-gradient(30deg, #5f8db4, #68968a, #6a4a86);
}

.bg-mesh {
  height: 100vh;
  background-image: url('/background_mesh.png');
  background-repeat: repeat;
  animation: moveBackground 600s linear infinite;
}

@keyframes moveBackground {
  0% {
    background-position: 100% -100%;
  }
  100% {
    background-position: -100% 100%;
  }
}
</style>
