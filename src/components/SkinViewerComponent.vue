<script setup lang="ts">

import { useEventListener, useLocalStorage } from "@vueuse/core";
import type {
  CapeLoadOptions,
  PlayerAnimation,
  SkinLoadOptions,
} from "skinview3d";
import { computed, nextTick, onMounted, reactive, ref, watch } from "vue";
import type { Background, Layers } from "vue-skinview3d";
import {
  FlyingAnimation,
  IdleAnimation,
  RunningAnimation,
  SkinView3d,
  WalkingAnimation,
} from "vue-skinview3d";

import Cookies from "js-cookie";

const nickname= Cookies.get('nickname');
const availableAnimations = {
  idle: new IdleAnimation(),
  walk: new WalkingAnimation(),
  run: new RunningAnimation(),
  fly: new FlyingAnimation(),
};


const DEFAULT_WIDTH = 600;
const DEFAULT_HEIGHT = 400;
const width = ref(DEFAULT_WIDTH);
const height = ref(DEFAULT_HEIGHT);
const fov = ref(70);
const zoom = ref(0.6);
const globalLight = ref(0.4);
const cameraLight = ref(0.6);
const autoRotate = ref(true);
const autoRotateSpeed = ref(0.1);
const animationType = ref("" as "" | keyof typeof availableAnimations);
const animationSpeed = ref(0.5);
const animationPlaying = ref(true);
const animation = computed<PlayerAnimation | null>(() => {
  const animationClass =
    animationType.value === ""
      ? null
      : availableAnimations[animationType.value];
  animationClass && (animationClass.speed = animationSpeed.value);
  animationClass && (animationClass.paused = !animationPlaying.value);

  return animationClass;
});
const controls = reactive({
  rotate: true,
  zoom: true,
  pan: false,
});
const layers = reactive<Layers>({
  inner: {
    head: true,
    body: true,
    leftArm: true,
    rightArm: true,
    leftLeg: true,
    rightLeg: true,
  },
  outer: {
    head: true,
    body: true,
    leftArm: true,
    rightArm: true,
    leftLeg: true,
    rightLeg: true,
  },
});
const skinUrl = ref(`http://localhost:3300/skin/${nickname}`);
const skinOptions = reactive<SkinLoadOptions>({
  model: "auto-detect",
  ears: false,
});
const capeUrl = ref("img/mojang_cape.png");
const capeOptions = reactive<CapeLoadOptions>({
  backEquipment: "cape",
});
const panorama = ref(true);
const panoramaUrl = computed(() =>
  panorama.value ? "img/panorama.png" : null,
);
const background = computed<Background | undefined>(() =>
  panoramaUrl.value
    ? {
        type: "panorama",
        value: panoramaUrl.value,
      }
    : undefined,
);
const nameTag = ref(nickname);
const skinRef = ref<HTMLElement | null>(null);

const enableWideUI = useLocalStorage("enableWideUI", false);
const wideUIClass = computed(() => ({ "wide-ui": enableWideUI.value }));

onMounted(adjustUI);
watch(enableWideUI, adjustUI);
useEventListener("resize", onResize);

function onResize() {
  if (enableWideUI.value) {
    height.value = skinRef.value!.offsetHeight;
    width.value = skinRef.value!.offsetWidth;
  }
}
async function adjustUI() {
  await nextTick();
  if (enableWideUI.value) {
    onResize();
  } else {
    height.value = DEFAULT_HEIGHT;
    width.value = DEFAULT_WIDTH;
  }
}

</script>

<template>
  <div class="container" :class="wideUIClass">
    <section ref="skinRef" class="section" :class="wideUIClass">
      <SkinView3d
        :animation="animation"
        :auto-rotate="autoRotate"
        :auto-rotate-speed="autoRotateSpeed"
        :background="background"
        :camera-light="cameraLight"
        :cape-options="capeOptions"
        :cape-url="capeUrl"
        :enable-pan="controls.pan"
        :enable-rotate="controls.rotate"
        :enable-zoom="controls.zoom"
        :fov="fov"
        :global-light="globalLight"
        :height="height"
        :layers="layers"
        :name-tag="nameTag || null"
        :skin-options="skinOptions"
        :skin-url="skinUrl"
        :width="width"
        :zoom="zoom"
      />
    </section>
  </div>
</template>

<style scoped>
.container.wide-ui {
  display: grid;
  position: absolute;
  top: 5px;
  left: 5px;
  right: 5px;
  bottom: 5px;
  grid-template-columns: 40% 60%;
  grid-template-rows: calc(100% - 60px) 60px;
  grid-template-areas: "section controls" "footer footer";
}
.section.wide-ui {
  grid-area: section;
}
footer.wide-ui {
  grid-area: footer;
}
.controls.wide-ui {
  grid-area: controls;
  display: grid;
  justify-content: start;
  padding: 0 2rem;
  overflow: auto;
}
.controls.wide-ui .control-section {
  display: grid;
}
</style>