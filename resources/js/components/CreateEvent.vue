<template>
    <div>
        <div class="col-md-12 mb-3 md-form">
            <label>Ảnh đại diện(độ phân giải tối thiểu 1280x720px)</label>
            <input type="file" name="avatar" class="form-control" placeholder="Event name" value=""
                   accept="image/*" required>
            <div class="invalid-feedback">
            </div>
            <br>
            <label>Ảnh thêm(độ phân giải tối thiểu 1280x720px)</label>
        </div>
        <div class="col-md-12 mb-3 md-form row" v-for="(event, i) in imageData" :key="i">
            <div class="col-md-4">
                <label>Tiêu đề ảnh thứ {{ i + 1}}</label>
                <input type="text" :name="`images[${i}][title]`" class="form-control" placeholder="Image title" value=""
                       accept="image/*" required>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="col-md-8">
                <label>Ảnh thứ {{ i + 1}}</label>
                <input type="file" :name="`images[${i}][image]`" class="form-control" placeholder="Event name" value="" accept="image/*" required>
                <div class="invalid-feedback">
                </div>
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
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                imageData: [],
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
