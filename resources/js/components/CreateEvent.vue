<template>
    <div>
        <div class="col-md-12 mb-3 md-form">
            <label>Avatar(please chose image size over 1280x720px)</label>
            <input type="file" name="avatar" class="form-control" placeholder="Event name" value=""
                   accept="image/*" required>
            <div class="invalid-feedback">
            </div>
        </div>
        <label>More image(please chose image size over 1280x720px)</label>
        <div class="col-md-12 mb-3 md-form row" v-for="(event, i) in imageData" :key="i">
            <div class="col-md-4">
                <label>Sub title number {{ i + 1}}</label>
                <input type="text" :name="`images[${i}][title]`" class="form-control" placeholder="Image title" value=""
                       accept="image/*" required>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="col-md-8">
                <label>Sub image number {{ i + 1 }}</label>
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
