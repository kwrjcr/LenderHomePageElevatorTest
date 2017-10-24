<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Elevator Controls</div>

                    <div class="panel-body">
                        <div>Which floor would you like?</div>
                        <div class="'floor-buttons">
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">Ground (1)</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">2</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">3</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">4</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">5</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">6</button>
                            <br/>
                            <button name="button-floors" class="button-floors" v-on:click="printFloor">7</button>

                        </div>
                        <!-- <button name="elevator-button" id="up-button-id">Up</button>
                        <button name="elevator-button" id="down-button-id">Down</button>i -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
