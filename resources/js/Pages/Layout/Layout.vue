<template>

    <TopNav />

    <ContentWrapper>
        <slot />
    </ContentWrapper>

</template>
<script setup>
import TopNav from "./TopNav";
import ContentWrapper from "./ContentWrapper";
</script>
