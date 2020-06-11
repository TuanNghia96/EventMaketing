<template>
    <div class="row">
        <div class="col-12">
            <div class="upcoming-events" v-if="isJoined">
                <!--                <div class="upcoming-events-header">
                                    <h4>Đánh giá trung bình</h4>
                                </div>-->
                <div class="upcoming-events-list">
                    <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                        <figure class="events-thumbnail">
                            <h3>
                                Thêm đánh giá:
                            </h3>
                        </figure>
                        
                        <div class="entry-meta">
                            <div class="event-date">
                                <star-rating v-model="rating"></star-rating>
                                <input type="hidden" v-model="rating" name="rating">
                            </div>
                        </div>
                        
                        <header class="entry-header">
                            <h3 class="entry-title">Bình luận</h3>
                            <form :action="this.postUrl" method="post" class="row" novalidate with="100%">
                                <input type="hidden" name="_token" :value="this.csrfToken">
                                <input type="hidden" name="rating" :value="rating">
                                <input type="hidden" name="event_id" :value="eventData.id">
                                <div class="event-speaker col-md-10"><textarea name="message" class="form-control" id="" rows="4" data-min-rows="4"></textarea></div>
                                <button class="col-md-2" type="submit" style="border: none;
                                  background-color: inherit;
                                  padding: 14px 28px;
                                  font-size: 16px;
                                  cursor: pointer;
                                  display: inline-block;
                                color: #9a28d7;">Gửi
                                </button>
                            </form>
                        
                        </header>
                    
                    </div>
                </div>
            </div>
            <div class="upcoming-events">
                <div class="upcoming-events-header">
                    <h4>Đánh giá trung bình</h4>
                </div>
                
                <div class="upcoming-events-list">
                    <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                        <div class="entry-meta" style="margin-left: auto;margin-right: auto">
                            <div class="event-date">
                                <star-rating v-bind:increment="0.01" v-model="eventData.rating" read-only></star-rating>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="upcoming-events">
                <div class="upcoming-events-header" v-if="commentData.length">
                    <h4>Đánh giá</h4>
                </div>
                <div class="upcoming-events-header" v-else>
                    <h4>Chưa có đánh giá</h4>
                </div>
                
                <div class="upcoming-events-list" v-for="(comment, i) in commentData">
                    <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                        <figure class="events-thumbnail">
                            <a href="#"><img :src="`/frontend/images/upcoming-3.jpg`" alt=""></a>
                        </figure>
                        
                        <div class="entry-meta">
                            <div class="event-date">
                                <star-rating v-model="comment.rating" read-only></star-rating>
                            </div>
                        </div>
                        
                        <header class="entry-header">
                            <h3 class="entry-title">{{ comment.buyer_name }}</h3>
                            
                            <div class="event-speaker">{{ comment.message }}</div>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        components: {},
        props: [
            "event",
            "comments",
            "isJoined",
            "postUrl",
            "csrfToken",
        ],
        created() {
            this.eventData = JSON.parse(this.event) || [];
            this.commentData = JSON.parse(this.comments) || [];
        },
        data() {
            return {
                rating: 0,
                eventData: [],
                commentData: [],
                comment: [],
            }
        },
        methods: {}
    }
</script>
