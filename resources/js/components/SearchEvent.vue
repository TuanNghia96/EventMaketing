<template>
    <div>
        <header id="fh5co-header" class="fh5co-cover" role="banner" :style="`background-image: url( ${bgUrl} )`" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>&nbsp</h1>
                                <h1>Event Countdown</h1>
                                <h2>Let join your event</h2>
                                <div class="s007">
                                    <form href="#">
                                        <div class="inner-form">
                                            <div class="basic-search">
                                                <div class="input-field">
                                                    <div class="icon-wrap">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                                            <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                                                        </svg>
                                                    </div>
                                                    <input id="search" type="text" placeholder="Search..." v-model="nameSearch" @keyup="getSearch()"/>
                                                    <div class="result-count">
                                                        <span>{{ eventsData.length }} </span>results
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="advance-search">
                                                <span>Advanced Search</span>
                                                <div class="row">
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul" @change="getSearch()" v-model="typeSearch">
                                                                <option placeholder="" value="" class="text-center">Type</option>
                                                                <option v-for="(type, i) in typesData" :value="i">{{ type }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul" v-model="classifySearch" @change="getSearch()">
                                                                <option placeholder="" value="">CLASSIFY</option>
                                                                <option v-for="(classify, i) in classifyData" :value="i">{{ classify }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul" v-model="statusSearch" @change="getSearch()">
                                                                <option placeholder="" value="">STATUS</option>
                                                                <option value="1">START</option>
                                                                <option value="0">WAITING</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<div class="row second">
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul">
                                                                <option placeholder="" value="">SALE</option>
                                                                <option>SALE</option>
                                                                <option>SUBJECT B</option>
                                                                <option>SUBJECT C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul">
                                                                <option placeholder="" value="">TIME</option>
                                                                <option>THIS WEEK</option>
                                                                <option>SUBJECT B</option>
                                                                <option>SUBJECT C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-field">
                                                        <div class="input-select">
                                                            <select data-trigger="" name="choices-single-defaul">
                                                                <option placeholder="" value="">TYPE</option>
                                                                <option>TYPE</option>
                                                                <option>SUBJECT B</option>
                                                                <option>SUBJECT C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="row third">
                                                    <div class="input-field">
                                                        <!--<button class="btn-search">Search</button>-->
                                                        <!--<button class="btn-delete">Delete</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--<section class="search-sec">
            <div class="container">
                <form action="#" method="post" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12" style="padding-left: 0px;padding-right: 0px" @keyup="getSearch">
                                    <input type="text" class="form-control search-slt" v-model="nameSearch" placeholder="">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12" style="padding-left: 0px;padding-right: 0px" @change="getSearch">
                                    <select class="form-control search-slt" id="exampleFormControlSelect2" v-model="classifySearch">
                                        <option></option>
                                        <option  v-for="(type, i) in classifyData" :key="i">{{ type }}</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12" style="padding-left: 0px;padding-right: 0px" @change="getSearch">
                                    <select class="form-control search-slt" id="exampleFormControlSelect1" v-model="typeSearch">
                                        <option></option>
                                        <option  v-for="(type, i) in typesData" :key="i">{{ type }}</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="padding-left: 0px;padding-right: 0px">
                                    <button type="button" class="btn btn-danger wrn-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>-->
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-gallery-list">
                    <li class="one-third animate-box search-event fadeIn animated-fast" v-for="(event, i) in eventsShow" :key="i" data-animate-effect="fadeIn" :style="`background-image: url( ${event.avatar} )`">
                        <a :href="urlEvent.replace(/.$/,event.id)">
                            <div class="case-studies-summary">
                                <span>{{ classifyData[event.classify] }}</span><br>
                                <span>{{ typesData[event.type] }}</span>
                                <h2>{{ event.name }}</h2>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-offset-4 col-md-4 text-center">
                <button type="button" class="btn btn-success" @click="loadMore()">Load more</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'bgUrl',
            'allType',
            'allClassify',
            'url',
            'allEvent',
            'urlEvent',
        ],
        created() {
            this.typesData = JSON.parse(this.allType) || [];
            this.classifyData = JSON.parse(this.allClassify) || [];
            this.eventsData = JSON.parse(this.allEvent) || [];
            this.eventsShow = this.eventsData.slice(0, 6);
        },
        data() {
            return {
                typesData: [],
                classifyData: [],
                typeSearch: null,
                statusSearch: null,
                classifySearch: null,
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
                            classify: this.classifySearch,
                            status: this.statusSearch,
                            name: this.nameSearch,
                        }
                    }
                ).then(response => {
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