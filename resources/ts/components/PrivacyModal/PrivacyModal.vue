<template>
    <section class="consent" :class="[{ 'consent--visible': shouldDisplay }]">
        <div class="consent__preamble">
            <h2 v-if="title">{{ title }}</h2>
            <div v-if="body" v-html="body" />
        </div>
        <div class="consent__cta">
            <button class="button" @click="handleClick(consentLevel.essential)">
                {{ essentialsButtonLabel }}
            </button>
            <button
                class="button button--secondary"
                @click="handleClick(consentLevel.analytics)"
            >
                {{ analyticsButtonLabel }}
            </button>
        </div>
    </section>
</template>
<script setup lang="ts">
import { ref } from "vue";
import { consentCookie, consentLevel } from "../../constants/consent";
const props = defineProps({
    title: String,
    body: String,
    essentialsButtonLabel: String,
    analyticsButtonLabel: String,
    consentVersion: String,
});

var shouldDisplay = ref(true);
var consentDate: string;
if (props.consentVersion) {
    consentDate = new Date(props.consentVersion)
        .toDateString()
        //@ts-ignore
        .replaceAll(" ", "_");

    //@ts-ignore
    const privacyDate = window.cookie.get("privacy");
    shouldDisplay.value = true;

    if (privacyDate && privacyDate.value === consentDate) {
        shouldDisplay.value = false;
    }
}

const handleClick = (level: consentLevel) => {
    //@ts-ignore
    window.cookie.setCookie(consentCookie.privacy, consentDate, 365);
    //@ts-ignore
    window.cookie.setCookie(consentCookie.privacyLevel, level, 365);
    shouldDisplay.value = false;
};
</script>
<style src="./PrivacyModal.scss" lang="scss" />
