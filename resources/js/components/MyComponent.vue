<template>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4" v-for="(event, i) in sub_events" :key="i">
            <div class="next-event-wrap">
                <figure>
                    <a :href="urlDetail.replace(999, event.id)"><img :src="event.avatar" alt="1"></a>

                    <div class="event-rating">{{ event.point % 100 }}</div>
                </figure>

                <header class="entry-header">
                    <h3 class="entry-title">{{ event.name }}</h3>

                    <div class="posted-date">Saturday <span>{{ event.start_date }}</span></div>
                </header>

                <div class="entry-content">
                    <p>{{ event.title }}</p>
                </div>

                <footer class="entry-footer">
                    <a :href="urlDetail.replace(999, event.id)" >Get Ticket</a>
                </footer>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 mt-3 text-center">
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
            "urlDetail",
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