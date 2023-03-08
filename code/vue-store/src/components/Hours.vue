<template>
    <div class="component__hours">
        <ul>
            <li>
                <font-awesome-icon icon="phone"/>
                Call (123) 456 7890
            </li>
            <li>
                <font-awesome-icon icon="calendar"/>
                09:00 – 17:00 / monday – friday
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'component-hours'
    }
</script>

<style lang="scss">
    @import "../styles/components/hours";
</style>