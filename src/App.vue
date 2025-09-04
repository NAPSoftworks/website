<template>
  <div class="h-screen bg-gradient">
    <div class="flex h-screen bg-mesh">
      <div class="max-w-1/2 m-auto">
        <img src="/nap_softworks_logo_shadow.png" class="opacity-100" alt="NAP Softworks logo" />
        <div class="text-center text-white text-3xl font-bold">{{ countdownText }}</div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { onMounted, onBeforeUnmount, ref } from 'vue'

const countdownText = ref('')

const targetUtc = new Date('2025-10-02T09:00:00Z') // 2 Oct 2025 09:00 UTC
let timer

const formatRemaining = (ms) => {
  if (ms <= 0) return '00d 00h 00m 00s'
  const secTotal = Math.floor(ms / 1000)
  const days = Math.floor(secTotal / 86400)
  const hours = Math.floor((secTotal % 86400) / 3600)
  const minutes = Math.floor((secTotal % 3600) / 60)
  const seconds = secTotal % 60

  const pad = (n) => String(n).padStart(2, '0')

  return `${pad(days)}d ${pad(hours)}h ${pad(minutes)}m ${pad(seconds)}s`
}

const tick = () => {
  const remaining = targetUtc.getTime() - Date.now()

  countdownText.value = formatRemaining(remaining)

  if (remaining <= 0 && timer !== undefined) {
    window.clearInterval(timer)
    timer = undefined
  }
}

onMounted(() => {
  tick()

  timer = window.setInterval(tick, 1000)
})

onBeforeUnmount(() => {
  if (timer !== undefined) {
    window.clearInterval(timer)

    timer = undefined
  }
})
</script>

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
