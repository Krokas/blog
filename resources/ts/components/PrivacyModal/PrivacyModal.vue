<template>
    <section
        class="consent"
        style="visibility: hidden"
        data-consent="{{$consentModal['privacyUpdatedAt']->updated_at}}"
    >
        <div class="consent__preamble">
            <h2 v-if="title">{{ title }}</h2>
            <template v-if="body">
                {{ body }}
            </template>
        </div>
        <div class="consent__cta">
            <button data-essentials class="button">
                {{ essentialsButtonLabel }}
            </button>
            <button data-analytics class="button button--secondary">
                {{ analyticsButtonLabel }}
            </button>
        </div>
    </section>
</template>
<script setup lang="ts">
const pros = defineProps({
    privacyUpdatedAt: String,
    title: String,
    body: String,
    essentialsButtonLabel: String,
    analyticsButtonLabel: String,
});
</script>
