<template>
    <div>
        <ul id="fh5co-gallery-list">
                <li v-for="(event, i) in sub_events" :key="i" class="one-third animate-box my-component fadeIn animated-fast" :style="`background-image: url( ${event.image} )`">
                    <a href="">
                        <div class="case-studies-summary">
                            <span>{{ all_type[event.type] }}</span>
                            <h2>{{ event.name }}</h2>
                        </div>
                    </a>
                </li>
        </ul>
        <div class="col-md-12 col-sm-12 text-center">
            <button class="btn btn-default btn-sm" @click="getMore">Thêm</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            "subEvents",
            "allType",
            "urlSub",
        ],
        created() {
            this.sub_events = JSON.parse(this.subEvents) || [];
            this.all_type = JSON.parse(this.allType) || [];
        },
        data() {
            return {
                sub_events: [],
                all_type: [],
            }
        },
        methods: {
            getMore() {
                axios.get(this.urlSub, {
                    params: {
                        number: this.sub_events.length,
                    }
                }
                ).then(response => {
                    this.sub_events = response.data
                }).catch(error => {
                    console.log(error)
                })
            },
        }
    }
</script>

<style lang="scss" scoped>
    .my-component {
        color: red;
    }
</style>