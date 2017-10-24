<template>
    <buttons></buttons>
</template>

<script>
    export default {
        data() {
            return {
                buttons: [
                    { button: "Ground (1<sup>st</sup> Floor)" },
                    { button: "2<sup>nd</sup> Floor" },
                    { button: "3<sup>rd</sup> Floor" },
                    { button: "4<sup>th</sup> Floor" },
                    { button: "5<sup>th</sup> Floor" },
                    { button: "6<sup>th</sup> Floor" },
                    { button: "7<sup>th</sup> Floor" }
                ]
            }
        }
        /*mounted() {
            console.log('Component mounted.')
        }*/
    }
</script>