<template>
    <div>
        <form class="events-search">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <input id="search" type="text" placeholder="Search..." v-model="nameSearch" @keyup="getSearch()"/>
                    </div>

                    <div class="col-12 col-md-3">
                        <input type="date" placeholder="Date">
                    </div>

                    <div class="col-12 col-md-4" @change="getSearch">
                        <select class="form-control search-slt" id="exampleFormControlSelect2" v-model="categorySearch" @change="getSearch()">
                            <option>Classify</option>
                            <option  v-for="(category, i) in categoryData" :key="i" :value="i">{{ category }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <select class="form-control search-slt" id="exampleFormControlSelect1" v-model="typeSearch" @change="getSearch()">
                            <option>Type</option>
                            <option  v-for="(type, i) in typesData" :key="i" :value="i">{{ type }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <select class="form-control search-slt" id="exampleFormControlSelect3" v-model="statusSearch" @change="getSearch()">
                            <option>-- Trạng thái--</option>
                            <option value="1">Chưa bắt đầu</option>
                            <option value="2">Đã bắt đầu</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row events-list">
                <div class="col-12 col-lg-6 single-event" v-for="(event, i) in eventsShow" :key="i">
                    <figure class="events-thumbnail">
                        <a :href="urlEvent.replace(999, event.id)"><img :src="`${'../' + event.avatar}`" width="100%" height="auto" alt=""></a>
                    </figure>

                    <div class="event-content-wrap">
                        <header class="entry-header flex justify-content-between">
                            <div>
                                <h2 class="entry-title"><a :href="urlEvent.replace(999, event.id)">{{ event.name }}</a></h2>

                                <div class="event-location"><a :href="urlEvent.replace(999, event.id)">{{ event.location }}</a></div>

                                <div class="event-date">{{ event.start_date }}</div>
                            </div>

                            <div class="event-cost flex justify-content-center align-items-center">
                                from<span>$89</span>
                            </div>
                        </header>

                        <footer class="entry-footer">
                            <a :href="urlEvent.replace(999, event.id)">Buy Tikets</a>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="row" v-if="eventsShow.length">
                <div class="col-md-12 text-center">
                    <div class="load-more-btn">
                        <button type="button" class="btn gradient-bg" @click="loadMore()">Load more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'bgUrl',
            'allType',
            'allCategory',
            'url',
            'allEvent',
            'urlEvent',
        ],
        created() {
            this.typesData = JSON.parse(this.allType) || [];
            this.categoryData = JSON.parse(this.allCategory) || [];
            this.eventsData = JSON.parse(this.allEvent) || [];
            this.eventsShow = this.eventsData.slice(0, 0);
        },
        data() {
            return {
                typesData: [],
                categoryData: [],
                typeSearch: null,
                statusSearch: null,
                categorySearch: null,
                nameSearch: null,
                advanceBtn: true,
                eventsData: [],
                eventsShow: [],
                result: 6,
            }
        },
        computed: {},
        methods: {
            getSearch() {
                axios.get(this.url, {
                        params: {
                            type: this.typeSearch,
                            category: this.categorySearch,
                            status: this.statusSearch,
                            name: this.nameSearch,
                        }
                    }
                ).then(response => {
                    console.log(response.data);
                    this.eventsData = response.data;
                    this.eventsShow = this.eventsData.slice(0, this.result)
                }).catch(error => {
                    console.log(error)
                })
            },
            getAdvance() {
                this.advanceBtn = !this.advanceBtn
            },
            loadMore() {
                this.result+= 6;
                this.eventsShow = this.eventsData.slice(0, this.result)
            }
        }
    }
</script>

<style lang="scss" scoped>
    .my-component {
        color: red;
    }
</style>