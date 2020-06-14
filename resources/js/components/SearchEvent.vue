<template>
    <div>
        <form class="events-search">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <label>Tìm theo tên, tiêu đề</label>
                        <input id="name search" type="text" placeholder="Search..." v-model="nameSearch" @keyup="getSearch()"/>
                    </div>

                    <!--<div class="col-12 col-md-3">
                        <label>Ngay</label>
                        <input type="date" placeholder="Date">
                    </div>-->

                    <div class="col-12 col-md-4" @change="getSearch">
                        <label>Danh mục</label>
                        <select class="form-control search-slt" id="exampleFormControlSelect2" v-model="categorySearch" @change="getSearch()">
                            <option :value="null">Category searh</option>
                            <option v-for="(category, i) in categoryData" :key="i" :value="i">{{ category }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label>Thể loại</label>
                        <select class="form-control search-slt" id="exampleFormControlSelect1" v-model="typeSearch" @change="getSearch()">
                            <option :value="null">Type searh</option>
                            <option v-for="(type, i) in typesData" :key="i" :value="i">{{ type }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label>Coupon</label>
                        <select class="form-control search-slt" id="exampleFormControlSelect3" v-model="couponSearch" @change="getSearch()">
                            <option :value="null">Coupon searh</option>
                            <option value="1">Không có</option>
                            <option value="2">Kèm theo</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4" v-if="this.isEnt">
                        <label>Trạng thái</label>
                        <select class="form-control search-slt" v-model="statusSearch" @change="getSearch()">
                            <option :value="null">Tất cả</option>
                            <option value="0">Chưa công bố</option>
                            <option value="1">Chưa bắt đầu</option>
                            <option value="2">Đã bắt đầu</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4" v-else>
                        <label>Trạng thái</label>
                        <select class="form-control search-slt" v-model="statusSearch" @change="getSearch()">
                            <option :value="null">Tất cả</option>
                            <option value="1">Chưa bắt đầu</option>
                            <option value="2">Đã bắt đầu</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row events-list">
                <div class="col-12 col-lg-6 single-event mb-3" v-for="(event, i) in eventsShow" :key="i">
                    <figure class="events-thumbnail">
                        <a :href="urlEvent.replace(999, event.id)"><img :src="`${'../' + event.avatar}`" width="100%" height="auto" alt=""></a>
                    </figure>

                    <div class="event-content-wrap">
                        <header class="entry-header flex justify-content-between">
                            <div>
                                <h2 class="entry-title"><a :href="urlEvent.replace(999, event.id)">{{ event.name }}</a></h2>

                                <div class="event-location">{{ event.location }}</div>

                                <div class="event-date">{{ event.start_date }}</div>
                                <div class="event-date"><span><b>{{ statusData[event.status] }}</b></span></div>
                            </div>

                            <div class="event-cost flex justify-content-center align-items-center">
                                Kèm coupon <span>{{ event.coupon.value + '%' }}</span>
                            </div>
                        </header>

                        <footer class="entry-footer text-center" v-if="isBuyer">
                            <a :href="urlEvent.replace(999, event.id)" class="btn btn-defaul">Nhận vé</a>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="row" v-if="eventsShow.length">
                <div class="col-md-12 text-center">
                    <div class="load-more-btn">
                        <button type="button" class="btn gradient-bg" @click="loadMore()">Tải thêm</button>
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
            'epUrl',
            'allEvent',
            'urlEvent',
            'isBuyer',
            'isEnt',
            'allStatus',
        ],
        created() {
            this.typesData = JSON.parse(this.allType) || [];
            this.categoryData = JSON.parse(this.allCategory) || [];
            this.eventsData = JSON.parse(this.allEvent) || [];
            this.statusData = JSON.parse(this.allStatus) || [];
            this.eventsShow = this.eventsData.slice(0, 0);
            this.apiUrl = this.isBuyer ? this.url : this.epUrl;
        },
        data() {
            return {
                typesData: [],
                categoryData: [],
                typeSearch: null,
                statusSearch: null,
                categorySearch: null,
                couponSearch: null,
                nameSearch: null,
                advanceBtn: true,
                eventsData: [],
                statusData: [],
                eventsShow: [],
                apiUrl: null,
                result: 6,
            }
        },
        computed: {},
        methods: {
            getSearch() {
                axios.get(this.apiUrl, {
                        params: {
                            type: this.typeSearch,
                            category: this.categorySearch,
                            status: this.statusSearch,
                            name: this.nameSearch,
                            coupon: this.couponSearch,
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
                this.result += 6;
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