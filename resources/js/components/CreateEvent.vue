<template>
    <div>
        <div class="col-md-12 mb-3 md-form">
            <label>Ảnh đại diện(độ phân giải tối thiểu 1280x720px)</label>
            <input type="file" name="avatar" class="form-control" placeholder="Event name" value=""
                   accept="image/*" required>
            <span class="text-danger" role="alert" v-if="errors[`avatar`]">
                    <strong>{{ errors[`avatar`][0] }}</strong>
                </span>
            <br>
            <label>Ảnh thêm(độ phân giải tối thiểu 1280x720px)</label>
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
    export default {
        props: [
            "oldImages",
            "allError",
        ],
        created() {
            this.imageData = JSON.parse(this.oldImages) || [];
            this.errors = JSON.parse(this.allError) || [];
        },
        data() {
            return {
                imageData: [],
                errors: [],
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
