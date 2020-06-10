<template>
    <div>
        <div class="col-md-12 mb-3 md-form row">
            <div class="col-md-4">
                <label>Ngày giờ công bố <span class="text-danger">*</span> (sau thời gian hiện tại 1 ngày)</label>
                <datetime format="DD-MM-YYYY H:i:s" width="300px" name="public_date" v-model="oldData.public_date"></datetime>
                <span class="text-danger" role="alert" v-if="errors[`public_date`]">
                    <strong>{{ errors[`public_date`][0] }}</strong>
                </span>
            </div>
            <div class="col-md-4">
                <label>Ngày giờ bắt đầu <span class="text-danger">*</span> (sau thời gian công bố)</label>
                <datetime format="DD-MM-YYYY H:i:s" width="300px" name="start_date" v-model="oldData.start_date"></datetime>
                <span class="text-danger" role="alert" v-if="errors[`start_date`]">
                    <strong>{{ errors[`start_date`][0] }}</strong>
                </span>
            </div>
            <div class="col-md-4">
                <label>Ngày giờ kết thúc <span class="text-danger">*</span> (sau thời gian bắt đầu)</label>
                <datetime format="DD-MM-YYYY H:i:s" width="300px" name="end_date" v-model="oldData.end_date"></datetime>
                <span class="text-danger" role="alert" v-if="errors[`end_date`]">
                    <strong>{{ errors[`end_date`][0] }}</strong>
                </span>
            </div>
        </div>
        <div class="col-md-12 mb-3 md-form">
            <label>Nội dung <span class="text-danger">*</span></label>
            <vue-editor v-model="oldData.summary"></vue-editor>
            <input type="hidden" v-model="oldData.summary" name="summary">
            <span class="text-danger" role="alert" v-if="errors[`summary`]">
                    <strong>{{ errors[`summary`][0] }}</strong>
                </span>
        </div>
        <div class="col-md-12 mb-3 md-form row">
            <label class="col">Ảnh đại diện <span class="text-danger">*</span>(độ phân giải tối thiểu 1280x720px)</label>
            <input type="file" name="avatar" class="form-control col" placeholder="Event name" value=""
                   accept="image/*" required>
                <span class="text-danger" role="alert" v-if="errors[`avatar`]">
                    <strong>{{ errors[`avatar`][0] }}</strong>
                </span>
            <br>
            <label class="col-12">Ảnh thêm(độ phân giải tối thiểu 1280x720px)</label>
        </div>
        <div class="col-md-12 mb-3 md-form row" v-for="(image, i) in imageData" :key="i">
            <div class="col-md-4">
                <label>Tiêu đề ảnh số {{ i + 1}}</label>
                <input type="text" :name="`images[${i}][title]`" class="form-control" placeholder="Image title" v-model="image.title" accept="image/*" required>
                <span class="text-danger" role="alert" v-if="errors[`images.${i}.title`]">
                    <strong>{{ errors[`images.${i}.title`][0] }}</strong>
                </span>
            </div>
            <div class="col-md-8">
                <label>Ảnh thêm số {{ i + 1}}</label>
                <input type="file" :name="`images[${i}][image]`" class="form-control" placeholder="Image" accept="image/*" required>
                <span class="text-danger" role="alert" v-if="errors[`images.${i}.image`]">
                    <strong>{{ errors[`images.${i}.image`][0] }}</strong>
                </span>
            </div>
        </div>
        <div class="col-md-12 mb-3 md-form row">
            <div class="col text-left">
                <button class="btn btn-success" type="button" id="addBtn" @click="addImage()">+</button>
            </div>
            <div class="col text-right">
                <button class="btn btn-danger" type="button" id="delBtn" @click="delImage()">-</button>
            </div>
        </div>
    </div>
</template>

<script>
    import {VueEditor} from "vue2-editor";
    import datetime from 'vuejs-datetimepicker';

    export default {
        components: {
            VueEditor,
            datetime,
        },
        props: [
            "oldImages",
            "allError",
            "old",
        ],
        created() {
            this.imageData = JSON.parse(this.oldImages) || [];
            this.errors = JSON.parse(this.allError) || [];
            this.oldData = JSON.parse(this.old) || [];
        },
        data() {
            return {
                imageData: [],
                oldData: [],
                errors: [],
                content: null,
                publicDatetime: null,
                startDatetime: null,
                endDatetime: null,
            }
        },
        methods: {
            addImage() {
                this.imageData = [...this.imageData, {
                    text: '',
                    image: '',
                }]
            },

            delImage(index) {
                this.imageData.splice(index, 1)
            },
        }
    }
</script>
